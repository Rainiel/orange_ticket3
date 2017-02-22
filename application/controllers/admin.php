<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class admin extends CI_Controller
{
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
        	if($this->session->userdata('Acc_type') == 'Admin')
                {
				$this->load->view('includes/header');
				$this->load->view('includes/navBar');
				$this->load->view('includes/sidebar');
				$this->load->view('admin/adminTickets');
				$this->load->view('includes/footer');
				}
			if($this->session->userdata('Acc_type') == 'user')
                {
                $this->load->view('includes/header');
				$this->load->view('includes/navBar');
				$this->load->view('user/userSidebar');
				$this->load->view('user/userTickets');
				$this->load->view('includes/footer');
				}
		}
		else
		{
			redirect('');
		}
	}
}
