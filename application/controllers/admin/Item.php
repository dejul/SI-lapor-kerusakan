<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_admin();
    }
	

	public function index()
	{

		$data = [
			'kategori'=>$this->ModelKategori->getData('kategori')->result(),
			'item'=>$this->ModelItem->getData()->result()
		];

		$this->load->view('admin/layouts/header');
		$this->load->view('admin/layouts/modal', $data);
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/admin/item-management', $data);
		$this->load->view('admin/layouts/footer');
	}

	public function tambahItem(){
		$nama = ucfirst($this->input->post('nama'));
		$kategori = $this->input->post('kategori');
		$data = array(
			'item'=> $nama,
			'kategori_id' => $kategori
		);

		$this->ModelItem->tambahItem($data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil Menambah Data</div>');
		redirect('admin/item');
	}

	public function edit($id){
		$data = $this->ModelItem->get_by_id($id);
		echo json_encode($data);
	}

	public function update(){
		$id = $this->input->post('id');
		$nama = ucfirst($this->input->post('nama'));
		$kategori = $this->input->post('kategori');
		$data = array(
			'item'=> $nama,
			'kategori_id' => $kategori
		);

		$this->ModelItem->update(array('id_item'=>$id),$data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil Ubah Data</div>');
		redirect('admin/item');
	}

	public function delete($id){
		$this->ModelItem->delete_by_id($id);
		echo json_encode(array("status"=>true));
	}

}
