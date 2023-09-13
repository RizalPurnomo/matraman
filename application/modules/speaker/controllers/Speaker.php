<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Speaker extends MY_Controller
{

    public function index()
    {
        $this->load->view('speaker');
    }
}
