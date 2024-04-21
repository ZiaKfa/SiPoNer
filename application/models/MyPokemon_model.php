<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyPokemon_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getMyPokemonByTrainerId($id)
    {
        return $this->db->get_where('mypokemon', ['trainer_id' => $id])->result_array();
    }

    public function getMyPokemonByName($name)
    {
        return $this->db->get_where('mypokemon', ['name' => $name])->row_array();
    }

    public function createMyPokemon($data)
    {
        $this->db->insert('mypokemon', $data);
        return $this->db->affected_rows();
    }

    public function updateMyPokemon($data, $name)
    {
        $this->db->update('mypokemon', $data, ['name' => $name]);
        return $this->db->affected_rows();
    }

    public function deleteMyPokemon($name)
    {
        $this->db->delete('mypokemon', ['name' => $name]);
        return $this->db->affected_rows();
    }

}