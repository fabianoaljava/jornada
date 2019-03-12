<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gc extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 
	
	 
	public function __construct()
    {
        parent::__construct();
		$this->load->library('functions');		
		$this->load->model('model_gc');
		$this->load->model('model_default');		
    }	 
	 

	public function index()
	{
		$data['js'] = 'gc';
		
		$data['title'] = 'Painel Consolidação | GC';							
		$this->functions->load_site('_site', 'gc/list', $data);
	
	}
	
	public function table_result()
	{

		//$this->model_default->get_data_table('gc', array('nome_gc, SHA1(id)'));
		$this->model_default->get_data_table('gc, municipio, bairro', array('nome_gc, nome_municipio, nome_bairro, shaid'),'', 'SELECT nome_gc, nome_municipio, nome_bairro, SHA1(gc.id) shaid FROM gc LEFT JOIN municipio ON municipio_id = municipio.id LEFT JOIN bairro on bairro_id = bairro.id');
		
	
	}	

	public function edit($id)
	{
		
		$data['js'] = 'gc';
		$data['css'] = '';
		$data['sitetitle'] = 'Painel Consolidação | GC > Editar';
			
		$result = $this->model_default->get_row('gc', $id, true);	
		
		if (sizeof($result) == 0) exit("Registro não encontrado");	
		
		$data['municipios'] = $this->model_default->get_table('municipio', array('*'), '1=1');
		$data['bairros'] = $this->model_default->get_table('bairro', array('*'), 'municipio_id = ' . $result['municipio_id']);
		$data = array_merge($data, $result);
									
		$this->functions->load_site('_site', 'gc/edit', $data);
	
	}	
	
	
	public function create()
	{
		
		$data['js'] = 'gc';
		$data['css'] = '';
		$data['sitetitle'] = 'Painel Consolidação | GC > Criar';
		$data['municipios'] = $this->model_default->get_table('municipio', array('*'), '1=1');	
													
		$this->functions->load_site('_site', 'gc/create', $data);
	
	}		
	
	
	public function insert()
	{
		
		$result = $this->model_gc->insert_registry();
		
		
		if ($result == 1) {
		
			$data = "";
			$data .= '{';
			$data .= '"code": "200",';
			$data .= '"redirect": "' . ROOTPATH . 'gc",';						
			$data .= '"text": "Formulário enviado com sucesso!"';
			$data .= '}';
		
			echo $data;
			
		} else {
			
			$data = "";
			$data .= '{';
			$data .= '"code": "500",';
			$data .= '"text": "Ocorreu um erro ao enviar formulário. Por favor, tente novamente mais tarde. Se o problema persistir, entre em contato com o administrador."';
			$data .= '}';		
			
			echo $data;	
			
		}
	
	}		
	
	public function update()
	{
		
		$result = $this->model_gc->update_registry();
		
		
		if ($result == 1) {
		
			$data = "";
			$data .= '{';
			$data .= '"code": "200",';
			$data .= '"redirect": "' . ROOTPATH . 'gc",';			
			$data .= '"text": "Formulário enviado com sucesso!"';
			$data .= '}';
		
			echo $data;
			
		} else {
			
			$data = "";
			$data .= '{';
			$data .= '"code": "500",';
			$data .= '"text": "Ocorreu um erro ao enviar formulário. Por favor, tente novamente mais tarde. Se o problema persistir, entre em contato com o administrador."';
			$data .= '}';	
			
			echo $data;		
			
		}
	
	}	
	
	
	public function del($id)
	{	
	
		$result = $this->model_gc->delete_registry($id);
		if ($result == 1) {
			header("Location: " . ROOTPATH . "gc");	
		} else {
			header("Location: " . ROOTPATH . "gc");	
		}
		
	}
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */