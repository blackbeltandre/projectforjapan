<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Category extends CI_Controller { 
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
            $this->load->model(array('m_login','category_model'));   
        $this->load->database();
	}
    function index()
	   {
		if($this->session->userdata('isLogin') == FALSE)
        {
            redirect('backend/login/login_form');
            }
                else
            {    
                $data = array();
                    $this->load->model('m_login');
                                $user = $this->session->userdata('username');
                                $data['level'] = $this->session->userdata('level_login');        
                        $data['pengguna'] = $this->m_login->dataPengguna($user);
                    }
		        $data['title'] = ' INSERT CATEGORY';   
            $data['main'] = 'backend/Category';
        $this->load->view('backend/Main_v', $data);
    }
    function proses()
   {
		      if($this->session->userdata('isLogin') == FALSE)
                {
                    redirect('backend/login/login_form');
                    }
                        else
                          {   
                            $data = array();
                                $this->load->model('m_login');
                                $user = $this->session->userdata('username');
                             $data['level'] = $this->session->userdata('level_login');        
                        $data['pengguna'] = $this->m_login->dataPengguna($user);
                        }
  	            $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>
                                                        x
                                                   </button>", "</button></div>");
        $this->form_validation->set_rules('category', 'category', 'required|min_length[3]|max_length[225]');
        if ($this->form_validation->run() == FALSE)
    {
		$data['title'] = ' INSERT CATEGORY';   
        $data['main'] = 'backend/Category';
        $this->load->view('backend/Main_v', $data);
    }
		else
		{
		
		$data = array(
				'category' => $this->input->post('category')
			);
		$create  = $this->db->insert('category',$data);
        if ($create) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
                redirect('backend/category/cek'); 	
            }
        }
       
            function edit_category()
	{
		  if($this->session->userdata('isLogin') == FALSE)
            {
                redirect('backend/login/login_form');
            }
                else
            { 
               $data = array();
                    $this->load->model('m_login');
                        $user = $this->session->userdata('username');
                            $data['level'] = $this->session->userdata('level_login');        
                                $data['pengguna'] = $this->m_login->dataPengguna($user);
                            }
                        $id_category = $this->uri->segment(4);
		            $data['single_category'] = $this->category_model->show_category_id($id_category);
		      $data['title'] = ' EDIT CATEGORY';   
            $data['main'] = 'backend/Edit_category';
        $this->load->view('backend/Main_v', $data);
    }
    function update_category($id_category) {
        {
              if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('backend/login/login_form');
    }
        else
        { 
         $data = array();
         $this->load->model('m_login');
         $user = $this->session->userdata('username');
         $data['level'] = $this->session->userdata('level_login');        
         $data['pengguna'] = $this->m_login->dataPengguna($user);
         }$data = array(
            'category' => $this->input->post('category')
            );
         
			$this->db->where('id_category', $id_category);
		$update = $this->db->update('category',$data);
        if ($update)$this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
                 redirect('backend/category/cek'); 	
                }
        }
       
    function cek()
    {
          if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('backend/login/login_form');
    }
    else
    {    $data = array();
         $this->load->model('m_login');
         $user = $this->session->userdata('username');
         $data['level'] = $this->session->userdata('level_login');        
         $data['pengguna'] = $this->m_login->dataPengguna($user);
         }
        $config['base_url'] = site_url('backend/category/cek');
        $config['total_rows'] = $this->db->count_all('category');
        $config['per_category'] = "10";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_category"];
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
        $data['category'] = $this->category_model->get_category_list($config["per_category"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = ' LIST CATEGORY';   
        $data['main'] = 'backend/List_category';
        $this->load->view('backend/Main_v', $data);
      } function delete_multiple() {
          if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('backend/login/login_form');
    }else
    {    $data = array();
         $this->load->model('m_login');
         $user = $this->session->userdata('username');
         $data['level'] = $this->session->userdata('level_login');        
         $data['pengguna'] = $this->m_login->dataPengguna($user);
         }
           $multiple = $this->category_model->multiple_delete();
        if (!$mulriple) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Proses Success</button></p></strong></div>");
     else $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Data success deleted.</button></p></strong></div>");
  redirect('backend/category/cek');     


            }
      function delete($id_category){
       
        $this->db->where('id_category', $id_category);
        $delete =  $this->db->delete('category');
        if (!$delete) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something wrong!</button></p></strong></div>");
         
        else
            $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Data success deleted.</button></p></strong></div>");
            redirect('backend/category/cek');  
        }
    }

