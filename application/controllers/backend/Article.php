<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller { 
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
        $this->load->model(array('m_login','article_model'));   
        $this->load->database();
	}
public function search()
    {
        // tangkap variabel keyword dari URL
        $keyword = $this->uri->segment(4);

        // cari di database
        $data = $this->db->from('label')->like('label',$keyword)->get();  

        // format keluaran di dalam array
        foreach($data->result() as $row)
        {
            $arr['query'] = $keyword;
            $arr['suggestions'][] = array(
                'value' =>$row->label,
                'label'   =>$row->label

            );
        }
        // minimal PHP 5.2
        echo json_encode($arr);
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
        $data['list_category'] = $this->article_model->show_list_category()->result_array();
		$data['title'] = ' INSERT ARTICLE';   
        $data['main'] = 'backend/Article';
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
        $this->form_validation->set_rules('title', 'Judul Article', 'required|min_length[3]|max_length[200]');
        $this->form_validation->set_rules('description', 'Isi Article', 'required|min_length[3]');
        $this->form_validation->set_rules('author', 'Penulis', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('status', 'Status', 'required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('id_category', 'Category', 'required|min_length[1]|max_length[4]');
        if ($this->form_validation->run() == FALSE)
    {
        $data['list_category'] = $this->article_model->show_list_category()->result_array();
		$data['title'] = ' INSERT ARTICLE';   
        $data['main'] = 'backend/Article';
        $this->load->view('backend/Main_v', $data);
    }
		else
		{
        $config['upload_path'] = './assets/foto/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|bmp';
        $config['max_size'] = '40000';
        $config['max_width'] = '4024';
        $config['max_height'] = '4768';
        $this->upload->initialize($config);
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
        $foto = $upload['file_name'];
		$data = array(
            'id_category' => $this->input->post('id_category'),
            'date_post' => date("Y-m-d H:i:s"),
            'description' => $this->input->post('description'),
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'status' => $this->input->post('status'),
            'foto' => $foto 
			);
		$create = $this->db->insert('article',$data);
        if ($create) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
      redirect('backend/article/cek'); 	
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
           $multiple = $this->article_model->multiple_delete();
       if (!$multiple) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Proses Success</button></p></strong></div>");
     else $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Data success deleted.</button></p></strong></div>");
  redirect('backend/article/cek');     
        
    }
      function edit_article()
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
        $id_article = $this->uri->segment(4);
        $data['id_category'] = $this->article_model->show_id_category($id_article)->result_array();
		$data['single_article'] = $this->article_model->show_article_id($id_article);
		$data['title'] = ' EDIT ARTICLE';   
        $data['main'] = 'backend/Edit_article';
        $this->load->view('backend/Main_v', $data);

}
function update_article($id_article) 
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
         $data = array(
                'id_category' => $this->input->post('id_category'),
                'title' => $this->input->post('title'),
                'author' => $this->input->post('author'),
                'status' => $this->input->post('status'),
                'description' => $this->input->post('description'),
                'date_post' => date("Y-m-d H:i:s")
            );
            if(empty($_FILES['foto']['name']))
                {
        $this->db->where('id_article', $id_article);
        $this->db->update('article',$data);
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
                redirect('backend/article/cek');    
            }
       else
            {
        $config['upload_path'] = './assets/foto/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '40000';
        $config['max_width'] = '4024';
        $config['max_height'] = '4768';
        $this->upload->initialize($config);
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
        $foto = $upload['file_name'];
        $data = array(
                'id_category' => $this->input->post('id_category'),
                'title' => $this->input->post('title'),
                'author' => $this->input->post('author'),
                'status' => $this->input->post('status'),
                'description' => $this->input->post('description'),
                'date_post' => date("Y-m-d H:i:s"),
                'foto' => $foto     
            );
            $this->db->where('id_article', $id_article);
            $this->db->update('article',$data);
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
                 redirect('backend/article/cek');    
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
        $config['base_url'] = site_url('backend/article/cek');
        $config['total_rows'] = $this->db->count_all('article');
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
        $data['article'] = $this->article_model->get_article_list($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();    
        $data['title'] = ' LIST ARTICLE';   
        $data['main'] = 'backend/List_article';
        $this->load->view('backend/Main_v', $data);
      } 
      function delete($id_article){
        $this->db->where('id_article',$id_article);
        $query = $this->db->get('article');
        $row = $query->row();
        $this->db->where('id_article', $id_article);
        unlink("./assets/foto/$row->foto");
        $this->db->delete('article', array('foto' => $id_article));
        $this->db->where('id_article', $id_article);
        $delete =  $this->db->delete('article');
        if (!$delete) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something wrong!</button></p></strong></div>");
         
        else
            $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
            redirect('backend/article/cek');  
        }
    
}