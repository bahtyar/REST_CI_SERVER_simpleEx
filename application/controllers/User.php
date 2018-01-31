<?php

require APPPATH . '/libraries/REST_Controller.php';
// use Restserver\Libraries\REST_Controller;

class user extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);        
    }

    // show data pasien
    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $pasien = $this->db->get('user')->result();
        } else {
            $this->db->where('id', $id);
            $pasien = $this->db->get('user')->result();
        }
        $this->response($pasien, 200);
    }

    // insert new data to pasien
    function index_post() {
        $timestamp = date('Y-m-d H:i:s');
        $this->load->model('m_user');
        $data = array(
            'id'        => $this->post('id'),
            'nama'      => $this->post('nama'),
            'status'    => $this->post('status'),
            'created'   => $timestamp,
            'updated'   => $timestamp);
        $nama = $this->post('nama');        
        if ($this->m_user->user_exists($nama)==TRUE) {
            $this->response(array('status' => 'user existed!'), 405);
        }else {
            $insert = $this->db->insert('user', $data);        
            if ($insert) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }

    //PUT daftar paasien
    function index_put() {
        $timestamp = date('Y-m-d H:i:s');
        $id = $this->put('id');
        $data = array(
            'id'        => $this->put('id'),
            'nama'      => $this->put('nama'),
            'status'    => $this->put('status'),            
            'updated'   => $timestamp);
        $this->db->where('id', $id);
        $update = $this->db->update('user', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        } 
    }

    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('user');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


}