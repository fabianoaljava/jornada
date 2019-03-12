<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Model_Municipio extends CI_Model {

	var $nome_municipio   = '';



    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
		$this->load->model('model_default');
		
    }
       
	
	
    function insert_registry()
    {

		$this->nome_municipio  = $_POST['nome_municipio'];
        return $this->db->insert('municipio', $this);
    }

    function update_registry()
    {
				
		$this->nome_municipio = $_POST['nome_municipio'];		
		//Gravar no Log
		return $this->db->update('municipio', $this, array('id' => $_POST['id']));
		
		
    }
	
	function delete_registry($id) {
    	$this->db->where("SHA1(id)", $id);
	    $this->db->delete("municipio");
  	}

}