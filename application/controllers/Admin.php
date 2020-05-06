<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->library('upload');
		$this->load->library('form_validation');
      	$this->load->library('pagination');

		if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
	}

	function index(){
		$data['jml_dosen'] = $this->Admin_model->jumlahdosen();
		$data['jml_mahasiswad3'] = $this->Admin_model->jumlahmahasiswad3();
		$data['jml_mahasiswad4'] = $this->Admin_model->jumlahmahasiswad4();
		$data['jml_pasien'] = $this->Admin_model->jumlahpasien();
		$this->load->view('admin/v_index',$data);
	}

	function show_profile(){
		$data['show_profile']=$this->Admin_model->show_profile();
		$this->load->view('admin/v_show_profile', $data);
	}

	function profile(){
		$id = $this->session->userdata('ses_id');
	    $result = $this->Admin_model->profile($id);
	    if($result->num_rows() > 0){
	        $i = $result->row_array();
	        $data = array(
	            'id'    => $i['id'],
	            'nama'  => $i['nama'],
	            'password'  => $i['password'],
	            'nip'     => $i['nip'],
	            'tempat'  => $i['tempat'],
	            'ttl'     => $i['ttl'],
	            'alamat'  => $i['alamat'],
	            'no_telepon'  => $i['no_telepon'],
	            'gambar'     => $i['gambar'],
	            'tanggal'  => $i['tanggal']
        );
        $this->load->view('admin/v_profile',$data);
    }else{
        echo "Data Was Not Found";
    }
}
	
	function update_profile(){
		$profile['dosen'] = $this->db->get_where('dosen', ['id' => $this->session->userdata('ses_id')])-> row_array();

		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
	    $nip = $this->input->post('nip');
	    $tempat = $this->input->post('tempat');
	    $ttl = $this->input->post('ttl');
	    $alamat = $this->input->post('alamat');
	    $no_telepon = $this->input->post('no_telepon');
	    $tanggal = $this->input->post('tanggal');

      $kondisi = array('id' => $id );

      // get foto
      $config['upload_path'] = './assets/profile/dosen';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['fotopost']['name'];


      $this->upload->initialize($config);

	    if (!empty($_FILES['fotopost']['name'])) {
	        if ( $this->upload->do_upload('fotopost') ) {
	        	$foto_lama = $profile['dosen']['gambar'];
	            $foto = $this->upload->data();
	            //var_dump($foto);
	            $data = array(
	                          'nama'  => $nama,
	                          'nip'   => $nip,
	                          'tempat' => $tempat,
	                          'ttl'    => $ttl,
	                          'alamat' => $alamat,
	                          'no_telepon' => $no_telepon,
	                          'tanggal'  => $tanggal,
                            'gambar'   => $foto['file_name'],
	                        );
              // hapus foto pada direktori
	            if ($foto_lama != 'default.jpg') {
	            	unlink(FCPATH . 'assets/profile/dosen/' . $foto_lama);
	            }

				$this->Admin_model->update($data,$kondisi);
				$this->session->set_flashdata('flash', 'Di Update');
    			redirect('admin/show_profile');
	        }else {
                 $this->session->set_flashdata('gagal', 'Gagal Update');
    			redirect('admin/show_profile');
	        }
	    }else {
	          	$id = $this->input->post('id');
				$nama = $this->input->post('nama');
			    $nip = $this->input->post('nip');
			    $tempat = $this->input->post('tempat');
			    $ttl = $this->input->post('ttl');
			    $alamat = $this->input->post('alamat');
			    $no_telepon = $this->input->post('no_telepon');
			    $tanggal = $this->input->post('tanggal');

			    $this->Admin_model->update_profile($id,$nama,$nip,$tempat,$ttl,$alamat,$no_telepon,$tanggal);
	    		$this->session->set_flashdata('flash', 'Di Update');
    			redirect('admin/show_profile');
	    }
  }

	function getData(){
		$data=$this->Admin_model->grafikd3d4();
		echo json_encode($data);
		// print_r($cek);
	}

	function getDataBulan(){
		$data=$this->Admin_model->grafikbulan();
		echo json_encode($data);
		// print_r($cek);
	}

	function show_dosen(){
		$data['dosen']=$this->Admin_model->show_dosen();
		$this->load->view('admin/v_dosen', $data);
	}

	function add_dosen(){
		$this->load->view('admin/v_add_dosen');
	}

	function save_dosen(){
	    $password = md5('12345');
	    $level = '2';
	    $nip = $this->input->post('nip');
	    $tanggal = $this->input->post('tanggal');
	    $gambar = 'default.jpg';
    $this->Admin_model->save_dosen($password,$level,$nip,$tanggal,$gambar);
    $this->session->set_flashdata('flash', 'Di Tambahkan');
    redirect('admin/show_dosen');
  }

  	function delete_dosen(){
	    $id = $this->uri->segment(3);
	    $this->Admin_model->delete_dosen($id);
	    $this->session->set_flashdata('flash', 'Di Hapus');
	    redirect('admin/show_dosen');
	}

	function edit_dosen(){
    $id = $this->uri->segment(3);
    $result = $this->Admin_model->edit_dosen($id);
    if($result->num_rows() > 0){
        $i = $result->row_array();
        $data = array(
            'id'    => $i['id'],
            'nama'  => $i['nama'],
            'password'     => $i['password'],
            'level'  => $i['level'],
            'nip'     => $i['nip'],
            'tempat'  => $i['tempat'],
            'ttl'  => $i['ttl'],
            'alamat'     => $i['alamat'],
            'no_telepon'  => $i['no_telepon'],
            'tanggal'     => $i['tanggal']
        );
        $this->load->view('admin/v_edit_dosen',$data);
    }else{
        echo "Data Was Not Found";
    }
}

	function update_dosen(){
	    $id = $this->input->post('id');
		$nama = $this->input->post('nama');
	    $password = md5($this->input->post('password'));
	    $level = $this->input->post('level');
	    $nip = $this->input->post('nip');
	    $tempat = $this->input->post('tempat');
	    $ttl = $this->input->post('ttl');
	    $alamat = $this->input->post('alamat');
	    $no_telepon = $this->input->post('no_telepon');
	    $tanggal = $this->input->post('tanggal');
	    $this->Admin_model->update_dosen($id,$nama,$password,$level,$nip,$tempat,$ttl,$alamat,$no_telepon,$tanggal);
	    $this->session->set_flashdata('flash', 'Di Update');
    redirect('admin/show_dosen');
  }

  function reset_dosen(){
	    $id = $this->uri->segment(3);
	    $this->Admin_model->reset_dosen($id);
	    $this->session->set_flashdata('flash', 'Mereset password !!');
	    redirect('admin/show_dosen');
	}




  	function show_mahasiswa(){
		$data['mahasiswa']=$this->Admin_model->show_mahasiswa();
		$this->load->view('admin/v_mahasiswa', $data);
	}

	function add_mahasiswa(){
		$this->load->view('admin/v_add_mahasiswa');
	}

	function save_mahasiswa(){
	    $password = md5('12345');
	    $gambar = 'default.jpg';
	    $nim = $this->input->post('nim');
	   	$jenjang = $this->input->post('jenjang');
	   	$gambar = 'default.png';
	    $tanggal = $this->input->post('tanggal');

 
    $this->Admin_model->save_mahasiswa($password,$jenjang,$nim,$tanggal,$gambar);

    $this->session->set_flashdata('flash', 'Di Tambahkan');
    redirect('admin/show_mahasiswa');
  }

  function edit_mahasiswa(){
    $id = $this->uri->segment(3);
    $result = $this->Admin_model->edit_mahasiswa($id);
    if($result->num_rows() > 0){
        $i = $result->row_array();
        $data = array(
            'id'    => $i['id'],
            'nama'  => $i['nama'],
            'password'     => $i['password'],
            'jenjang'  => $i['jenjang'],
            'nim'     => $i['nim'],
            'tempat'  => $i['tempat'],
            'ttl'  => $i['ttl'],
            'alamat'     => $i['alamat'],
            'no_telepon'  => $i['no_telepon'],
            'tanggal'     => $i['tanggal']
        );
        $this->load->view('admin/v_edit_mahasiswa',$data);
    }else{
        echo "Data Was Not Found";
    }
}
function update_mahasiswa(){
	    $id = $this->input->post('id');
		$nama = $this->input->post('nama');
	    $password = md5($this->input->post('password'));
	    $jenjang = $this->input->post('jenjang');
	    $nim = $this->input->post('nim');
	    $tempat = $this->input->post('tempat');
	    $ttl = $this->input->post('ttl');
	    $alamat = $this->input->post('alamat');
	    $no_telepon = $this->input->post('no_telepon');
	    $tanggal = $this->input->post('tanggal');
	    $this->Admin_model->update_mahasiswa($id,$nama,$password,$jenjang,$nim,$tempat,$ttl,$alamat,$no_telepon,$tanggal);
	    $this->session->set_flashdata('flash', 'Di Update');
    redirect('admin/show_mahasiswa');
  }

  function delete_mahasiswa(){
	    $id = $this->uri->segment(3);
	    $this->Admin_model->delete_mahasiswa($id);
	    $this->session->set_flashdata('flash', 'Di Hapus');
	    redirect('admin/show_mahasiswa');
	}

	function reset_mahasiswa(){
	    $id = $this->uri->segment(3);
	    $this->Admin_model->reset_mahasiswa($id);
	    $this->session->set_flashdata('flash', 'Mereset password !!');
	    redirect('admin/show_mahasiswa');
	}

	function show_mahasiswa_d4(){
		$data['mahasiswa']=$this->Admin_model->show_mahasiswa_d4();
		$this->load->view('admin/v_mahasiswa_d4', $data);
	}

	function add_mahasiswa_d4(){
		$this->load->view('admin/v_add_mahasiswa_d4');
	}

	function save_mahasiswa_d4(){
	    $password = md5('12345');
	    $gambar = 'default.jpg';
	    $nim = $this->input->post('nim');
	   	$jenjang = $this->input->post('jenjang');
	    $tanggal = $this->input->post('tanggal');
    $this->Admin_model->save_mahasiswa($password,$gambar,$jenjang,$nim,$tanggal);
    $this->session->set_flashdata('flash', 'Di Tambahkan');
    redirect('admin/show_mahasiswa_d4');
  }

  function edit_mahasiswa_d4(){
    $id = $this->uri->segment(3);
    $result = $this->Admin_model->edit_mahasiswa_d4($id);
    if($result->num_rows() > 0){
        $i = $result->row_array();
        $data = array(
            'id'    => $i['id'],
            'nama'  => $i['nama'],
            'password'     => $i['password'],
            'jenjang'  => $i['jenjang'],
            'nim'     => $i['nim'],
            'tempat'  => $i['tempat'],
            'ttl'  => $i['ttl'],
            'alamat'     => $i['alamat'],
            'no_telepon'  => $i['no_telepon'],
            'tanggal'     => $i['tanggal']
        );
        $this->load->view('admin/v_edit_mahasiswa_d4',$data);
    }else{
        echo "Data Was Not Found";
    }
}
function update_mahasiswa_d4(){
	    $id = $this->input->post('id');
		$nama = $this->input->post('nama');
	    $password = md5($this->input->post('password'));
	    $jenjang = $this->input->post('jenjang');
	    $nim = $this->input->post('nim');
	    $tempat = $this->input->post('tempat');
	    $ttl = $this->input->post('ttl');
	    $alamat = $this->input->post('alamat');
	    $no_telepon = $this->input->post('no_telepon');
	    $tanggal = $this->input->post('tanggal');
	    $this->Admin_model->update_mahasiswa_d4($id,$nama,$password,$jenjang,$nim,$tempat,$ttl,$alamat,$no_telepon,$tanggal);
	    $this->session->set_flashdata('flash', 'Di Update');
    redirect('admin/show_mahasiswa_d4');
  }

  function delete_mahasiswa_d4(){
	    $id = $this->uri->segment(3);
	    $this->Admin_model->delete_mahasiswa_d4($id);
	    $this->session->set_flashdata('flash', 'Di Hapus');
	    redirect('admin/show_mahasiswa_d4');
	}

	function reset_mahasiswa_d4(){
	    $id = $this->uri->segment(3);
	    $this->Admin_model->reset_mahasiswa($id);
	    $this->session->set_flashdata('flash', 'Mereset password !!');
	    redirect('admin/show_mahasiswa_d4');
	}


