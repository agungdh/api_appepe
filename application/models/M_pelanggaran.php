<?php
class M_pelanggaran extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_mahasiswa($mahasiswa_id){
		$sql = "SELECT pg.mahasiswa_id, jn.jenis, pl.tanggal, concat(day(pl.tanggal), '-', month(pl.tanggal), '-', year(pl.tanggal)) tanggal_indo
				FROM pelaporan pl, pelanggaran pg, jenis jn, mahasiswa mh
				WHERE pg.pelaporan_id = pl.id
				AND pg.jenis_id = jn.id
				AND pg.mahasiswa_id = mh.id
				AND pg.mahasiswa_id = ?";
		$query = $this->db->query($sql, array($mahasiswa_id));
		$row = $query->result();

		return $row;
	}

}
?>