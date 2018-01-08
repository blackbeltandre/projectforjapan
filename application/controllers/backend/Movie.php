<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movie extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper(array('url','html','form'));
  }

  public function index() {
      if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('backend/login/login_form');
    }else
    {   $data = array();
        $this->load->model('m_login');
        $user = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level_login');        
        $data['pengguna'] = $this->m_login->dataPengguna($user);
        $data["biodata"] = null;
        }$data["title"] = "Upload Video";
    $data["main"] = "backend/movie";
    $this->load->view('backend/main_v',$data);
  }

  public function add_video(){
    if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
        unset($config);
        $date = date("ymd");
        $configVideo['upload_path'] = './video';
        $configVideo['max_size'] = '60000';
        $configVideo['allowed_types'] = '*';
        $configVideo['overwrite'] = FALSE;
        $configVideo['remove_spaces'] = TRUE;
        $video_name = $date.$_FILES['video']['name'];
        $configVideo['file_name'] = $video_name;

        $this->load->library('upload', $configVideo);
        $this->upload->initialize($configVideo);
        if(!$this->upload->do_upload('video')) {
            echo $this->upload->display_errors();
        }else{
            $videoDetails = $this->upload->data();
            $data['video_name']= $configVideo['file_name'];
            $data['video_detail'] = $videoDetails;
            $this->load->view('backend/show', $data);
        }
        
    }else{
        echo "Please select a file";
    }
  }


}