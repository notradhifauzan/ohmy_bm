<?php
class Admins extends Controller
{
    private $adminModel;
    private $studentModel;

    public function __construct()
    {
        /**
         * for extra control, set a session of the following attributes:
         * 
         * 1. valid_actor : if the user actually successfully logged in
         * 2. current_actor : not logged in, but casually browsing content as 'the' user
         * 3. current_controller : generally to give hint to what page the user is currently in
         * 
         */
        $this->adminModel = $this->model('Admin');
        $this->studentModel = $this->model('Student');

        if(isset($_SESSION['current_controller']))
        {
            unset($_SESSION['current_controller']);
        }
        $_SESSION['current_controller'] = 'admins';
    }

    public function topicForm($darjahId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fileDestination = '';
            $fileTmpName = '';
            $fileNameNew = '';

            $data = [
                'topicName' => trim($_POST['topicName']),
                'topicName_err' => '',
                'darjahId' => $darjahId,
                'uniqueFileName' => '',
                'summary' => trim($_POST['summary']),
                'summary_err' => ''
            ];

            if (empty($data['topicName'])) {
                $data['topicName_err'] = 'Sila nyatakan nama nota tambahan';
            }

            if (empty($data['summary'])) {
                $data['summary_err'] = 'Sila nyatakan huraian nota tambahan';
            }

            if (!empty($data['topicName']) && !empty($data['summary'])) {
                // proceed to check the file
                // use topic name as the 'main' name in database
                if ($_FILES['pdfFile']['error'] != 4 || ($_FILES['pdfFile']['size'] != 0 && $_FILES['pdfFile']['error'] != 0)) {
                    $fileName = $_FILES['pdfFile']['name'];
                    $fileTmpName = $_FILES['pdfFile']['tmp_name'];
                    $fileSize = $_FILES['pdfFile']['size'];
                    $fileError = $_FILES['pdfFile']['error'];

                    $maxFileSize = 500 * 1024 * 1024; // 500 MB in bytes

                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower(end($fileExt));

                    $allowed = array('pdf', 'docx');

                    if (!in_array($fileActualExt, $allowed)) {
                        $data['fileName_err'] = 'Format fail tidak sah. hanya format pdf dan docx sahaja yang dibenarkan';
                    } else {
                        if ($fileError === 0) {
                            if ($fileSize < $maxFileSize) {
                                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                                $fileDestination = 'notes/' . $fileNameNew;
                                $data['uniqueFileName'] = $fileNameNew;
                            } else {
                                $data['topicName_err'] = 'Saiz fail terlalu besar';
                            }
                        } else {
                            $data['topicName_err'] = 'Muat naik fail tidak berjaya';
                        }
                    }
                } else {
                    $data['topicName_err'] = 'Sila muat naik nota tambahan';
                }

                if (empty($data['topicName_err'])) {
                    move_uploaded_file($fileTmpName, $fileDestination);
                    if ($this->adminModel->uploadNotes($data)) {
                        flash('upload_textbook_success', 'Nota tambahan berjaya dimuat naik');
                        redirect('admins/darjah/' . $darjahId);
                    } else {
                        //load view with errors
                        flash('upload_textbook_failed', 'Nota tambahan gagal dimuat naik', 'alert alert-danger');
                        redirect('admins/darjah/' . $darjahId);
                    }
                } else {
                    return $this->view('admin/topicForm', $data);
                }
            } else {
                return $this->view('admin/topicForm', $data);
            }
        } else {
            $data = [
                'topicName' => '',
                'darjahId' => $darjahId,
                'topicName_err' => '',
                'summary' => '',
                'summary_err' => '',
                'pdf_file' => '',
                'pdf_file_err' => ''
            ];

            return $this->view('admin/topicForm', $data);
        }
    }

    public function deleteMaterials($topicId)
    {
        $darjahId = $_GET['darjahId'];
        $noteObject = $this->adminModel->getNotes($topicId);
        $fileDestination = 'notes/' . $noteObject->pdf_name;
        if (!empty($darjahId) && !empty($topicId)) {
            if ($this->adminModel->deleteMaterials($topicId) && unlink($fileDestination)) {
                flash('materials_delete_success', 'Bahan pembelajaran telah dipadam', 'alert alert-warning');
                redirect('admins/darjah/' . $darjahId);
            } else {
                flash('materials_delete_failed', 'Bahan pembelajaran gagal dipadam', 'alert alert-danger');
                redirect('admins/darjah/' . $darjahId);
            }
        } else {
            die('some values went missing');
        }
    }

    public function deleteSOW($darjahId)
    {
        if ($this->adminModel->deleteSOW($darjahId)) {
            flash('delete_textbook_success', 'Buku teks telah dipadam', 'alert alert-warning');
            redirect('admins/darjah/' . $darjahId);
        } else {
            flash('delete_textbook_failed', 'Buku teks gagal dipadam', 'alert alert-danger');
            redirect('admins/darjah/' . $darjahId);
        }
    }

    public function deleteTextBook($darjahId)
    {
        $darjahObject = $this->adminModel->getDarjahDetails($darjahId);
        $fileDestination = 'textbooks/' . $darjahObject->pdf_name;
        if ($this->adminModel->deleteSOW($darjahId) && unlink($fileDestination)) {
            flash('delete_textbook_success', 'Buku teks telah dipadam', 'alert alert-warning');
            redirect('admins/darjah/' . $darjahId);
        } else {
            flash('delete_textbook_failed', 'Buku teks gagal dipadam', 'alert alert-danger');
            redirect('admins/darjah/' . $darjahId);
        }
    }

    public function uploadTextBook($darjahId)
    {
        $darjahObject = $this->adminModel->getDarjahDetails($darjahId);

        $fileDestination = '';
        $fileTmpName = '';
        $fileNameNew = '';

        $data = [
            'darjahId' => $darjahId,
            'topicList' => $this->adminModel->topicList($darjahId),
            'summary' => $darjahObject->summary,
            //'file' => $darjahObject->pdf_notes,
            'fileName' => trim($_POST['fileName']),
            'fileContent' => '',
            'uniqueFileName' => '',

            'fileName_err' => ''
        ];

        if (empty($data['fileName'])) {
            $data['fileName_err'] = 'Sila masukkan tajuk';
        }

        if ($_FILES['pdfFile']['error'] != 4 || ($_FILES['pdfFile']['size'] != 0 && $_FILES['pdfFile']['error'] != 0)) {
            $fileName = $_FILES['pdfFile']['name'];
            $fileTmpName = $_FILES['pdfFile']['tmp_name'];
            $fileSize = $_FILES['pdfFile']['size'];
            $fileError = $_FILES['pdfFile']['error'];

            $maxFileSize = 500 * 1024 * 1024; // 500 MB in bytes

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('pdf', 'docx');

            if (!in_array($fileActualExt, $allowed)) {
                $data['fileName_err'] = 'Format fail tidak sah. hanya format pdf dan docx sahaja yang dibenarkan';
            } else {
                if ($fileError === 0) {
                    if ($fileSize < $maxFileSize) {
                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                        $fileDestination = 'textbooks/' . $fileNameNew;
                        $data['uniqueFileName'] = $fileNameNew;
                    } else {
                        $data['fileName_err'] = 'Saiz fail terlalu besar';
                    }
                } else {
                    $data['fileName_err'] = 'Muat naik fail tidak berjaya';
                }
            }
        } else {
            $data['fileName_err'] = 'Sila muat naik buku teks';
        }

        if (empty($data['fileName_err'])) {
            move_uploaded_file($fileTmpName, $fileDestination);
            if ($this->adminModel->uploadSOW($data)) {
                flash('upload_textbook_success', 'Buku teks berjaya dimuat naik');
                redirect('admins/darjah/' . $darjahId);
            } else {
                //load view with errors
                flash('upload_textbook_failed', 'Buku teks gagal dimuat naik', 'alert alert-danger');
                redirect('admins/darjah/' . $darjahId);
            }
        } else {
            flash('upload_textbook_failed', 'Buku teks gagal dimuat naik', 'alert alert-danger');
            $data['fileName_err'] = 'Sila masukkan fail';
            return $this->view('admin/darjahDetails', $data);
        }
    }

    public function uploadSOW($darjahId)
    {
        $darjahObject = $this->adminModel->getDarjahDetails($darjahId);

        $data = [
            'darjahId' => $darjahId,
            'topicList' => $this->adminModel->topicList($darjahId),
            'summary' => $darjahObject->summary,
            'fileName' => '',
            'fileContent' => '',

            'fileName_err' => ''
        ];

        $data['darjahId'] = $darjahId;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['fileName'])) {
                $data['fileName_err'] = 'Sila masukkan nama fail';
                return $this->view('admin/darjahDetails', $data);
            } else {
                $data['fileName'] = $_POST['fileName'];
            }

            if (empty($data['filenName_err'])) {
                if ($_FILES['pdfFile']['error'] == UPLOAD_ERR_OK) {
                    $tmpFileName = $_FILES['pdfFile']['tmp_name'];
                    // Check if the uploaded file is a PDF
                    $fileType = mime_content_type($tmpFileName);

                    if ($fileType === 'application/pdf') {
                        // Read the content of the PDF file
                        $fileContent = file_get_contents($tmpFileName);
                        $data['fileContent'] = $fileContent;

                        // Store file information in the database
                        if ($this->adminModel->uploadSOW($data)) {
                            flash('upload_textbook_success', 'Buku teks berjaya dimuat naik');
                            redirect('admins/darjah/' . $darjahId);
                        } else {
                            flash('upload_textbook_failed', 'Buku teks gagal dimuat naik', 'alert alert-danger');
                            redirect('admins/darjah/' . $darjahId);
                        }
                    } else {
                        flash('upload_textbook_failed', 'Buku teks gagal dimuat naik', 'alert alert-danger');
                        redirect('admins/darjah/' . $darjahId);
                    }
                } else {
                    flash('upload_textbook_failed', 'Buku teks gagal dimuat naik', 'alert alert-danger');
                    $data['fileName_err'] = 'Sila masukkan fail';
                    return $this->view('admin/darjahDetails', $data);
                }
            }
        }
    }

    public function index()
    {
        //init data
        $data = [
            'username' => '',
            'password' => '',

            'username_err' => '',
            'password_err' => '',
        ];

        //load view
        $this->view('admin/login', $data);
    }

    public function home()
    {
        return $this->view('admin/home');
    }

    public function darjah($darjahId)
    {
        $darjahObject = $this->adminModel->getDarjahDetails($darjahId);
        $feedbacks = $this->studentModel->getFeedbacksFromDarjah($darjahId);

        $data = [
            'darjahId' => $darjahId,
            'topicList' => $this->adminModel->topicList($darjahId),
            'summary' => $darjahObject->summary,
            'tajuk' => $darjahObject->tajuk,
            'file_name' => $darjahObject->pdf_name,
            'feedbacks' => $feedbacks
        ];

        return $this->view('admin/darjahDetails', $data);
    }

    public function updateTextbookSummary($darjahId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'darjahId' => $darjahId,
                'summary' => trim($_POST['summary'])
            ];

            if ($this->adminModel->updateTextbookSummary($data)) {
                flash('summary_update_success', 'Huraian buku teks berjaya dikemaskini');
                redirect('admins/darjah/' . $darjahId);
            } else {
                flash('summary_update_failed', 'Huraian buku teks gagal dikemaskini', 'alert alert-danger');
                redirect('admins/darjah/' . $darjahId);
            }
        }
    }

    public function login()
    {
        //check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process the login form
            //sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //init data
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),

                'username_err' => '',
                'password_err' => '',
            ];

            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter your password';
            }

            //check for admin username
            if ($this->adminModel->findAdminByUsername($data['username'])) {
                //user found
            } else {
                $data['username_err'] = '*Nama-pengguna tidak tersenarai, sila periksa';
            }

            //make sure errors are empty
            if (empty($data['username_err']) && empty($data['password_err'])) {
                //validated
                //Check and set logged in user

                $loggedInUser = $this->adminModel->login($data['username'], $data['password']);
                if ($loggedInUser) {
                    // adminObj is used to display admin profile for view purpose
                    $adminObj = $this->adminModel->getAdminDetails($data['username']);

                    if (isset($_SESSION['currentUser'])) {
                        unset($_SESSION['currentUser']);
                    }
                    //create session
                    $_SESSION['currentUser'] = $adminObj;

                    redirect('admins/home');
                } else {
                    $data['password_err'] = '*Kata laluan salah, sila periksa';
                    $this->view('admin/login', $data);
                }
            } else {
                //Load view with errors
                $this->view('admin/login', $data);
            }
        } else {
            //init data
            $data = [
                'username' => '',
                'password' => '',

                'username_err' => '',
                'password_err' => '',
            ];

            //load view
            $this->view('admin/login', $data);
        }
    }

    public function logout()
    {
        if (isset($_SESSION['current_user'])) {
            unset($_SESSION['current_user']);
        }

        redirect('admins/login');
    }
}
