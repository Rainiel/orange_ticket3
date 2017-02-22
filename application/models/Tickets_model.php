<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets_model extends CI_Model {

	public function checklogin()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password',$this->input->post('password'));

		$query=$this->db->get('tbl_user');

		if($query->num_rows()==1){
			return $query->row_array();
		}
		else{
			return false;
		}
	}

	public function save_ticket($post_data)
	{
		return $this->db->insert('tbl_tickets', $post_data);
	}

    public function showAllTickets()
    {
      $query = $this->db->get('tbl_tickets');

      if($query->num_rows()>0)
      {
        return $query->result_array();
      }
      else
      {
        return false;
      }
    }

    public function userShowAllTicket($id)
    {
      $this->db->where('User', $id);
      $query = $this->db->get('tbl_tickets');

      if($query->num_rows()>0)
      {
        return $query->result_array();
      }
      else
      {
        return false;
      }
    }

    public function getTicket($id)
    {
    	$sql="SELECT * FROM tbl_tickets WHERE ticketId = '$id'";
    	return $this->db->query($sql);
    }
}
