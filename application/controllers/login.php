<?php if (!defined ('BASEPATH')) exit('No direct Script Allowed');

Class Login extends CI_Controller{
public function __construct() {
parent::__construct();
$this->load->model('login_model','','TRUE');
}
public function index(){

$this->load->view('login');
}
	public function register(){
		$this->load->model('insert_model');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
		$this->form_validation->set_rules('fullname', 'Full Name', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('retype', 'Retype Password', 'required|min_length[5]');
		if ($this->form_validation->run() == true)
		{
		$dataadmin=array(
				'username'=>strtolower($this->input->post('username')),
				'password'=>md5($this->input->post('password')),
				'full_name'=>$this->input->post('fullname'),
				'alamat'=>$this->input->post('alamat'),
				'tgl_lahir'=>$this->input->post('tgl_lhr'),
				'aktif'=>"1",
				'status'=>"2"
				);

				if ($dataadmin['password']==md5($this->input->post('retype')))
					{
						$que  = $this->insert_model->insert('admin',$dataadmin);
						
						$this->session->set_flashdata('message','<p>Registrasi berhasil, Silahkan login dengan username dan password yang telah didaftarkan tadi</p>');
					    $this->load->view('login');
					}

					else
					{	
						$this->session->set_flashdata('error','<p>Password not match</p>');
						$this->load->view('register');
					}
		}
		else{

			$this->session->set_flashdata('error',validation_errors());
			$this->load->view('register');
		}
	}
public function username_check($username){
	$result = $this->login_model->check($username);
	if($result){
		$this->form_validation->set_message('username_check','Username telah digunakan, silahkan gunakan username lain !');
		return FALSE;
	}else{
		return TRUE;
	}
}
public function logout(){
$this->session->unset_userdata('logged_in');
session_destroy();
redirect('home','refresh');
}

public function submit_form(){
$this->load->library('form_validation');

$this->form_validation->set_rules('username','username','required|min_length[5]');

$this->form_validation->set_rules('password','password', 'required');

if ($this->form_validation->run() == FALSE) {
$this->load->view('login');

} else {

$username=$this->input->post('username');
$password=md5($this->input->post('password'));

$result=$this->login_model->login($username,$password);

if($result)
{

$sess_array=array();
foreach($result as $row)
{
$sess_array=array(
'id'=>$row->id_user,
'username'=>$row->username,
'fullname'=>$row->full_name,
'alamat'=>$row->alamat,
'tgl_lhr'=>$row->tgl_lahir,
'status'=>$row->status
);

$this->session->set_userdata('logged_in',$sess_array);
//$this->login_model->form_insert($data);
 redirect('Home', 'refresh');
}
return TRUE;
}
else
{

$this->session->set_flashdata('error','<p>Username / Password not match</p>');
$this->load->view('login');
}


//transfering to database


}

}


}