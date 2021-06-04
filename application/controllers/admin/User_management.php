<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management extends CI_Controller {

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
			'divisi'=>$this->ModelDivisi->getData('divisi')->result(),
			'users'=>$this->ModelUser->getData()->result()
		];

		$this->load->view('admin/layouts/header');
		$this->load->view('admin/layouts/modal', $data);
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/user-management', $data);
		$this->load->view('admin/layouts/footer');
	}

	public function tambahUser(){
		$nama = ucfirst($this->input->post('nama'));
		$email = ucfirst($this->input->post('email'));
		$roles = $this->input->post('roles');
		$divisi = $this->input->post('divisi');
		$password = $this->input->post('password',true);
		$data = array(
			'nama'=> $nama,
			'email'=> $email,
			'id_roles'=> $roles,
			'id_divisi'=> $divisi,
			'password'=> password_hash($password, PASSWORD_DEFAULT)
		);

		$this->ModelUser->tambahUser($data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil Menambah Data</div>');
		redirect('admin/User_management');
	}

	public function edit($id){
		$data = $this->ModelUser->get_by_id($id);
		echo json_encode($data);
	}

	public function update(){
		$id = $this->input->post('id');
		$nama = ucfirst($this->input->post('nama'));
		$email = ucfirst($this->input->post('email'));
		$roles = $this->input->post('roles');
		$divisi = $this->input->post('divisi');
		$password = $this->input->post('password',true);
		$data = array(
			'nama'=> $nama,
			'email'=> $email,
			'id_roles'=> $roles,
			'id_divisi'=> $divisi,
			'password'=> password_hash($password, PASSWORD_DEFAULT)
		);

		$this->ModelUser->update(array('id_users'=>$id),$data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil Ubah Data</div>');
		redirect(base_url().'admin/User_management');
	}

	public function delete($id){
		$this->ModelUser->delete_by_id($id);
		echo json_encode(array("status"=>true));
	}

}
