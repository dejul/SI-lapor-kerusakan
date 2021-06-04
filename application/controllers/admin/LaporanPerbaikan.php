<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPerbaikan extends CI_Controller {

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
			'perbaikan'=>$this->ModelPerbaikan->baikrusak('perbaikan')->result()
		];

		$this->load->view('admin/layouts/header');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/laporan-perbaikan/index', $data);
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

		$data = array(
			'tanggal_laporan'=> $waktu,
			'lokasi_id'=> $lokasi,
			'petugas'=> $petugas,
			'uraian_kerusakan'=> $uraian_kerusakan,
			'nomor_laporan'=> $nomor_laporan
		);

		$this->ModelKerusakan->tambahKerusakan($data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil Menambah Data</div>');
		redirect('admin/LaporanKerusakan');
	}

	public function edit($id){

		$data = [
			'kerusakan' => $this->ModelPerbaikan->get_by_id($id)->result(),
			'kategori'=>$this->ModelKategori->getData('kategori')->result(),
			'lokasi'=>$this->ModelLokasi->getData('lokasi')->result(),
			'item'=>$this->ModelItem->getData('item')->result()
		];

		$this->load->view('admin/layouts/header');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/laporan-perbaikan/edit', $data);
		$this->load->view('admin/layouts/footer');
		
	}

	public function ubah($id){

		$data = [
			'kerusakan' => $this->ModelPerbaikan->get_by_id($id)->result(),
			'kategori'=>$this->ModelKategori->getData('kategori')->result(),
			'lokasi'=>$this->ModelLokasi->getData('lokasi')->result(),
			'item'=>$this->ModelItem->getData('item')->result()
		];

		$this->load->view('admin/layouts/header');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/laporan-perbaikan/update', $data);
		$this->load->view('admin/layouts/footer');
		
	}

	public function create(){

		$teknisi = $this->session->userdata('id_users');

		$tgl_dtg = $this->input->post('tanggal_kedatangan');
		$tanggal_dtg = date('Y-m-d', strtotime($tgl_dtg));
		$jm_dtg = $this->input->post('jam_kedatangan');
		$jam_dtg = date('H:i:s', strtotime($jm_dtg));

		$tgl_mulai = $this->input->post('tanggal_perbaikan');
		$tanggal_mulai = date('Y-m-d', strtotime($tgl_mulai));
		$jm_mulai = $this->input->post('jam_perbaikan');
		$jam_mulai = date('H:i:s', strtotime($jm_mulai));

		$tgl_selesai = $this->input->post('tanggal_selesai_perbaikan');
		$tanggal_selesai = date('Y-m-d', strtotime($tgl_selesai));
		$jm_selesai = $this->input->post('jam_selesai_perbaikan');
		$jam_selesai = date('H:i:s', strtotime($jm_selesai));

		$tanggal_kedatangan = $tanggal_dtg.' '.$jam_dtg;
		$tanggal_perbaikan = $tanggal_mulai.' '.$jam_mulai;
		$tanggal_selesai = $tanggal_selesai.' '.$jam_selesai;

		$kategori = $this->input->post('kategori');
		$item = $this->input->post('item');
		$uraian_perbaikan = $this->input->post('uraian_perbaikan');
		$id = $this->input->post('id');

		$data = array(
			'tanggal_kedatangan'=> $tanggal_kedatangan,
			'tanggal_perbaikan'=> $tanggal_perbaikan,
			'tanggal_selesai_perbaikan'=> $tanggal_selesai,
			'teknisi'=> $teknisi,
			'kategori_id'=> $kategori,
			'item_id'=> $item,
			'uraian_perbaikan'=> $uraian_perbaikan,
			'status_perbaikan'=> 1,
			'status_laporan'=> 1,
			'status_pekerjaan'=> 0,
			'validasi_spv'=> 0
		);

		$this->ModelPerbaikan->update(array('id'=>$id),$data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil Tambah Data</div>');
		redirect('admin/LaporanPerbaikan');
	}

	public function update(){

		$teknisi = $this->session->userdata('id_users');

		$tgl_dtg = $this->input->post('tanggal_kedatangan');
		$tanggal_dtg = date('Y-m-d', strtotime($tgl_dtg));
		$jm_dtg = $this->input->post('jam_kedatangan');
		$jam_dtg = date('H:i:s', strtotime($jm_dtg));

		$tgl_mulai = $this->input->post('tanggal_perbaikan');
		$tanggal_mulai = date('Y-m-d', strtotime($tgl_mulai));
		$jm_mulai = $this->input->post('jam_perbaikan');
		$jam_mulai = date('H:i:s', strtotime($jm_mulai));

		$tgl_selesai = $this->input->post('tanggal_selesai_perbaikan');
		$tanggal_selesai = date('Y-m-d', strtotime($tgl_selesai));
		$jm_selesai = $this->input->post('jam_selesai_perbaikan');
		$jam_selesai = date('H:i:s', strtotime($jm_selesai));

		$tanggal_kedatangan = $tanggal_dtg.' '.$jam_dtg;
		$tanggal_perbaikan = $tanggal_mulai.' '.$jam_mulai;
		$tanggal_selesai = $tanggal_selesai.' '.$jam_selesai;

		$kategori = $this->input->post('kategori');
		$item = $this->input->post('item');
		$uraian_perbaikan = $this->input->post('uraian_perbaikan');
		$id = $this->input->post('id');

		$data = array(
			'tanggal_kedatangan'=> $tanggal_kedatangan,
			'tanggal_perbaikan'=> $tanggal_perbaikan,
			'tanggal_selesai_perbaikan'=> $tanggal_selesai,
			'teknisi'=> $teknisi,
			'kategori_id'=> $kategori,
			'item_id'=> $item,
			'uraian_perbaikan'=> $uraian_perbaikan,
			'status_perbaikan'=> 1,
			'validasi_spv'=> 0
		);

		$this->ModelPerbaikan->update(array('id'=>$id),$data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil Ubah Data</div>');
		redirect('admin/LaporanPerbaikan');
	}

	// public function delete($id){
	// 	$this->ModelKerusakan->delete_by_id($id);
	// 	echo json_encode(array("status"=>true));
	// }

	public function validasi($id){
		$data = array(
			'validasi_spv'=>1
		);

		$this->ModelPerbaikan->update(array('id'=> $id),$data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil Ubah Data</div>');
		redirect('admin/LaporanPerbaikan');
	}

}
