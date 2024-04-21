<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyPokemon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MyPokemon_model');
        $this->load->model('Trainer_model');
        $this->load->model('Pokemon_model');
    }

    public function index()
    {
        $data['trainer'] = $this->Trainer_model->getTrainerByUsername($this->session->userdata('username'));
        $data['pokemon'] = $this->MyPokemon_model->getMyPokemonByTrainerId($data['trainer']['id']);
        $data['controller'] = $this;
        $this->load->view('mypokemon/index', $data);
    }
    public function name($id)
    {
        $data['pokemons'] = $this->Pokemon_model->getPokemonById($id);
        echo $data['pokemons']['name'];
    }

    public function element($id)
    {
        $data['pokemons'] = $this->Pokemon_model->getPokemonById($id);
        echo $data['pokemons']['element'];
    }
    
    public function create(){
        $data['trainer'] = $this->Trainer_model->getTrainerByUsername($this->session->userdata('username'));
        $data['pokemon'] = $this->Pokemon_model->getAllPokemon();
        $this->load->view('mypokemon/create', $data);
    }

    public function store(){
        $data = [
            'name' => $this->input->post('name'),
            'trainer_id' => $this->input->post('trainer_id'),
            'pokemon_id' => $this->input->post('pokemon_id')
        ];
        $this->MyPokemon_model->createMyPokemon($data);
        redirect('mypokemon');
    }

    public function edit($name){
        $data['mypokemon'] = $this->MyPokemon_model->getMyPokemonByname($name);
        $data['pokemon'] = $this->Pokemon_model->getAllPokemon();
        $this->load->view('mypokemon/edit', $data);
    }

    public function update(){
        $name = $this->input->post('oldname');
        $data = [
            'name' => $this->input->post('name'),
            'trainer_id' => $this->input->post('trainer_id'),
            'pokemon_id' => $this->input->post('pokemon_id')
        ];
        $this->MyPokemon_model->updateMyPokemon($data, $name);
        redirect('mypokemon');
    }

    public function delete($name){
        $this->MyPokemon_model->deleteMyPokemon($name);
        redirect('mypokemon');
    }

}