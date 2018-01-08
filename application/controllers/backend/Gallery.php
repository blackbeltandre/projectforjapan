<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller { 
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
        $this->load->model(array('m_login','gallery_model'));   
        $this->load->database();
	}

function index()
	{
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
        $data['list_gallery'] = $this->gallery_model->show_list_gallery()->result_array();
		    $data['title'] = ' INSERT GALLERY';   
        $data['main'] = 'backend/Gallery';
        $this->load->view('backend/Main_v', $data);

}

function proses()
   {
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
  	    $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>
                                                        x
                                                   </button>", "</button></div>");
        $this->form_validation->set_rules('author', 'Author', 'required|min_length[3]|max_length[200]');
/*        $this->form_validation->set_rules('title', 'Judul gallery', 'required|min_length[3]|max_length[200]');
*/        $this->form_validation->set_rules('status', 'Status', 'required');
/*        $this->form_validation->set_rules('description', 'Isi gallery', 'required|min_length[3]');
*/        if ($this->form_validation->run() == FALSE)
    {
        $data['list_gallery'] = $this->gallery_model->show_list_gallery()->result_array();
	     	$data['title'] = ' INSERT GALLERY';   
        $data['main'] = 'backend/gallery';
        $this->load->view('backend/main_v', $data);
    }
		else
		{
        $config['upload_path'] = './assets/files';
        $config['allowed_types'] = '*';
        $config['max_size'] = '100000000';
        $this->upload->initialize($config);
        $this->upload->do_upload('file');
        $upload = $this->upload->data();
        $file = $upload['file_name'];
        $date = date('d-m-y');
	     	$data = array(
            'description' => $this->input->post('description'),
            'id_category_gallery' => $this->input->post('id_category_gallery'),
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'status' => $this->input->post('status'),
            'date_post' => $date,
            'file' => $file 
			);
		  $create = $this->db->insert('gallery',$data);
        if ($create) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
      redirect('backend/gallery/cek'); 	
            }
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
           $multiple = $this->gallery_model->multiple_delete();
       if (!$multiple) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Proses Success</button></p></strong></div>");
     else $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Data success deleted.</button></p></strong></div>");
  redirect('backend/gallery/cek');     
        
    }
      function edit_gallery()
	{
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
        $id = $this->uri->segment(4);
        $data['gallery'] = $this->gallery_model->show_id_gallery($id)->result_array();
		$data['single_gallery'] = $this->gallery_model->show_gallery_id($id);
		$data['title'] = ' EDIT GALLERY';   
        $data['main'] = 'backend/Edit_gallery';
        $this->load->view('backend/Main_v', $data);

}
function update_gallery($id) 
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
          $date = date('d-m-y');
        $data = array(
            'description' => $this->input->post('description'),
            'id_category_gallery' => $this->input->post('id_category_gallery'),
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'status' => $this->input->post('status'),
            'date_post' => $date,
            'file' => $file 
      );
            if(empty($_FILES['file']['name']))
                {
        $this->db->where('id', $id);
        $this->db->update('gallery',$data);
        $create = $this->db->trans_complete();
        if ($create)
            $this->session->set_flashdata('message', "<div class='alert alert-warning alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
        else
            $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Oh snap! Something wrong ,Please check before using any database !');</button></p></strong></div>");
                redirect('backend/gallery/cek');    
            }
       else
            {
        $config['upload_path'] = './assets/files';
        $config['allowed_types'] = '*';
        $config['max_size'] = '100000000';
        $this->upload->initialize($config);
        $this->upload->do_upload('file');
        $upload = $this->upload->data();
        $file = $upload['file_name'];
        $date = date('d-m-y');
        $data = array(
            'description' => $this->input->post('description'),
            'id_category_gallery' => $this->input->post('id_category_gallery'),
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'status' => $this->input->post('status'),
            'date_post' => $date,
            'file' => $file 
      );
            $this->db->where('id', $id);
            $this->db->update('gallery',$data);
            $create = $this->db->trans_complete();
        if ($create)
            $this->session->set_flashdata('message', "<div class='alert alert-warning alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success .</button></p></strong></div>");
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Oh snap! Something wrong ,Please check before using any database !');</button></p></strong></div>");
                 redirect('backend/gallery/cek');    
                }
        }
    function cek()
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
        $config['base_url'] = site_url('backend/gallery/cek');
        $config['total_rows'] = $this->db->count_all('gallery');
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
        $data['gallery'] = $this->gallery_model->get_gallery_list($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();    
        $data['title'] = ' LIST GALLERY';   
        $data['main'] = 'backend/List_gallery';
        $this->load->view('backend/Main_v', $data);
      } 
      function delete($id){
        $this->db->where('id',$id);
        $query = $this->db->get('gallery');
        $row = $query->row();
        $this->db->where('id', $id);
        unlink("./assets/files/$row->file");
        $this->db->delete('gallery', array('file' => $id));
        $this->db->where('id', $id);
        $delete =  $this->db->delete('gallery');
        if (!$delete) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something wrong!</button></p></strong></div>");
         
        else
            $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
            redirect('backend/gallery/cek');  
        }
    
}