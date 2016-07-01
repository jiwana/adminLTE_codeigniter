<?php
/**
 *
 */
class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Musers');
        $this->load->model('Mindividu');
    }

    var $parentTitle="PROFILE";

    function index(){
        if(!isLogin()){
            redirect('login');
        }
        $data['parentTitle']  = $this->parentTitle;
        $data['title']  = 'Data User';
        $data['session'] = $this->session->userdata;
        $data['dataUser'] = getDataUser($this->session->userdata('id_user'));
        $data_gender=array(
            0=>array(
                'id'    => 1,
                'nama'  => 'laki-Laki'
            ),
            1=>array(
                'id'    => 0,
                'nama'  => 'Perempuan'
            )
        );
        $data['gender_array'] = $data_gender;
        $this->load->view('users/form', $data);
    }

    function individu(){
        $file_max_weight = 2048576;
        $extenstion = array('jpg','png','jpeg','JPG');
        $folder     = str_replace(base_url(), '', image_user);

        if(!empty($_POST)){
            $file = $_FILES['file'];
            $filename = explode(".", $file["name"]);
            $id_individu=$this->session->userdata['id_individu'];
            $tglLahir = DateTime::createFromFormat('d-m-Y',$this->input->post('tgl_lahir'));
            $this->db->trans_begin();

            $dateNow=new dateTime();
            $data = array(
                $this->Mindividu->col_nama              => $this->input->post('nama'),
                $this->Mindividu->col_jenis_kelamin     => $this->input->post('gender'),
                $this->Mindividu->col_tgl_lahir         => $tglLahir->format('Y-m-d'),
                $this->Mindividu->col_alamat            => $this->input->post('alamat'),
                $this->Mindividu->col_email             => $this->input->post('email'),
                $this->Mindividu->col_tlp               => $this->input->post('tlp'),
            );
            $this->Mindividu->update($data,$id_individu);
            if ($this->db->trans_status() === FALSE){
                $pesan=array(0,'Data tidak berhasil disimpan');
            }else{
                $pesan=array(1,'Data berhasil disimpan');
                $valueGambar=uploadGambar(
                    $_FILES['file'],
                    $folder,
                    $extenstion,
                    $file_max_weight,
                    25,
                    $id_individu
                );

                if(isset($valueGambar)){
                    $data = array(
                        $this->Mindividu->col_photo  => $valueGambar
                    );
                    $this->Mindividu->update($data,$id_individu);

                    if ($this->db->trans_status() === FALSE){
                        $pesan=array(0,'Data tidak berhasil ditambahkan');
                    }else{
                        $pesan=array(1,'Data berhasil ditambahkan');
                    }
                }
            }

            if(isset($pesan)){
                if($pesan[0] === 0){
                    $pesan[0]='error';
                    $this->db->trans_rollback();
                }else{
                    $pesan[0]='success';
                    $this->db->trans_commit();
                }
                $this->session->set_flashdata($pesan[0],$pesan[1]);
            }
            redirect('users');
        }
    }

    function users(){
        if(!empty($_POST)){
            $username=$this->input->post('user_name');
            $oldPass=$this->input->post('oldPass');
            $newPass=$this->input->post('newPass');
            $rePass=$this->input->post('rePass');

            $id=$this->session->userdata['id_user'];
            $cek = $this->db->where('id',$id)->get('users')->row_array();

            if( $oldPass ){
                if( strlen($oldPass) < 5 or strlen( $newPass ) < 5 ){
                    $this->session->set_flashdata('error', 'Password minimal 5 karakter');
                }elseif( $newPass != $rePass ){
                    $this->session->set_flashdata('error', 'Re-Password harus sama dengan New Password');
                }else{
                    if( $cek['password'] != md5( $oldPass ) ){
                        $this->session->set_flashdata('error', 'Password lama anda salah');
                    }else{

                        $this->db->trans_begin();
                        $dateNow=new dateTime();

                        $dataArray = array(
                            $this->Musers->col_password    => md5( $newPass )
                        );
                        $this->Musers->update($dataArray,$id);
                        if ($this->db->trans_status() === FALSE){
                            $this->db->trans_rollback();
                            $this->session->set_flashdata('error', 'Password tidak berhasil diubah');
                        }else{
                            $this->db->trans_commit();
                            $this->session->set_flashdata('success', 'Password berhasil diubah');
                        }
                    }
                }
            }
            redirect('users');
        }
    }
}