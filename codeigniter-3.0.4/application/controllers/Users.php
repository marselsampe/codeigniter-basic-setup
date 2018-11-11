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
        $data['listData'] = $this->UsersModel->getData($search->searchCategory, '%'.$search->searchKeyword.'%', $pagination_perpage, $pagination_offset);
        $data['totalData'] = $this->UsersModel->getDataCount($search->searchCategory, '%'.$search->searchKeyword.'%');

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
        $headerData[ 'contentTitle' ] = 'Users';
        $headerData[ 'userCredential' ] = $this->getUserCredential();

        $data = array();
        if($_POST){
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $status=$this->input->post('status');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $repassword=$this->input->post('repassword');

            $input=new stdClass();
            $input->name=$name;
            $input->email=$email;
            $input->status=$status;
            $input->username=$username;
            $input->password=$password;
            $input->repassword=$repassword;
            $input->reststatus='Pending';

            $data['input']=$input;
            
            if($name=="" || $status=="" || $username=="" || $password=="" || $repassword==""){
                $this->session->set_flashdata('msg_error', 'Inputan belum lengkap !');
            }else if($password!=$repassword){
                $this->session->set_flashdata('msg_error', 'Password tidak sesuai !');
            }else{
                $result=$this->UsersModel->insert($input);

                if( $result == null || $result["code"] == 0 ){
                    $this->session->set_flashdata('msg_success', 'Data disimpan');
                    redirect('users/home');
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

    public function edit( $uniqueId=NULL )
    {
        if( !$uniqueId )
            redirect('users/home');

        $headerData[ 'title' ] = 'Users';
        $headerData[ 'contentTitle' ] = 'Users';
        $headerData[ 'userCredential' ] = $this->getUserCredential();

        $data = array();

        $oldRow = $this->UsersModel->getDetail($uniqueId);
        $data['oldRow'] = $oldRow;

        if(!$_POST){
            if(!$oldRow)
                redirect('users/home');
            $data['input'] = $oldRow;
        }else{
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $status=$this->input->post('status');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $repassword=$this->input->post('repassword');
            $isActive=$this->input->post('isActive');

            $input=new stdClass();
            $input->name=$name;
            $input->email=$email;
            $input->status=$status;
            $input->username=$username;
            $input->password=$password;
            $input->repassword=$repassword;
            $input->isActive=$isActive;
            $input->reststatus='Pending';

            $data['input']=$input;

            if($name=="" || $status=="" || $username==""){
                $this->session->set_flashdata('msg_error', 'Inputan belum lengkap !');
            }else if($password!=$repassword){
                $this->session->set_flashdata('msg_error', 'Password tidak sesuai !');
            }else{
                $result=$this->UsersModel->update($input, $uniqueId);

                if( $result == null || $result["code"] == 0 ){
                    $this->session->set_flashdata('msg_success', 'Data disimpan');
                    redirect('users/home');
                }else if($result["code"]=="1062"){
                    $this->session->set_flashdata('msg_error', 'Username sudah digunakan');
                } else if ($result != null && $result["code"]!="0"){
                    $this->session->set_flashdata('msg_error', "Terjadi kesalahan :<br/>" . $result["message"] );
                }
            }
        }

        $this->load->view('layout/header', $headerData);
        $this->load->view('users/edit', $data);
        $this->load->view('layout/footer');
    }

    public function delete( $uniqueId = NULL )
    {
        if( !$uniqueId )
            redirect('user/home');

        $result=$this->UsersModel->delete($uniqueId);

        if( $result == null || $result["code"] == 0 ){
            $this->session->set_flashdata('msg_success', 'Data dihapus');
            redirect('users/home');
        }else if($result["code"]=="1451"){
            $this->session->set_flashdata('msg_error', 'Tidak dapat dihapus, data ini berhubungan dengan tabel lain');
        } else if ($result != null && $result["code"]!="0"){
            $this->session->set_flashdata('msg_error', "Terjadi kesalahan :<br/>" . $result["message"] );
        }
    }

}