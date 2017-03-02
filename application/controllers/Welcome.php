<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('login');
		$this->load->view('includes/footer');
		if($this->session->userdata('is_logged_in'))
        {
			if($this->session->userdata('Acc_type') == 'Admin')
                {redirect('Dashboard');}
            if($this->session->userdata('Acc_type') != 'Admin')
                {redirect('Tickets');}
<<<<<<< HEAD
            if($this->session->userdata('Acc_type') == 'User')
                {redirect('Tickets');}
=======
>>>>>>> d1a8047240d6add58cbc6abf16c72120b6ced4ff
		}
	}
}
