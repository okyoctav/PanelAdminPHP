<?php if (!defined('BASEPATH')) exit('No direct script allowed');

class List_Member extends CI_Controller{
function __construct() {
parent::__construct();
$this->load->model('form_model');
}

	public function index(){

			$data=array('title'=>'Tutorial','sidebar'=>'layouts/sidebar',
				'content'=>'list_member',
				'list_member'=>$this->form_model->list_member()
				);
			$this->load->view('layouts/template',$data);
		
		
		
		
		
		}
		
	
}