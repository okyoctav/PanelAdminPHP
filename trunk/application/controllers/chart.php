<?php if (!defined('BASEPATH')) exit('No direct script allowed');

class Chart extends CI_Controller{
function __construct() {
parent::__construct();
//$this->load->model('form_model');
}

	public function index(){
	
			$data=array('title'=>'Tutorial',
				'sidebar'=>'layouts/sidebar',
				'content'=>'chart_view'
				//'list_question_demografi'=>$this->question_model->list_question_demografi()
				);
			$this->load->view('layouts/template',$data);
		}
}