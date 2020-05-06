<?php
class Dosen_model extends CI_Model
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

  public function hariand3()
    {
    $tgl = date("Y-m-d");
    $this->db->select('perawatan.id,perawatan.id_mahasiswa, perawatan.id_dosen, perawatan.nama, perawatan.diagnosa,perawatan.keluhan, perawatan.kode_gigi, perawatan.tindakan, perawatan.tanggal, dosen.nama as dosen, mahasiswa.nama as mahasiswa');
    $this->db->from('perawatan');
    $this->db->join('dosen','dosen.id=perawatan.id_dosen');
    $this->db->join('mahasiswa','mahasiswa.id=perawatan.id_mahasiswa');
    $this->db->where('perawatan.tanggal', $tgl);
    $this->db->where('mahasiswa.jenjang', 'D3');
    $this->db->where('perawatan.tanggal', $tgl);
	$query=$this->db->get();
	return $query->result();
    }

    public function totald3()
    {
    $this->db->select('perawatan.id,perawatan.id_mahasiswa, perawatan.id_dosen, perawatan.nama, perawatan.diagnosa,perawatan.keluhan, perawatan.kode_gigi, perawatan.tindakan, perawatan.tanggal, dosen.nama as dosen, mahasiswa.nama as mahasiswa');
    $this->db->from('perawatan');
    $this->db->join('dosen','dosen.id=perawatan.id_dosen');
    $this->db->join('mahasiswa','mahasiswa.id=perawatan.id_mahasiswa');
    $this->db->where('perawatan.id_dosen',$this->session->userdata('ses_id'));
    $this->db->where('mahasiswa.jenjang', 'D3');
	$query=$this->db->get();
	return $query->result();
    }

    public function filterd3bulan($bulan, $year)
    {
    $this->db->select('perawatan.id,perawatan.id_mahasiswa, perawatan.id_dosen, perawatan.nama, perawatan.diagnosa,perawatan.keluhan, perawatan.kode_gigi, perawatan.tindakan, perawatan.tanggal, dosen.nama as dosen, mahasiswa.nama as mahasiswa');
    $this->db->from('perawatan');
    $this->db->join('dosen','dosen.id=perawatan.id_dosen');
    $this->db->join('mahasiswa','mahasiswa.id=perawatan.id_mahasiswa');
    $this->db->where('perawatan.id_dosen',$this->session->userdata('ses_id'));
    $this->db->where('mahasiswa.jenjang', 'D3');
    $this->db->where('month(perawatan.tanggal)', $bulan);
    $this->db->where('year(perawatan.tanggal)', $year);
    $query=$this->db->get();
    return $query->result();
    }

    public function filterd3tahun($tahun)
    {
    $this->db->select('perawatan.id,perawatan.id_mahasiswa, perawatan.id_dosen, perawatan.nama, perawatan.diagnosa,perawatan.keluhan, perawatan.kode_gigi, perawatan.tindakan, perawatan.tanggal, dosen.nama as dosen, mahasiswa.nama as mahasiswa');
    $this->db->from('perawatan');
    $this->db->join('dosen','dosen.id=perawatan.id_dosen');
    $this->db->join('mahasiswa','mahasiswa.id=perawatan.id_mahasiswa');
    $this->db->where('perawatan.id_dosen',$this->session->userdata('ses_id'));
    $this->db->where('mahasiswa.jenjang', 'D3');
    $this->db->where('year(perawatan.tanggal)', $tahun);
    $query=$this->db->get();
    return $query->result();
    }

    public function filterd3all($bulan, $tahun)
    {
    $this->db->select('perawatan.id,perawatan.id_mahasiswa, perawatan.id_dosen, perawatan.nama, perawatan.diagnosa,perawatan.keluhan, perawatan.kode_gigi, perawatan.tindakan, perawatan.tanggal, dosen.nama as dosen, mahasiswa.nama as mahasiswa');
    $this->db->from('perawatan');
    $this->db->join('dosen','dosen.id=perawatan.id_dosen');
    $this->db->join('mahasiswa','mahasiswa.id=perawatan.id_mahasiswa');
    $this->db->where('perawatan.id_dosen',$this->session->userdata('ses_id'));
    $this->db->where('mahasiswa.jenjang', 'D3');
    $this->db->where('month(perawatan.tanggal)', $bulan);
    $this->db->where('year(perawatan.tanggal)', $tahun);
    $query=$this->db->get();
    return $query->result();
    }


    public function hariand4()
    {
    $tgl = date("Y-m-d");
    $this->db->select('perawatan.id,perawatan.id_mahasiswa, perawatan.id_dosen, perawatan.nama, perawatan.diagnosa,perawatan.keluhan, perawatan.kode_gigi, perawatan.tindakan, perawatan.tanggal, dosen.nama as dosen, mahasiswa.nama as mahasiswa');
    $this->db->from('perawatan');
    $this->db->join('dosen','dosen.id=perawatan.id_dosen');
    $this->db->join('mahasiswa','mahasiswa.id=perawatan.id_mahasiswa');
    $this->db->where('perawatan.tanggal', $tgl);
    $this->db->where('perawatan.id_dosen',$this->session->userdata('ses_id'));
    $this->db->where('mahasiswa.jenjang', 'D4');
	$query=$this->db->get();
	return $query->result();
    }

    public function totald4()
    {
    $this->db->select('perawatan.id,perawatan.id_mahasiswa, perawatan.id_dosen, perawatan.nama, perawatan.diagnosa,perawatan.keluhan, perawatan.kode_gigi, perawatan.tindakan, perawatan.tanggal, dosen.nama as dosen, mahasiswa.nama as mahasiswa');
    $this->db->from('perawatan');
    $this->db->join('dosen','dosen.id=perawatan.id_dosen');
    $this->db->join('mahasiswa','mahasiswa.id=perawatan.id_mahasiswa');
    $this->db->where('perawatan.id_dosen',$this->session->userdata('ses_id'));
    $this->db->where('mahasiswa.jenjang', 'D4');
	$query=$this->db->get();
	return $query->result();
    }

    public function filterd4bulan($bulan, $year)
    {
    $this->db->select('perawatan.id,perawatan.id_mahasiswa, perawatan.id_dosen, perawatan.nama, perawatan.diagnosa,perawatan.keluhan, perawatan.kode_gigi, perawatan.tindakan, perawatan.tanggal, dosen.nama as dosen, mahasiswa.nama as mahasiswa');
    $this->db->from('perawatan');
    $this->db->join('dosen','dosen.id=perawatan.id_dosen');
    $this->db->join('mahasiswa','mahasiswa.id=perawatan.id_mahasiswa');
    $this->db->where('perawatan.id_dosen',$this->session->userdata('ses_id'));
    $this->db->where('mahasiswa.jenjang', 'D4');
    $this->db->where('month(perawatan.tanggal)', $bulan);
    $this->db->where('year(perawatan.tanggal)', $year);
    $query=$this->db->get();
    return $query->result();
    }

    public function filterd4tahun($tahun)
    {
    $this->db->select('perawatan.id,perawatan.id_mahasiswa, perawatan.id_dosen, perawatan.nama, perawatan.diagnosa,perawatan.keluhan, perawatan.kode_gigi, perawatan.tindakan, perawatan.tanggal, dosen.nama as dosen, mahasiswa.nama as mahasiswa');
    $this->db->from('perawatan');
    $this->db->join('dosen','dosen.id=perawatan.id_dosen');
    $this->db->join('mahasiswa','mahasiswa.id=perawatan.id_mahasiswa');
    $this->db->where('perawatan.id_dosen',$this->session->userdata('ses_id'));
    $this->db->where('mahasiswa.jenjang', 'D4');
    $this->db->where('year(perawatan.tanggal)', $tahun);
    $query=$this->db->get();
    return $query->result();
    }

    public function filterd4all($bulan, $tahun)
    {
    $this->db->select('perawatan.id,perawatan.id_mahasiswa, perawatan.id_dosen, perawatan.nama, perawatan.diagnosa,perawatan.keluhan, perawatan.kode_gigi, perawatan.tindakan, perawatan.tanggal, dosen.nama as dosen, mahasiswa.nama as mahasiswa');
    $this->db->from('perawatan');
    $this->db->join('dosen','dosen.id=perawatan.id_dosen');
    $this->db->join('mahasiswa','mahasiswa.id=perawatan.id_mahasiswa');
    $this->db->where('perawatan.id_dosen',$this->session->userdata('ses_id'));
    $this->db->where('mahasiswa.jenjang', 'D4');
    $this->db->where('month(perawatan.tanggal)', $bulan);
    $this->db->where('year(perawatan.tanggal)', $tahun);
    $query=$this->db->get();
    return $query->result();
    }

