<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Counter_article extends CI_Controller { 
		function __construct()
	{
		parent::__construct();		
		header("Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT"); // Date in the past
		header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT"); // always modified
		header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
		header("Cache-Control: post-check=0, pre-check=0", FALSE);
		header("Pragma: no-cache");
		$this->load->library(array('form_validation','upload','session','encrypt'));
        $this->load->helper(array('url','text'));
        $this->load->model(array('m_login','counter_article_model'));   
        $this->load->database();
	}

function index()
    {
          if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('backend/login/login_form');
    }else
    {   
        $data = array();
        $this->load->model('m_login');
        $user = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level_login');        
        $data['pengguna'] = $this->m_login->dataPengguna($user);
        }
        $config['base_url'] = site_url('backend/counter_article/index');
        $config['total_rows'] = $this->db->count_all('pages');
        $config['per_page'] = "10";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['counter_article'] = $this->counter_article_model->get_counter_article_list($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();    
        $data['title'] = ' LIST COUNTER ARTICLE';   
        $data['main'] = 'backend/list_counter_article';
        $this->load->view('backend/main_v', $data);
      } 
    }