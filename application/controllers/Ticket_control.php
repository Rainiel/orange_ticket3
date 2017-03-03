<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_control extends CI_controller{

    public function addTicket()
    {
        $this->load->model('Tickets_model');

        date_default_timezone_set('Asia/Manila');
        $date = new DateTime();
        $post_data=array(
            'Status'        => $this->input->post('Stat'),
            'AssignedTo'    => $this->input->post('Nauto'),
            'Subject'       => $this->input->post('Subj'),
            'Priority'      => $this->input->post('Prio'),
            'DateFiled'     => $date->format('Y-m-d H:i:s'),
            'Issue'         => $this->input->post('Iss'),
            'Description'   => $this->input->post('Desc'),
            'User'          => $this->session->userdata('userID')
        );

        $this->Tickets_model->save_ticket($post_data);

    }

    public function editTicket()
    {
        $this->load->model('Tickets_model');
        $post_data=array(
                'Status'   => $this->input->post('uStatus'),
                //'AssignedTo' => $this->input->post('uAssign'),
                'Priority' => $this->input->post('uPriority')
            );

        $id=$this->input->post('TID');
        for($i=0;$i<count($id);$i++){
            echo($id[$i]);
            $update = $this->Tickets_model->update_ticket($post_data, $id[$i]);
        }
    }

    public function getEditTicket()
    {
        $this->load->model('Tickets_model');
        $post_data=array(
                'AssignedTo' => $this->input->post('uAssign'),
            );

        $id=$this->input->post('TID');
        for($i=0;$i<count($id);$i++){
            echo($id[$i]);
            $update = $this->Tickets_model->update_ticket($post_data, $id[$i]);
        }
    }

    public function filterTicket()
    {
        $return=array();
        $stat=$this->input->post('stat');
        $Ass=$this->input->post('Ass');
 
        $id = $this->session->userdata('userID');
        $Acc_type = $this->session->userdata('Acc_type');
        $team = $this->session->userdata('Team');
        $this->load->model('Tickets_model');

        $result=$this->Tickets_model->filterTicket($stat, $Ass, $Acc_type, $id, $team);

        if($result != false)
         { 
            foreach($result as $Tickets )
             {          
                $Time = date("g:i a, F j, Y", strtotime($Tickets['Stamp']));
                $date = date("F j, Y", strtotime($Tickets['DateFiled']));
                $Tickets['Stamp'] = $Time;
                $Tickets['DateFiled'] = $date;
                $return[] = $Tickets;
             }
        }      
        echo json_encode($return);
    }

    public function showTickets()
    {
        $return=array();
        $this->load->model('Tickets_model');
        $id = $this->session->userdata('userID');
        $Acc_type = $this->session->userdata('Acc_type');
        $team = $this->session->userdata('Team');

        $result=$this->Tickets_model->showAllTickets($Acc_type, $id, $team);
         if($result != false)
         { 
            foreach($result as $Tickets )
             {          
                $Time = date("g:i a, F j, Y", strtotime($Tickets['Stamp']));
                $date = date("F j, Y", strtotime($Tickets['DateFiled']));
                $Tickets['Stamp'] = $Time;
                $Tickets['DateFiled'] = $date;
                $return[] = $Tickets;
             }
        }
      echo json_encode($return);
    }

    public function showTicketsSA()
    {
        $this->load->model('Tickets_model');
        $id = $this->session->userdata('userID');
        $Acc_type = $this->session->userdata('Acc_type');
        $team = $this->session->userdata('Team');

        $result=$this->Tickets_model->showAllTicketsSA($Acc_type, $id, $team);

      echo json_encode($result);
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

    public function insChat(){
        $this->load->model('Tickets_model');
        $data = array(
           'TID'  => $this->input->post('tick'),
           'UID'  => $this->session->userdata('userID'),
           'Chat' => $this->input->post('chat')
            );
        $this->Tickets_model->insChat();
    }

     public function ticketGraph()
    {
        $this->load->model('Tickets_model');
        $result=$this->Tickets_model->ticketGraph();
  
        echo json_encode($result);
    }

    public function AssignToNewSA(){

    }

    public function TickCountAndSA()
    {   
        $this->load->model('Tickets_model');
        //$team = $this->input->post('team');
        $id = 1;

          for($i=0;$i<$id;$i++){
              echo($id[$i]);
          }
        $result=$this->Tickets_model->TickCountAndSA($id[$i]);
        echo json_encode($result);
    }

    public function updateCount(){
        $this->load->model('Tickets_model');
        $id=$this->input->post('user');
        $tick=$this->input->post('tick');

        $update = $this->Tickets_model->updateSAtick($id, $tick);
    }

    public function AutoAssign(){
        $this->load->model('Tickets_model');
        $id=$this->input->post('auto');
        $team = $this->input->post('team');

        $result=$this->Tickets_model->AutoAssign($id, $team);
        echo json_encode($result);
    }

}