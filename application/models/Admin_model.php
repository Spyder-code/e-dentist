<?php
class Admin_model extends CI_Model
{
      function profile($id){
    $query = $this->db->get_where('dosen', array('id' => $id));
    return $query;
}
function update_profile($id,$nama,$nip,$tempat,$ttl,$alamat,$no_telepon,$tanggal){
    $data = array(
      'nama' => $nama,
      'nip' => $nip,
      'tempat' => $tempat,
      'ttl' => $ttl,
      'alamat' => $alamat,
      'no_telepon' => $no_telepon,
      'tanggal' => $tanggal
    );
    $this->db->where('id', $id);
    $this->db->update('dosen', $data);
}

public function show_profile()
    {
    $this->db->from('dosen');
    $this->db->where('id', $this->session->userdata('ses_id'));
    $query=$this->db->get();
    return $query->result();
    }

    public function update($data,$kondisi)
  {
      $this->db->update('dosen',$data,$kondisi);
      return TRUE;
  }
    public function show_dosen()
    {
      $this->db->from('dosen');
      $this->db->where('level', '2');
  		$query=$this->db->get();
  		return $query->result();
    }

  function save_dosen($password,$level,$nip,$tanggal){
    $data = array(
      'password' => $password,
      'level' => $level,
      'nip' => $nip,
      'tanggal' => $tanggal
    );
    $this->db->insert('dosen',$data);
  }

    public function delete_dosen($id){
      $this->db->where('id', $id);
      $this->db->delete('dosen');
    }

    function edit_dosen($id){
    $query = $this->db->get_where('dosen', array('id' => $id));
    return $query;
}

    function update_dosen($id,$nama,$password,$level,$nip,$tempat,$ttl,$alamat,$no_telepon,$tanggal){
    $data = array(
      'nama' => $nama,
      'password' => $password,
      'level' => $level,
      'nip' => $nip,
      'tempat' => $tempat,
      'ttl' => $ttl,
      'alamat' => $alamat,
      'no_telepon' => $no_telepon,
      'tanggal' => $tanggal
    );
    $this->db->where('id', $id);
    $this->db->update('dosen', $data);
}

public function reset_dosen($id){
      $data = array(
        'password' => md5('12345')
      );
      $this->db->where('id', $id);
      $this->db->update('dosen', $data);
    }

  
  public function show_mahasiswa()
    {
      $this->db->from('mahasiswa');
      $this->db->where('jenjang', 'D3');
      $query=$this->db->get();
      return $query->result();
    }


  function save_mahasiswa($password,$jenjang,$nim,$tanggal,$gambar){

    $data = array(
      'password' => $password,
      'gambar' => $gambar,
      'jenjang' => $jenjang,
      'nim' => $nim,
      'gambar' => $gambar,
      'tanggal' => $tanggal
    );
    $this->db->insert('mahasiswa',$data);
  }

  function edit_mahasiswa($id){
    $query = $this->db->get_where('mahasiswa', array('id' => $id));
    return $query;
}

  function update_mahasiswa($id,$nama,$password,$jenjang,$nim,$tempat,$ttl,$alamat,$no_telepon,$tanggal){
    $data = array(
      'nama' => $nama,
      'password' => $password,
      'jenjang' => $jenjang,
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

public function delete_mahasiswa($id){
      $this->db->where('id', $id);
      $this->db->delete('mahasiswa');
    }

    public function reset_mahasiswa($id){
      $data = array(
        'password' => md5('12345')
      );
      $this->db->where('id', $id);
      $this->db->update('mahasiswa', $data);
    }







    public function show_mahasiswa_d4()
    {
      $this->db->from('mahasiswa');
      $this->db->where('jenjang', 'D4');
      $query=$this->db->get();
      return $query->result();
    }

  function save_mahasiswa_d4($password,$jenjang,$nim,$tanggal){
    $data = array(
      'password' => $password,
      'jenjang' => $jenjang,
      'nim' => $nim,
      'tanggal' => $tanggal
    );
    $this->db->insert('mahasiswa',$data);
  }

  function edit_mahasiswa_d4($id){
    $query = $this->db->get_where('mahasiswa', array('id' => $id));
    return $query;
}

  function update_mahasiswa_d4($id,$nama,$password,$jenjang,$nim,$tempat,$ttl,$alamat,$no_telepon,$tanggal){
    $data = array(
      'nama' => $nama,
      'password' => $password,
      'jenjang' => $jenjang,
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

public function delete_mahasiswa_d4($id){
      $this->db->where('id', $id);
      $this->db->delete('mahasiswa');
    }









function save_diagnosa($kode,$nama){
    $data = array(
      'kode' => $kode,
      'nama' => $nama
    );
    $this->db->insert('diagnosa',$data);
  }
public function delete_diagnosa($id){
      $this->db->where('id', $id);
      $this->db->delete('diagnosa');
    }

function edit_diagnosa($id){
    $query = $this->db->get_where('diagnosa', array('id' => $id));
    return $query;
}

function update_diagnosa($id,$kode,$nama){
    $data = array(
      'kode' => $kode,
      'nama' => $nama
    );
    $this->db->where('id', $id);
    $this->db->update('diagnosa', $data);
}


  public function jumlahdosen(){   
    $this->db->from('dosen');
    $this->db->where('level', '2');
    $query=$this->db->get();
    
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

public function jumlahmahasiswad3(){   
    $this->db->from('mahasiswa');
    $this->db->where('jenjang', 'D3');
    $query=$this->db->get();
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

public function jumlahmahasiswad4(){   
    $this->db->from('mahasiswa');
    $this->db->where('jenjang', 'D4');
    $query=$this->db->get();
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

public function jumlahpasien(){   
    $this->db->from('pasien');
    $query=$this->db->get();
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

public function show_diagnosa()
    {
      $this->db->from('diagnosa');
      $query=$this->db->get();
      return $query->result();
    }

public function show_gigi()
    {
      $this->db->from('gigi');
      $query=$this->db->get();
      return $query->result();
    }

public function grafikd3d4()
    {

    $this->db->select('jenjang');
    $this->db->select("count(*) as total");
    $this->db->group_by('jenjang');
    
    return $this->db->from('mahasiswa')
    ->get()
    ->result();
    }

public function grafikbulan()
    {
    $tahun = date("Y");
    //$bulan = "select month(tanggal) as bulan from perawatan";

    $this->db->where('year(perawatan.tanggal)', $tahun);
    $this->db->select('bulan');
    $this->db->select("count(*) as total");
    $this->db->group_by('bulan');
    
    return $this->db->from('perawatan')
    ->get()
    ->result();
    }

}
