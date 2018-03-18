<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
// use Restserver\Libraries\REST_Controller;

class Upload_laporan extends REST_Controller {

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

        $file = $_FILES['file'];

        $data['tanggal'] = $this->post('tanggal');
        $data['keterangan'] = $this->post('keterangan');
        $data['status'] = 1;
        $data['user_id'] = $this->data['login']->id;
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
        } else {
            $this->data['status'] = "0";
            $this->data['keterangan'] = "Gagal Upload";
            return;
        }

        $this->response($this->data, 200);
    }


}
?>