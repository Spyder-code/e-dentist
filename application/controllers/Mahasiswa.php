<?php 

class Mahasiswa extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Mahasiswa_model');
		$this->load->library('upload');
		$this->load->library('form_validation');
      	$this->load->library('pagination');
        if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
	}
	function index(){
		$this->load->view('mahasiswa/v_index');
	}

	function getData(){
		$data=$this->Mahasiswa_model->grafik();
		echo json_encode($data);
		// print_r($cek);
	}

	function pasien(){
		$data['pasien']=$this->Mahasiswa_model->pasien();
		$this->load->view('mahasiswa/v_pasien', $data);
	}

	function add_pasien(){
		$data['dosen']=$this->Mahasiswa_model->dosen();
		$this->load->view('mahasiswa/v_add_pasien', $data);
	}
	function profile(){
		$id = $this->session->userdata('ses_id');
	    $result = $this->Mahasiswa_model->profile($id);
	    if($result->num_rows() > 0){
	        $i = $result->row_array();
	        $data = array(
	            'id'    => $i['id'],
	            'nama'  => $i['nama'],
	            'password'  => $i['password'],
	            'nim'     => $i['nim'],
	            'tempat'  => $i['tempat'],
	            'ttl'     => $i['ttl'],
	            'alamat'  => $i['alamat'],
	            'no_telepon'  => $i['no_telepon'],
	            'jenjang'     => $i['jenjang'],
	            'gambar'     => $i['gambar'],
	            'tanggal'  => $i['tanggal']
        );
        $this->load->view('mahasiswa/v_profile',$data);
    }else{
        echo "Data Was Not Found";
    }
}

	function show_profile(){
		$data['show_profile']=$this->Mahasiswa_model->show_profile();
		$this->load->view('mahasiswa/v_show_profile', $data);
	}


