<?php
class Halaman extends Controller
{
    private $adminModel;

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
        $this->view('student/login', $data);
    }

    public function home()
    {
        return $this->view('admin/home');
    }

    public function darjah($darjahId)
    {
        $darjahObject = $this->adminModel->getDarjahDetails($darjahId);

        $data = [
            'darjahId' => $darjahId,
            'topicList' => $this->adminModel->topicList($darjahId),
            'summary' => $darjahObject->summary,
            'file' => $darjahObject->pdf_notes
        ];

        return $this->view('admin/darjahDetails', $data);
    }
}
