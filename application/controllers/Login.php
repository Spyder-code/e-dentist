<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }
 
    function index(){
        $this->load->view('v_login');
    }
 
    function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
        $cek_dosen=$this->login_model->auth_dosen($username,$password);
 
        if($cek_dosen->num_rows() > 0){
                $data=$cek_dosen->row_array();
                $this->session->set_userdata('masuk',TRUE);
                 if($data['level']=='1'){ //Akses admin
                    $this->session->set_userdata('akses','1');
                    $this->session->set_userdata('ses_id',$data['id']);
                    $this->session->set_userdata('ses_username',$data['username']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    $this->session->set_userdata('ses_gambar',$data['gambar']);
                    redirect('admin');
                 }else{ //akses dosen
                    $this->session->set_userdata('akses','2');
                    $this->session->set_userdata('ses_id',$data['id']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    $this->session->set_userdata('ses_gambar',$data['gambar']);
                    redirect('dosen');
                 }
 
        }else{ 
                    $cek_mahasiswa=$this->login_model->auth_mahasiswa($username,$password);
                    if($cek_mahasiswa->num_rows() > 0){
                    $data=$cek_mahasiswa->row_array();
                    $this->session->set_userdata('masuk',TRUE);
                            $this->session->set_userdata('akses','2');
                            $this->session->set_userdata('ses_id',$data['id']);
                            $this->session->set_userdata('ses_username',$data['username']);
                            $this->session->set_userdata('ses_nama',$data['nama']);
                            $this->session->set_userdata('ses_nim',$data['nim']);
                            $this->session->set_userdata('ses_tempat',$data['tempat']);
                            $this->session->set_userdata('ses_ttl',$data['ttl']);
                            $this->session->set_userdata('ses_alamat',$data['alamat']);
                            $this->session->set_userdata('ses_tlp',$data['no_telepon']);
                            $this->session->set_userdata('ses_jenjang',$data['jenjang']);
                            $this->session->set_userdata('ses_gambar',$data['gambar']);
                            redirect('mahasiswa');
                    }else{  // jika username dan password tidak ditemukan atau salah
                            $url=base_url('login');
                            echo $this->session->set_flashdata('msg','Username Atau Password Salah !!');
                            redirect($url);
                    }
        }
 
    }

 
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
 
}