<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class admin extends CI_Controller{

	function Dashboard()
	{
		if($this->session->userdata('is_logged_in'))
        {
        	if($this->session->userdata('Acc_type') == 'Admin')
                {
				$this->load->view('includes/header');
				$this->load->view('includes/navBar');
				$this->load->view('includes/sidebar');
				$this->load->view('admin/adminDashboard');
				$this->load->view('includes/footer');
				}
			else
				{
				redirect('');
				}
		}
		else
		{
			redirect('');
		}
	}

	function Tickets()
	{
		if($this->session->userdata('is_logged_in'))
        {
        		$arr['tim'] = $this->session->userdata('Team');
        		$arr['accts'] = $this->session->userdata('Acc_type');
        		$arr['uid'] = $this->session->userdata('userID');
				$this->load->view('includes/header');
				$this->load->view('includes/navBar');
				$this->load->view('includes/sidebar');
				$this->load->view('admin/adminTickets', $arr);
				$this->load->view('includes/footer');
		}
		else
		{
			redirect('');
		}
	}

	function ManageTickets()
	{
		if($this->session->userdata('is_logged_in'))
        {

        	if($this->session->userdata('Acc_type') != 'user')
                {
                $user['uid'] = $this->session->userdata('userID');
				$this->load->view('includes/header');
				$this->load->view('includes/navBar');
				$this->load->view('includes/sidebar');
				$this->load->view('admin/ManageTickets', $user);
				$this->load->view('includes/footer');
				}
			else
				{

				}
		}
		else
		{
			redirect('');
		}
	}
	function SubAdminSA()
	{
		if($this->session->userdata('is_logged_in'))
        {

        	if($this->session->userdata('Acc_type') != 'user')
                {
                $user['uid'] = $this->session->userdata('userID');
				$this->load->view('includes/header');
				$this->load->view('includes/navBar');
				$this->load->view('includes/sidebar');
				$this->load->view('admin/SubAdmin', $user);
				$this->load->view('includes/footer');
				}
			else
				{

				}
		}
		else
		{
			redirect('');
		}
	}
	function Users()
	{
		if($this->session->userdata('is_logged_in'))
        {

        	if($this->session->userdata('Acc_type') != 'user')
                {
                $user['uid'] = $this->session->userdata('userID');
				$this->load->view('includes/header');
				$this->load->view('includes/navBar');
				$this->load->view('includes/sidebar');
				$this->load->view('admin/user', $user);
				$this->load->view('includes/footer');
				}
			else
				{

				}
		}
		else
		{
			redirect('');
		}
	}

	function Messages()
	{
		if($this->session->userdata('is_logged_in'))
        {
        	if($this->session->userdata('Acc_type') != 'user')
                {
				$this->load->view('includes/header');
				$this->load->view('includes/navBar');
				$this->load->view('includes/sidebar');
				$this->load->view('admin/Messages');
				$this->load->view('includes/footer');
				}
			else
				{

				}
		}
		else
		{
			redirect('');
		}
	}
}
