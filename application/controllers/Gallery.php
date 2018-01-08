<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

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
	}
	public function index()
	{	
		$data["title"] = "GALLERY";
		$data['all_koment'] = $this->welcome_model->all_koment()->result_array();
		$data['latest_article'] = $this->welcome_model->show_latest_article()->result_array();
		$data['all_kontent_gallery'] = $this->welcome_model->all_kontent_gallery()->result_array();
		$data['all_article'] = $this->welcome_model->show_all_article("where article.status= '1'")->result_array();
		$data['video'] = $this->welcome_model->show_video()->result_array();
		$data['audio'] = $this->welcome_model->show_audio()->result_array();
		$data['foto'] = $this->welcome_model->show_foto()->result_array();
		$data['article'] = $this->welcome_model->show_article()->result_array();
		$data['slider'] = $this->welcome_model->show_slider()->result_array();
		$data['slide_tunggal'] = $this->welcome_model->slide_tunggal()->result_array();
		$data['detail_pages'] = $this->welcome_model->detail_pages()->result_array();
		$data['list_pages'] = $this->welcome_model->show_list_pages()->result_array();
		$data['sambutan'] = $this->welcome_model->sambutan()->result_array();
		$data['tentangku'] = $this->welcome_model->tentangku()->result_array();
		$data['list_category'] = $this->welcome_model->show_list_category()->result_array();
		$data["main_template"] = "Gallery";
		$this->load->view('Welcome_template',$data);
	}function detail($id)
	{	
		$data["title"] = "Article";
		$data['all_koment'] = $this->welcome_model->all_koment()->result_array();
		$data['komentar'] = $this->welcome_model->komentar()->result_array();
		$data["gallery_detail"] =  $this->welcome_model->Get_gallery_detail($id)->result_array();	
		$this->db->where("id",$id);
		$this->db->set('counter', 'counter+1', FALSE);
		$this->db->update('gallery');
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
	}
