<?php
/**
 *
 */
class Post extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mpost');
    }

    var $parentTitle     ="Post Images / Video",
        $file_max_weight = 3048576,
        $extenstion      = array('jpg','png','jpeg','JPG');

    function index(){
        if(!isLogin()){
            redirect('login');
        }
        $data['parentTitle']    = $this->parentTitle;
        $data['title']          = 'Data Post';
        $data['session']        = $this->session->userdata;
        $data['dataUser']       = getDataUser($this->session->userdata('id_user'));
        $data['rows']           = $this->Mpost->getQueryOrderBy();
        $this->load->view('post/data', $data);
    }

    function add(){
        if(!isLogin()){
            redirect('login');
        }
        $data['parentTitle']    = $this->parentTitle;
        $data['title']          = 'Tambah Post';
        $data['session']        = $this->session->userdata;
        $data['dataUser']       = getDataUser($this->session->userdata('id_user'));
        $data['tab']            = 0;
        $data['fileDefault']    = default_post;
        $folder                 = str_replace(base_url(), '', image_post);

        if(!empty($_POST)){
            $id_individu    = $this->session->userdata['id_individu'];

            $this->db->trans_begin();

            $dataPost        = array(
                $this->Mpost->col_judul            => $this->input->post('judul'),
                $this->Mpost->col_pemalink         => judulSEO($this->input->post('judul')),
                $this->Mpost->col_kategori         => $this->input->post('kategori'),
                $this->Mpost->col_deskripsi        => $this->input->post('deskripsi'),
                $this->Mpost->col_status           => 'y',
                $this->Mpost->col_waktu_buat       => convertDateTime(new dateTime(),'Y-m-d H:i:s')
            );

            $this->Mpost->insert($dataPost);
            $id = $this->db->insert_id();
            if ($this->db->trans_status() === FALSE){
                $pesan=array(0,'Data tidak berhasil disimpan');
            }else{
                $pesan=array(1,'Data berhasil disimpan');
                $query=$this->db->order_by("id desc")->get('post')->row();
                $idPost=$query->id;

                $valueGambar=uploadGambar(
                    $_FILES['file'],
                    $folder,
                    $this->extenstion,
                    $this->file_max_weight,
                    110,
                    $idPost
                );

                if(isset($valueGambar)){
                    $data = array(
                        $this->Mpost->col_file  => $valueGambar
                    );
                    $this->Mpost->update($data,$idPost);

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
            redirect('post');
        }
        $this->load->view('post/form', $data);
    }

    function edit($id){
        if(!isLogin()){
            redirect('login');
        }
        $data['parentTitle']    = $this->parentTitle;
        $data['title']          = 'Ubah Post';
        $data['session']        = $this->session->userdata;
        $data['dataUser']       = getDataUser($this->session->userdata('id_user'));
        $data['thisData']       = $this->Mpost->getDataPostById($id);
        $folder                 = str_replace(base_url(), '', image_post);

        if(!empty($_POST)){
            $id_individu    = $this->session->userdata['id_individu'];

            $this->db->trans_begin();

            $deskripsi=$this->input->post('deskripsi');
            $file           = $_FILES['file'];
            $filename       = explode(".", $file["name"]);

            $dataPost = array(
                $this->Mpost->col_judul            => $this->input->post('judul'),
                $this->Mpost->col_pemalink         => judulSEO($this->input->post('judul')),
                $this->Mpost->col_kategori         => $this->input->post('kategori'),
                $this->Mpost->col_deskripsi        => $this->input->post('deskripsi'),
            );

            $this->Mpost->update($dataPost,$id);

            if ($this->db->trans_status() === FALSE){
                $pesan=array(0,'Data tidak berhasil disimpan');
            }else{
                $pesan=array(1,'Data berhasil disimpan');
                $valueGambar=uploadGambar(
                    $_FILES['file'],
                    $folder,
                    $this->extenstion,
                    $this->file_max_weight,
                    110,
                    $id
                );

                if(isset($valueGambar)){
                    $data = array(
                        $this->Mpost->col_file  => $valueGambar
                    );
                    $this->Mpost->update($data,$idPost);

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
            redirect('post/edit/'.$id);
        }
        $this->load->view('post/form', $data);
    }

    function pilihan(){
        $folder     = str_replace(base_url(), '', image_post);
        $lists      = $this->input->post('list');
        $pilihan    = $this->input->post('pilihanOpsi');
        $jumlah     = 0;
        if(is_array($lists)){
            foreach ($lists as $data) {
                if($pilihan==2){
                    $query=$this->Mpost->getRow($data);
                    $qFile=$query->file;
                    $fileExp=explode('.', $query->file);

                    $this->Mpost->delete($data);
                    if ($this->db->trans_status() === FALSE){
                        $this->db->trans_rollback();
                    }else{
                        if($query->file){
                            $fileExp=explode('.', $query->file);
                            if(file_exists($folder.$fileExp[0].'Ori.'.$fileExp[1])){
                                 unlink($folder.$fileExp[0].'Ori.'.$fileExp[1]);
                            }
                            if(file_exists($folder.$fileExp[0].'110.'.$fileExp[1])){
                                unlink($folder.$fileExp[0].'110.'.$fileExp[1]);
                            }
                        }
                        $this->db->trans_commit();
                        $jumlah++;
                    }
                }else{
                    if($pilihan==0){
                        $pil='y';
                    }else{
                        $pil='n';
                    }
                    $dataArray = array(
                        $this->Mpost->col_status        => $pil
                    );
                    $this->Mpost->update($dataArray,$data);

                    if ($this->db->trans_status() === FALSE){
                        $this->db->trans_rollback();
                    }else{
                        $this->db->trans_commit();
                        $jumlah++;
                    }
                }
            }
            if($jumlah>0){
                if($pilihan==2){
                    $this->session->set_flashdata('success',$jumlah.' Data berhasil dihapus');
                }else{
                    $this->session->set_flashdata('success',$jumlah.' Data berhasil diubah');
                }
            }
        }else{
            $this->session->set_flashdata('info','Tidak ada data yang dipilih');
        }
        redirect('post');
    }
}
