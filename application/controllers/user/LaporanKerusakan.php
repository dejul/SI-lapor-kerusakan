<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanKerusakan extends CI_Controller {

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
        cek_user();
    }

	public function index()
	{

		$data = [
			'kerusakan'=>$this->ModelKerusakan->baikrusak()->result()
		];

		$this->load->view('admin/layouts/header');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/laporan-kerusakan/index', $data);
		$this->load->view('admin/layouts/footer');
	}

	public function create(){

		$data = [
			'lokasi'=>$this->ModelLokasi->getData('lokasi')->result(),
			'id'=>$this->ModelKerusakan->getId()
		];

		$this->load->view('admin/layouts/header');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/laporan-kerusakan/create', $data);
		$this->load->view('admin/layouts/footer');
	}

	public function tambahKerusakan(){
		$petugas = $this->input->post('pelapor');
		$tanggal_laporan = $this->input->post('tanggal_laporan');
		$tanggal = date('Y-m-d', strtotime($tanggal_laporan));
		$jam_laporan = $this->input->post('jam_laporan');
		$jam = date('H:i:s', strtotime($jam_laporan));
		$waktu = $tanggal.' '.$jam;
		$lokasi = $this->input->post('lokasi');
		$nomor_laporan = $this->input->post('nomor_laporan');
		$uraian_kerusakan = $this->input->post('uraian_kerusakan');

		$data_kerusakan = array(
			'tanggal_laporan'=> $waktu,
			'lokasi_id'=> $lokasi,
			'petugas'=> $petugas,
			'uraian_kerusakan'=> $uraian_kerusakan,
			'nomor_laporan'=> $nomor_laporan
		);

		$data_perbaikan = array(
			'nomor_laporan'=> $nomor_laporan
		);

		$this->ModelKerusakan->tambahKerusakan($data_kerusakan);

		$this->ModelPerbaikan->tambahPerbaikan($data_perbaikan);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil Menambah Data</div>');
		redirect('user/LaporanKerusakan');
	}

	public function edit($id){

		$data = [
			'kerusakan' => $this->ModelKerusakan->get_by_id($id)->result(),
			'lokasi'=>$this->ModelLokasi->getData('lokasi')->result()
		];

		$this->load->view('admin/layouts/header');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/laporan-kerusakan/edit', $data);
		$this->load->view('admin/layouts/footer');
		
	}

	public function update(){

		$petugas = $this->input->post('pelapor');
		$tanggal_laporan = $this->input->post('tanggal_laporan');
		$tanggal = date('Y-m-d', strtotime($tanggal_laporan));
		$jam_laporan = $this->input->post('jam_laporan');
		$jam = date('H:i:s', strtotime($jam_laporan));
		$waktu = $tanggal.' '.$jam;
		$lokasi = $this->input->post('lokasi');
		$nomor_laporan = $this->input->post('nomor_laporan');
		$uraian_kerusakan = $this->input->post('uraian_kerusakan');
		$id = $this->input->post('id');

		$data = array(
			'tanggal_laporan'=> $waktu,
			'lokasi_id'=> $lokasi,
			'petugas'=> $petugas,
			'uraian_kerusakan'=> $uraian_kerusakan,
			'nomor_laporan'=> $nomor_laporan
		);

		$this->ModelKerusakan->update(array('id'=>$id),$data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil Ubah Data</div>');
		redirect('user/LaporanKerusakan');
	}

	// public function delete($id){
	// 	$this->ModelKerusakan->delete_by_id($id);
	// 	echo json_encode(array("status"=>true));
	// }

	public function validasi($id){
		$data = array(
			'status_pekerjaan'=>1,
			'catatan_user'=>'Perbaikan Sudah Sesuai'
		);

		$this->ModelPerbaikan->update(array('id'=>$id),$data);

		echo json_encode(array("status"=>true));
	}

	public function unvalidasi($id){
		$data = array(
			'status_perbaikan'=>0,
			'catatan_user'=> 'Perbaikan Belum Sesuai'
		);

		$this->ModelPerbaikan->update(array('id'=>$id),$data);

		echo json_encode(array("status"=>true));
	}

}
