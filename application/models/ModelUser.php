<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class ModelUser extends CI_Model{

	public function cekData($where){
        return $this->db->get_where('users', $where);
    }

    public function getData(){
        $this->db->select('*');
        $this->db->from('users u');
        $this->db->join('divisi d','d.id=u.id_divisi');
        $this->db->join('roles r','r.id=u.id_roles');
		return $this->db->get();
	}

    public function get_by_id($id){
        $this->db->from('users');
        $this->db->where('id_users',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

	public function tambahUser($data){
		$this->db->insert('users',$data);
	}
 
    public function update($where, $data)
    {
        $this->db->update('users', $data, $where);
    }
 
    public function delete_by_id($id)
    {
        $this->db->where('id_users', $id);
        $this->db->delete('users');
    }
}