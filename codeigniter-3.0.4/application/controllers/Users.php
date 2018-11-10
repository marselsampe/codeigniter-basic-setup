<?php 
class Users extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('UsersModel');
    }

    public function index()
    {
        redirect("users/home");
    }

    public function home()
    {
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
        $pagination_perpage = 20;
        $pagination_urisegment = 3;
        $pagination_offset = $this->uri->segment($pagination_urisegment);

        // fetch data
        $search->searchKeyword = '%' . $search->searchKeyword . '%';
        $data['listData'] = $this->UsersModel->getData($search->searchCategory, $search->searchKeyword, $pagination_perpage, $pagination_offset);
        $data['totalData'] = $this->UsersModel->getDataCount($search->searchCategory, $search->searchKeyword);

        // pagination
        $totalData = $data['totalData'];
        $this->load->library('paginationhelperlibrary');
        $pagination_uri = base_url() . '/users/home';
        $paginationConfig = $this->paginationhelperlibrary->generateConfig($pagination_uri, $totalData, $pagination_perpage, $pagination_urisegment);
        $this->pagination->initialize($paginationConfig);

        $this->load->view('layout/header', $headerData);
        $this->load->view('users/home', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $headerData[ 'title' ] = 'Users';
        $headerData[ 'contentTitle' ] = 'Tambah User';
        $headerData[ 'userCredential' ] = $this->getUserCredential();

        $data = array();
        if($_POST){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $repassword=$this->input->post('repassword');
            $nama=$this->input->post('nama');
            $status=$this->input->post('status');
            $email=$this->input->post('email');

            $input=new stdClass();
            $input->username=$username;
            $input->password=$password;
            $input->repassword=$repassword;
            $input->nama=$nama;
            $input->email=$email;
            $input->status=$status;
            $input->reststatus='Pending';

            $data['input']=$input;

            if($username=="" || $password=="" || $repassword=="" || $nama=="" || $status==""){
                $this->session->set_flashdata('msg_error', 'Inputan belum lengkap !');
            }else if($password!=$repassword){
                $this->session->set_flashdata('msg_error', 'Password tidak sesuai !');
            }else{
                $result=$this->UserModel->insert($input);

                if( $result == null || $result["code"] == 0 ){
                    $this->session->set_flashdata('msg_success', 'Data disimpan');
                    redirect('user/home');
                }else if($result["code"]=="1062"){
                    $this->session->set_flashdata('msg_error', 'Username sudah digunakan');
                } else if ($result != null && $result["code"]!="0"){
                    $this->session->set_flashdata('msg_error', "Terjadi kesalahan :<br/>" . $result["message"] );
                }
            }
        }

        $this->load->view('layout/header', $headerData);
        $this->load->view('users/add', $data);
        $this->load->view('layout/footer');
    }

    public function edit()
    {

    }

    public function delete()
    {

    }

}