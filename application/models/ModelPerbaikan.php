<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class ModelPerbaikan extends CI_Model{
	public function getData(){
        $this->db->select('*');
        $this->db->from('perbaikan p');
		return $this->db->get();
	}

    public function baikrusak(){
        $this->db->select('*');
        $this->db->from('perbaikan_index k');
        $this->db->join('lokasi l','l.id_lokasi=k.lokasi_id');
        $this->db->join('users u','u.id_users=k.petugas');
        return $this->db->get();
    }

	public function tambahPerbaikan($data){
		$this->db->insert('perbaikan',$data);
	}

	public function get_by_id($id){
        $this->db->from('perbaikan_index k');
        $this->db->join('users u','u.id_users=k.petugas');
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query;
    }

    public function update($where, $data)
    {
        $this->db->update('perbaikan', $data, $where);
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kerusakan');
    }
}