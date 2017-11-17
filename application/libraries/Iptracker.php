<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*********************************************************************
 * Description: Tracks the number of website visits everyday. 
 * Version: 1.0.0
 * Date Created: January 09, 2016
 * Author: gurpreet saini
 * Website: http://createideas.net
 * File: IP Tracker Library File
**********************************************************************/
class Iptracker{
		
	private $sys = null;
	
	public function __construct(){
		$this->sys	=& get_instance();
        	$this->sys->load->library('user_agent');
	        $this->sys->load->helper('cookie');	
	}
	
	private static function get_ip_address(){		
		$ip = getenv('HTTP_CLIENT_IP')?:
			getenv('HTTP_X_FORWARDED_FOR')?:
			getenv('HTTP_X_FORWARDED')?:
			getenv('HTTP_FORWARDED_FOR')?:
			getenv('HTTP_FORWARDED')?:
			getenv('REMOTE_ADDR');		
		return $ip;
	}


	private static function get_ip_location(){		
		$ip = self::get_ip_address();
		$details = json_decode(@file_get_contents("http://freegeoip.net/json/{$ip}"));
		$loc = $details->latitude.','.$details->longitude;
		if(isset($loc)){
	            $loc = $loc;
	        } else{
	            $loc = 'Unidentified Location';
	        }
		return $loc;
	}
	
	private static function get_ip_city(){		
		$ip = self::get_ip_address();
		$details = json_decode(@file_get_contents("http://freegeoip.net/json/{$ip}"));		
		if(isset($details->city)){
	            $city = $details->city;
	        } else{
	            $city = 'Unidentified City';
	        }
		return $city;
	}
	
	private static function get_ip_country(){		
		$ip = self::get_ip_address();
		$details = json_decode(@file_get_contents("http://freegeoip.net/json/{$ip}"));		
		if(isset($details->country_name)){
	            $country = $details->country_name;
	        } else{
	            $country = 'Unidentified Country';
	        }
		return $country;
	}

	private static function get_ip_region(){		
		$ip = self::get_ip_address();
		$details = json_decode(@file_get_contents("http://freegeoip.net/json/{$ip}"));		
		if(isset($details->region_name)){
	            $region = $details->region_name;
	        } else{
	            $region = 'Unidentified Region';
	        }
		return $region;
	}

	private static function get_ip_postal(){		
		$ip = self::get_ip_address();
		$details = json_decode(@file_get_contents("http://freegeoip.net/json/{$ip}"));		
		if(isset($details->zip_code)){
	            $postal = $details->zip_code;
	        } else{
	            $postal = 'Unidentified Postal';
	        }
		return $postal;
	}
	
	private function get_ci_cookies(){
		if(isset($_COOKIE['portfolio'])){
			$cookies = $_COOKIE['portfolio'];
		} else {
			$cookies = substr(md5(rand (100, 10000)), 0,35);
			self::set_cookie($cookies);
		}
		return $cookies;
	}
	
	public function set_cookie($cookies)
	{
	         $cookie = array(
	           'name'   => 'portfolio',
	           'value'  => $cookies,
	           'expire' => time() + (86400 * 30)
	        );
	     	$this->sys->input->set_cookie($cookie);	     	
	     	return $cookie;
	}		
	
	private function get_page_visits(){
		return current_url();
	}
    
    	private function get_user_agent(){        
        if ($this->sys->agent->is_browser()){
            $agent = $this->sys->agent->browser();
        }
        elseif ($this->sys->agent->is_robot()){
            $agent = $this->sys->agent->robot();
        }
        elseif ($this->sys->agent->is_mobile()){
            $agent = $this->sys->agent->mobile();
        }
        else{
            $agent = 'Unidentified User Agent';
        }
        return $agent;
    }

    private function get_user_agent_version(){        
        if ($this->sys->agent->is_browser()){
            $agent_version = $this->sys->agent->version();
        }
        else{
            $agent_version = 'Unidentified User Agent';
        }
        return $agent_version;
    }
	
	public function save_site_visit(){
		$ip 	= self::get_ip_address();
		$location = self::get_ip_location();
		$city 	= self::get_ip_city();
		$country = self::get_ip_country();
		$region = self::get_ip_region();
		$postal = self::get_ip_postal();
		$ci_cookies = self::get_ci_cookies();
		$page	= self::get_page_visits();
        	$agent  = self::get_user_agent();
        	$agent_version = self::get_user_agent_version();
		$seg    = explode("/", $page);

        //Uncomment the IF Statement if you do not want your own admin pages to be tracked. Change the value of the needle ('admin) to the segments (URI) found in your admin pages.
		if(!in_array('admin', $seg) && !in_array('chat', $seg)){	

			$data = array(
				'ip'            => $ip,
				'page_view'     => $page,
                                'user_agent'    => $agent,
                                'user_agent_version'    => $agent_version,
                                'location'      => $location,
                                'city'          => $city,
                                'country'       => $country,
                                'region'        => $region,
                                'postal'        => $postal,
                                'cookies'    => $ci_cookies, 
                                'date'          => date("Y-m-d"),
				'time'          => time()
			);
			
			$this->sys->db->insert('iptracker', $data);			
		}
	}
}
$tracker = new Iptracker();
$tracker->save_site_visit();