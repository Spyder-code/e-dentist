<?php
class Mahasiswa_model extends CI_Model
{

  public function pasien()
    {
    $this->db->from('pasien');
		$query=$this->db->get();
		return $query->result();
    }

   function save_pasien($nama,$no_telepon,$tanggal,$alamat,$kelamin,$tempat,$ttl){
    $data = array(
      'nama' => $nama,
      'no_telepon' => $no_telepon,
      'tanggal' => $tanggal,
      'alamat' => $alamat,
      'kelamin' => $kelamin,
      'tempat' => $tempat,
      'ttl' => $ttl
    );
    $this->db->insert('pasien',$data);
  }

  	public function delete_pasien($id){
      $this->db->where('id', $id);
      $this->db->delete('pasien');
    }

    function edit_pasien($id){
    $query = $this->db->get_where('pasien', array('id' => $id));
    return $query;
}	

	function update_pasien($id,$nama,$no_telepon,$tanggal,$alamat,$kelamin,$tempat,$ttl){
    $data = array(
      'nama' => $nama,
      'no_telepon' => $no_telepon,
      'tanggal' => $tanggal,
      'alamat' => $alamat,
      'kelamin' => $kelamin,
      'tempat' => $tempat,
      'ttl' => $ttl
    );
    $this->db->where('id', $id);
    $this->db->update('pasien', $data);
}

function perawatan_pasien($id){
    $query = $this->db->get_where('pasien', array('id' => $id));
    return $query;
}

function save_perawatan($id_mahasiswa,$tindakan,$kode_gigi,$tanggal,$diagnosa,$keluhan,$id_dosen,$nama,$bulan){
    $data = array(
      'id_mahasiswa' => $id_mahasiswa,
      'nama' => $nama,
      'tindakan' => $tindakan,
      'kode_gigi' => $kode_gigi,
      'tanggal' => $tanggal,
      'diagnosa' => $diagnosa,
      'keluhan' => $keluhan,
      'bulan' => $bulan,
      'id_dosen' => $id_dosen
    );
    $this->db->insert('perawatan',$data);
  }

  public function laporan()
    {
    $this->db->select('perawatan.id,perawatan.id_mahasiswa, perawatan.id_dosen, perawatan.nama, perawatan.diagnosa,perawatan.keluhan, perawatan.kode_gigi as gigi, perawatan.tindakan, perawatan.tanggal, dosen.nama as dosen, diagnosa.nama as diagnosaa, mahasiswa.nama as mahasiswa');
    $this->db->from('perawatan');
    $this->db->join('mahasiswa','mahasiswa.id=perawatan.id_mahasiswa');
    $this->db->join('dosen','dosen.id=perawatan.id_dosen');
    $this->db->join('diagnosa','diagnosa.id=perawatan.diagnosa');
    $this->db->where('id_mahasiswa',$this->session->userdata('ses_id'));
		$query=$this->db->get();
		return $query->result();
    }

    public function dosen()
    {
    $this->db->from('dosen');
    $this->db->where('level', '2');
    $this->db->where('nama is NOT NULL', NULL, FALSE);
    $query=$this->db->get();
    return $query->result();
    }

    public function diagnosa()
    {
    $this->db->from('diagnosa');
    $query=$this->db->get();
    return $query->result();
    }


    function get_kode_gigi($kode){
    $hsl=$this->db->query("SELECT * FROM gigi WHERE kode_gigi='$kode'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'kode_gigi' => $data->kode_gigi,
          'deskripsi' => $data->deskripsi,
          );
      }
    }
    return $hasil;
  }

  function get_kode_diagnosa($kodee){
    $hsl=$this->db->query("SELECT * FROM diagnosa WHERE id='$kodee'");
    if($hsl->num_rows()>0){
      foreach ($hsl->result() as $data) {
        $hasil=array(
          'id' => $data->id,
          'kode' => $data->kode,
          'nama' => $data->nama,
          );
      }
    }
    return $hasil;
  }

   public function ubah_password()
    {
    $this->db->from('mahasiswa');
    $query=$this->db->get();
    return $query->result();
    }

    public function gambar(){
      return $this->db->get('kode_gigi')->result_array();
    }

    public function save()
 {
      $pass = md5($this->input->post('new'));
      $data = array (
       'password' => $pass
       );
      $this->db->where('id', $this->session->userdata('ses_id'));
      $this->db->update('mahasiswa', $data);
 }

 public function cek_old()
  {
   $old = md5($this->input->post('old')); 
   $this->db->where('password',$old);
   $query = $this->db->get('mahasiswa');
    return $query->result();;
}
function profile($id){
    $query = $this->db->get_where('mahasiswa', array('id' => $id));
    return $query;
}
function update_profile($id,$nama,$nim,$tempat,$ttl,$alamat,$no_telepon,$tanggal){
    $data = array(
      'nama' => $nama,
      'nim' => $nim,
      'tempat' => $tempat,
      'ttl' => $ttl,
      'alamat' => $alamat,
      'no_telepon' => $no_telepon,
      'tanggal' => $tanggal
    );
    $this->db->where('id', $id);
    $this->db->update('mahasiswa', $data);
}

public function update($data,$kondisi)
  {
      $this->db->update('mahasiswa',$data,$kondisi);
      return TRUE;
  }

public function show_profile()
    {
    $this->db->from('mahasiswa');
    $this->db->where('id', $this->session->userdata('ses_id'));
    $query=$this->db->get();
    return $query->result();
    }

    public function update($data,$kondisi)
  {
      $this->db->update('mahasiswa',$data,$kondisi);
      return TRUE;
  }

  public function grafik()
    {
    $tahun = date("Y");
    //$bulan = "select month(tanggal) as bulan from perawatan";

    $this->db->where('year(perawatan.tanggal)', $tahun);
    $this->db->where('id_mahasiswa', $this->session->userdata('ses_id') );
    $this->db->select('bulan');
    $this->db->select("count(*) as total");
    $this->db->group_by('bulan');
    
    return $this->db->from('perawatan')
    ->get()
    ->result();
    }



 
}