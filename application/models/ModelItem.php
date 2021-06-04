<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class ModelItem extends CI_Model{
	public function getData(){
        $this->db->select('*');
        $this->db->from('item i');
        $this->db->join('kategori k','k.id=i.kategori_id');
		return $this->db->get();
	}

	public function tambahItem($data){
		$this->db->insert('item',$data);
	}

	public function get_by_id($id){
        $this->db->from('item');
        $this->db->where('id_item',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

    public function update($where, $data)
    {
        $this->db->update('item', $data, $where);
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_item', $id);
        $this->db->delete('item');
    }
}