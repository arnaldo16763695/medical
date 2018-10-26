<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout("frontend");

    }

    public function index()
    {
        $datos = $this->Pacientes_model->getTodosPacientes();
        $this->layout->view("index", compact('datos'));

    }

}
