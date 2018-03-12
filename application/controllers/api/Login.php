<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
// use Restserver\Libraries\REST_Controller;

class Login extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function hash_post() {
    	$data['hash'] = hash("SHA512", $this->post('password'));

    	$this->response($data, 200);
    }

    function index_post() {
        $data['user'] = $this->m_login->login($this->post('username'), $this->post('password'));
    	$data['login'] = 0;
        if ($data['user'] != null) {
    		$data['mahasiswa'] = $this->m_universal->get_id('mahasiswa', $data['user']->_id);        	
            $data['login'] = 1;
        	$this->response($data, 200);
        }
    }

}
?>