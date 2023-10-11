<?php defined('BASEPATH') or exit('No direct script access allowed');

class test extends CI_Controller
{
    public function index()
    {
        // load from spark tool
        // $this->load->spark('recaptcha-library/1.0.1');
        // load from CI library
        $this->load->library('recaptcha');

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('recaptcha');
        } else {

            $recaptcha = $this->input->post('g-recaptcha-response');
            if (!empty($recaptcha)) {
                $response = $this->recaptcha->verifyResponse($recaptcha);
                if (isset($response['success']) and $response['success'] === true) {
                    echo "You got it!";
                }
            } else {
                echo ("<script LANGUAGE='JavaScript'>
                window.location.href='" . base_url('test') . "';
                window.alert('Please enter captcha');
                        </script>");
            }
        }
    }
}