//	-------------- DIAGNOSA -------------
	function show_diagnosa(){
		$data['diagnosa']=$this->Admin_model->show_diagnosa();
		$this->load->view('admin/v_diagnosa', $data);
	}

	function add_diagnosa(){
		$this->load->view('admin/v_add_diagnosa');
	}

	function save_diagnosa(){
	    $kode = $this->input->post('kode');
	    $nama = $this->input->post('nama');
    $this->Admin_model->save_diagnosa($kode,$nama);
    $this->session->set_flashdata('flash', 'Di Tambahkan');
    redirect('admin/show_diagnosa');
  }

  function delete_diagnosa(){
	    $id = $this->uri->segment(3);
	    $this->Admin_model->delete_diagnosa($id);
	    $this->session->set_flashdata('flash', 'Di Hapus');
	    redirect('admin/show_diagnosa');
	}

	function edit_diagnosa(){
    $id = $this->uri->segment(3);
    $result = $this->Admin_model->edit_diagnosa($id);
    if($result->num_rows() > 0){
        $i = $result->row_array();
        $data = array(
            'id'    => $i['id'],
            'kode'  => $i['kode'],
            'nama'  => $i['nama']
        );
        $this->load->view('admin/v_edit_diagnosa',$data);
    }else{
        echo "Data Was Not Found";
    }
}

	function update_diagnosa(){
	    $id = $this->input->post('id');
		$kode = $this->input->post('kode');
	    $nama = $this->input->post('nama');
	    $this->Admin_model->update_diagnosa($id,$kode,$nama);
	    $this->session->set_flashdata('flash', 'Di Update');
    redirect('admin/show_diagnosa');
  }
}