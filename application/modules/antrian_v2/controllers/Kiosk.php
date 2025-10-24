<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kiosk extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->load->view('kiosk');
    }

}