<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->library(array('form_validation','upload','session','encrypt'));
        $this->load->helper(array('url','text'));
        $this->load->model(array('portfolio_model','welcome_model'));   
        $this->load->database();
	}
	public function index()
	{	
		$data["title"] = "Portfolio";
		$data['komentar'] = $this->welcome_model->komentar()->result_array();
		$data['profil'] = $this->welcome_model->show_profil()->result_array();
		$data['all_article'] = $this->welcome_model->show_all_article("where article.status= '1'")->result_array();
		$data['jasa'] = $this->welcome_model->show_jasa()->result_array();
		$data['list_pages'] = $this->welcome_model->show_list_pages()->result_array();
		$data['list_portfolio'] = $this->welcome_model->show_list_portfolio()->result_array();
		$data['portfolio'] = $this->welcome_model->show_portfolio()->result_array();
/*        $data['detail_portfolio'] = $this->portfolio_model->show_detail_portfolio()->result_array();
*/		$data['list_category'] = $this->welcome_model->show_list_category()->result_array();
		$data['article'] = $this->welcome_model->show_article()->result_array();
		$data['list_article'] = $this->welcome_model->show_list_article()->result_array();
		$data["main_template"] = "Portfolio";
		$this->load->view('Welcome_template',$data);
	}
	public function detail($id_portfolio)
	{	
/*		$id_portfolio = $this->uri->segment(4);
*/		$data["title"] = "Detail Portfolio";
		$data['komentar'] = $this->welcome_model->komentar()->result_array();
		$data["detail_portfolio"] =  $this->welcome_model->show_detail_portfolio($id_portfolio)->result_array();	
		$data['all_article'] = $this->welcome_model->show_all_article("where article.status= '1'")->result_array();
		$data['profil'] = $this->welcome_model->show_profil()->result_array();
		$data['jasa'] = $this->welcome_model->show_jasa()->result_array();
		$data['list_pages'] = $this->welcome_model->show_list_pages()->result_array();
		$data['list_category'] = $this->welcome_model->show_list_category()->result_array();
		$data['article'] = $this->welcome_model->show_article()->result_array();
		$data["main_template"] = "Detail_portfolio";
		$this->load->view('Welcome_template',$data);
	}
}