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
		else{return false;}
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
    else{return false;}
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
        else{return false;}
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
        //$this->db->where("u.team = '$team' AND Issue = '$team'");
        $this->db->order_by("ticketId", "desc");
        $query = $this->db->get();
      } 
      if($query->num_rows()>0)
        {
          return $query->result_array();
        }
        else{return false;}
  }

  public function getTicket($id)
  {
  	//$sql="SELECT * FROM tbl_tickets WHERE ticketId = '$id'";
    $this->db->select('t.*, u.fname, u.lname, u.userId');
    $this->db->from('tbl_tickets as t');
    $this->db->join('tbl_user as u', 't.User=u.userId');
    $this->db->where('ticketId', $id);
    $query = $this->db->get();
    return $query;
  }

  public function insChat(){
    return $this->db->insert('tbl_chat');
  }

  public function Chat($TID, $UID){
    $this->db->select('c.*');
    $this->db->from('tbl_chat');
    $this->db->join('tbl_tickets as t', 'c.TID=t.ticketId');
    $this->db->join('tbl_user as u', 'c.UID=u.userId');
    $query = $this->db->query();
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else{return false;}
  }

  public function ticketGraph(){
    $query = $this->db->query("SELECT
                                (SELECT Count(*) FROM tbl_tickets WHERE Status = 'New') as New,
                                (SELECT Count(*) FROM tbl_tickets WHERE Status = 'In-progress') as Prog,
                                (SELECT Count(*) FROM tbl_tickets WHERE Status = 'On-hold') as Hold,
                                (SELECT Count(*) FROM tbl_tickets WHERE Status = 'Resolved') as Resolved,
                                (SELECT Count(*) FROM tbl_tickets WHERE Status = 'Closed') as Closed
                             ");

    if($query->num_rows() > 0){
      return $query->row_array();
      }
      else{return false;}
  }

  public function AssignToNewSA(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where("account_type = 'Sub-Admin' AND Tickets = 0");
        $query = $this->db->get();
        if($query->num_rows()>0){
          return $query->result_array();
        }
        else{return false;}
    }

  public function TickCountAndSA($id){
      $this->db->select('t.AssignedTo, u.userId, u.Tickets, u.team, u.fname, u.lname, COUNT(t.AssignedTo) as tick');
      $this->db->from('tbl_user as u');
      $this->db->join('tbl_tickets as t', 't.AssignedTo=u.userId');
      //$this->db->where('team', $team);
      $this->db->where_in('AssignedTo', $id);
      $this->db->Group_by('t.AssignedTo');

      $query = $this->db->get();
      if($query->num_rows() > 0){
          return $query->result_array();
        }
      else{return false;}
  }

  public function updateSAtick($id, $tick){
      $this->db->set('Tickets', $tick);
      $this->db->where('userId', $id);
      return $this->db->update('tbl_user');
  }

  public function AutoAssign($id, $team){
    $this->db->select('*');
    $this->db->from('tbl_user');
    $this->db->where("account_type = 'Sub-Admin' AND team = '$team'");
    $query = $this->db->get();
    if($query->num_rows() > 0){
    return $query->result_array();
    }
    else{return false;}
    if($result->num_rows() > 0)
        {
            $rs = $result->row_array();
        }
}
}
