
<?php
class Pacientes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //métodos de consulta a la base de datos
    //los que van a utilizar el
    //active record

    public function getTodosPacientes()
    {
        $query = $this->db
            ->select("id, nombres, apellidos, cedula, telefono, eliminado")
            ->from('pacientes')
            ->where(array('eliminado' => 0))
        //->order_by('id', 'ASC')
            ->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }

    public function getPacientesById($id)
    {
        $query = $this->db
            ->select("id, nombres, apellidos, cedula, telefono, eliminado")
            ->from('pacientes')
            ->where(array('eliminado' => 0))
            ->where(array('id' => $id))
        //->order_by('id', 'ASC')
            ->get();
        //echo $this->db->last_query();exit;
        return $query->row();
    }

    public function getPacientesByCedula($cedula)
    {
        $query = $this->db
            ->select("id, nombres, apellidos, cedula, telefono, eliminado")
            ->from('pacientes')
            ->where(array('eliminado' => 0))
            ->where(array('cedula' => $cedula))
        //->order_by('id', 'ASC')
            ->get();
        //echo $this->db->last_query();exit;
        return $query->row();
    }

    public function addPacientes($data = array())
    {
        $this->db->insert('pacientes', $data);
        return $this->db->insert_id();
    }

    public function editPacientes($data = array(), $id)
    {
        $this->db->where('id', $id);
        $this->db->where('eliminado', 0);
        $this->db->update('pacientes', $data);
        //echo $this->db->last_query();exit;
    }

    public function deletePacientes($id)
    {
        $this->db->set('eliminado', 1);
        $this->db->where('id', $id);
        $this->db->update('pacientes');
    }

}
