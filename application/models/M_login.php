<?php
class M_login extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function login($username, $password) {
		$sql = "SELECT *
				FROM user
				WHERE username = ?
				AND password = ?
				AND level = 2";
		return $this->db->query($sql, array($username, $password))->row();
	}
}
?>