public function ubah_password_dosen()
    {
    $this->db->from('dosen');
    $query=$this->db->get();
    return $query->result();
    }

    public function save()
 {
      $pass = md5($this->input->post('new'));
      $data = array (
       'password' => $pass
       );
      $this->db->where('id', $this->session->userdata('ses_id'));
      $this->db->update('dosen', $data);
 }

 public function cek_old()
  {
   $old = md5($this->input->post('old')); 
   $this->db->where('password',$old);
   $query = $this->db->get('dosen');
    return $query->result();;
}


public function grafik()
    {
    $tahun = date("Y");
    //$bulan = "select month(tanggal) as bulan from perawatan";

    $this->db->where('year(perawatan.tanggal)', $tahun);
    $this->db->where('id_dosen', $this->session->userdata('ses_id') );
    $this->db->select('bulan');
    $this->db->select("count(*) as total");
    $this->db->group_by('bulan');
    
    return $this->db->from('perawatan')
    ->get()
    ->result();
    }

public function grafik_mhs()
    {

    $this->db->where('id_dosen', $this->session->userdata('ses_id') );
    $this->db->select('perawatan.id_mahasiswa, mahasiswa.nama');
    $this->db->select("count(*) as total");
    $this->db->join('mahasiswa','mahasiswa.id=perawatan.id_mahasiswa');
    $this->db->group_by('id_mahasiswa');
    return $this->db->from('perawatan')
    ->get()
    ->result();
    }
}

