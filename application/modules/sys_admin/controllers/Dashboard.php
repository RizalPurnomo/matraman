<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('Aauth');
        // if (!$this->aauth->is_loggedin()) {
        //     redirect('login');
        // }

        // $this->load->model(array('Group_model'));
    }

    function index()
    {
        $data['parent_id'] = '34';
        $data['module_id'] = '7';
        $data['title'] = "Dashboard";

        $this->load->view('template/admin_header');
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('v_dashboard');
        $this->load->view('template/admin_footer');
    }


}