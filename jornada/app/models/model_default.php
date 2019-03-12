<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Model_Default extends CI_Model {
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
	
    function get_last_ten_entries($table)
    {
        $query = $this->db->get($table, 10);
        return $query->result();
    }
	
	////EFETUAR UMA LIMPEZA NESSE DEFAULT E RETIRAR AS FUNCOES CICLICAS E DEMAIS SUJEIRAS
		
	//colocar como padrão
	function get_row($table, $id, $sha1 = false) 
	{						
		return $this->get_table_array($table, array('*'), 'SHA1(id) = \''. $id . '\'');				
	}
	
	
	
	//colocar como padrao
	function get_table_array($table, $columns, $conditions, $order = '') {
					
		if ($order != '') $order = ' ORDER BY ' . $order;
		$sql = "SELECT " . implode(",", $columns) . " FROM " . $table . " WHERE (1 = 1) AND (" .  $conditions . ") " . $order;
		
		$query = $this->db->query($sql);	
		
		$result = $query->result_array();
		
		if (sizeof($result)>0)
		    return $result['0'];
		else
			return array();
		
	}	
	
	
	//colocar como padrao
	function get_simple_table_array($table, $columns, $conditions, $order = '') {
					
		if ($order != '') $order = ' ORDER BY ' . $order;
		$sql = "SELECT " . $columns . " FROM " . $table . " WHERE (1 = 1) AND (" .  $conditions . ") " . $order;
		
		$query = $this->db->query($sql);	
		
		$result = $query->result_array();
		
		if (sizeof($result)>0)
		    return $result['0'];
		else
			return array();
		
	}		

	//colocar como padrao
	function get_table($table, $columns, $conditions, $order = '') {
		
		if ($order != '') $order = ' ORDER BY ' . $order;
		$sql = "SELECT " . implode(",", $columns) . " FROM " . $table . " WHERE (1 = 1) AND (" .  $conditions . ") " . $order;
		
		$query = $this->db->query($sql);	
		
		$result = $query->result();	
		
        return $result;	
		
	}		
	
/// Colocar como padrao
	public function get_data_table($table, $columns, $conditions = '', $sql = '')
    {
        
		$iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $iSortingCols = $this->input->get_post('iSortingCols', true);
        $sSearch = $this->input->get_post('sSearch', true);
        $sEcho = $this->input->get_post('sEcho', true);
		
		if ($sql == '') {
			if ($conditions != '') $conditions = " WHERE " . $conditions;
			$sql = "SELECT " . implode(",", $columns) . " FROM " . $table . $conditions;	
		}
				
		$query = $this->db->query($sql);			

        $rResult = $query->result();
		
		$iTotal = $query->num_rows();
		
		
		$cols = explode(",", $columns[0]);
		
		
		if ($iTotal == 0) $output['sEcho'] = $iTotal;
		
		$output['iTotalRecords'] = $iTotal;
		$output['iTotalDisplayRecords'] = $iTotal;		

		
        foreach($rResult as $rows)
        {
          	
			$row = array();
			
			for ($i=0; $i<sizeof($cols); $i++) {
				
				$columname = trim($cols[$i]);
		  		$row[] =  $rows->$columname;
							
				
			}
			
			$output['aaData'][] = $row;
		  	
		
        }
		
		if ($iTotal == 0) $output['aaData'] = json_decode('[]');
    
        echo json_encode($output);
		

		
        
    }
	
	function get_data_row($table, $columns) 
	{		
		
		$this->get_data_table($table, $columns);
				
	}
	
	
	function get_data_value($value,$sql) {
				
		$query = $this->db->query($sql);	
		
		$result = $query->result_array();
		
		if (sizeof($result)>0)
		    return $result['0'][$value];
		else
			return 'Erro: A consulta retornou mais de um valor';		
		
		
		
		
	}
	
	
	
	
			
	
}

