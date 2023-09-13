<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blank extends MY_Controller
{

    public function index()
    {
        $this->load->view('vw_produk');
    }
}
