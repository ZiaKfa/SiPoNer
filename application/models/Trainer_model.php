<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Trainer_model extends CI_Model {
    
        public function __construct()
        {
            $this->load->database();
        }
    
        public function getAllTrainer()
        {
            return $this->db->get('trainer')->result_array();
        }
    
        public function getTrainerById($id)
        {
            return $this->db->get_where('trainer', ['id' => $id])->row_array();
        }
    
        public function createTrainer($data)
        {
            $this->db->insert('trainer', $data);
            return $this->db->affected_rows();
        }
    
        public function updateTrainer($data, $id)
        {
            $this->db->update('trainer', $data, ['id' => $id]);
            return $this->db->affected_rows();
        }
    
        public function deleteTrainer($id)
        {
            $this->db->delete('trainer', ['id' => $id]);
            return $this->db->affected_rows();
        }

        public function getTrainerByUsername($username)
        {
            return $this->db->get_where('trainer', ['username' => $username])->row_array();
        }
}
