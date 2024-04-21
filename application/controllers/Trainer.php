<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Trainer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Trainer_model');
        $this->load->library('session');
    }

    public function index()
    {
        if ($this->session->userdata('username') == null) {
            $this->load->view('trainer/login');
        } else {
            $data['trainer'] = $this->Trainer_model->getTrainerByUsername($this->session->userdata('username'));
            $this->load->view('trainer/index', $data);
        }
        
    }

    public function register()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $name = $this->input->post('name');
        $data = [
            'username' => $username,
            'password' => $password,
            'name' => $name
        ];
        $this->Trainer_model->createTrainer($data);
        redirect('trainer');
    }

    public function registerPage()
    {
        $this->load->view('trainer/register');
    }

    public function loginPage()
    {
        $this->load->view('trainer/login');
    }

    public function myPokemonPage()
    {
        $data['pokemon'] = $this->MyPokemon_model->getMyPokemonByTrainerId($this->session->userdata('id'));
        $this->load->view('trainer/mypokemon', $data);
    }

    public function login()
    {
        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        ];
        $trainer = $this->Trainer_model->getTrainerByUsername($data['username']);
        if ($trainer != null && $trainer['password'] == $data['password']) {
            $this->session->set_userdata('username', $data['username']);
            $this->session->set_userdata('id', $trainer['id']);
            redirect('trainer');
        } else {
            redirect('trainer/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        redirect('trainer');
    }

    public function getTrainerByUsername($username)
    {
        return $this->Trainer_model->getTrainerByUsername($username);
    }
}