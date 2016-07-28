<?php
/**
 *
 */
class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    var $parentTitle="HOME";

    function samaTempalte(){
        if(!isLogin()){
            redirect('login');
        }
        $data['parentTitle']  = $this->parentTitle;
        $data['title'] = "Dashboard";
        $data['session'] = $this->session->userdata;
        $data['dataUser'] = getDataUser($this->session->userdata('id_user'));
        // if( in_array( intval($data['session']['id_role']) , array(aU) ) ){
        //     $data['parentTitle']    = "Post Images / Video";
        //     $data['title']          = 'Data Post';
        // }
        return $data;
    }

    function index(){
        $data=$this->samaTempalte();
        if(isset($data['rows'])){
            $this->load->view('post/data', $data);
        }else{
            $this->load->view('dashboard',$data);
        }
    }

    function dashboard(){
        $data=$this->samaTempalte();
        if(isset($data['rows'])){
            $this->load->view('post/data', $data);
        }else{
            $this->load->view('dashboard',$data);
        }
    }

    function login(){
        $data['title']  = 'Login';

        if(!empty($_POST)){
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $cek = $this->db->where('user_name',$username)->where('password',$password)->get('users')->row_array();
            if(empty($cek)){
                redirect(current_url()."?gagal=1");
            }else{
                $this->db->where('id',$cek['id']);
                $this->db->update('users',$data);

                $getIndividu=$this->db->where('id',$cek['id_individu'])->get('individu')->row_array();
                setLogin($cek['id'],$cek['id_individu']);
                redirect('dashboard');
            }
        }else{
            $this->load->view('login', $data);
        }
    }

    function logout(){
        $data=array('akhir_login'=>date('Y-m-d H:i:s'));
                $this->db->where('id',$this->session->userdata('id_user'));
                $this->db->update('users',$data);
        unsetLogin();
        redirect('login');
    }
}