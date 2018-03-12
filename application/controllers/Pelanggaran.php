<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaran extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index() {
		$data['isi'] = "pelanggaran/index";
		$where['mahasiswa_id'] = $this->session->orang->id;
		$data['data']['pelanggaran'] = $this->db->get_where('pelanggaran', $where)->result();
		
		$this->load->view("template/template", $data);
	}

}
