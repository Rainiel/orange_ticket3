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
                $Status = $this->input->post('uStatus');
                $Assign = $this->input->post('uAssign');
                $Priority =  $this->input->post('uPriority');
           
        $UID=$this->session->userdata('userID');
        $Admin = $this->session->userdata('Acc_type');
        $id=$this->input->post('TID');
        for($i=0;$i<count($id);$i++){
            //echo($id[$i]);
            $update = $this->Tickets_model->update_ticket($Admin, $Status, $Assign, $Priority, $UID, $id[$i]);
        }
        echo $Assign;
    }

    public function AssignedTo(){
        $this->load->model('Tickets_model');
        $result =$this->Tickets_model->AssignedTo();
        echo json_encode($result);
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

    public function showTickets()
    {
        $return=array();
        $stat=$this->input->post('stat');
        $Ass=$this->input->post('Ass');
        $Ass2=$this->input->post('Ass2');
        $Prio=$this->input->post('Prio');
        $Search=$this->input->post('Search');
 
        $id = $this->session->userdata('userID');
        $Acc_type = $this->session->userdata('Acc_type');
        $team = $this->session->userdata('Team');
        $this->load->model('Tickets_model');

        $result=$this->Tickets_model->showTickets($stat, $Ass, $Ass2, $Prio, $Search, $Acc_type, $id, $team);

        if($result != false)
         { 
            foreach($result as $DateAndTime)
             {          
                $Time = date("g:i a", strtotime($DateAndTime['Stamp']));
                $date = date("F j, Y", strtotime($DateAndTime['DateFiled']));
                $TimeLog = date("g:i a", strtotime($DateAndTime['TimeLog']));
                $DateAndTime['Stamp'] = $Time;
                $DateAndTime['DateFiled'] = $date;
                $DateAndTime['TimeLog'] = $TimeLog;

                $return[] = $DateAndTime;
             }
        }      
        echo json_encode($return);
    }

    public function dashboardTicks()
    {
        $this->load->model('Tickets_model');
        $result=$this->Tickets_model->dashboardTicks();
        echo json_encode($result);
    }

    public function dashboardCounts()
    {
        $this->load->model('Tickets_model');
        $result=$this->Tickets_model->dashboardCounts();
        echo json_encode($result);
    }

    // public function showTicketsSA()
    // {
    //     $this->load->model('Tickets_model');
    //     $id = $this->session->userdata('userID');
    //     $Acc_type = $this->session->userdata('Acc_type');
    //     $team = $this->session->userdata('Team');

    //     $result=$this->Tickets_model->showAllTicketsSA($Acc_type, $id, $team);

    //   echo json_encode($result);
    // }

    public function getTicket()
    {
        $rs=array();
        $id=$this->input->post('id');
        $this->load->model('Tickets_model');

        $result=$this->Tickets_model->getTicket($id);

        if($result->num_rows() > 0)
        {
            $rs = $result->row_array();

            $Stamp = new DateTime($rs['Stamp']);
            $Date = new DateTime($rs['DateFiled']);
            $Time = $Stamp->format('F j, Y');
            $Time = $Date->format('F j, Y');
            $rs['Stamp'] = $Time;
            $rs['DateFiled'] = $Time;
        }
        echo json_encode($rs);
    }

    public function updNotifMail()
    {
        $this->load->model('Tickets_model');
        $TID=$this->input->post('TID');
        $UID=$this->session->userdata('userID');
        $this->Tickets_model->updNotifMail($TID, $UID);
    }

    public function insNotifMail()
    {
        $this->load->model('Tickets_model');
        $TID = $this->input->post('TID');
        $UID = $this->session->userdata('userID');
        $this->Tickets_model->insNotifMail($TID, $UID);
    }

    public function notifMail()
    {
        $this->load->model('Tickets_model');
        $UID = $this->session->userdata('userID');
        $TID = $this->input->post('TID');
        $result=$this->Tickets_model->notifMail($TID, $UID);
        echo json_encode($result);
    }

    public function insMail()
    {
        $this->load->model('Tickets_model');
        $UID = $this->session->userdata('userID');
        $post_data=array(
           'TID'     => $this->input->post('TID'),
           'UID'     => $this->session->userdata('userID'),
           'Message' => $this->input->post('msg')
            );
        $this->Tickets_model->insMail($post_data, $UID);
    }

    public function Mail()
    {
        $return=array();
        $this->load->model('Tickets_model');
        $UID=$this->session->userdata('userID');
        $TID=$this->input->post('tick');

        $result=$this->Tickets_model->Mail($TID, $UID);

        if($result != false){
            foreach($result as $DateAndTime){
                $Time = date("F j, Y", strtotime($DateAndTime['Stamp']));
                $DateAndTime['Stamp'] = $Time;
                $return[] = $DateAndTime;
            }
        }
        echo json_encode($return);
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

    public function notifCountForSideBar(){
        $this->load->model('Tickets_model');
        $id=$this->session->userdata('userID');
        $Acc_type=$this->session->userdata('Acc_type');
        $Team=$this->session->userdata('Team');
        $Ass=$this->input->post('Ass');
        $Ass2=$this->input->post('Ass2');

        //echo $Ass;

        $result=$this->Tickets_model->notifCountForSideBar($id, $Ass, $Ass2, $Acc_type, $Team);
        echo json_encode($result);
    }

}