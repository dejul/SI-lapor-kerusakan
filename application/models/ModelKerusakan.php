<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class ModelKerusakan extends CI_Model{
	public function getData(){
        $this->db->select('*');
        $this->db->from('kerusakan k');
        $this->db->join('lokasi l','l.id_lokasi=k.lokasi_id');
        $this->db->join('users u','u.id_users=k.petugas');
		return $this->db->get();
	}

    public function baikrusak(){
        $this->db->select('*');
        $this->db->from('kerusakan_index k');
        $this->db->join('lokasi l','l.id_lokasi=k.lokasi_id','left');
        $this->db->join('users u','u.id_users=k.teknisi','left');
        return $this->db->get();
    }

    public function getId(){
        $id = $this->db->query("SELECT MAX(id) as id FROM kerusakan");
        // $id = $id+1;
        $kd="";
        if($id->num_rows()>0){
            foreach($id->result() as $d){
                $tmp = ((int)$d->id)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }else{
            $kd = "00001";
        }

        return $kd;
    }

	public function tambahKerusakan($data){
		$this->db->insert('kerusakan',$data);
	}

	public function get_by_id($id){
        $this->db->from('kerusakan');
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query;
    }

    public function update($where, $data)
    {
        $this->db->update('kerusakan', $data, $where);
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kerusakan');
    }
}