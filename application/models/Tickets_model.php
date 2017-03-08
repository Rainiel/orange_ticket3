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

  public function filterTicket($stat, $Ass, $Ass2, $Acc_type, $id, $team)
  {
      if($Acc_type == 'Admin')
      {
        $this->db->select('t.*, u1.fname as fname1, u1.lname as lname1, u2.fname as fname2, u2.lname as lname2');
        $this->db->from('tbl_tickets as t');
        $this->db->join('tbl_user as u2', 't.AssignedTo=u2.userId');
        $this->db->join('tbl_user as u1', 't.User=u1.userId');
        $this->db->order_by('ticketId', 'desc');
        //$this->db->where("Status = '$stat' AND AssignedTo = '$Ass'");
         if($stat == NULL && $Ass2 == NULL){}
         if($stat != NULL && $Ass2 == NULL){
          $this->db->where("Status = '$stat'");
         }
         if($Ass2 != NULL && $stat == NULL){
          $this->db->where("Issue = '$Ass2'");
         }
         if($stat != NULL && $Ass2 != NULL){
          $this->db->where("Status = '$stat' AND Issue = '$Ass2'");
         }

          $query = $this->db->get();
      }
      if($Acc_type == 'Sub-Admin')
      {
        $this->db->select('t.*, u1.fname as fname1, u1.lname as lname1, u2.fname as fname2, u2.lname as lname2');
        $this->db->from('tbl_tickets as t');
        $this->db->join('tbl_user as u2', 't.AssignedTo=u2.userId');
        $this->db->join('tbl_user as u1', 't.User=u1.userId');
        $this->db->order_by('ticketId', 'desc');
        if($stat == NULL && $Ass == NULL){
          $this->db->where("AssignedTo = '$id'");
        }
        if($stat != NULL){
          $this->db->where("AssignedTo = '$id' AND Status = '$stat'");
          }
        if($Ass != NULL){
          $this->db->where("Issue = '$Ass' AND AssignedTo != '$id'");
        }
        $query = $this->db->get();
      }
      if($Acc_type == 'user')
      {
        $this->db->select('t.*, u1.fname as fname1, u1.lname as lname1, u2.fname as fname2, u2.lname as lname2');
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
        // $this->db->select('t.*, u1.fname as fname1, u1.lname as lname1, u2.fname as fname2, u2.lname as lname2');
        // $this->db->from('tbl_tickets as t');
        // $this->db->join('tbl_user as u2', 't.AssignedTo=u2.userId');
        // $this->db->join('tbl_user as u1 ', 't.User=u1.userId');
        // $this->db->order_by("ticketId", "desc");
        // $query = $this->db->get();

        $query = $this->db->query("SELECT t.*, 
                            u1.fname AS fname1, u1.lname AS lname1, 
                            u2.fname AS fname2, u2.lname AS lname2,
                            (SELECT COUNT(*) FROM tbl_notifchat where TID = t.ticketId AND UID = ?) AS noticount
                          FROM tbl_tickets AS t 
                          INNER JOIN tbl_user as u2 ON t.AssignedTo=u2.userId
                          INNER JOIN tbl_user as u1 on t.User=u1.userId
                          ORDER BY t.ticketId DESC
          ", array($id));
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
    $this->db->select('t.*, u.fname, u.lname, u.userId');
    $this->db->from('tbl_tickets as t');
    $this->db->join('tbl_user as u', 't.User=u.userId');
    $this->db->where('ticketId', $id);
    $query = $this->db->get();
    return $query;
  }

  public function delNotifChat($TID)
  {
    $this->db->where('TID', $TID);
    return $this->db->delete('tbl_notifchat');
  }

  public function insNotifChat($post_data)
  {
    return $this->db->insert('tbl_notifchat', $post_data);
  }

  public function notifChat($TID, $UID)
  {
    $this->db->select('n.*, t.ticketId');
    $this->db->from('tbl_notifchat as n');
    $this->db->join('tbl_tickets as t', 'n.TID=t.ticketId');
    $this->db->where("TID != '$TID' AND UID = '$UID'");
    $this->db->order_by('TID', 'desc');
    $this->db->Group_by('TID');
    $query = $this->db->get();
    if($query->num_rows()>0){
      return $query->result_array();
    }
    else{return false;}
  }

  public function insChat($post_data)
  {
    return $this->db->insert('tbl_chat', $post_data);
  }

  public function Chat($TID, $UID){
    $this->db->select('c.*, u.fname, u.lname');
    $this->db->from('tbl_chat as c');
    $this->db->join('tbl_tickets as t', 'c.TID=t.ticketId');
    $this->db->join('tbl_user as u', 'c.UID=u.userId');
    $this->db->where('ticketId', $TID);
    $query = $this->db->get();
    if($query->num_rows()>0){
      return $query->result_array();
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
      $this->db->select('t.AssignedTo, t.Status, u.userId, u.Tickets, u.team, u.fname, u.lname, COUNT(t.AssignedTo) as tick');
      $this->db->from('tbl_user as u');
      $this->db->join('tbl_tickets as t', 't.AssignedTo=u.userId');
      $this->db->where('Status !=', 'Closed');
      $this->db->where_in("AssignedTo = '$id'");
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
