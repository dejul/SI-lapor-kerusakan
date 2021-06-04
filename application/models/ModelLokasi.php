<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class ModelLokasi extends CI_Model{
	public function getData($table){
		return $this->db->get($table);
	}

	public function tambahLokasi($data){
		$this->db->insert('lokasi',$data);
	}

	public function get_by_id($id){
        $this->db->from('lokasi');
        $this->db->where('id_lokasi',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

    public function update($where, $data)
    {
        $this->db->update('lokasi', $data, $where);
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_lokasi', $id);
        $this->db->delete('lokasi');
    }
}