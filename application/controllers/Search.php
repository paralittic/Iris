<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	function equipment(){
		$this->load->model('equipment_model');
	    if (isset($_GET['term'])){
	    	$q = strtolower($_GET['term']);
	    	$this->equipment_model->search_equipment($q);
	    }
	}
}