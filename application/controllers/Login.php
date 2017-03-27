<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function login_validation()
	{
		$this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required|callback_validate_credentials');
        $this->form_validation->set_rules('password','Password','required');

        // $rules['username'] = 'trim|required|callback_validate_credentials';
        // $rules['password'] = 'trim|required';

        //$this->form_validation->set_rules();

        if($this->form_validation->run())
        {  
          if($this->session->userdata('Acc_type') == 'Admin')
                {
                redirect('Dashboard');
                }
          if($this->session->userdata('Acc_type') == 'Sub-Admin')
                {
                redirect('Tickets');
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

        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $return = $this->Tickets_model->checklogin($username, $password);

        if($return != false)
        {
            extract($return);

          $data_ses = array(
            'userID'        =>      $userId,
            'username'      =>      $username,
            'ufname'        =>      $fname,
            'Acc_type'      =>      $account_type,
            'Team'          =>      $team,
            'is_logged_in'  =>      TRUE
          );
          $this->session->set_userdata($data_ses);
          $UserId = $this->session->userdata('userID');
          $this->Tickets_model->checkOnline($UserId);
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
        $this->load->model('Tickets_model');
        $UserId = $this->session->userdata('userID');
        $this->Tickets_model->checkOffline($UserId);
        $this->session->sess_destroy();  
        redirect('');
    }

}
