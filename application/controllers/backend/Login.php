<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

    $this->load->model('m_login');
    
    $this->load->library(array('form_validation','session'));
    
    $this->load->database();
    
    $this->load->helper('url');
    
  }
  
  
  public function index()
  {
    $session = $this->session->userdata('isLogin');
    
      if($session == FALSE)
      {
        redirect('welcome');
      }else
      {
        redirect('backend/kontent','refresh');
      }
  }
  
  
  public function login_form()
  {
    $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
    $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
    $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    
      if($this->form_validation->run()==FALSE)
      {
      redirect();
      }else
      {
       $username = $this->db->escape_str($this->input->post("username"));
       $password = $this->input->post('password');
       $level = $this->input->post('level_login');

       
       $cek = $this->m_login->ambilPengguna($username, $password, 1, 1);
        
        if($cek <> 0)
        {
          $this->session->set_userdata('isLogin', TRUE);
          $this->session->set_userdata('username',$username);
          $this->session->set_userdata('level_login',$level);
         
         redirect('backend/kontent');
        }else
        $cek = $this->m_login->ambilPengguna($username, $password, 1, 2);
        
        if($cek <> 0)
        {
          $this->session->set_userdata('isLogin', TRUE);
          $this->session->set_userdata('username',$username);
          $this->session->set_userdata('level_login',$level);
         
         redirect('pegawai/home');

        }else
        {
         echo " <script>
                alert('Something wrong ,please contact your administrator!');
              </script>";       
        redirect();
 
        }
       
      }  
  
  }
  
   function logout()
  {
   $this->session->sess_destroy();
   
    redirect();
  

}
 } 