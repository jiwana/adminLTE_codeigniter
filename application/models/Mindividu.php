<?php
/**
 *
 */
class Mindividu extends CI_Model {
    var $table              = 'individu';
    var $col_id             = 'id';
    var $col_nama           = 'nama';
    var $col_jenis_kelamin  = 'jenis_kelamin';
    var $col_tgl_lahir      = 'tgl_lahir';
    var $col_agama          ='agama';
    var $col_alamat         = 'alamat';
    var $col_email          = 'email';
    var $col_tlp            = 'tlp';
    var $col_photo          = 'photo';

    function __construct() {
        parent::__construct();
    }

    function getRow($id){
        return $this->db->where($this->$col_id,$id)->get($this->table)->row_array();
    }

    function getRows(){
        return $this->db->get($this->table)->result_array();
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
}
