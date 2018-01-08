<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * This program build for Yoka
	 * Developer : Andre Marbun S.Kom
	 */
			function __construct()
		{
	       parent::__construct();		
	        $this->load->library(array('form_validation','upload','session','encrypt'));
	        $this->load->helper(array('url','text'));
	        $this->load->model('welcome_model');   
	        $this->load->library('user_agent');
	        $this->load->database();
	}
	public function index()
	{	 if ($this->agent->is_browser())
          {
              $data["agent"] = $this->agent->browser().' '.$this->agent->version();
          }
          elseif ($this->agent->is_robot())
          {
              $data["agent"] = $this->agent->robot();
          }
          elseif ($this->agent->is_mobile())
          {
              $data["agent"] = $this->agent->mobile();
          }
          else
          {
              $data["agent"] = 'Unidentified User Agent';
          }
          
          $data['browser_server'] = $_SERVER['HTTP_USER_AGENT'];
            $platform = $this->agent->platform();
            $ip = $_SERVER['REMOTE_ADDR'];
            $date = date("Y-m-d H:i:s");
            $data = array(
            'browser' => $data["agent"],
            'platform' => $platform,
            'ip' => $ip,
            'get_date' => $date
             );
           $this->db->set("count","count+1",FALSE);
  	  $create = $this->db->insert('log',$data);
		$data['partner'] = $this->welcome_model->partner()->result_array();
		$data['video'] = $this->welcome_model->show_video()->result_array();
		$data['latest_article'] = $this->welcome_model->show_latest_article()->result_array();
		$data['all_article'] = $this->welcome_model->show_all_article("where article.status= '1'")->result_array();
		$data['media'] = $this->welcome_model->show_media()->result_array();
		$data['article'] = $this->welcome_model->show_article()->result_array();
		$data['page'] = $this->welcome_model->get_page()->result_array();
		$data['fotonya'] = $this->welcome_model->fotonya()->result_array();
		$data['slider'] = $this->welcome_model->show_slider()->result_array();
		$data['all_koment'] = $this->welcome_model->all_koment()->result_array();
		$data['slide_tunggal'] = $this->welcome_model->slide_tunggal()->result_array();
		$data['detail_pages'] = $this->welcome_model->detail_pages()->result_array();
		$data['list_pages'] = $this->welcome_model->show_list_pages()->result_array();
		$data['sambutan'] = $this->welcome_model->sambutan()->result_array();
		$data['tentangku'] = $this->welcome_model->tentangku()->result_array();
		$data['list_category'] = $this->welcome_model->show_list_category()->result_array();
		$data["main_template"] = "Main_template";
		$this->load->view('Welcome_message',$data);
	}
	public function push($id_article)
	{	
		$this->db->where("id_article",$id_article);
		$this->db->set('counter', 'counter+1', FALSE);
		$this->db->update('article');
		$data['video'] = $this->welcome_model->show_video()->result_array();
		$data['latest_article'] = $this->welcome_model->show_latest_article()->result_array();
		$data['all_article'] = $this->welcome_model->show_all_article("where article.status= '1'")->result_array();
		$data['media'] = $this->welcome_model->show_media()->result_array();
		$data['article'] = $this->welcome_model->show_article()->result_array();
		$data['page'] = $this->welcome_model->get_page()->result_array();
		$data['fotonya'] = $this->welcome_model->fotonya()->result_array();
		$data['partner'] = $this->welcome_model->partner()->result_array();
		$data['slider'] = $this->welcome_model->show_slider()->result_array();
		$data['all_koment'] = $this->welcome_model->all_koment()->result_array();
		$data['slide_tunggal'] = $this->welcome_model->slide_tunggal()->result_array();
		$data['detail_pages'] = $this->welcome_model->detail_pages()->result_array();
		$data['list_pages'] = $this->welcome_model->show_list_pages()->result_array();
		$data['sambutan'] = $this->welcome_model->sambutan()->result_array();
		$data['tentangku'] = $this->welcome_model->tentangku()->result_array();
		$data['list_category'] = $this->welcome_model->show_list_category()->result_array();
		redirect();
	}
	function commit()
{
		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>
                                                        x
                                                   </button>", "</button></div>");
        $this->form_validation->set_rules('name', 'nama', 'required|min_length[3]|max_length[225]');
        $this->form_validation->set_rules('email', 'email', 'required|min_length[3]|max_length[225]');
        $this->form_validation->set_rules('message', 'komentar', 'required|min_length[2]|max_length[225]');
        if ($this->form_validation->run() == FALSE)
    {
    		$data['partner'] = $this->welcome_model->partner()->result_array();
		$data['video'] = $this->welcome_model->show_video()->result_array();
		$data['latest_article'] = $this->welcome_model->show_latest_article()->result_array();
		$data['all_article'] = $this->welcome_model->show_all_article("where article.status= '1'")->result_array();
		$data['media'] = $this->welcome_model->show_media()->result_array();
		$data['article'] = $this->welcome_model->show_article()->result_array();
		$data['page'] = $this->welcome_model->get_page()->result_array();
		$data['fotonya'] = $this->welcome_model->fotonya()->result_array();
		$data['slider'] = $this->welcome_model->show_slider()->result_array();
		$data['all_koment'] = $this->welcome_model->all_koment()->result_array();
		$data['slide_tunggal'] = $this->welcome_model->slide_tunggal()->result_array();
		$data['detail_pages'] = $this->welcome_model->detail_pages()->result_array();
		$data['list_pages'] = $this->welcome_model->show_list_pages()->result_array();
		$data['sambutan'] = $this->welcome_model->sambutan()->result_array();
		$data['tentangku'] = $this->welcome_model->tentangku()->result_array();
		$data['list_category'] = $this->welcome_model->show_list_category()->result_array();
		$data["main_template"] = "Main_template";
		$this->load->view('Welcome_message',$data);
   		 }
		else
		{
		
		$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'message' => $this->input->post('message'),
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
                redirect('welcome'); 	
            }
        }
	}
