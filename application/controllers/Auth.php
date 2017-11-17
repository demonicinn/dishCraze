<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	
	public function login()
	{
		$this->data = array(
			'active' => '',
			'title' => 'Login'				
		);		
		$this->page = 'auth/login';
		$this->login_layout();
	}
	
	
	public function verify() 
	{
		if($this->input->post('submit') == true){
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$check=$this->authmodel->verify($email);
			if($check){
				if($check->status==0){
					$this->notification('Your account is not activated!', 'danger');
				}
				$auth=$this->authmodel->login($email, $password);
				if($auth){
					if($auth->verify){
					$this->authmodel->update('users', $email, array('verify'=>''));
					}
					$session=array(
					'id'=>$auth->id
					);
					$this->session->set_userdata('restaurant_session', $session);
					$this->session->set_flashdata('message', 'Your are logged in successfully!');
					$this->session->set_flashdata('type', 'info');
					redirect('admin/dashboard');
				}else{	
					$this->notification('Your entered wrong password!', 'danger');				
				}
			} else
			{
				$this->notification('Your entered wrong email!', 'danger');
			}
		}		
	}
	
	public function logout(){
		$this->session->unset_userdata('restaurant_session');
		$this->session->set_flashdata('message', 'Your are logged out successfully!');
		$this->session->set_flashdata('type', 'info');
		redirect('login');
	}
	
	
	public function forgot(){
		$this->data = array(
			'active' => '',
			'title' => 'Forgot Password'				
		);
		
		if($this->input->post('submit') == true){
			$email=$this->input->post('email');
			$check=$this->authmodel->verify($email);
			if($check){
				$rand = $this->rand(20);
				$mail = $this->sendEmail($email, $rand);
				if($mail==1){
					$array = array(
					'verify' => $rand
					);
					$this->authmodel->update('users', $email, $array);
					$this->session->set_flashdata('message', 'Please check your email to Change Password!');
					$this->session->set_flashdata('type', 'success');
					redirect('login');
				} else {
				$this->notification('Email not send. Please try again!', 'danger');
				}
			} else {
			$this->notification('Your entered wrong email!', 'danger');
			}
		}
				
		$this->page = 'auth/forgot';
		$this->login_layout();
	}
	
	
	public function password($email, $code){
		$checkemail = $this->authmodel->verify($email);
		$checkcode = $this->authmodel->getWhere('users', array('email'=>$email, 'verify'=>base64_decode($code)));
		if($checkemail && $checkcode){		
			$this->data = array(
				'active' => '',
				'title' => 'Change Password'				
			);
			
			if($this->input->post('submit') == true){				
				$this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[6]|max_length[12]|matches[cpassword]');
				$this->form_validation->set_rules('cpassword', 'Confirm New Password', 'trim|required');
			
				if($this->form_validation->run() == TRUE){
					$array = array(
					'password' => md5($this->input->post('password')),
					'verify' => '',
					'updated' => date('Y-m-d H:m:s')
					);
					$this->authmodel->update('users', $email, $array);
					$this->session->set_flashdata('message', 'Password Changed Successfully!');
					$this->session->set_flashdata('type', 'success');
					redirect('login');
				}
			}
			
			$this->page = 'auth/password';
			$this->login_layout();		
		} else {
		$this->session->set_flashdata('message', 'Token has been expired!');
		$this->session->set_flashdata('type', 'danger');
		redirect('login');
		}		
	}
	
	
	
	
	
	
}
