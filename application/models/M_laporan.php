<?php
class M_laporan extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_mahasiswa($pelaporan_id){
		$sql = "SELECT *
				FROM mahasiswa
				WHERE id NOT IN 
				(SELECT mahasiswa_id
				FROM pelanggaran
				WHERE pelaporan_id = ?)";
		$query = $this->db->query($sql, array($pelaporan_id));
		$row = $query->result();

		return $row;
	}

}
?>