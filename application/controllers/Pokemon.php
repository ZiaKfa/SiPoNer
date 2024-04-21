<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pokemon extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pokemon_model');
    }

    public function index()
    {
        $data['pokemon'] = $this->Pokemon_model->getAllPokemon();
        $this->load->view('pokemon/index', $data);
    }
    public function view($id)
    {
        $data['pokemon'] = $this->Pokemon_model->getPokemonById($id);
        $this->load->view('pokemon/view', $data);
    }

    public function create()
    {
        $this->load->view('pokemon/create');
    }

    public function store()
    {
        $data = [
            'name' => $this->input->post('name'),
            'element' => $this->input->post('element')
        ];
        $this->Pokemon_model->createPokemon($data);
        redirect('pokemon');
    }

    public function edit($id)
    {
        $data['pokemon'] = $this->Pokemon_model->getPokemonById($id);
        $this->load->view('pokemon/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'name' => $this->input->post('name'),
            'element' => $this->input->post('element')
        ];
        $this->Pokemon_model->updatePokemon($data, $id);
        redirect('pokemon');
    }

    public function delete($id)
    {
        $this->Pokemon_model->deletePokemon($id);
        redirect('pokemon');
    }

    public function name($id)
    {
        $data['pokemon'] = $this->Pokemon_model->getPokemonById($id);
        echo $data['pokemon']['name'];
    }

    public function element($id)
    {
        $data['pokemon'] = $this->Pokemon_model->getPokemonById($id);
        echo $data['pokemon']['element'];
    }
}
?>