<?php if (!defined('BASEPATH')) exit('No direct script allowed');

class Home extends CI_Controller{

function __construct() {
parent::__construct();
$this->load->model('form_model');
$this->load->model('question_model');
}

	public function index(){
		if($this->session->userdata('logged_in')){
				$session_data=$this->session->userdata('logged_in');
	
				$data=array(
					'title'=>'Tutorial',
					'sidebar'=>'layouts/sidebar',
					'content'=>'form',
					'question'=>$this->form_model->form_question()
					);
				$this->load->view('layouts/template',$data);
				}
				else{
				redirect('login','refresh');
			}
	}
		
	public function submit_form(){
//		
//		$data=array('title'=>'Tutorial',
//			'sidebar'=>'layouts/sidebar',
//			'content'=>'form',
//			'question'=>$this->form_model->form_question()
//			);
//		
//		$data=array(
//		foreach ($list_question_demografi as $list_question_demografi )
//		{
//		'nama'=>$this->input->post('nama');
//		}
//		);
//	
//		$this->form_model->form_input1($data);
//		$this->session->set_flashdata('message', 'Data Successfully inserted');
//		Redirect('home','refresh');
//		
	}
//
//


	public function form_demografi(){

			$data=array('title'=>'Tutorial',
				'sidebar'=>'layouts/sidebar',
				'content'=>'form_demografi',
				'list_question'=>$this->question_model->list_join_demografi());
			$this->load->view('layouts/template',$data);
		
	}
		
	public function form_survei(){
		$data=array('title'=>'Tutorial','sidebar'=>'layouts/sidebar','content'=>'form_survei','list_question'=>$this->question_model->list_question_survei());
		$this->load->view('layouts/template',$data);
	
	}
	public function list_member(){
		$data=array('title'=>'Tutorial','sidebar'=>'layouts/sidebar','content'=>'list_member','list_member'=>$this->form_model->list_member());
		$this->load->view('layouts/template',$data);
	}
	
	public function chart(){
		$data=array('title'=>'Tutorial','sidebar'=>'layouts/sidebar','content'=>'list_member','list_member'=>$this->form_model->list_member());
		$this->load->view('layouts/template',$data);
	}

	public function submit_form_demografi(){
		$this->load->model('insert_model');
		$this->form_validation->set_rules('id_pertanyaan', 'id', 'required|callback_exist_check');
		$this->form_validation->set_rules('jawaban', 'Jawaban', 'required');
		
		if ($this->form_validation->run() == true)
		{
		$data=array(
				'id_user'=>$this->session->userdata['logged_in']['id'],
				'id_pertanyaan_demografi'=>$this->input->post('id_pertanyaan'),
				'jawaban_demografi'=>$this->input->post('jawaban')
				);
		$query=$this->insert_model->insert_demografi($data);

		$this->session->set_flashdata('message','<p>Jawaban anda telah tersimpan</p>');
		$up=array('title'=>'Tutorial',
				'sidebar'=>'layouts/sidebar',
				'content'=>'form_demografi',
				'list_question'=>$this->question_model->list_join_demografi());
			$this->load->view('layouts/template',$up);
		}
		else{

			$this->session->set_flashdata('error',validation_errors());
			$up=array('title'=>'Tutorial',
				'sidebar'=>'layouts/sidebar',
				'content'=>'form_demografi',
				'list_question'=>$this->question_model->list_join_demografi());
			$this->load->view('layouts/template',$up);
		}
	}
	public function exist_check($id){
		$id_user = $this->session->userdata['logged_in']['id'];
		$result = $this->form_model->check($id,$id_user);
		if($result){
			$this->form_validation->set_message('exist_check','<p class="text-center">Anda telah menjawab pertanyaan ini <br> Silahkan menjawab pertanyaan lain</p>');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function survei_exist_check($id){
		$id_user = $this->session->userdata['logged_in']['id'];
		$result = $this->form_model->check_survei($id,$id_user);
		if($result){
			$this->form_validation->set_message('survei_exist_check','<p class="text-center">Anda telah menjawab pertanyaan ini <br> Silahkan menjawab pertanyaan lain</p>');
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function submit_form_survei(){
		$this->load->model('insert_model');
		$this->form_validation->set_rules('id_pertanyaan', 'id', 'required|callback_survei_exist_check');
		$this->form_validation->set_rules('jawaban', 'Jawaban', 'required');
		
		if ($this->form_validation->run() == true)
		{
		$data=array(
				'id_user'=>$this->session->userdata['logged_in']['id'],
				'id_pertanyaan_survei'=>$this->input->post('id_pertanyaan'),
				'jawaban_survei'=>$this->input->post('jawaban')
				);

		$query=$this->insert_model->insert_survei($data);

		$this->session->set_flashdata('message','<p>Jawaban anda telah tersimpan</p>');

		$up=array('title'=>'Tutorial',
				'sidebar'=>'layouts/sidebar',
				'content'=>'form_survei',
				'list_question'=>$this->question_model->list_question_survei()
				);
			$this->load->view('layouts/template',$up);
		}
		else{

			$this->session->set_flashdata('error',validation_errors());
			$up=array('title'=>'Tutorial',
				'sidebar'=>'layouts/sidebar',
				'content'=>'form_survei',
				'list_question'=>$this->question_model->list_question_survei()
				);
			$this->load->view('layouts/template',$up);
		}
	}
	public function register(){
		$this->load->view('register');
	}
}