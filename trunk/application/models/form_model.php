<?php 
class Form_Model extends CI_Model{
function __construct(){
parent::__construct();
}
function form_input1($data){
$this->db->insert('data_pribadi',$data);
}
function form_question(){
$query = $this->db->query("SELECT * FROM pertanyaan_demografi");
  
return $query->result();

}
function list_member(){
$query = $this->db->query("SELECT * FROM admin ORDER BY id_user DESC");
return $query->result();
}

function count_responden(){
	$query = $this->db->query("SELECT count(username) as jml FROM admin");
	return $query->result();
}
function non_aktif($id,$data){
	$this->db->where('id', $id);
	$query = $this->db->update('admin', $data); 
	return $query;
}
public function check($id,$id_user){
		$query = $this->db->query("SELECT * FROM jawaban_demografi WHERE id_user='$id_user' AND id_pertanyaan_demografi='$id' LIMIT 1");;
		if($query -> num_rows() == 1)
			{
				return $query->result();
			}else{	
				return FALSE;
			}
}
public function check_survei($id,$id_user){
		$query = $this->db->query("SELECT * FROM jawaban_survei WHERE id_user='$id_user' AND id_pertanyaan_survei='$id' LIMIT 1");;
		if($query -> num_rows() == 1)
			{
				return $query->result();
			}else{	
				return FALSE;
			}
}




}