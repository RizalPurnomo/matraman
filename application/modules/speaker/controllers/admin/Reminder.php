<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reminder extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('Aauth');
        // if (!$this->aauth->is_loggedin()) {
        //     redirect('login');
        // }
        $this->load->model(array('Reminder_model'));
    }

    public function index()
    {
        $data['reminder'] = $this->Reminder_model->getReminder();
        $this->load->view('admin/v_reminder', $data);
    }

    function getSpeakerById($id_speaker)
    {
        $data = $this->Reminder_model->getSpeakerById($id_speaker);
        $tabel_detail = "";
        for ($i = 0; $i < count($data); $i++) {
            $tabel_detail = $tabel_detail . "
                <tr>
                    <td> " . $i + 1 . " </td>
                    <td> " . $data[$i]['jam'] . " </td>
                    <td> " . $data[$i]['hari'] . " </td>
                    <td>
                        <div class='text-center'>
                            <button type='button' title='Detail' class='btn btn-social-icon btn-info' onclick='detailSpeaker(" . $data[$i]['id_speaker_detail'] . ")'><i class='fa fa-eye'></i></button>
                        </div>
                    </td>
                </tr>
            ";
        }

        $response = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash(),
            'result'  => true,
            'detail' => $data,
            'tabel' => $tabel_detail
        );
        echo json_encode($response);
    }

    function getSpeakerDetailByIdDetail($id_speaker_detail)
    {
        $data = $this->Reminder_model->getSpeakerDetailByIdDetail($id_speaker_detail);

        $response = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash(),
            'result'  => true,
            'detail' => $data
        );
        echo json_encode($response);
    }

    function updateSpeakerDetail($id_speaker_detail)
    {
        $data = $this->input->post('[dataArray][speaker_detail]');

        $update = $this->Reminder_model->updateSpeakerDetail($data, $id_speaker_detail);
        if ($update) {
            $success = true;
            $result = "Data Speaker detail berhasil diupdate";
        } else {
            $success = false;
            $result = "Data Speaker detail gagal diupdate";
        }


        $response = array(
            'csrfName' => $this->security->get_csrf_token_name(),
            'csrfHash' => $this->security->get_csrf_hash(),
            'success' => $success,
            'messages'   => $result
        );
        echo json_encode($response);
    }
}
