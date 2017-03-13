<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets_model extends CI_Model {

	public function checklogin()
	{
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('password',$this->input->post('password'));

		$query=$this->db->get('tbl_user');

		if($query->num_rows()==1){
			return $query->row_array();
		}
		else{return false;}
	}

  public function checkOnline($UserId)
  {
    $this->db->set('Online', '1');
    $this->db->where('userId', $UserId); 
    return $this->db->update('tbl_user');
  }

  public function checkOffline($UserId)
  {
    $this->db->set('Online', '0');
    $this->db->where('userId', $UserId);
    return $this->db->update('tbl_user');
  }

	public function save_ticket($post_data)
	{
		return $this->db->insert('tbl_tickets', $post_data);
	}

  public function update_ticket($Status, $Priority, $id)
  {
    $this->db->set('Status', $Status);
    //$this->db->set('AssignedTo', $Assign);
    $this->db->set('Priority', $Priority);
    $this->db->where('ticketId', $id); 
    return $this->db->update('tbl_tickets');
  }

  public function showTickets($stat, $Ass, $Ass2, $Search, $Acc_type, $id, $team)
  {
      if($Acc_type == 'Admin')
      {
        $Where = '';
         if($stat == NULL && $Ass2 == NULL){}
         if($stat != NULL && $Ass2 == NULL){
          $Where = "WHERE t.Status = '$stat'";
         }
         if($Ass2 != NULL && $stat == NULL){
          $Where = "WHERE t.Issue = '$Ass2'";
         }
         if($stat != NULL && $Ass2 != NULL){
          $Where = "WHERE t.Status = '$stat' AND t.Issue = '$Ass2'";
         }
         if($Search != Null){
          $Where = "Where u1.fname Like '%$Search%' OR u1.lname Like '%$Search%' OR u2.fname Like '%$Search%' OR u2.lname Like '%$Search%' OR t.Subject Like '%$Search%' OR t.Issue Like '%$Search%' OR t.Priority Like '%$Search%' OR t.Status Like '%$Search%' OR t.Stamp Like '%$Search%' OR t.DateFiled Like '%$Search%'";
         }
        $query = $this->db->query("SELECT t.*, 
                                u1.fname AS fname1, u1.lname AS lname1, 
                                u2.fname AS fname2, u2.lname AS lname2,
                                u1.Online AS Online, u1.TimeLog AS TimeLog,
                                (SELECT notif FROM tbl_notifMail where TID = t.ticketId AND UID = $id) AS notif,
                                (SELECT COUNT(*) FROM tbl_notifMail WHERE TID = t.ticketId AND UID = $id) AS noticount
                                FROM tbl_tickets AS t
                                INNER JOIN tbl_user as u2 ON t.AssignedTo=u2.userId
                                INNER JOIN tbl_user as u1 on t.User=u1.userId
                                $Where
                                ORDER BY t.ticketId DESC
                  ");
      }
      if($Acc_type == 'Sub-Admin')
      {
        // $this->db->select('t.*, u1.fname as fname1, u1.lname as lname1, u2.fname as fname2, u2.lname as lname2');
        // $this->db->from('tbl_tickets as t');
        // $this->db->join('tbl_user as u2', 't.AssignedTo=u2.userId');
        // $this->db->join('tbl_user as u1', 't.User=u1.userId');
        // $this->db->order_by('ticketId', 'desc');
        $Where = '';
        if($stat == NULL && $Ass == NULL){
          $Where = "WHERE t.AssignedTo = '$id'";
        }
        if($stat != NULL){
          $Where = "WHERE t.AssignedTo = '$id' AND Status = '$stat'";
          }
        if($Ass != NULL){
          $Where = "WHERE t.Issue = '$Ass' AND t.AssignedTo != '$id'";
        }
        
        $query = $this->db->query("SELECT t.*, 
                                u1.fname AS fname1, u1.lname AS lname1, 
                                u2.fname AS fname2, u2.lname AS lname2,
                                u1.Online AS Online, u1.TimeLog AS TimeLog,
                                (SELECT notif FROM tbl_notifMail where TID = t.ticketId AND UID = $id) AS notif,
                                (SELECT COUNT(*) FROM tbl_notifMail WHERE TID = t.ticketId AND UID = $id) AS noticount
                                FROM tbl_tickets AS t
                                INNER JOIN tbl_user as u2 ON t.AssignedTo=u2.userId
                                INNER JOIN tbl_user as u1 on t.User=u1.userId
                                $Where
                                ORDER BY t.ticketId DESC
                                ");
      }
      if($Acc_type == 'user')
      {
        // $this->db->select('t.*, u1.fname as fname1, u1.lname as lname1, u2.fname as fname2, u2.lname as lname2');
        // $this->db->from('tbl_tickets as t');
        // $this->db->join('tbl_user as u2', 't.AssignedTo=u2.userId');
        // $this->db->join('tbl_user as u1', 't.User=u1.userId');
        // $this->db->order_by('ticketId', 'desc');
        $Where = '';
        if($stat == NULL){
          $Where = "WHERE t.User = '$id'";
          }
        if($stat != NULL){
          $Where = "WHERE t.User = '$id' AND t.Status = '$stat'";
          }
        $query = $this->db->query("SELECT t.*, 
                                u1.fname AS fname1, u1.lname AS lname1,
                                u2.fname AS fname2, u2.lname AS lname2,
                                u1.Online AS Online, u1.TimeLog AS TimeLog,
                                (SELECT notif FROM tbl_notifMail where TID = t.ticketId AND UID = $id) AS notif,
                                (SELECT COUNT(*) FROM tbl_notifMail WHERE TID = t.ticketId AND UID = $id) AS noticount
                                FROM tbl_tickets AS t
                                INNER JOIN tbl_user as u2 ON t.AssignedTo=u2.userId
                                INNER JOIN tbl_user as u1 on t.User=u1.userId
                                $Where
                                ORDER BY t.ticketId DESC 
                                  ");
      }
    if($query->num_rows()>0)
    {
      return $query->result_array();
    }
    else{return false;}
  }

  // public function showAllTickets($Acc_type, $id, $team)
  // {
  //     if($Acc_type == 'Admin')
  //     {

  //       $query = $this->db->query("SELECT t.*, 
  //                           u1.fname AS fname1, u1.lname AS lname1, 
  //                           u2.fname AS fname2, u2.lname AS lname2,
  //                           u1.Online AS Online, u1.TimeLog AS TimeLog,
  //                           (SELECT notif FROM tbl_notifMail where TID = t.ticketId AND UID = $id) AS notif,
  //                           (SELECT COUNT(*) FROM tbl_notifMail WHERE TID = t.ticketId AND UID = $id) AS noticount
  //                         FROM tbl_tickets AS t
  //                         INNER JOIN tbl_user as u2 ON t.AssignedTo=u2.userId
  //                         INNER JOIN tbl_user as u1 on t.User=u1.userId
  //                         ORDER BY t.ticketId DESC
  //         ");
  //     }
  //     if($Acc_type == 'Sub-Admin')
  //     {
  //       $query = $this->db->query("SELECT t.*, 
  //                           u1.fname AS fname1, u1.lname AS lname1, 
  //                           u2.fname AS fname2, u2.lname AS lname2,
  //                           u1.Online AS Online, u1.TimeLog AS TimeLog,
  //                           (SELECT notif FROM tbl_notifMail where TID = t.ticketId AND UID = $id) AS notif,
  //                           (SELECT COUNT(*) FROM tbl_notifMail WHERE TID = t.ticketId AND UID = $id) AS noticount
  //                         FROM tbl_tickets AS t
  //                         INNER JOIN tbl_user as u2 ON t.AssignedTo=u2.userId
  //                         INNER JOIN tbl_user as u1 on t.User=u1.userId
  //                         Where t.AssignedTo = $id
  //                         ORDER BY t.ticketId DESC
  //         ");
  //     }
  //     if($Acc_type == 'user')
  //     {
  //       $query = $this->db->query("SELECT t.*, 
  //                           u1.fname AS fname1, u1.lname AS lname1, 
  //                           u2.fname AS fname2, u2.lname AS lname2,
  //                           u1.Online AS Online, u1.TimeLog AS TimeLog,
  //                           (SELECT notif FROM tbl_notifMail where TID = t.ticketId AND UID = $id) AS notif,
  //                           (SELECT COUNT(*) FROM tbl_notifMail WHERE TID = t.ticketId AND UID = $id) AS noticount
  //                         FROM tbl_tickets AS t
  //                         INNER JOIN tbl_user as u2 ON t.AssignedTo=u2.userId
  //                         INNER JOIN tbl_user as u1 on t.User=u1.userId
  //                         Where t.User = $id
  //                         ORDER BY t.ticketId DESC
  //         ");
  //     }   
  //     if($query->num_rows()>0)
  //       {
  //         return $query->result_array();
  //       }
  //       else{return false;}
  // }

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

  public function dashboardTicks()
  {
    $query = $this->db->query("SELECT t.*, 
                              u1.fname as fname1, u1.lname as lname1, 
                              u2.fname as fname2, u2.lname as lname2
                              FROM tbl_tickets AS t
                              INNER JOIN tbl_user AS u2 ON t.AssignedTo=u2.userId
                              INNER JOIN tbl_user AS u1 on t.User=u1.userId
                              WHERE Status = 'New'
                              ORDER BY t.ticketId DESC
                              ");
    //$query = $this->db->get();
    if($query->num_rows()>0)
    {
      return $query->result_array();
    }
    else{return false;}
  }

  public function dashboardCounts()
  {
    $query = $this->db->query("SELECT
                                (SELECT COUNT(*) FROM tbl_tickets) AS AllTicket,
                                (SELECT COUNT(*) FROM tbl_tickets WHERE Priority = 'High') AS HighTicket,
                                (SELECT COUNT(*) FROM tbl_tickets WHERE Status = 'Closed') AS ClosedTicket
      ");
    if($query->num_rows()>0)
    {
      return $query->row_array();
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

  public function updNotifMail($TID)
  {
    $this->db->set('notif', '0');
    $this->db->where('TID', $TID);
    return $this->db->update('tbl_notifMail');
  }

  public function insNotifMail($TID, $UID)
  {
    $query = $this->db->query("SELECT * FROM tbl_notifMail WHERE TID = '$TID' AND UID = '$UID'");
    if ($query->num_rows()==0){
      $this->db->set('TID', $TID);
      $this->db->set('UID', $UID);
      $this->db->set('notif', '1');
      return $this->db->insert('tbl_notifMail');
    }
    if($query->num_rows()>0){
      $this->db->set('notif', '1');
      $this->db->where("TID = '$TID' AND UID = '$UID'");
      return $this->db->update('tbl_notifMail');
      # $this->db->affected_rows();
    }
  }

  public function notifMail($TID, $UID)
  {
    $this->db->select('notif');
    $this->db->from('tbl_notifMail');
    $this->db->affected_rows();
    $query = $this->db->get();
    if( $this->db->affected_rows()>0){
      return $query->result_array();
    }
    else{return false;}
  }

  public function insMail($post_data)
  {
    return $this->db->insert('tbl_mailtickets', $post_data);
  }

  public function Mail($TID, $UID){
    $this->db->select('m.*, u.fname, u.lname');
    $this->db->from('tbl_mailtickets as m');
    $this->db->join('tbl_tickets as t', 'm.TID=t.ticketId');
    $this->db->join('tbl_user as u', 'm.UID=u.userId');
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
