<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Profile extends MY_Controller {

		function __construct()
		{
			parent::__construct();
			$this->redirect();
		}

		
		public function index(){
			$this->data = array(
				'active' => 'profile',
				'title' => 'Profile',
				'dataId' => $this->commonmodel->getWhere('users', array('id'=>$this->sess)),
			);
			
			if($this->input->post('submit') == true){
				$image = $this->commonmodel->imageUpload('image', 'img-'.$this->rand(10), 'profile');
				$array = array(
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'updated' => date('Y-m-d H:m:s')
				);
				$this->commonmodel->update('users', $array, $this->sess);
				if($image[0]){
					$array = array(
					'image' => $image[0]
					);
					$this->commonmodel->update('users', $array, $this->sess);
				}
				$this->notification('Prifile Updated Successfully!', 'success');
			
			}			
				
			$this->page = 'admin/profile/index';
			$this->admin_layout();
		}
		
		
		public function password(){
			$this->data = array(
				'active' => 'password',
				'title' => 'Change Password',
			);
			
			if($this->input->post('submit') == true){
				$check = $this->commonmodel->getWhere('users', array('id'=>$this->sess, 'password'=>md5($this->input->post('opassword'))));
				if(!$check){
				$this->notification('You Entered Wrong Password!', 'danger');
				}
				
				$this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[6]|max_length[12]|matches[cpassword]');
				$this->form_validation->set_rules('cpassword', 'Confirm New Password', 'trim|required');
			
				if($this->form_validation->run() == TRUE){
					$array = array(
					'password' => md5($this->input->post('password')),
					'updated' => date('Y-m-d H:m:s')
					);
					$this->commonmodel->update('users', $array, $this->sess);
					$this->notification('Password Updated Successfully!', 'success');
				}
			}
			$this->page = 'admin/profile/password';
			$this->admin_layout();
		}

		

		
	}
