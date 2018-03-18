<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
// use Restserver\Libraries\REST_Controller;

class Data_pelanggaran extends REST_Controller {

    var $data = null;

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('m_pelanggaran');

        $username = $this->post('username');
        $password = $this->post('password');
        $login = $this->m_login->login($this->post('username'), $this->post('password'));
        if ($login == null) {
            $this->data['status'] = "0";
            $this->data['keterangan'] = "Login salah";
            $this->response($this->data, 200);
            return;
        }

        $this->data['login'] = $login;
    }

    function index_post() {
        $this->data['status'] = "1";
        $this->data['pelanggaran'] = $this->m_pelanggaran->ambil_mahasiswa($this->data['login']->_id);
        $this->data['jumlah_pelanggaran'] = count($this->data['pelanggaran']);

        $this->response($this->data, 200);
    }


}
?>