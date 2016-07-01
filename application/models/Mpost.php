<?php

class Mpost extends CI_Model {
    var $table                  = 'post';
    var $col_id                 = 'id';
    var $col_judul              = 'judul';
    var $col_pemalink           = 'pemalink';
    var $col_deskripsi          = 'deskripsi';
    var $col_file               = 'file';
    var $col_link               = 'link';
    var $col_kategori           = 'kategori';
    var $col_status             = 'status';
    var $col_waktu_buat         = 'waktu_buat';

    function __construct() {
        parent::__construct();
    }

    function insert($data){
        return $this->db->insert($this->table,$data);
    }

    function update($data,$id){
        return $this->db->update($this->table,$data,array($this->col_id => $id));
    }

    function delete($id){
        return $this->db->delete($this->table,array($this->col_id => $id));
    }

    function getRow($id){
        return $this->db->where('id',$id)->get($this->table)->row();
    }

    function getQueryOrderBy(){
        $query=$this->db->select('*');
        $query->order_by("id desc");
        return $query->get($this->table)->result();
    }

    function getDataPostById($id){
        $query=$this->db->select('*');
        $query->where('id',$id);
        $query->order_by("id desc");
        return $query->get($this->table)->row();
    }
}