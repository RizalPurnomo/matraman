<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Aauth');
    }

    public function index()
    {
        if ($this->aauth->is_loggedin()) {
            // echo "Dashboard";
            redirect('dashboard');
        } else {
            $this->load->view('login');
        }
    }

    public function do_login()
    {
        if ($this->aauth->is_loggedin()) {
            redirect('dashboard');
            // echo "Dashboard";
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required');

        if ($this->form_validation->run()) {
            $user = $this->input->post('username');
            $pass = $this->input->post('pass');

            if ($this->aauth->login($user, $pass)) {
                redirect('dashboard');
                // echo "Dashboard";
            } else {
                if (count($this->aauth->get_errors_array()) > 0) {
                    $err = $this->aauth->get_errors_array()[0];
                } else {
                    $err = "Error";
                }
                $this->session->set_flashdata('login_error', $err);
            }
        }
        $this->load->view('login');
    }

    public function logout()
    {
        $this->aauth->logout();
        redirect('login');
        // echo "Login";
    }
}
