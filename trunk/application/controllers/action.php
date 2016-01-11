<?php if (!defined('BASEPATH')) exit('No direct script allowed');

class Action extends CI_Controller{

function __construct() {
	parent::__construct();
	$this->load->model('form_model');
}

public function non_aktif($id){
	$data=array(
					'aktif'=>"0"
				);
	$asd = $this->form_model->non_aktif($id,$data);
	if($asd){
		$this->session->set_flashdata('message','<p>Action berhasil</p>');
		header('location:'.base_url().'list_member');
	}else{
		$this->session->set_flashdata('error','<p>Action Gagal</p>');
		header('location:'.base_url().'list_member');
	}
}
public function aktifkan($id){
	$data=array(
					'aktif'=>"1"
				);
	$asd = $this->form_model->non_aktif($id,$data);
	if($asd){
		$this->session->set_flashdata('message','<p>Action Berhasil</p>');
		header('location:'.base_url().'list_member');
	}else{
		$this->session->set_flashdata('error','<p>Action Gagal</p>');
		header('location:'.base_url().'list_member');
	}

}

}