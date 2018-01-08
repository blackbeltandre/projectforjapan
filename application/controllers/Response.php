<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Response extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->library(array('form_validation','upload','session','encrypt'));
        $this->load->helper(array('url','text'));
        $this->load->model('welcome_model');   
        $this->load->database();
	}
	
	function index($id_article)
{
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>
                                                        x
                                                   </button>", "</button></div>");
        $this->form_validation->set_rules('name', 'nama', 'required|min_length[2]|max_length[225]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[3]|max_length[225]');
        $this->form_validation->set_rules('message', 'komentar', 'required|min_length[3]|max_length[225]');
        if ($this->form_validation->run() == FALSE)
    {
        $data['all_koment'] = $this->welcome_model->all_koment()->result_array();
        $data['tags_category'] = $this->welcome_model->tags_category($id_article)->result_array();
        $data['slider'] = $this->welcome_model->show_slider()->result_array();
        $data['slide_tunggal'] = $this->welcome_model->slide_tunggal()->result_array();
        $data['detail_pages'] = $this->welcome_model->detail_pages()->result_array();
        $data['list_pages'] = $this->welcome_model->show_list_pages()->result_array();
        $data['sambutan'] = $this->welcome_model->sambutan()->result_array();
        $data['tentangku'] = $this->welcome_model->tentangku()->result_array();
        $data['komentar'] = $this->welcome_model->komentar()->result_array();
        $data['all_article'] = $this->welcome_model->show_all_article("where article.status= '1'")->result_array();
        $data['jasa'] = $this->welcome_model->show_jasa()->result_array();
        $data['list_pages'] = $this->welcome_model->show_list_pages()->result_array();
        $data['list_category'] = $this->welcome_model->show_list_category()->result_array();
        $data['latest_article'] = $this->welcome_model->show_latest_article()->result_array();
        $data['article'] = $this->welcome_model->show_article()->result_array();
        $data["title"] = "Article Detail";
        $data['komentar'] = $this->welcome_model->komentar()->result_array();
        $data["article_detail"] =  $this->welcome_model->Get_detail_article("where article.id_article = '$id_article' and status=1")->result_array();   
        $data['list_article_detail_id'] = $this->welcome_model->list_article_detail_id($id_article)->result_array();                    
        $data['all_article'] = $this->welcome_model->show_all_article("where article.status= '1'")->result_array();
        $data['profil'] = $this->welcome_model->show_profil()->result_array();
        $data['jasa'] = $this->welcome_model->show_jasa()->result_array();
        $data['replay_komentar'] = $this->welcome_model->replay_komentar($id_article)->result_array();
        $data["main_template"] = "View_article_detail";
        $this->load->view('Welcome_template',$data);    }
        else
        {
            $id_article = $this->uri->segment(3);
        $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'message' => $this->input->post('message'),
                'id_article' => $id_article,
                'date_sent' => date("Y-m-d H:i:s")
            );
        $create  = $this->db->insert('faq',$data);
         if ($create) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Komentar anda berhasil ditambahkan ,pesan akan ditampilkan setelah proses moderasi administrator ,terimakasih.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");

    
        redirect("article/detail/".$id_article);
                    }
        }
        function save($id)
{
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>
                                                        x
                                                   </button>", "</button></div>");
        $this->form_validation->set_rules('name', 'nama', 'required|min_length[2]|max_length[225]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[3]|max_length[225]');
        $this->form_validation->set_rules('message', 'komentar', 'required|min_length[3]|max_length[225]');
        if ($this->form_validation->run() == FALSE)
    {
        $data["title"] = "Article";
        $data['komentar'] = $this->welcome_model->komentar()->result_array();
        $data["page"] =  $this->welcome_model->GetContent("where pages.id = '$id'")->result_array();    
        $this->db->where("id",$id);
        $this->db->set('counter', 'counter+1', FALSE);
        $this->db->update('pages');
        $data['article'] = $this->welcome_model->show_article()->result_array();
        $data['slider'] = $this->welcome_model->show_slider()->result_array();
        $data['sambutan'] = $this->welcome_model->sambutan()->result_array();
        $data['tentangku'] = $this->welcome_model->tentangku()->result_array();
        $data['profil'] = $this->welcome_model->show_profil()->result_array();
        $data['latest_article'] = $this->welcome_model->show_latest_article()->result_array();
        $data['all_article'] = $this->welcome_model->show_all_article("where article.status= '1'")->result_array();
        $data['all_koment'] = $this->welcome_model->all_koment()->result_array();
        $data['jasa'] = $this->welcome_model->show_jasa()->result_array();
        $data['list_pages'] = $this->welcome_model->show_list_pages()->result_array();
        $data['list_id_pages'] = $this->welcome_model->list_id_pages($id)->result_array();
        $data['list_category'] = $this->welcome_model->show_list_category()->result_array();
        $data['replay_komen'] = $this->welcome_model->replay_komen($id)->result_array();
        $data['article'] = $this->welcome_model->show_article()->result_array();
        $data["main_template"] = "View_detail";
        $this->load->view('Welcome_template',$data);
    }
        else
        {
            $id = $this->uri->segment(3);
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'message' => $this->input->post('message'),
                'id' => $id,
                'date_sent' => date("Y-m-d H:i:s")
            );
        $create  = $this->db->insert('faq',$data);
         if ($create) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Komentar anda berhasil ditambahkan ,pesan akan ditampilkan setelah proses moderasi administrator ,terimakasih.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");

    
        redirect("article/label/".$id);
                    }
        }
        function gallery($id)
{
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>
                                                        x
                                                   </button>", "</button></div>");
        $this->form_validation->set_rules('name', 'nama', 'required|min_length[2]|max_length[225]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[3]|max_length[225]');
        $this->form_validation->set_rules('message', 'komentar', 'required|min_length[3]|max_length[225]');
        if ($this->form_validation->run() == FALSE)
    {
        $data["title"] = "Article";
        $data['all_koment'] = $this->welcome_model->all_koment()->result_array();
        $data['komentar'] = $this->welcome_model->komentar()->result_array();
        $data["gallery_detail"] =  $this->welcome_model->Get_gallery_detail($id)->result_array();   
        $data['article'] = $this->welcome_model->show_article()->result_array();
        $data['slider'] = $this->welcome_model->show_slider()->result_array();
        $data['slide_tunggal'] = $this->welcome_model->slide_tunggal()->result_array();
        $data['detail_pages'] = $this->welcome_model->detail_pages()->result_array();
        $data['sambutan'] = $this->welcome_model->sambutan()->result_array();
        $data['tentangku'] = $this->welcome_model->tentangku()->result_array();
        $data['profil'] = $this->welcome_model->show_profil()->result_array();
        $data['latest_article'] = $this->welcome_model->show_latest_article()->result_array();
        $data['all_article'] = $this->welcome_model->show_all_article("where article.status= '1'")->result_array();
        $data['jasa'] = $this->welcome_model->show_jasa()->result_array();
        $data['list_pages'] = $this->welcome_model->show_list_pages()->result_array();
        $data['list_id_pages'] = $this->welcome_model->list_id_pages($id)->result_array();
        $data['gallery_replay'] = $this->welcome_model->gallery_replay($id)->result_array();
        $data['list_category'] = $this->welcome_model->show_list_category()->result_array();
        $data['article'] = $this->welcome_model->show_article()->result_array();
        $data["main_template"] = "View_gallery_detail";
        $this->load->view('Welcome_template',$data);
    }
        else
        {
            $id_gallery = $this->uri->segment(3);
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'message' => $this->input->post('message'),
                'id_gallery' => $id_gallery,
                'date_sent' => date("Y-m-d H:i:s")
            );
        $create  = $this->db->insert('faq',$data);
         if ($create) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Komentar anda berhasil ditambahkan ,pesan akan ditampilkan setelah proses moderasi administrator ,terimakasih.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");

    
        redirect("gallery/detail/".$id);
                    }
        }
       }