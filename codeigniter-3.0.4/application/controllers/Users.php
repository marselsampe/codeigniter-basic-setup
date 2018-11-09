<?php 
class Users extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('UsersModel');
    }

    public function index(){
        redirect("users/home");
    }

    public function home(){
        $headerData[ 'title' ] = 'Users';
        $headerData[ 'contentTitle' ] = 'Users';
        $headerData[ 'userCredential' ] = $this->getUserCredential();

        // search session
        $search = $this->UsersModel->handleAndGetSearchSession( 
            $this->input->post('searchCategory'), 
            $this->input->post('searchKeyword'), 
            $this->input->post('searchReset')
            );
        $data[ 'search' ] = $search;

        // pagination
        $this->load->library('pagination');
        $pagination_perpage = 10;
        $pagination_urisegment = 3;
        $pagination_offset = $this->uri->segment($pagination_urisegment);

        // fetch data
        $data['listData'] = $this->UsersModel->getData($search->searchCategory, $search->searchKeyword, $pagination_perpage, $pagination_offset);
        $data['totalData'] = $this->UsersModel->getDataCount($search->searchCategory, $search->searchKeyword);

        // pagination
        $totalData = $data['totalData'];
        $this->load->library('paginationhelperlibrary');
        $pagination_uri = base_url() . '/user/home';
        $paginationConfig = $this->paginationhelperlibrary->generateConfig($pagination_uri, $totalData, $pagination_perpage, $pagination_urisegment);
        $this->pagination->initialize($paginationConfig);

        $this->load->view('layout/header', $headerData);
        $this->load->view('users/home', $data);
        $this->load->view('layout/footer');
    }

}