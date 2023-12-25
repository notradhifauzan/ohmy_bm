<?php
class Students extends Controller
{
    private $studentModel;
    private $adminModel;

    public function __construct()
    {
        $this->studentModel = $this->model('Student');
        $this->adminModel = $this->model('Admin');

        if (isset($_SESSION['current_controller'])) {
            unset($_SESSION['current_controller']);
        }
        $_SESSION['current_controller'] = 'student';
    }

    public function index()
    {
        redirect('students/login');
    }

    public function register()
    {
        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'confirm_password' => '',

            'username_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['username'])) {
                $data['username_err'] = 'Sila masukkan nama pengguna';
            } else {
                if ($this->studentModel->isUsernameExist($_POST['username'])) {
                    $data['username_err'] = 'nama pengguna telah diambil';
                }
                $data['username'] = $_POST['username'];
            }

            if (empty($_POST['email'])) {
                $data['email_err'] = 'Sila masukkan e-mel pengguna';
            } else {
                if ($this->studentModel->isEmailExist($_POST['email'])) {
                    $data['email_err'] = 'emel pengguna telah diambil';
                }
                $data['email'] = $_POST['email'];
            }

            if (empty($_POST['password'])) {
                $data['password_err'] = 'Sila masukkan kata laluan';
            } else {
                $data['password'] = $_POST['password'];
            }

            if (empty($_POST['confirm_password'])) {
                $data['confirm_password_err'] = 'Sila sahkan kata laluan';
            } else {
                $data['confirm_password'] = $_POST['confirm_password'];
            }

            if (!empty($_POST['password']) && !empty($_POST['confirm_password'])) {
                if ($_POST['password'] != $_POST['confirm_password']) {
                    $data['confirm_password_err'] = 'Kata laluan tidak sepadan';
                }
            }

            if (
                empty($data['username_err']) && empty($data['email_err']) &&
                empty($data['password_err']) && empty($data['confirm_password_err'])
            ) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                // proceed to register this student
                if ($this->studentModel->register($data)) {
                    redirect('students/login');
                } else {
                    die('fail to register student, something went wrong');
                }
            } else {
                // load view with errors
                $this->view('student/register', $data);
            }
        } else {
            return $this->view('student/register', $data);
        }
    }

    public function home()
    {
        $this->isLoggedIn();
        return $this->view('student/home');
    }

    public function logout()
    {
        if (isset($_SESSION['current_user'])) {
            unset($_SESSION['current_user']);
        }

        redirect('students/login');
    }

    public function login()
    {
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
                $data['username_err'] = 'Sila masukkan nama pengguna';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Sila masukkan kata laluan';
            }

            //check for user/mail
            if ($this->studentModel->isUsernameExist($data['username'])) {
                //user found
            } else {
                $data['username_err'] = 'Tiada maklumat pengguna dalam pangkalan data';
            }

            //make sure errors are empty
            if (empty($data['username_err']) && empty($data['password_err'])) {
                //validated
                //Check and set logged in user

                $loggedInUser = $this->studentModel->login($data);
                if ($loggedInUser) {
                    //create session
                    if (isset($_SESSION['current_user'])) {
                        unset($_SESSION['current_user']);
                    }
                    $_SESSION['current_user'] = $loggedInUser;
                    redirect('students/home');
                } else {
                    $data['password_err'] = 'Kata laluan salah';
                    $this->view('student/login', $data);
                }
            } else {
                //Load view with errors
                $this->view('student/login', $data);
            }
        } else {
            //init data
            $data = [
                'username' => '',
                'password' => '',

                'username_err' => '',
                'password_err' => '',
            ];
            return $this->view('student/login', $data);
        }
    }

    public function darjah($darjahId)
    {
        $this->isLoggedIn();

        $darjahObject = $this->adminModel->getDarjahDetails($darjahId);
        $feedbacks = $this->studentModel->getFeedbacksFromDarjah($darjahId);

        $data = [
            'darjahId' => $darjahId,
            'topicList' => $this->adminModel->topicList($darjahId),
            'summary' => $darjahObject->summary,
            'file' => $darjahObject->pdf_notes,
            'feedbacks' => $feedbacks
        ];

        return $this->view('student/darjahDetails', $data);
    }

    public function addFeedbacks($darjahId)
    {
        $this->isLoggedIn();
        // get student id from session
        if (isset($_SESSION['current_user'])) {
            $currentUser = $_SESSION['current_user'];
        }
        $studentId = $currentUser->studentId;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'post' => trim($_POST['feedback']),
                'darjahId' => $darjahId,
                'userId' => $studentId,

                'post_err' => '',
                'darjahId_err' => '',
                'userId_err' => ''
            ];

            if (empty($data['post'])) {
                $data['post_err'] = 'Sila tinggalkan maklum balas dalam ruangan yang disediakan';
            }

            if (empty($data['darjahId'])) {
                $data['darjahId_err'] = 'darjahId should not be empty';
                die('something went wrong, darjahId should not be empty');
            }

            if (empty($data['userId'])) {
                $data['userId_err'] = 'userId should not be empty';
                die('something went wrong, userId should not be empty');
            }

            if (empty($data['post_err']) && empty($data['darjahId_err']) && empty($data['userId_err'])) {
                // proceed to add this feedbacks to database
                if($this->studentModel->addFeedbacks($data)){
                    redirect('students/darjah/'.$darjahId);
                } else {
                    die('something went wrong, could not store the feedbacks to the database');
                }
            }
        }
    }

    private function isLoggedIn()
    {
        if (!isset($_SESSION['current_user'])) {
            redirect('students/login');
        }
    }
}
