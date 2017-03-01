<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubAdmin_model extends CI_Model {

  public function addSubAdmin($post_data)
  {
    return $this->db->insert('tbl_user', $post_data);
  }

   public function showAllSubAdmin($Acc_type, $team)
   {
   	 if($Acc_type == 'Admin')
      {
         $query = $this->db->get('tbl_user');
      }
	   if($Acc_type == 'Sub-Admin')
      {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('team', $team);
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

  public function getSubAdmin($id)
  {
    $sql="SELECT * FROM tbl_user WHERE userId = '$id'";
    return $this->db->query($sql);
  }

}