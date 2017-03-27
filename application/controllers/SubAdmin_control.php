<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubAdmin_control extends CI_controller{

	 public function addSubAdmin()
    {
        $this->load->model('SubAdmin_model');

        $SubAdminPass = $this->input->post('SApassword');
        $SAPassEncrypt = md5(mysqli_real_escape_string($SubAdminPass));
        $SubAdminCPass = $this->input->post('SACpassword');
        $post_data=array(
            'account_type'      => $this->input->post('Sub'),
            'fname'             => $this->input->post('SAfname'),
            'lname'       		=> $this->input->post('SAlname'),
            'username'      	=> $this->input->post('SAusername'),
            'password'          => $SAPassEncrypt,
            'team'   			=> $this->input->post('Team')
        );

        $this->SubAdmin_model->addSubAdmin($post_data, $SubAdminCPass);
    }

    public function editSubAdmin()
    {
        $this->load->model('SubAdmin_model');
        $SubAdminPass = $this->input->post('SApassword');
        $SAPassEncrypt = md5(mysqli_real_escape_string($SubAdminPass));
        $SubAdminCPass = $this->input->post('SACpassword');
        $post_data=array(
            'fname'             => $this->input->post('SAfname'),
            'lname'             => $this->input->post('SAlname'),
            'username'          => $this->input->post('SAusername'),
            'password'          => $SAPassEncrypt,
            'team'              => $this->input->post('Team')
            );

        $id=$this->input->post('id');

        $this->SubAdmin_model->editSubAdmin($post_data, $id);
    }

    public function showSubAdmin()
    {
        $return=array();
        $this->load->model('SubAdmin_model');
        $Acc_type = $this->session->userdata('Acc_type');
        $team = $this->session->userdata('Team');

        $return=$this->SubAdmin_model->showAllSubAdmin($Acc_type, $team);
           
      echo json_encode($return);
    }

    public function getSubAdmin()
    {
        $rs=array();
        $id=$this->input->post('id');
        $this->load->model('SubAdmin_model');

        $result=$this->SubAdmin_model->getSubAdmin($id);

        if($result->num_rows() > 0)
        {
            $rs = $result->row_array();
        }

        echo json_encode($rs);
    }
}