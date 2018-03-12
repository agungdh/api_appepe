<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelaporan extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index() {
		$data['isi'] = "pelaporan/index";
		$data['data']['jenis'] = $this->db->get('jenis')->result();
		
		$this->load->view("template/template", $data);
	}

	function aksi() {
		$file = $_FILES['file'];

		$data['tanggal'] = $this->input->post('tanggal');
		$data['keterangan'] = $this->input->post('keterangan');
		$data['status'] = 1;
		$data['user_id'] = $this->session->id;
		$data['mime'] = $file['type'];

		// var_dump($data);

		$this->db->insert('pelaporan', $data);
		$insert_id = $this->db->insert_id();

		$file_uri = 'uploads/' . $insert_id . '/';

		@mkdir($file_uri, 0755, true);

		$data2['lokasi_file'] = $file_uri . $file['name'];

		if (move_uploaded_file($file['tmp_name'], $data2['lokasi_file'])){
			$where['id'] = $insert_id;
			$this->db->update('pelaporan', $data2, $where);
			$this->session->set_flashdata('pesan', 'Pelaporan Berhasil !!!');
			redirect(base_url('pelaporan'));
		} else {
			return;
		}
	}
}
