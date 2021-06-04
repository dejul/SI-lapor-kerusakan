<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class ModelDivisi extends CI_Model{
	public function getData($table){
		return $this->db->get($table);
	}

	public function tambahDivisi($data){
		$this->db->insert('divisi',$data);
	}

	public function get_by_id($id){
        $this->db->from('divisi');
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

    public function update($where, $data)
    {
        $this->db->update('divisi', $data, $where);
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('divisi');
    }
}