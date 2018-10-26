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
                            <h4>Listado de Pacientes</h4>
                            <div style="text-align: right;"><a href="<?php echo base_url(); ?>pacientes/add_pacientes" class="btn btn-success">Agregar <span class="fa fa-plus fa-fw"></span></a></div>
                        </div>


                        <!-- /.panel-heading -->
                        <div class="panel-body">
                         <table width="100%" class="table table-responsive table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nombre y Apellido</th>
                                        <th>cédula</th>
                                        <th>Teléfono</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($datos as $dato) {
    ?>

                                    <tr class="odd gradeX">
                                        <td><?php echo $dato->nombres . ' ' . $dato->apellidos; ?></td>
                                        <td><?php echo $dato->cedula ?></td>
                                        <td><?php echo $dato->telefono ?></td>
                                        <td>
                                            <a href="" class="btn btn-xs fa fa-search"></a> <a href="<?php echo base_url(); ?>pacientes/editPacientes/<?php echo $dato->id; ?>" class="btn btn-xs  fa fa-pencil"></a> <a href="#" onclick="deletePacientes('<?php echo base_url(); ?>pacientes/deletePacientes/<?php echo $dato->id; ?>','<?php echo $dato->nombres . ' ' . $dato->apellidos; ?>');" class="btn btn-xs  fa fa-trash"></a>
                                        </td>


                                    </tr>

                                    <?php
}
?>

                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
