<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class M_login extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  
  
  public function ambilPengguna($username, $password, $status, $level)
  {
    $this->db->select('*');
    $this->db->from('administrator');
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $this->db->where('status', $status);
    $this->db->where('level_login', $level);
          $query = $this->db->get();
    
    return $query->num_rows();

/*
             return $this->db->get()->num_rows();
*/
  }  public function ambilmember($username_user, $pass_user, $stts)
  {
    $this->db->select('*');
    $this->db->from('member');
    $this->db->where('username_user', $username_user);
    $this->db->where('pass_user', md5($pass_user));
    $this->db->where('stts', $stts);
          $query = $this->db->get();
    
    return $query->num_rows();

/*
             return $this->db->get()->num_rows();
*/
  }
  
  
  public function dataPengguna($username)
  {
   $this->db->select('username');
   $this->db->select('nama');
   $this->db->select('foto');
   $this->db->select('level_login');
   $this->db->where('username', $username);
   $query = $this->db->get('administrator');
   
   return $query->row();
  }
  public function datamember($username_user)
  {
   $this->db->select('username_user');
   $this->db->select('nama');
   $this->db->select('stts');
   $this->db->where('username_user', $username_user);
   $query = $this->db->get('member');
   
   return $query->row();
  }
  
}  

?>