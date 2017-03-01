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

  public function update_ticket($post_data, $id)
  {
    $this->db->where('ticketId', $id); 
    return $this->db->update('tbl_tickets', $post_data);
  }

  public function filterTicket($stat, $Ass, $Acc_type, $id, $team)
  {
      if($Acc_type == 'Admin')
      {
        $this->db->select('t.ticketId, t.Subject, t.Issue, t.Description, t.Priority, t.User, t.Stamp, t.AssignedTo, t.Status, u1.fname as fname1, u1.lname as lname1, u2.fname as fname2, u2.lname as lname2');
        $this->db->from('tbl_tickets as t');
        $this->db->join('tbl_user as u2', 't.AssignedTo=u2.userId');
        $this->db->join('tbl_user as u1', 't.User=u1.userId');
        $this->db->order_by('ticketId', 'desc');
        //$this->db->where("Status = '$stat' AND AssignedTo = '$Ass'");
         if($stat == NULL && $Ass == NULL){
         }
         if($stat != NULL && $Ass == NULL){
          $this->db->where("Status = '$stat'");
         }
         if($stat == NULL && $Ass != NULL){
          $this->db->where("Issue = '$Ass'");
         }
         if($stat != NULL && $Ass != NULL){
          $this->db->where("Status = '$stat' AND Issue = '$Ass'");
          }
          $query = $this->db->get();
      }
      if($Acc_type == 'Sub-Admin')
      {
        $this->db->select('t.ticketId, t.Subject, t.Issue, t.Description, t.Priority, t.User, t.Stamp, t.AssignedTo, t.Status, u1.fname as fname1, u1.lname as lname1, u2.fname as fname2, u2.lname as lname2');
        $this->db->from('tbl_tickets as t');
        $this->db->join('tbl_user as u2', 't.AssignedTo=u2.userId');
        $this->db->join('tbl_user as u1', 't.User=u1.userId');
        $this->db->order_by('ticketId', 'desc');
        if($stat == NULL){
          $this->db->where("AssignedTo = '$id'");
          }
        if($stat != NULL){
          $this->db->where("AssignedTo = '$id' AND Status = '$stat'");
          }
        $query = $this->db->get();
      }
      if($Acc_type == 'user')
      {
        $this->db->select('t.ticketId, t.Subject, t.Issue, t.Description, t.Priority, t.User, t.Stamp, t.AssignedTo, t.Status, u1.fname as fname1, u1.lname as lname1, u2.fname as fname2, u2.lname as lname2');
        $this->db->from('tbl_tickets as t');
        $this->db->join('tbl_user as u2', 't.AssignedTo=u2.userId');
        $this->db->join('tbl_user as u1', 't.User=u1.userId');
        $this->db->order_by('ticketId', 'desc');
        if($stat == NULL){
          $this->db->where("User = '$id'");
          }
        if($stat != NULL){
          $this->db->where("User = '$id' AND Status = '$stat'");
          }
        $query = $this->db->get();
      }
    if($query->num_rows()>0)
    {
      return $query->result_array();
    }
    else
    {
      return false;
    }
  }

  public function showAllTickets($Acc_type, $id, $team)
  {
      if($Acc_type == 'Admin')
      {
        $this->db->select('t.*, u1.fname as fname1, u1.lname as lname1, u2.fname as fname2, u2.lname as lname2');
        $this->db->from('tbl_tickets as t');
        $this->db->join('tbl_user as u2', 't.AssignedTo=u2.userId');
        $this->db->join('tbl_user as u1 ', 't.User=u1.userId');
        $this->db->order_by("ticketId", "desc");
        $query = $this->db->get();
      }
      if($Acc_type == 'Sub-Admin')
      {
        $this->db->select('t.*, u1.fname as fname1, u1.lname as lname1, u2.fname as fname2, u2.lname as lname2');
        $this->db->from('tbl_tickets as t');
        $this->db->join('tbl_user as u2', 't.AssignedTo=u2.userId');
        $this->db->join('tbl_user as u1 ', 't.User=u1.userId');
        $this->db->where('AssignedTo', $id);
        $this->db->order_by("ticketId", "desc");
        $query = $this->db->get();
      }
      if($Acc_type == 'user')
      {
        $this->db->select('t.*, u1.fname as fname1, u1.lname as lname1, u2.fname as fname2, u2.lname as lname2');
        $this->db->from('tbl_tickets as t');
        $this->db->join('tbl_user as u2', 't.AssignedTo=u2.userId');
        $this->db->join('tbl_user as u1', 't.User=u1.userId');
        $this->db->where('t.User', $id);
        $this->db->order_by("ticketId", "desc");
        $query = $this->db->get();
      }   
      if($query->num_rows()>0)
        {
          return $query->result_array();
        }
        else
        {
          return false;
        }
  }

  public function showAllTicketsSA($Acc_type, $id, $team)
  {
      if($Acc_type == 'Admin')
      {
        $this->db->select('t.*, u1.fname as fname1, u1.lname as lname1, u2.fname as fname2, u2.lname as lname2');
        $this->db->from('tbl_tickets as t');
        $this->db->join('tbl_user as u2', 't.AssignedTo=u2.userId');
        $this->db->join('tbl_user as u1', 't.User=u1.userId');
        $this->db->order_by("ticketId", "desc");
        $query = $this->db->get();
      }
      if($Acc_type == 'Sub-Admin')
      {
        $this->db->select('t.*, u1.fname as fname1, u1.lname as lname1, u2.fname as fname2, u2.lname as lname2');
        $this->db->from('tbl_tickets as t');
        $this->db->join('tbl_user as u2', 't.AssignedTo=u2.userId');
        $this->db->join('tbl_user as u1', 't.User=u1.userId');
        $this->db->where("AssignedTo = '1' AND Issue = '$team'");
        $this->db->order_by("ticketId", "desc");
        $query = $this->db->get();
      } 
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

  public function ticketGraph(){
    $query = $this->db->query("SELECT COUNT(*) FROM tbl_tickets Where Status = 'Closed'");

    if($query->num_rows() > 0){
      foreach($query->result_array() as $row){
          //$data[] = $row;
          $row = $query->row_array();
          $count = $row['COUNT(*)'];
      }
      return $count;
      }
  }

  // public function maxID(){
  //   $query = $this->db->query("SELECT COUNT(*) FROM tbl_user");
  //   if($query->num_rows() > 0){
  //     foreach($query->result_array() as $row){
  //       $row = $query->row_array();
  //       $count = $row['COUNT(*)'];
  //     }
  //     return $count;
  //   }
  // }

  public function AutoAssign($id){

      $this->db->select('t.AssignedTo, u.userId, u.team, u.fname, u.lname, COUNT(t.AssignedTo) as tick');
      $this->db->from('tbl_tickets as t');
      $this->db->join('tbl_user as u', 't.AssignedTo=u.userId');
      $this->db->Group_by('t.AssignedTo');
      $this->db->where_in('AssignedTo', $id);

      $query = $this->db->get();
      if($query->num_rows() > 0){
          return $query->result_array();
        }
      else{
        return false;
      }
  }
}
