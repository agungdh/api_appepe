<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
// use Restserver\Libraries\REST_Controller;

class Test extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function test_post() {
        $file = $_FILES['file'];
        move_uploaded_file($file['tmp_name'], 'uploads/' . $file['name']);
        $data['file'] = $file;
        $data['pesan'] = $this->post('pesan');
        $this->response($data, 200);
     //    $data['user'] = $this->m_login->login($this->post('username'), $this->post('password'));
    	// $data['login'] = 0;
     //    if ($data['user'] != null) {
    	// 	$data['mahasiswa'] = $this->m_universal->get_id('mahasiswa', $data['user']->_id);        	
     //        $data['login'] = 1;
     //    	$this->response($data, 200);
     //    }
    }

}
?>