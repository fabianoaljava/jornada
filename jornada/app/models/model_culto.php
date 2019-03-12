<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Model_Culto extends CI_Model {

	var $nome_culto   = '';



    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
		$this->load->model('model_default');
		
    }
       
	
	
    function insert_registry()
    {

		$this->nome_culto  = $_POST['nome_culto'];
        return $this->db->insert('culto', $this);
    }

    function update_registry()
    {
				
		$this->nome_culto = $_POST['nome_culto'];		
		//Gravar no Log
		return $this->db->update('culto', $this, array('id' => $_POST['id']));
		
		
    }
	
	function delete_registry($id) {
    	$this->db->where("SHA1(id)", $id);
	    $this->db->delete("culto");
  	}

}