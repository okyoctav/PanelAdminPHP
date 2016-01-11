<?php if (!defined('BASEPATH')) exit('No direct script allowed');

class Question extends CI_Controller{
function __construct() {
parent::__construct();
$this->load->model('question_model');
}

	public function index(){

			$data=array('title'=>'Tutorial',
				'sidebar'=>'layouts/sidebar',
				'content'=>'question_view',
				'list_question_demografi'=>$this->question_model->list_question_demografi(),
				'list_question_survei'=>$this->question_model->list_question_survei());
			$this->load->view('layouts/template',$data);
		}
	public function edit_demografi($id){
		
		if($this->input->post('submit')){
		$id = $this->input->post('id_edit');
		$data_input=array(
		'pertanyaan_demografi'=>$this->input->post('pertanyaan'),
		'id_jenis_jawaban'=>$this->input->post('jenis_jawaban')
		);
		$this->question_model->edit_question_demografi($id,$data_input);
		redirect('question');
		}
		else{
			if($this->uri->segment('4') == '4'){
			$data=array('title'=>'Tutorial',
				'sidebar'=>'layouts/sidebar',
				'content'=>'question_edit_demografi',
				'list_question_demografi'=>$this->question_model->get_question_demografi($id),
				'list_option'=>$this->question_model->list_option(),
				'list_optional'=>$this->question_model->list_optional($id)
				);
			$this->load->view('layouts/template',$data);
				//buat untuk jenis pilihan
			}else{
			$data=array('title'=>'Tutorial',
				'sidebar'=>'layouts/sidebar',
				'content'=>'question_edit_demografi',
				'list_question_demografi'=>$this->question_model->get_question_demografi($id),
				'list_option'=>$this->question_model->list_option()
				);
			$this->load->view('layouts/template',$data);
			}
		}
	}
		
		
		public function new_demografi(){
			if($this->input->post('submit')){


				if($this->input->post('jenis_jawaban') !='4'){
				$data_input=array(
				'pertanyaan_demografi'=>$this->input->post('pertanyaan'),
				'id_jenis_jawaban'=>$this->input->post('jenis_jawaban')
				);
				$this->question_model->insert_question_demografi($data_input);
				redirect('question');
				}else{
					$data_input=array(
					'pertanyaan_demografi'=>$this->input->post('pertanyaan'),
					'id_jenis_jawaban'=>$this->input->post('jenis_jawaban')
					);
					$id_pr = $this->question_model->insert_question_demografi_option($data_input);
					foreach ($id_pr as $key ) {
						$id = $key->id_pertanyaan_demografi ;
					}
					$item=array(
						'id_pertanyaan_demografi'=>$id,
						'option1'=>$this->input->post('item1'),
						'option2'=>$this->input->post('item2'),
						'option3'=>$this->input->post('item3'),
						'option4'=>$this->input->post('item4')
						);
					$this->question_model->insert_option_demografi($item);
					redirect('question');
					}
				}else{
					$data=array('title'=>'Tutorial','sidebar'=>'layouts/sidebar','content'=>'question_demografi_new','list_option'=>$this->question_model->list_option());
					$this->load->view('layouts/template',$data);
				}	
		}
		
		public function new_survei(){
		if($this->input->post('submit')){
		$data_input=array(
		'pertanyaan_survei'=>$this->input->post('pertanyaan'),
		'id_jenis_jawaban'=>$this->input->post('jenis_jawaban')
		);
		$this->question_model->insert_question_survei($data_input);
		redirect('question');
		}
		else
		{
			$data=array('title'=>'Tutorial','sidebar'=>'layouts/sidebar','content'=>'question_survei_new','list_option'=>$this->question_model->list_option());
			$this->load->view('layouts/template',$data);
			}
		
		}
		
	public function edit_survei($id){
		
		if($this->input->post('submit')){
		$id = $this->input->post('id_edit');
		$data_input=array(
		'pertanyaan_survei'=>$this->input->post('pertanyaan'),
		'id_jenis_jawaban'=>$this->input->post('jenis_jawaban')
		);
		$this->question_model->edit_question_survei($id,$data_input);
		redirect('question');
		}
		else{
		
			$data=array('title'=>'Tutorial','sidebar'=>'layouts/sidebar','content'=>'question_edit_survei','list_question_survei'=>$this->question_model->get_question_survei($id),'list_option'=>$this->question_model->list_option());
			$this->load->view('layouts/template',$data);
		}
		}
		
		
	
}