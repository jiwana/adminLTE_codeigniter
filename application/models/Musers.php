<?php
/**
 *
 */
class Musers extends CI_Model {
    var $table              = 'users';
    var $col_id             = 'id';
    var $col_user_name      = 'user_name';
    var $col_password       = 'password';
    var $col_id_individu    = 'id_individu';

    function __construct() {
        parent::__construct();
    }

    function getRow($id){
        return $this->db->where('id',$id)->get($this->table)->row_array();
    }

    function getRows(){
        return $this->db->get($this->table)->result_array();
    }

    function getFindUsers($id){
        $this->db->select('
            s.*,i.*,
            s.id s_id,
            i.id i_id
        ');
        $this->db->from('users s');
        $this->db->join('individu i', 's.id_individu = i.id','inner');
        $this->db->where('s.id',$id);
        $query = $this->db->get();
        return $query->result();
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
