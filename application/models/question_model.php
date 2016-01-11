<?php 
class Question_Model extends CI_Model{
function __construct(){
parent::__construct();
}
function list_join_demografi(){
//	$this->db->join('jawaban_demografi B' , 'A.id_pertanyaan_demografi = B.id_pertanyaan_demografi','left');
//	$this->db->join('jenis_jawaban C' , 'A.id_jenis_jawaban = C.id_jenis_jawaban','left');
//	$this->db->where('B.id_pertanyaan_demografi',NULL);

//	$this->db->order_by('A.id_pertanyaan_demografi','ASC');
//	$kueri = $this->db->get('pertanyaan_demografi A');
//	return $kueri->result();

//	$query=$this->db->query("SELECT * FROM `pertanyaan_demografi` a FULL OUTER JOIN `jawaban_demografi` b ON a.id_pertanyaan_demografi=b.id_pertanyaan_demografi WHERE a.id_pertanyaan_demografi is NULL b.id_pertanyaan_demografi is NULL ORDER BY id_pertanyaan_demografi DESC");
//	return $query->result();

	$query=$this->db->query("SELECT * FROM `pertanyaan_demografi` a JOIN `jenis_jawaban` b WHERE a.id_jenis_jawaban=b.id_jenis_jawaban ORDER BY id_pertanyaan_demografi DESC");
	return $query->result();
}

function list_question_demografi(){
	$query=$this->db->query("SELECT * FROM `pertanyaan_demografi` a JOIN `jenis_jawaban` b WHERE a.id_jenis_jawaban=b.id_jenis_jawaban ORDER BY id_pertanyaan_demografi DESC");
	return $query->result();
}
function list_question_survei(){
$query=$this->db->query("SELECT * FROM `pertanyaan_survei` a JOIN `jenis_jawaban` b WHERE a.id_jenis_jawaban=b.id_jenis_jawaban ORDER BY id_pertanyaan_survei DESC");
return $query->result();
}
function edit_question_demografi($id,$data_input){

$this->db->where('id_pertanyaan_demografi', $id);
$this->db->update('pertanyaan_demografi', $data_input); 
}
function edit_question_survei($id,$data_input){

$this->db->where('id_pertanyaan_survei', $id);
$this->db->update('pertanyaan_survei', $data_input); 
}

function get_question_demografi($id){
$query=$this->db->query("SELECT * FROM pertanyaan_demografi a JOIN jenis_jawaban b WHERE id_pertanyaan_demografi=$id AND a.id_jenis_jawaban=b.id_jenis_jawaban");
return $query->result();
}

function get_question_survei($id){
$query=$this->db->query("SELECT * FROM pertanyaan_survei a JOIN jenis_jawaban b WHERE id_pertanyaan_survei=$id AND a.id_jenis_jawaban=b.id_jenis_jawaban");
return $query->result();
}

function get_option_question_demografi($id){
$query=$this->db->query("SELECT * FROM pertanyaan_demografi a JOIN jenis_jawaban b WHERE NOT id_pertanyaan_demografi =$id AND a.id_jenis_jawaban = b.id_jenis_jawaban");
return $query->result();
}

function list_option(){
$query=$this->db->query("SELECT * FROM jenis_jawaban");
return $query->result();
}
function list_optional($id){
$query=$this->db->query("SELECT * FROM option_demografi WHERE id_pertanyaan_demografi=$id");
return $query->result();
}

function insert_question_survei($data_input){
$this->db->insert('pertanyaan_survei',$data_input);

}
function insert_question_demografi($data_input){
$this->db->insert('pertanyaan_demografi',$data_input);

}
function insert_question_demografi_option($data_input){
	$this->db->insert('pertanyaan_demografi',$data_input);

	$this->db->where($data_input);
	$query = $this->db->get('pertanyaan_demografi');
	return $query->result();
}
function insert_option_demografi($data_input){
$this->db->insert('option_demografi',$data_input);

}




}