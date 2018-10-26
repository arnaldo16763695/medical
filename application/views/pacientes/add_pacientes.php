                           <?php
//acá visualizamos los mensajes de error
$errors = validation_errors('<li>', '</li>');
if ($errors != "") {
    ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php echo $errors; ?>
                        </ul>
                    </div>
                    <?php
}

if ($this->session->flashdata('mensaje') != '') {
    ?>
               <div class="alert alert-<?php echo $this->session->flashdata('css') ?>"><?php echo $this->session->flashdata('mensaje') ?></div>
               <?php
}
?>
  <div class="row">

    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Registrar Pacientes</h4>

                        </div>
                        <div class="panel-body">
                                <?php echo form_open(null, array("class" => "form-horizontal", "name" => "formRegistro")); ?>
                                <div class="col-lg-6">

                                        <div class="form-group">
                                            <label>Nombres</label>
                                            <input type="text" name="nombre" id="nombre" class="form-control" tabindex="1">

                                        </div>
                                        <div class="form-group">
                                            <label>Cedula</label>
                                            <input class="form-control" type="text" name="cedula"  tabindex="3">
                                        </div>
                                </div>

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <input class="form-control" type="text" name="apellido"  tabindex="2">
                                        </div>
                                        <div class="form-group">
                                            <label>Teléfono</label>
                                            <input class="form-control" type="text" name="telefono"  tabindex="4">
                                        </div>

                                </div>


                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a class="btn btn-danger" href="<?php echo base_url(); ?>pacientes/listado">Volver</a>

                                 <?php echo form_close(); ?>



                        </div>

                    </div>
    </div>
</div>
