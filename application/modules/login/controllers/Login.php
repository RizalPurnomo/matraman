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

    public function register()
    {

        // $this->load->library('form_validation');
        // $this->form_validation->set_rules('user', 'Username', 'trim|required');
        // $this->form_validation->set_rules('email', 'E-Mail', 'trim|required');
        // $this->form_validation->set_rules('pass1', 'Password', 'trim|required');
        // $this->form_validation->set_rules('pass2', 'Confirm Password', 'required|matches[pass1]');

        // if ($this->form_validation->run()) {
            $user = "rhino";
            $email = "rhino@test.com";
            $pass = "Rhino.123";

            if ($this->aauth->create_user($email, $pass, $user)) {
                $this->session->set_flashdata('register_success', 'New User has been registered!');
                echo "New User has been registered!";
            } else {
                $this->session->set_flashdata('register_error', $this->aauth->get_errors_array()[0]);
                // redirect('dashboard/register/addUser');
            }
        // }
        
    }
}
