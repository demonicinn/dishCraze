<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Settings extends MY_Controller {

		function __construct()
		{
			parent::__construct();
			$this->redirect();
		}

		
		public function index(){
			$id = 1;
			$this->data = array(
				'active' => 'settings',
				'title' => 'Settings',
				'dataId' => $this->commonmodel->getWhere('settings', array('id'=>$id))
			);
			
			if($this->input->post('submit') == true){
				$favicon= $this->commonmodel->imageUpload('favicon', 'fav-'.$this->rand(10), 'site');
				$array = array(
				'title' => $this->input->post('title'),
				'address' => $this->input->post('address'),
				'footer_text' => $this->input->post('footer_text'),
				'admin_text' => $this->input->post('admin_text'),
				'pagi_front' => $this->input->post('pagi_front'),
				'pagi_admin' => $this->input->post('pagi_admin')
				);
				$this->commonmodel->update('settings', $array, $this->sess);
				if($favicon[0]){
					$array = array(
					'favicon' => $favicon[0]
					);
					$this->commonmodel->update('settings', $array, $this->sess);
				}
				$this->notification('Updated Successfully!', 'success');			
			}
			$this->page = 'admin/settings/index';
			$this->admin_layout();
		}
		
		

		
	}
