<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pacientes extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout("frontend2");

        //$this->load->Pacientes_model();

    }

    public function listado()
    {

        $datos = $this->Pacientes_model->getTodosPacientes();
        $this->layout->view("listado", compact('datos'));

    }

    public function add_pacientes()
    {

        if ($this->input->post()) {
            //echo "hizo post";exit;
            if ($this->form_validation->run('addPacientes')) {

                //validar si la cedula ya está registrada

                $existeCedula = $this->Pacientes_model->getPacientesByCedula(trim($this->input->post('cedula')));

                if (count($existeCedula) > 0) {

                    $this->session->set_flashdata('css', 'danger');
                    $this->session->set_flashdata('mensaje', 'Operación falló, la cédula ya existe en la Base de datos');
                    redirect(base_url() . "pacientes/add_pacientes");

                } else {

                    $data = array(
                        'nombres'   => trim($this->input->post('nombre')),
                        'apellidos' => trim($this->input->post('apellido')),
                        'cedula'    => trim($this->input->post('cedula')),
                        'telefono'  => trim($this->input->post('telefono')),
                    );

                    $this->Pacientes_model->addPacientes($data);

                    $this->session->set_flashdata('css', 'success');
                    $this->session->set_flashdata('mensaje', 'El registro se ha creado exitosamente');
                    redirect(base_url() . "pacientes/listado");

                }

            }
        }

        $this->layout->view("add_pacientes");

    }

    public function editPacientes($id)
    {
        $dato         = $this->Pacientes_model->getPacientesById($id);
        $cedulaActual = $dato->cedula;
        $existeCedula = $this->Pacientes_model->getPacientesByCedula(trim($this->input->post('cedula')));

        if ($this->input->post()) {

            if ($this->form_validation->run('addPacientes')) {

                if ($cedulaActual == $this->input->post('cedula')) {

                    $data = array(
                        'nombres'   => trim($this->input->post('nombre')),
                        'apellidos' => trim($this->input->post('apellido')),
                        //  'cedula'    => trim($this->input->post('cedula')),
                        'telefono'  => trim($this->input->post('telefono')),
                    );

                    $this->Pacientes_model->editPacientes($data, $id);

                    $this->session->set_flashdata('css', 'success');
                    $this->session->set_flashdata('mensaje', 'El registro se ha editado exitosamente');
                    redirect(base_url() . "pacientes/editPacientes/" . $id);

                } else {

                    if (count($existeCedula) > 0) {

                        $this->session->set_flashdata('css', 'danger');
                        $this->session->set_flashdata('mensaje', 'Operación falló, la cédula ya existe en la Base de datos');
                        redirect(base_url() . "pacientes/editPacientes/" . $id);

                    } else {

                        $data = array(
                            'nombres'   => trim($this->input->post('nombre')),
                            'apellidos' => trim($this->input->post('apellido')),
                            'cedula'    => trim($this->input->post('cedula')),
                            'telefono'  => trim($this->input->post('telefono')),
                        );

                        $this->Pacientes_model->editPacientes($data, $id);

                        $this->session->set_flashdata('css', 'success');
                        $this->session->set_flashdata('mensaje', 'El registro se ha editado exitosamente');
                        redirect(base_url() . "pacientes/editPacientes/" . $id);
                    }

                }

            }

        }

        $this->layout->view('editPacientes', compact('dato'));
    }

    public function deletePacientes($id)
    {
        $this->Pacientes_model->deletePacientes($id);
        $this->session->set_flashdata('css', 'success');
        $this->session->set_flashdata('mensaje', 'El registro se ha eliminado exitosamente');
        redirect(base_url() . "pacientes/listado");
    }

}
