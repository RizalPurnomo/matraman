<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('Aauth');
        if (!$this->aauth->is_loggedin()) {
            redirect('login');
        }

        $this->load->model(array('User_model'));
    }

    function index()
    {
        $data['parent_id'] = '34';
        $data['module_id'] = '7';
        $data['title'] = "User";

        $data['users'] = $this->User_model->getUser();
        $data['user'] = $this->aauth->get_user();
        if (empty($_POST)) {
        } else {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('user', 'Username', 'trim|required');
            $this->form_validation->set_rules('email', 'E-Mail', 'trim|required');
            $this->form_validation->set_rules('pass1', 'Password', 'trim|required');
            $this->form_validation->set_rules('pass2', 'Confirm Password', 'required|matches[pass1]');

            if ($this->form_validation->run()) {
                $user = $this->input->post('user');
                $email = $this->input->post('email');
                $pass = $this->input->post('pass1');

                if ($this->aauth->create_user($email, $pass, $user)) {
                    $this->session->set_flashdata('register_success', 'New User has been registered!');
                } else {
                    $this->session->set_flashdata('register_error', $this->aauth->get_errors_array()[0]);
                }
            }
        }

        $this->load->view('template/admin_header');
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('v_user', $data);
        $this->load->view('template/admin_footer');
    }

    // public function addUser()
    // {
    //     $data['user'] = $this->aauth->get_user();
    //     // print_r($data);
    //     $this->load->view('v_add_user', $data);
    // }

    // public function register()
    // {

    //     $this->load->library('form_validation');
    //     $this->form_validation->set_rules('user', 'Username', 'trim|required');
    //     $this->form_validation->set_rules('email', 'E-Mail', 'trim|required');
    //     $this->form_validation->set_rules('pass1', 'Password', 'trim|required');
    //     $this->form_validation->set_rules('pass2', 'Confirm Password', 'required|matches[pass1]');

    //     if ($this->form_validation->run()) {
    //         $user = $this->input->post('user');
    //         $email = $this->input->post('email');
    //         $pass = $this->input->post('pass1');

    //         if ($this->aauth->create_user($email, $pass, $user)) {
    //             $this->session->set_flashdata('register_success', 'New User has been registered!');
    //         } else {
    //             $this->session->set_flashdata('register_error', $this->aauth->get_errors_array()[0]);
    //             // redirect('dashboard/register/addUser');
    //         }
    //     }
    //     $this->addUser();
    // }

    public function getUserById($id)
    {
        $pasien = $this->aauth->get_user($id);


        $response = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash(),
            'data' => $pasien
        );
        echo json_encode($response);
    }

    public function do_update_password($id)
    {
        $username = $this->input->post('[dataArray][username]');
        $email = $this->input->post('[dataArray][email]');
        $password = $this->input->post('[dataArray][password]');
        $valid_password = $this->cek_validasi_password($password);
        if ($valid_password) {
            $upd1 = $this->aauth->update_user($id, $email, $password, $username);
            if ($upd1) {
                $success = true;
                $result = "Data Password berhasil diupdate";
            } else {
                $success = false;
                $result = $this->aauth->get_errors_array();
            }
        } else {
            $success = false;
            $result = "Password Minimal 6 Karakter, Harus Mengandung Huruf Besar, Huruf Kecil, Angka dan Simbol";
        }

        $response = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash(),
            'success' => $success,
            'messages'   => $result
        );
        echo json_encode($response);
    }

    function cek_validasi_password($password)
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $simbol    = preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $password);

        if (!$uppercase || !$lowercase || !$number || !$simbol || strlen($password) <= 6) {
            return false;
        } else {
            return true;
        }
    }
}
