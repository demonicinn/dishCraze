<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Home extends MY_Controller {
		
		public function index(){
		
			$limit = $this->settings->pagi_front;
			$page = !empty($_GET['page'])?$_GET['page']:1;
			$pageLimit = ($page * $limit) - $limit;
			$counts = $this->commonmodel->countWhere('products', array('status'=>1));
			$totalpages = ceil($counts / $limit);			
			$data = $this->commonmodel->arrayWherePagination('products', $limit, $pageLimit);
			$pagination = $this->pagination($page, $totalpages);

			$this->data = array(
				'active' => '',
				'title' => $this->settings->title,
				'dataAll' => $data,
				'pagination' => $pagination
			);
				
			$this->page = 'front/home/index';
			$this->front_layout();
		}
		
		
		
		public function rating(){
			if($_POST['action']=='rating'){
				$rating = $_POST['rating'];
				$pid = $_POST['id'];
				$cookies = $this->getCookies('rating-cookies');
				$rating1 = '';
				$check = $this->commonmodel->countWhere('rating', array('pid'=>$pid, 'cookie'=>$cookies));
				if($check){
					$status = 'you already rated this product!';
				} else {				
					$array = array(
					'cookie' => $cookies,
					'pid' => $pid,
					'rating' => $rating,
					'created' => date('Y:m:d H:m:s')
					);
					$data = $this->commonmodel->insert('rating', $array);
					if($data){
					$ratings = $this->commonmodel->getRating($pid);
					$rating1 = number_format($ratings->totalrating, 1, '.', '');
					$status = 'rate product successfully!';
					} else {
					$status = 'Server error!';
					}
				}				
				$response = array('status'=>$status, 'rating'=>$rating1);
				echo json_encode($response);				
			}		
		}
		
		
		
		
	}
