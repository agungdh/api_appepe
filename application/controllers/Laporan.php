<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index() {
		$data['isi'] = "laporan/index";
		$data['data']['laporan'] = $this->db->get('pelaporan')->result();
		
		$this->load->view("template/template", $data);
	}

}
