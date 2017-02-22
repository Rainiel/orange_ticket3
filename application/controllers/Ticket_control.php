<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_control extends CI_controller{

    public function addTicket()
    {
        $this->load->model('Tickets_model');

        $post_data=array(
            'Status'        => $this->input->post('Stat'),
            'AssignedTo'    => $this->input->post('Ass'),
            'Subject'       => $this->input->post('Subj'),
            'Priority'      => $this->input->post('Prio'),
            'Issue'         => $this->input->post('Iss'),
            'Description'   => $this->input->post('Desc'),
            'User'          => $this->session->userdata('userID')
        );

        $query=$this->Tickets_model->save_ticket($post_data);

        if($query)
        {
            redirect('Tickets');
        }
        else
        {
            echo "error";
        }
    }

    public function showTickets()
    {
        $return=array();
        $this->load->model('Tickets_model');

        $result=$this->Tickets_model->showAllTickets();
         if($result != false)
         { 
            foreach($result as $Tickets )
             {          
                $Time = date("F j, Y", strtotime($Tickets['Stamp'])); 
                $Tickets['Stamp'] = $Time;  
                $return[] = $Tickets;
             }
        }      
           
      echo json_encode($return);
    }

    public function userShowTickets()
    {
        $return=array();
        $this->load->model('Tickets_model');

        $result=$this->Tickets_model->userShowAllTicket($this->session->userdata('userID'));

         if($result != false)
         { 
            foreach($result as $Tickets )
             {          
                $Time = date("F j, Y", strtotime($Tickets['Stamp'])); 
                $Tickets['Stamp'] = $Time;  
                $return[] = $Tickets;
             }
        }      
           
      echo json_encode($return);
    }

    public function getTicket()
    {
        $rs=array();
        $id=$this->input->post('id');
        $this->load->model('Tickets_model');

        $result=$this->Tickets_model->getTicket($id);

        if($result->num_rows() > 0)
        {
            $rs = $result->row_array();

            $kahitano = new DateTime($rs['Stamp']);
            $Time = $kahitano->format('F j, Y');
            $rs['Stamp'] = $Time;

        }
        echo json_encode($rs);
    }

}