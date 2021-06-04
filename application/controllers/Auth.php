<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
	public function index()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password',true);

		$user = $this->ModelUser->cekData(['email'=>$email])->row_array();

		if($user){
			if(password_verify($password, $user['password'])){
				$data = ['email'=>$user['email'],'id_roles'=>$user['id_roles'], 'id_divisi'=>$user['id_divisi'],'id_users'=>$user['id_users'], 'nama'=>$user['nama']];
				if($user['id_roles']!=1){
					$this->session->set_userdata($data);
                    redirect('user/Home');
				}else{
					$this->session->set_userdata($data);
                    redirect('admin/Home');
				}
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                    redirect('welcome#login');
			}
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak ada!!</div>');
            redirect('welcome#login');
		}
	}

	public function logout(){
		$this->session->unset_userdata('email');
        $this->session->unset_userdata('id_roles');
        $this->session->unset_userdata('id_divisi');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
        redirect('welcome#login');
	}
}
