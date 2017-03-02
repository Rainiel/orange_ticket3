<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  public function addUser($post_data)
  {
    return $this->db->insert('tbl_user', $post_data);
  }

   public function showAllUser($Acc_type, $team)
   {
   	 if($Acc_type == 'Admin')
      {
         $this->db->select('*');
         $this->db->from('tbl_user');
         $this->db->where('account_type', 'user');
         $query = $this->db->get();
      }
	   if($Acc_type == 'Sub-Admin')
      {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('account_type', 'user');
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

  public function getUser($id)
  {
    $sql="SELECT * FROM tbl_user WHERE userId = '$id'";
    return $this->db->query($sql);
  }

}