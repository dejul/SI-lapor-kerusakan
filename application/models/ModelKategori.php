<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class ModelKategori extends CI_Model{
	public function getData($table){
		return $this->db->get($table);
	}

	public function tambahKategori($data){
		$this->db->insert('kategori',$data);
	}

	public function get_by_id($id){
        $this->db->from('kategori');
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

    public function update($where, $data)
    {
        $this->db->update('kategori', $data, $where);
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kategori');
    }
}