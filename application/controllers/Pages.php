<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pages extends MY_Controller {
		
		public function product($slug){
			$data = $this->commonmodel->getWhere('products', array('slug'=>$slug));
			
			if(isset($_COOKIE['rating-cookies'])){
			$cookies = $_COOKIE['rating-cookies'];
			$cook =  $this->commonmodel->getWhere('rating', array('cookie'=>$cookies, 'pid'=>$data->id));
			}
				
			$ratings = $this->commonmodel->getRating($data->id);
			$rating = number_format($ratings->totalrating, 1, '.', '');
					
			$this->data = array(
				'active' => '',
				'title' => ucwords(strtolower($data->title)).' - '.$this->settings->title,
				'dataId' => $data,
				'rating' => $rating,
				'ratedPro' => isset($cook)?'1':'',
				'ratingValue' => isset($cook->rating)?$cook->rating:''
			);
			
			
				
			$this->page = 'front/product/index';
			$this->front_layout();
		}
	}
