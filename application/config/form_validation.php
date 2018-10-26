<?php
/**
 * Reglas de validacion para formularios
 */
$config = array(

    /**
     * addPacientes
     * */
    'addPacientes' => array(

        array('field' => 'nombre', 'label' => 'Nombre', 'rules' => 'required|is_string|trim'),

        array('field' => 'apellido', 'label' => 'Apellido', 'rules' => 'required|is_string|trim'),
        array('field' => 'cedula', 'label' => 'Cédula', 'rules' => 'required|trim|max_length[20]|numeric'),
        array('field' => 'telefono', 'label' => 'Teléfono', 'rules' => 'required|is_string|trim'),

    ),

    //éste es el final
);
