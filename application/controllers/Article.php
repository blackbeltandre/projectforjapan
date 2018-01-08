<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	/**
	 * This program build for Yustin Arlette
	 * Developer : Andre Marbun S.Kom
	 */
			function __construct()
	{
		parent::__construct();		
		$this->load->library(array('form_validation','upload','session','encrypt'));
        $this->load->helper(array('url','text'));
        $this->load->model('welcome_model');   
        $this->load->database();
	}function label($id)
	{	
		$data["title"] = "Article";
		$data['komentar'] = $this->welcome_model->komentar()->result_array();
		$data["page"] =  $this->welcome_model->GetContent("where pages.id = '$id'")->result_array();	
		$this->db->where("id",$id);
		$this->db->set('counter', 'counter+1', FALSE);
		$this->db->update('pages');
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
		$data['list_category'] = $this->welcome_model->show_list_category()->result_array();
		$data['replay_komen'] = $this->welcome_model->replay_komen($id)->result_array();
		$data['all_koment'] = $this->welcome_model->all_koment()->result_array();
		$data["main_template"] = "View_detail";
		$this->load->view('Welcome_template',$data);
	}
	public function index()
	{	
		$config['base_url'] = site_url('article/index/');
        $config['total_rows'] = $this->db->select("*")->from("article")->where("status=1")->count_all_results('');
        $config['per_page'] = "3";
        $config["uri_segment"] = 3;
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
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['article_category'] = $this->welcome_model->get_category_list($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();    
		$data["title"] = "Article";
		$data['article'] = $this->welcome_model->show_article()->result_array();
		$data['slider'] = $this->welcome_model->show_slider()->result_array();
		$data['slide_tunggal'] = $this->welcome_model->slide_tunggal()->result_array();
		$data['detail_pages'] = $this->welcome_model->detail_pages()->result_array();
		$data['list_pages'] = $this->welcome_model->show_list_pages()->result_array();
		$data['sambutan'] = $this->welcome_model->sambutan()->result_array();
		$data['tentangku'] = $this->welcome_model->tentangku()->result_array();
		$data['profil'] = $this->welcome_model->show_profil()->result_array();
		$data['komentar'] = $this->welcome_model->komentar()->result_array();
		$data['all_article'] = $this->welcome_model->show_all_article("where article.status= '1'")->result_array();
		$data['jasa'] = $this->welcome_model->show_jasa()->result_array();
		$data['list_pages'] = $this->welcome_model->show_list_pages()->result_array();
		$data['list_category'] = $this->welcome_model->show_list_category()->result_array();
		$data['latest_article'] = $this->welcome_model->show_latest_article()->result_array();
		$data['all_koment'] = $this->welcome_model->all_koment()->result_array();
		$data["main_template"] = "View_article_category";
		$this->load->view('Welcome_template',$data);
	}
	public function detail($id_article)
	{	
		$data['all_koment'] = $this->welcome_model->all_koment()->result_array();
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
		$data['tags_category'] = $this->welcome_model->tags_category($id_article)->result_array();
		$data['latest_article'] = $this->welcome_model->show_latest_article()->result_array();
		$data['article'] = $this->welcome_model->show_article()->result_array();
		$data["title"] = "Article Detail";
		$data['komentar'] = $this->welcome_model->komentar()->result_array();
		$data["article_detail"] =  $this->welcome_model->Get_detail_article("where article.id_article = '$id_article' and status=1")->result_array();	
		$this->db->where("id_article",$id_article);
		$this->db->set('counter', 'counter+1', FALSE);
		$this->db->update('article');
		$data['list_article_detail_id'] = $this->welcome_model->list_article_detail_id($id_article)->result_array();                    
		$data['all_article'] = $this->welcome_model->show_all_article("where article.status= '1'")->result_array();
		$data['profil'] = $this->welcome_model->show_profil()->result_array();
		$data['jasa'] = $this->welcome_model->show_jasa()->result_array();
		$data['replay_komentar'] = $this->welcome_model->replay_komentar($id_article)->result_array();
		$data["main_template"] = "View_article_detail";
		$this->load->view('Welcome_template',$data);
	}
}
