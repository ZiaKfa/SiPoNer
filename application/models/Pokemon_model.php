<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pokemon_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function getAllPokemon()
    {
        return $this->db->get('pokemon')->result_array();
    }

    public function getPokemonById($id)
    {
        return $this->db->get_where('pokemon', ['id' => $id])->row_array();
    }

    public function createPokemon($data)
    {
        $this->db->insert('pokemon', $data);
        return $this->db->affected_rows();
    }

    public function updatePokemon($data, $id)
    {
        $this->db->update('pokemon', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deletePokemon($id)
    {
        $this->db->delete('pokemon', ['id' => $id]);
        return $this->db->affected_rows();
    }

}

?>