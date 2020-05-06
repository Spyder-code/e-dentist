<?php 

class Dosen extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Dosen_model');
		$this->load->library('upload');
		$this->load->library('form_validation');
      	$this->load->library('pagination');
		if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
	}

	function index(){
		$this->load->view('dosen/v_index');
	}

	function getData(){
		$data=$this->Dosen_model->grafik();
		echo json_encode($data);
		// print_r($cek);
	}

	function getDataMhs(){
		$data=$this->Dosen_model->grafik_mhs();
		echo json_encode($data);
		// print_r($cek);
	}

	function profile(){
		$id = $this->session->userdata('ses_id');
	    $result = $this->Dosen_model->profile($id);
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
        $this->load->view('dosen/v_profile',$data);
    }else{
        echo "Data Was Not Found";
    }
}

	function show_profile(){
		$data['show_profile']=$this->Dosen_model->show_profile();
		$this->load->view('dosen/v_show_profile', $data);
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

				$this->Dosen_model->update($data,$kondisi);
				$this->session->set_flashdata('flash', 'Di Update');
    			redirect('dosen/show_profile');
	        }else {
                 $this->session->set_flashdata('gagal', 'Gagal Update');
    			redirect('dosen/show_profile');
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

			    $this->Dosen_model->update_profile($id,$nama,$nip,$tempat,$ttl,$alamat,$no_telepon,$tanggal);
	    		$this->session->set_flashdata('flash', 'Di Update');
    			redirect('dosen/show_profile');
	    }
  }

	function harian_d3(){
		$data['hariand3']=$this->Dosen_model->hariand3();
		$this->load->view('dosen/v_hariand3', $data);
	}
	function get_bulan(){
		$bulan=$this->input->post('bulan');
		$data=$this->Dosen_model->get_query_bulan($bulan);
		echo json_encode($data);
	}
	function filter_d3(){
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$year = $this->input->post('year');

		if (isset($bulan) && empty($tahun)) {
			$data['hasil']=$this->Dosen_model->filterd3bulan($bulan,$year);
		} elseif (isset($tahun) && empty($bulan)) {
			$data['hasil']=$this->Dosen_model->filterd3tahun($tahun);
		} else{
			$data['hasil']=$this->Dosen_model->filterd3all($bulan,$tahun);
		}

		$this->load->view('dosen/v_filterd3', $data);
	}

	function total_d3(){
		$data['totald3']=$this->Dosen_model->totald3();
		$this->load->view('dosen/v_totald3', $data);
	}

	function harian_d4(){
		$data['hariand4']=$this->Dosen_model->hariand4();
		$this->load->view('dosen/v_hariand4', $data);
	}

	function filter_d4(){
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$year = $this->input->post('year');

		if (isset($bulan) && empty($tahun)) {
			$data['hasil']=$this->Dosen_model->filterd4bulan($bulan,$year);
		} elseif (isset($tahun) && empty($bulan)) {
			$data['hasil']=$this->Dosen_model->filterd4tahun($tahun);
		} else{
			$data['hasil']=$this->Dosen_model->filterd4all($bulan,$tahun);
		}

		$this->load->view('dosen/v_filterd4', $data);
	}

	function total_d4(){
		$data['totald4']=$this->Dosen_model->totald4();
		$this->load->view('dosen/v_totald4', $data);
	}

	 public function ubah_password()
{
	$this->load->view('dosen/v_ubah_password_dosen');
	
}

	public function save_password()
	 { 
	  $this->form_validation->set_rules('new','New','required|alpha_numeric');
	  $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
	    if($this->form_validation->run() == FALSE)
	  {
	   $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ulangi Masukkan Password Baru dan Ulangi Password Baru Yang Sesuai!</div>');
	   redirect('dosen/ubah_password');
	  }
	  else{
	   $cek_old = $this->Dosen_model->cek_old();
	   if ($cek_old == False){
	    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Tidak Sesuai!</div>');
	    redirect('dosen/ubah_password');
	   }
	   else{
	   	$baru = $this->input->post('new');
	   	$lama = $this->input->post('old');
	   	if ($baru == $lama) {
	   	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh sama dengan password Lama !</div>');
	   redirect('dosen/ubah_password');
	   	}else{
	   	$this->Dosen_model->save();
		//$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
	    redirect('dosen/ubah_password');
	   	}
	    
	   }
	  }
	}


}