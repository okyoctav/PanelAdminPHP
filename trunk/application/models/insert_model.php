<?php
class insert_model extends CI_Model{
	function __construct() {
		parent::__construct();
	}
	function form_insert($data){
		// Inserting in Table(students) of Database(college)
		$this->db->insert('students', $data);
	}

	function insert_demografi($data){
		$query = $this->db->insert('jawaban_demografi',$data);
		return $query;
	}
	function insert_survei($data){
		$query = $this->db->insert('jawaban_survei',$data);
		return $query;
	}
	function insert($table,$data){
		$query =$this->db->insert($table,$data);
		return $query;
	}
}
?>