function update_profile(){
		$profile['mahasiswa'] = $this->db->get_where('mahasiswa', ['id' => $this->session->userdata('ses_id')])-> row_array();

		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
	    $nim = $this->input->post('nim');
	    $tempat = $this->input->post('tempat');
	    $ttl = $this->input->post('ttl');
	    $alamat = $this->input->post('alamat');
	    $no_telepon = $this->input->post('no_telepon');
	    $tanggal = $this->input->post('tanggal');

      $kondisi = array('id' => $id );

      // get foto
      $config['upload_path'] = './assets/profile/mahasiswa';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['fotopost']['name'];


      $this->upload->initialize($config);

	    if (!empty($_FILES['fotopost']['name'])) {
	        if ( $this->upload->do_upload('fotopost') ) {
	        	$foto_lama = $profile['mahasiswa']['gambar'];
	            $foto = $this->upload->data();
	            //var_dump($foto);
	            $data = array(
	                          'nama'  => $nama,
	                          'nim'   => $nim,
	                          'tempat' => $tempat,
	                          'ttl'    => $ttl,
	                          'alamat' => $alamat,
	                          'no_telepon' => $no_telepon,
	                          'tanggal'  => $tanggal,
                            'gambar'   => $foto['file_name'],
	                        );
              // hapus foto pada direktori
	            if ($foto_lama != 'default.jpg') {
	            	unlink(FCPATH . 'assets/profile/mahasiswa/' . $foto_lama);
	            }

				$this->Mahasiswa_model->update($data,$kondisi);
				$this->session->set_flashdata('flash', 'Di Update');
    			redirect('mahasiswa/show_profile');
	        }else {
                 $this->session->set_flashdata('gagal', 'Gagal Update');
    			redirect('mahasiswa/show_profile');
	        }
	    }else {
	          	$id = $this->input->post('id');
				$nama = $this->input->post('nama');
			    $nim = $this->input->post('nim');
			    $tempat = $this->input->post('tempat');
			    $ttl = $this->input->post('ttl');
			    $alamat = $this->input->post('alamat');
			    $no_telepon = $this->input->post('no_telepon');
			    $tanggal = $this->input->post('tanggal');

			    $this->Mahasiswa_model->update_profile($id,$nama,$nim,$tempat,$ttl,$alamat,$no_telepon,$tanggal);
	    		$this->session->set_flashdata('flash', 'Di Update');
    			redirect('mahasiswa/show_profile');
	    }
  }

	function save_pasien(){
	    $nama = $this->input->post('nama');
	    $tempat = $this->input->post('tempat');
	    $ttl = $this->input->post('ttl');
	    $alamat = $this->input->post('alamat');
	    $kelamin = $this->input->post('kelamin');
	    $no_telepon = $this->input->post('no_telepon');
	    $tanggal = $this->input->post('tanggal');
    	$this->Mahasiswa_model->save_pasien($nama,$no_telepon,$tanggal,$alamat,$kelamin,$tempat,$ttl);
    	$this->session->set_flashdata('flash', 'Di Tambahkan');
    redirect('mahasiswa/pasien');
  }

  function delete_pasien(){
	    $id = $this->uri->segment(3);
	    $this->Mahasiswa_model->delete_pasien($id);
	    $this->session->set_flashdata('flash', 'Di Hapus');
	    redirect('mahasiswa/pasien');
	}

	function edit_pasien(){
    $id = $this->uri->segment(3);
    $result = $this->Mahasiswa_model->edit_pasien($id);
    if($result->num_rows() > 0){
        $i = $result->row_array();
        $data = array(
            'id'    => $i['id'],
            'nama'  => $i['nama'],
            'no_telepon'  => $i['no_telepon'],
            'tanggal'     => $i['tanggal'],
            'alamat'  => $i['alamat'],
            'kelamin'     => $i['kelamin'],
            'tempat'  => $i['tempat'],
            'ttl'  => $i['ttl']
        );
        $this->load->view('mahasiswa/v_edit_pasien',$data);
    }else{
        echo "Data Was Not Found";
    }
}	
	
	function update_pasien(){
	    $id = $this->input->post('id');
		$nama = $this->input->post('nama');
	    $tempat = $this->input->post('tempat');
	    $ttl = $this->input->post('ttl');
	    $alamat = $this->input->post('alamat');
	    $kelamin = $this->input->post('kelamin');
	    $no_telepon = $this->input->post('no_telepon');
	    $tanggal = $this->input->post('tanggal');
	    $this->Mahasiswa_model->update_pasien($id,$nama,$no_telepon,$tanggal,$alamat,$kelamin,$tempat,$ttl);
	    $this->session->set_flashdata('flash', 'Di Update');

    redirect('mahasiswa/pasien');
  }

  function perawatan_pasien(){
    $id = $this->uri->segment(3);
    $result = $this->Mahasiswa_model->perawatan_pasien($id);
    if($result->num_rows() > 0){
        $i = $result->row_array();
        $data = array(
            'nama'  => $i['nama']
        );
        $data['dosen']=$this->Mahasiswa_model->dosen();
        $data['diagnosa']=$this->Mahasiswa_model->diagnosa();
        $data['kode_gigi']=$this->Mahasiswa_model->gambar();
        $this->load->view('mahasiswa/v_perawatan_pasien',$data);
    }else{
        echo "Data Was Not Found";
    }
}
	
	function save_perawatan(){
	    $id_mahasiswa = $this->input->post('id_mahasiswa');
	    $id_dosen = $this->input->post('id_dosen');
	    $nama = $this->input->post('nama');
	    $diagnosa = $this->input->post('diagnosa');
	    $keluhan = $this->input->post('keluhan');
	    $kode_gigi = $this->input->post('kode_gigi');
	    $tindakan = $this->input->post('tindakan');
	    $tanggal = $this->input->post('tanggal');
	    $bulan = $this->input->post('bulan');
    	$this->Mahasiswa_model->save_perawatan($id_mahasiswa,$tindakan,$kode_gigi,$tanggal,$diagnosa,$keluhan,$id_dosen,$nama,$bulan);
    	$this->session->set_flashdata('flash', 'Di Tambahkan');
    redirect('mahasiswa/laporan');
  }
  function laporan(){
		$data['laporan']=$this->Mahasiswa_model->laporan();
		$this->load->view('mahasiswa/v_laporan', $data);
	}

	function get_gigi(){
		$kode=$this->input->post('kode');
		$data=$this->Mahasiswa_model->get_kode_gigi($kode);
		echo json_encode($data);
	}

	function get_diagnosa(){
		$kodee=$this->input->post('kodee');
		$data=$this->Mahasiswa_model->get_kode_diagnosa($kodee);
		echo json_encode($data);
	}
	
	public function ubah_password()
{
	$this->load->view('mahasiswa/v_ubah_password');
	
}

	public function save_password()
	 { 
	  $this->form_validation->set_rules('new','New','required|alpha_numeric');
	  $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
	    if($this->form_validation->run() == FALSE)
	  {
	   $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Ulangi Masukkan Password Baru dan Ulangi Password Baru Yang Sesuai!</div>');
	   redirect('mahasiswa/ubah_password');
	  }
	  else{
	   $cek_old = $this->Mahasiswa_model->cek_old();
	   if ($cek_old == False){
	    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Tidak Sesuai!</div>');
	    redirect('mahasiswa/ubah_password');
	   }
	   else{
	   	$baru = $this->input->post('new');
	   	$lama = $this->input->post('old');
	   	if ($baru == $lama) {
	   	$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Password Baru Tidak Boleh sama dengan password Lama !</div>');
	   redirect('mahasiswa/ubah_password');
	   	}else{
	   	$this->Mahasiswa_model->save();
		//$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
	    redirect('mahasiswa/ubah_password');
	   	}
	    
	   }
	  }
	}
	 }
