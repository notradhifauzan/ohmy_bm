<?php
class Students extends Controller
{
    private $studentModel;

    public function __construct()
    {
        $this->studentModel = $this->model('Student');
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
                    redirect('students/home');
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
        return $this->view('admin/home');
    }

    public function login()
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
        } else {
            return $this->view('student/login', $data);
        }
    }
}
