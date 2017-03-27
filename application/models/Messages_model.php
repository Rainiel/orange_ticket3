<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages_model extends CI_Model {

    public function select($Team, $Acc)
  {
    $query = $this->db->query("SELECT * FROM tbl_user WHERE account_type != 'user' AND team = '$Team'");
    if($Acc == 'Admin'){
      $query = $this->db->query("SELECT * FROM tbl_user WHERE account_type != 'user'");
    }
    if($query->num_rows()>0){
      return $query->result_array();
    }
    else{return false;}
  }

  public function privatechat($UID)
  {
    $query = $this->db->query("SELECT u.userId, u.fname, u.lname, u.Online, u.TimeLog, c.CID,
                              (SELECT cr.chat FROM tbl_chatreply AS cr WHERE cr.CID=c.CID ORDER BY cr.CRID DESC LIMIT 1) AS LastR
                              FROM tbl_user as u, tbl_chat as c, tbl_chatreply as cr
                              WHERE
                              CASE
                              WHEN c.UID1 = '$UID'
                              THEN c.UID2 = u.userId
                              WHEN c.UID2 = '$UID'
                              THEN c.UID1 = u.userId
                              END
                              AND
                              c.CID = cr.CRID
                              AND
                              (c.UID1 = '$UID' OR c.UID2 = '$UID') ORDER BY c.CID DESC
    ");
    if($query->num_rows()>0){
      return $query->result_array();
    }
    else{return false;}
  }

  public function addChat($UID2, $UID1)
  {
    $query = $this->db->query("SELECT * FROM tbl_chat WHERE UID1 = '$UID1' AND UID2 = '$UID2' OR UID1 = '$UID2' AND UID2 = '$UID1'");
    if ($query->num_rows()==0){
    $this->db->set('UID1', $UID1);
    $this->db->set('UID2', $UID2);
    return $this->db->insert('tbl_chat');
    }
  }

  public function getAddChat($UID)
  {
    $query = $this->db->query("SELECT CID FROM tbl_chat WHERE UID1 = '$UID' OR UID2 = '$UID'");
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else{return false;}
  }

  public function addchatreply($CHAT, $UID, $CID)
  {
    $this->db->set('CHAT', $CHAT);
    $this->db->set('UID', $UID);
    $this->db->set('CID', $CID);
    $this->db->insert('tbl_chatreply');
  }

  public function getPrivateChat($CID, $UID)
  {
    $query = $this->db->query("SELECT u.userId, u.fname, u.lname, u.Online, c.CID
                              FROM tbl_user as u, tbl_chat as c, tbl_chatreply as cr
                              WHERE
                              CASE
                              WHEN c.UID1 = '$UID'
                              THEN c.UID2 = u.userId
                              WHEN c.UID2 = '$UID'
                              THEN c.UID1 = u.userId
                              END
                              AND
                              c.CID = '$CID'
                              AND
                              (c.UID1 = '$UID' OR c.UID2 = '$UID') GROUP BY c.CID");
    if($query->num_rows()>0){
      return $query->row_array();
    }
    else{return false;}
  }

  public function getChatReply($CID)
  {
    $query = $this->db->query("SELECT cr.CRID, cr.CHAT, cr.UID
                               
                               FROM tbl_chatreply AS cr
                               
                               WHERE CID = '$CID' ORDER BY CRID ASC");
    if($query->num_rows()>0){
      return $query->result_array();
    }
    else{return false;}
  }

}