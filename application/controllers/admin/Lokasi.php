<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

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
			'lokasi'=>$this->ModelLokasi->getData('lokasi')->result()
		];

		$this->load->view('admin/layouts/header');
		$this->load->view('admin/layouts/modal', $data);
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/admin/lokasi-management', $data);
		$this->load->view('admin/layouts/footer');
	}

	public function tambahLokasi(){
		$nama = ucfirst($this->input->post('nama'));
		$data = array(
			'lokasi'=> $nama
		);

		$this->ModelLokasi->tambahLokasi($data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil Menambah Data</div>');
		redirect('admin/lokasi');
	}

	public function edit($id){
		$data = $this->ModelLokasi->get_by_id($id);
		echo json_encode($data);
	}

	public function update(){
		$id = $this->input->post('id');
		$nama = ucfirst($this->input->post('nama'));
		$data = array(
			'lokasi'=> $nama,
		);

		$this->ModelLokasi->update(array('id_lokasi'=>$id),$data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil Ubah Data</div>');
		redirect('admin/lokasi');
	}

	public function delete($id){
		$this->ModelLokasi->delete_by_id($id);
		echo json_encode(array("status"=>true));
	}

}
