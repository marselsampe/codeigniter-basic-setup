<?php 
class Home extends My_Controller 
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function index() 
    {
        $this->load->view('layout/header');
        $this->load->view('home/index');
        $this->load->view('layout/footer');
    }
}