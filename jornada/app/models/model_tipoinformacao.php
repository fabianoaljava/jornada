<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Model_TipoInformacao extends CI_Model {

	var $tipo_informacao   = '';
	var $id   = '0';



    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
		$this->load->model('model_default');
		
    }
       
	
	
    function insert_registry()
    {

		$this->tipo_informacao  = $_POST['tipo_informacao'];
		$this->id  = $_POST['id']; 
        return $this->db->insert('tipo_informacao', $this);
    }

    function update_registry()
    {
				
		$this->tipo_informacao = $_POST['tipo_informacao'];		
		//Gravar no Log
		return $this->db->update('tipo_informacao', $this, array('id' => $_POST['id']));
		
		
    }
	
	function delete_registry($id) {
    	$this->db->where("SHA1(id)", $id);
	    $this->db->delete("tipo_informacao");
  	}

}