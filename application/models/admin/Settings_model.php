<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Settings_model extends CI_Model {
		
		
		function site_settings(){

			
		}

		function get_settings(){
			return $this->db->get('site_settings')->row();
		}
}