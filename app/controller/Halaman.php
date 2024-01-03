<?php
class Halaman extends Controller
{

    public function __construct()
    {
        
    }

    public function index()
    {
        
    }

    public function home()
    {
    }

    public function contactUs()
    {
        return $this->view('halaman/contactUs');
    }

    public function info()
    {
        return $this->view('halaman/info');
    }

    public function about()
    {
        return $this->view('halaman/about');
    }
}
