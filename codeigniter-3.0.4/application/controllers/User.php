<?php 
class User extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('SecurityModel');
        $this->load->model('UserModel');
    }

    public function index(){
        redirect("user/home");
    }

    public function home(){
        $headerData[ 'navTitle' ] = 'User';
        $headerData[ 'USER_DATA' ] = $_SESSION['USER'];
        $data[ 'USER_DATA' ] = $_SESSION['USER'];

        $search = $this->UserModel->handleAndGetSearchSession( 
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

        $data['listData'] = $this->UserModel->getData($search->searchCategory, $search->searchKeyword, $pagination_perpage, $pagination_offset);
        $data['totalData'] = $this->UserModel->getDataCount($search->searchCategory, $search->searchKeyword);

        // pagination
        $totalData = $data['totalData'];
        $this->load->library('paginationhelperclass');
        $pagination_uri = base_url() . '/user/home';
        $paginationConfig = $this->paginationhelperclass->generateConfig($pagination_uri, $totalData, $pagination_perpage, $pagination_urisegment);
        $this->pagination->initialize($paginationConfig);

        $this->load->view('layout/header', $headerData);
        $this->load->view('user/home', $data);
        $this->load->view('layout/footer');
    }

    public function add(){
        if( !$this->SecurityModel->isAuthorized( 'User', 'add', getUserStatus( $_SESSION['USER'] ) ) )
            redirect('home/index');

        $headerData[ 'navTitle' ] = 'User';
        $headerData[ 'USER_DATA' ] = $_SESSION['USER'];
        $data[ 'USER_DATA' ] = $_SESSION['USER'];

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
        $this->load->view('user/add', $data);
        $this->load->view('layout/footer');
    }

    public function edit(){
        if( !$this->SecurityModel->isAuthorized( 'User', 'edit', getUserStatus( $_SESSION['USER'] ) ) )
            redirect('home/index');

        $headerData[ 'navTitle' ] = 'Edit User';
        $headerData[ 'USER_DATA' ] = $_SESSION['USER'];
        $data[ 'USER_DATA' ] = $_SESSION['USER'];

        $id = $this->uri->segment(3);
        if(!$id)
            redirect('user/home');

        $oldRow = $this->UserModel->getDetail($id);		
        $data['id']=$id;
        $data['oldRow'] = $oldRow;

        if(!$_POST){
            $data['input'] = $oldRow;
            if($data['input']==null)
                redirect('user/home');
        }else{
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
            $input->status=$status;
            $input->email=$email;
            $input->reststatus='Pending';

            $data['input']=$input;

            if($username=="" || $nama=="" || $status==""){
                $this->session->set_flashdata('msg_error', 'Inputan belum lengkap !');
            }else if($password!="" && $password!=$repassword){
                $this->session->set_flashdata('msg_error', 'Password tidak sesuai !');
            }else{
                $result=$this->UserModel->update($input, $id);

                if( $result == null || $result["code"] == 0 ){
                    $this->session->set_flashdata('msg_success', 'Data diedit');
                    redirect('user/home');
                }else if($result["code"]=="1062"){
                    $this->session->set_flashdata('msg_error', 'Username sudah digunakan');
                } else if ($result != null && $result["code"]!="0"){
                    $this->session->set_flashdata('msg_error', "Terjadi kesalahan :<br/>" . $result["message"] );
                }
            }
        }

        $this->load->view('layout/header', $headerData);
        $this->load->view('user/edit', $data);
        $this->load->view('layout/footer');
    }

    public function delete(){
        if( !$this->SecurityModel->isAuthorized( 'User', 'delete', getUserStatus( $_SESSION['USER'] ) ) )
            redirect('home/index');

        $id = $this->uri->segment(3);
        if($id){
            $result=$this->UserModel->delete($id, 'Pending');

            if( $result == null || $result["code"] == 0 ){
                $this->session->set_flashdata('msg_success', 'Data dihapus');
                redirect('user/home');
            }else if($result["code"]=="1451"){
                $this->session->set_flashdata('msg_error', 'Tidak dapat dihapus, data ini berhubungan dengan tabel lain');
            } else if ($result != null && $result["code"]!="0"){
                $this->session->set_flashdata('msg_error', "Terjadi kesalahan :<br/>" . $result["message"] );
            }
        }

        redirect('user/home');
    }

    public function profilesetting(){
        $headerData[ 'navTitle' ] = 'Pengaturan';
        $headerData[ 'USER_DATA' ] = $_SESSION['USER'];
        $data[ 'USER_DATA' ] = $_SESSION['USER'];

        $userStatus = $_SESSION['USER']->status;
        $userUniqueId = $_SESSION['USER']->uniqueId;
        
        if(!$_POST){
            $data['input'] = $_SESSION['USER'];
        }else{
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $repassword=$this->input->post('repassword');
            $nama=$this->input->post('nama');

            $input=new stdClass();
            $input->username=$username;
            $input->password=$password;
            $input->repassword=$repassword;
            $input->nama=$nama;
            $input->status=$_SESSION['USER']->status;
            $input->email=$_SESSION['USER']->email;
            $input->reststatus='Pending';

            $data['input']=$input;

            if($username=="" || $nama==""){
                $this->session->set_flashdata('msg_error', 'Inputan belum lengkap !');
            }else if($password!="" && $password!=$repassword){
                $this->session->set_flashdata('msg_error', 'Password tidak sesuai !');
            }else{
                $result=$this->UserModel->update($input, $userUniqueId);

                if( $result == null || $result["code"] == 0 ){
                    $this->session->set_flashdata('msg_success', 'Profile berhasil diupdate');
                    $input->password="";
                    $input->repassword="";
                }else if($result["code"]=="1062"){
                    $this->session->set_flashdata('msg_error', 'Username sudah digunakan');
                } else if ($result != null && $result["code"]!="0"){
                    $this->session->set_flashdata('msg_error', "Terjadi kesalahan :<br/>" . $result["message"] );
                }
            }
        }

        $this->load->view('layout/header', $headerData);
        $this->load->view('user/profilesetting', $data);
        $this->load->view('layout/footer');
    }

}