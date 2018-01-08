<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class webmaster extends CI_Controller { 
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
            $this->load->model(array('m_login','webmaster_model'));   
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
		        $data['title'] = ' INSERT USER';   
            $data['main'] = 'backend/Webmaster';
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
        $this->form_validation->set_rules('username', 'username', 'required|min_length[3]|max_length[225]');
        $this->form_validation->set_rules('nama', 'nama', 'required|min_length[3]|max_length[225]');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[3]|max_length[225]');
        $this->form_validation->set_rules('level_login', 'Level', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == FALSE)
    {
		$data['title'] = ' INSERT USER';   
        $data['main'] = 'backend/Webmaster';
        $this->load->view('backend/Main_v', $data);
    }
		else
		{
		$config['upload_path'] = './assets/foto/';
	    $config['allowed_types'] = 'gif|jpg|jpeg|png';
	    $config['max_size'] = '10000';
	    $config['max_width'] = '3024';
	    $config['max_height'] = '3768';
	    $this->upload->initialize($config);
	    $this->upload->do_upload('foto');
	    $upload = $this->upload->data();
    	$foto = $upload['file_name'];
		$data = array(
				'username' => $this->input->post('username'),
			    'password' => $this->input->post('password'),
				'status' => $this->input->post('status'),
				'level_login' => $this->input->post('level_login'),
				'nama' => $this->input->post('nama'),
				'foto' => $foto		
			);
		$create  = $this->db->insert('administrator',$data);
        if ($create) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
                redirect('backend/webmaster/cek'); 	
            }
        }
       
            function edit_user()
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
                        $id = $this->uri->segment(4);
		            $data['single_user'] = $this->webmaster_model->show_user_id($id);
		      $data['title'] = ' EDIT USER';   
            $data['main'] = 'backend/Edit_user';
        $this->load->view('backend/Main_v', $data);
    }
    function update_user($id) {
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
            'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'status' => $this->input->post('status'),
                'level_login' => $this->input->post('level_login'),
                'nama' => $this->input->post('nama')
            );
         if(empty($_FILES['foto']['name']))
                {
                    $this->db->where('id', $id);
        $this->db->update('administrator',$data);
                    $create = $this->db->trans_complete();
        if ($create) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
                redirect('backend/webmaster/cek');  
                }
            else
                {
		$config['upload_path'] = './assets/foto/';
	    $config['allowed_types'] = 'gif|jpg|jpeg|png';
	    $config['max_size'] = '10000';
	    $config['max_width'] = '7024';
	    $config['max_height'] = '7768';
	    $this->upload->initialize($config);
	    $this->upload->do_upload('foto');
	    $upload = $this->upload->data();
    	$foto = $upload['file_name'];
	
		$data = array(
			'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'status' => $this->input->post('status'),
				'level_login' => $this->input->post('level_login'),
				'nama' => $this->input->post('nama'),
				'foto' => $foto		
			);
			$this->db->where('id', $id);
		$update = $this->db->update('administrator',$data);
        if ($update)$this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
                 redirect('backend/webmaster/cek'); 	
                }
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
        $config['base_url'] = site_url('backend/webmaster/cek');
        $config['total_rows'] = $this->db->count_all('administrator');
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
        $data['webmaster'] = $this->webmaster_model->get_user_list($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = ' LIST USER';   
        $data['main'] = 'backend/User';
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
           $multiple = $this->webmaster_model->multiple_delete();
        if (!$multiple) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Proses Success</button></p></strong></div>");
     else $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Data success deleted.</button></p></strong></div>");
  redirect('backend/webmaster/cek');     


            }
      function delete($id){
        $this->db->where('id',$id);
        $query = $this->db->get('administrator');
        $row = $query->row();
        $this->db->where('id', $id);
        unlink("./assets/foto/$row->foto");
        $this->db->delete('administrator', array('foto' => $id));
        $this->db->where('id', $id);
        $delete =  $this->db->delete('administrator');
        if (!$delete) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something wrong!</button></p></strong></div>");
         
        else
            $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Data success deleted.</button></p></strong></div>");
            redirect('backend/webmaster/cek');  
        }
    }

