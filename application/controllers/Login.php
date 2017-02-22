<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function login_validation()
	{
		$this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','trim|required|callback_validate_credentials');
        $this->form_validation->set_rules('password','Password','trim|required');

        if($this->form_validation->run())
        {  
          if($this->session->userdata('Acc_type') == 'Admin')
                {
                redirect('Dashboard');
                }
          if($this->session->userdata('Acc_type') == 'user')
                {
                redirect('Tickets');
                }
        }
        else
        {
          redirect('');
        }
	}

	public function validate_credentials()
    {
        $this->load->model('Tickets_model');

        $return = $this->Tickets_model->checklogin();

        if($return != false)
        {
            extract($return);

          $data_ses = array(
            'userID'        =>      $userId,
            'username'      =>      $username,
            'ufname'        =>      $fname,
            'Acc_type'      =>      $account_type,
            'is_logged_in'  =>      TRUE
          );
          $this->session->set_userdata($data_ses);
         return true;
        }
        else
        {
          $this->form_validation->set_message('validate_credentials','incorrect username/password');
          return false;
        }
    }

    public function loggingin()
    {
        if($this->session->userdata('is_logged_in'))
        {
          redirect('Dashboard');
        }
        else
        {
        redirect('');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();  
        redirect('');
    }

}
