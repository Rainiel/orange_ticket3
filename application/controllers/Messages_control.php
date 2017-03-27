<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages_control extends CI_controller{

    public function selectPerson()
    {
        $Team = $this->session->userdata('Team');
        $Acc = $this->session->userdata('Acc_type');
        $this->load->model('Messages_model');
        $result=$this->Messages_model->select($Team, $Acc);
        echo json_encode($result);
    }

    public function privatechat()
    {
        $this->load->model('Messages_model');
        $UID = $this->session->userdata('userID');
        $result=$this->Messages_model->privatechat($UID);
        if($result != false)
         { 
            foreach($result as $DateAndTime)
             {          
                $TimeLog = date("g:i a", strtotime($DateAndTime['TimeLog']));
                $DateAndTime['TimeLog'] = $TimeLog;

                $return[] = $DateAndTime;
             }
        }    
        echo json_encode($return);
    }

    public function addChat()
    {
        $this->load->model('Messages_model');
        
        
        $UID1 = $this->input->post('UID1');
        $UID2 = $this->session->userdata('userID');

        $this->Messages_model->addChat($UID2, $UID1);
    }

    public function getAddChat()
    {
        $this->load->model('Messages_model');
        $UID = $this->input->post('UID');
        $result = $this->Messages_model->getAddChat($UID);
        echo json_encode($result);
    }

    public function addchatreply()
    {
        $this->load->model('Messages_model');

        $CHAT = $this->input->post('CHAT');
        $UID = $this->session->userdata('userID');
        $CID = $this->input->post('CID');
        $this->Messages_model->addchatreply($CHAT, $UID, $CID);
    }

    public function getPrivateChat()
    {
        $this->load->model('Messages_model');
        $CID = $this->input->post('CID');
        $UID = $this->session->userdata('userID');
        $result = $this->Messages_model->getPrivateChat($CID, $UID);
        echo json_encode($result);
    }

    public function getChatReply()
    {
        $this->load->model('Messages_model');

        $CID = $this->input->post('CID');
        
        $result = $this->Messages_model->getChatReply($CID);
        echo json_encode($result);
    }
}