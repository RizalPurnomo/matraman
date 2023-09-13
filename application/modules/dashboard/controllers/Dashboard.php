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
    }

    public function index()
    {
        // $data['tinggi'] = $this->Gizi_model->getTinggiBadan();
        $this->load->view('v_dashboard');
        // echo "DASHBOARD";
    }
}
