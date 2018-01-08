<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class faq extends CI_Controller { 
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
        $this->load->model(array('m_login','faq_model'));   
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
        $config['base_url'] = site_url('backend/faq/index');
        $config['total_rows'] = $this->db->count_all('faq');
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
        $data['faq'] = $this->faq_model->get_faq_list($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();    
        $data['title'] = ' LIST FAQ';   
        $data['main'] = 'backend/List_faq';
        $this->load->view('backend/Main_v', $data);
      } 
      function delete($id_faq){
       
        $this->db->where('id_faq', $id_faq);
        $delete =  $this->db->delete('faq');
        if (!$delete) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something wrong!</button></p></strong></div>");
         
        else
            $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
            redirect('backend/faq/index');  
        }
    
    function delete_multiple() {
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
           $multiple = $this->faq_model->multiple_delete();
       if (!$multiple) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Proses Success</button></p></strong></div>");
     else $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Data success deleted.</button></p></strong></div>");
  redirect('backend/faq/index');     
        
    }
     function edit_faq()
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
                        $id_faq = $this->uri->segment(4);
                    $data['single_faq'] = $this->faq_model->show_faq_id($id_faq);
              $data['title'] = ' EDIT FAQ';   
            $data['main'] = 'backend/Edit_faq';
        $this->load->view('backend/Main_v', $data);
    }
    function update_faq($id_faq) {
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
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'message' => $this->input->post('message'),
            'date_replay' => date("Y-m-d H:i:s"),
            'author' => $this->input->post('author'),
            'message_replay' => $this->input->post('message_replay'),
            'status' => $this->input->post('status')
            );
         
            $this->db->where('id_faq', $id_faq);
        $update = $this->db->update('faq',$data);
        if ($update)$this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
                 redirect('backend/faq/index');  
                }
        }
    }