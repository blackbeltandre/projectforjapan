<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kontent extends CI_Controller { 
        function __construct()
    {
        parent::__construct();      
        header("Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT"); // Date in the past
        header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT"); // always modified
        header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
        header("Cache-Control: post-check=0, pre-check=0", FALSE);
        header("Pragma: no-cache");
        $this->load->helper('text');
        $this->load->library(array('form_validation','upload'));
        $this->load->library('encrypt');
        $this->load->database() ;
        $this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->model('m_login');   
        $this->load->model('webmaster_model');   
        $this->load->database();
    }

public function index() {
       if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('welcome');
    }else
    {   $data = array();
        $this->load->model('m_login');
        $user = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level_login');        
        $data['pengguna'] = $this->m_login->dataPengguna($user);
        $data["biodata"] = null;
        }
        $query =$this->db->query("select distinct(category.category)as category,count(article.id_category)as id_category from article left join category on article.id_category=category.id_category group by category.id_category,category.category order by id_category asc");
        $data['category_article'] = $query->result_array();
        $query =$this->db->query("select title,counter from article");
        $data['counter_article'] = $query->result_array();
        $query =$this->db->query("select sum(count) count,browser from log group by browser");
         $data['visitor'] = $query->result_array();
        $query =$this->db->query("select title,counter from gallery");
        $data['category_gallery'] = $query->result_array();
        $query =$this->db->query("select category_gallery.category,count(gallery.id_category_gallery)as id_category_gallery from gallery left join category_gallery on gallery.id_category_gallery=category_gallery.id_category_gallery group by category_gallery.id_category_gallery,category_gallery.category order by category_gallery.id_category_gallery asc");
        $data['counter_gallery'] = $query->result_array();
        $data["title"] = 'ZONA ADMINISTRATOR';
        $data['main'] = 'backend/Home_v';
        $this->load->view('backend/Main_v', $data);

  }
 }
