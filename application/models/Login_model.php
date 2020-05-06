<?php
class Login_model extends CI_Model{
 
    //cek username dan password Admin dan dosen
    function auth_dosen($username,$password){
        $query=$this->db->query("SELECT * FROM dosen WHERE nip='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }

    //cek username dan password mahasiswa
    function auth_mahasiswa($username,$password){
        $query=$this->db->query("SELECT * FROM mahasiswa WHERE nim='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
 
}