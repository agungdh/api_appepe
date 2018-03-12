<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index() {
		$data['isi'] = "jenis/index";
		$data['data']['jenis'] = $this->db->get('jenis')->result();
		
		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['isi'] = "jenis/tambah";
		
		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		$data['jenis'] = $this->input->post('jenis');
		$this->db->insert('jenis', $data);

		redirect(base_url('jenis'));
	}

	function ubah($id) {
		$data['isi'] = "jenis/ubah";
		$where['id'] = $id;
		$data['data']['jenis'] = $this->db->get_where('jenis', $where)->row();
		
		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$data['jenis'] = $this->input->post('jenis');
		$where['id'] = $this->input->post('id');
		$this->db->update('jenis', $data, $where);

		redirect(base_url('jenis'));
	}

	function aksi_hapus($id) {
		$where['id'] = $id;
		$this->db->delete('jenis', $where);

		redirect(base_url('jenis'));
	}

}
