<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_control extends CI_controller{

	 public function addUser()
    {
        $this->load->model('User_model');

        $UPass = $this->input->post('pass');
        $UPassEncrypt = md5(mysqli_real_escape_string($UPass));
        $UCPass = $this->input->post('cpass');

        $post_data=array(
            'account_type'      => $this->input->post('acc'),
            'fname'             => $this->input->post('Ufname'),
            'lname'       		=> $this->input->post('Ulname'),
            'username'      	=> $this->input->post('Uusername'),
            'password'          => $UPassEncrypt,
            'team'   			=> $this->input->post('Team')
        );

        $this->User_model->addUser($post_data, $UCPass);

    }

    public function editUser()
    {
        $this->load->model('User_model');
        $post_data=array(
            'fname'             => $this->input->post('Ufname'),
            'lname'             => $this->input->post('Ulname'),
            'username'          => $this->input->post('Uuser'),
            'password'          => $this->input->post('Upass')
            );

        $id=$this->input->post('id');

        $this->User_model->editUser($post_data, $id);
    }

    public function showUser()
    {
        $return=array();
        $this->load->model('User_model');
        $Acc_type = $this->session->userdata('Acc_type');
        $team = $this->session->userdata('Team');
        $return=$this->User_model->showAllUser($Acc_type, $team);
           
      echo json_encode($return);
    }

    public function getUser()
    {
        $rs=array();
        $id=$this->input->post('id');
        $this->load->model('User_model');

        $result=$this->User_model->getUser($id);

        if($result->num_rows() > 0)
        {
            $rs = $result->row_array();
        }

        echo json_encode($rs);
    }
}