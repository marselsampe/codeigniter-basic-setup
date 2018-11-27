<?php 
class Home extends MY_Controller 
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function index() 
    {
        $HeaderData[ 'title' ] = 'Home';
        $HeaderData[ 'contentTitle' ] = 'Dashboard';
        $HeaderData[ 'userCredential' ] = $this->getUserCredential();

        $this->load->view('layout/header', $HeaderData);
        $this->load->view('home/index');
        $this->load->view('layout/footer');
    }
}