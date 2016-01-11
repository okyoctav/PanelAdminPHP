<?php

class Login_model extends CI_Model{

public function check($username){
		$query = $this->db->query("SELECT * FROM admin WHERE username='$username' LIMIT 1");;
		if($query -> num_rows() == 1)
			{
				return $query->result();
			}else{	
				return FALSE;
			}
}

function login($username,$password)
{
  	$query = $this->db->query("SELECT * FROM admin WHERE username='$username' AND password='$password' AND aktif='1' LIMIT 1");
	if($query -> num_rows() == 1)
{
	return $query->result();

}else{
	
	return false;
}

}
	
	public function form_insert($data){
		// Inserting in Table(admin) of Database(college)
		$this->db->insert('admin', $data);
	}
	
}
?>