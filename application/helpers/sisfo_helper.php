<?php

function cek_login()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login!! </div>');
        if($ci->session->userdata('id_roles')==1){
            redirect('welcome#login');
        }else{
            redirect('admin/home');
        }
    } else {
        $role_id = $ci->session->userdata('id_roles');
        // $id_user = $ci->session->userdata('id');
    }
}

function cek_admin(){
    $ci = get_instance();

    $role_id = $ci->session->userdata('id_roles');
    if($role_id != 1){
        $ci->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Akses tidak diizinkan</div>');
        redirect('welcome#login');
    }
}

function cek_user(){
    $ci = get_instance();

    $role_id = $ci->session->userdata('id_roles');
    if($role_id != 2){
        $ci->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Akses tidak diizinkan</div>');
        redirect('welcome#login');
    }
}

function cek_it(){
    $ci = get_instance();

    $divisi_id = $ci->session->userdata('id_divisi');
    if($divisi_id != 1){
        $ci->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Akses tidak diizinkan</div>');
        redirect('welcome#login');
    }
}

function cek_non_it(){
    $ci = get_instance();

    $divisi_id = $ci->session->userdata('id_divisi');
    if($divisi_id == 1){
        $ci->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Akses tidak diizinkan</div>');
        redirect('welcome#login');
    }
}
