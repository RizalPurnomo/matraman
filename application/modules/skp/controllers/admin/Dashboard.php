<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Aauth');
        if (!$this->aauth->is_loggedin()) {
            redirect('login');
        }
        // $this->load->model(array('Haji_model'));
    }

    public function index()
    {
        // $data['pasien'] = $this->Haji_model->getPasienHaji();
        $this->load->view('admin/v_dashboard');
    }
}
