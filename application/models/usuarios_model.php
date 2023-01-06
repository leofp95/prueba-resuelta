<?php
class Usuarios_model extends CI_Model {

    public function __construct(){
            $this->load->database();
    }

    public function get_usuarios($id = FALSE){
        if ($id === FALSE){
            //$query = $this->db->get('usuarios');
            //return $query->result_array();
            return $this->db->query("call usuario_obtener();")->result_array();
        }
        else{
            //$query = $this->db->get_where('usuarios', array('id' => $id));
            //return $query->row_array();
            return $this->db->query("call usuario_obtener_id($id);")->result_array();
        }
        
    }

	public function get_usuarios_cedula($cedula){
		return $this->db->query("call usuario_obtener_cedula($cedula);")->result_array();
	}

    public function create_usuarios(){
        $this->load->helper('url');
        /*
        $data = array(
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido_1' => $this->input->post('apellido_1'),
            'apellido_2' => $this->input->post('apellido_2'),
            'telefono' => $this->input->post('telefono'),
            'tipo' => $this->input->post('tipo')
        );
        return $this->db->insert('usuarios', $data);
        */

        $in_cedula = $this->input->post('cedula');
        $in_nombre = $this->input->post('nombre');
        $in_apellido_1 = $this->input->post('apellido_1');
        $in_apellido_2 = $this->input->post('apellido_2');
        $in_telefono = $this->input->post('telefono');
        $in_tipo = $this->input->post('tipo');
        
        return $this->db->query("call usuario_crear($in_cedula, '$in_nombre', '$in_apellido_1', '$in_apellido_2', $in_telefono, $in_tipo);");
    }

    public function delete_usuarios(){
            /*
            $data = array( 'cedula' => $this->input->get('cedula') );
            return $this->db->delete('usuarios', $data);
            */
            $in_cedula = $this->input->get('cedula');
            return $this->db->query("call usuario_eliminar($in_cedula);");
        
    }

    public function update_usuarios(){
        $this->load->helper('url');

        $in_cedula = $this->input->post('cedula');
        $in_nombre = $this->input->post('nombre');
        $in_apellido_1 = $this->input->post('apellido_1');
        $in_apellido_2 = $this->input->post('apellido_2');
        $in_telefono = $this->input->post('telefono');
        $in_tipo = $this->input->post('tipo');
        
        return $this->db->query("call usuario_modificar($in_cedula, '$in_nombre', '$in_apellido_1', '$in_apellido_2', $in_telefono, $in_tipo);");
    }

    public function get_bomberos(){
        return $this->db->query("call usuario_obtener_tipo(1);")->result_array();
    }

    public function validate(){
		$this->load->helper('url');

		$in_cedula = $this->input->post('cedula');
        $in_contrasena = $this->input->post('contrasena');

		$query = $this->db->query("select * from usuarios where cedula = $in_cedula and contrasena = '$in_contrasena';");
		if(isset($query->row()->nombre) && $query->row()->nombre != '')
            {
                // If there is a user, then create session data
                $row = $query->row();
                $data = array(
                        'cedula' => $row->cedula,
                        'nombre' => $row->nombre,
                        'apellido_1' => $row->apellido_1,
                        'apellido_2' => $row->apellido_2,
                        'telefono' => $row->telefono,
                        'tipo' => $row->tipo,
                        'validated' => true
                        );
                $this->session->set_userdata($data);
				return true;
            }

        
    }

}
