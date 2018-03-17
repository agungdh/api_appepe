<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_laporan');
	}

	function index() {
		$data['isi'] = "laporan/index";
		$data['data']['laporan_aktif'] = $this->db->get_where('pelaporan', array('status' => 1))->result();
		$data['data']['laporan_nonaktif'] = $this->db->get_where('pelaporan', array('status' => 0))->result();
		
		$this->load->view("template/template", $data);
	}

	function detail($id) {
		$data['isi'] = "laporan/detail";
		$data['data']['laporan'] = $this->db->get_where('pelaporan', array('id' => $id))->row();
		$data['data']['pelanggaran'] = $this->db->get_where('pelanggaran', array('pelaporan_id' => $id))->result();
		$data['data']['mahasiswa'] = $this->m_laporan->ambil_mahasiswa($id);
		$data['data']['jenis'] = $this->db->get('jenis')->result();
		
		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		$data['pelaporan_id'] = $this->input->post('pelaporan');
		$data['jenis_id'] = $this->input->post('jenis');
		$data['mahasiswa_id'] = $this->input->post('mahasiswa');
		$this->db->insert('pelanggaran', $data);
		redirect(base_url('laporan/detail/' . $data['pelaporan_id']));
	}

	function aksi_hapus($id) {
		$where['id'] = $id;
		$pelaporan_id = $this->db->get_where('pelanggaran', $where)->row()->pelaporan_id;
		$this->db->delete('pelanggaran', $where);
		redirect(base_url('laporan/detail/' . $pelaporan_id));
	}

	function status($id) {
		$where['id'] = $id;
		$pelaporan = $this->db->get_where('pelaporan', $where)->row();
		if ($pelaporan->status == 1) {
			$data['status'] = 0;
		} else {
			$data['status'] = 1;
		}
		$this->db->update('pelaporan', $data, $where);
		redirect(base_url('laporan/detail/' . $pelaporan->id));
	}

}
