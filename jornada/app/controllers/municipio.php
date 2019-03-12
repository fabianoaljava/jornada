<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Municipio extends CI_Controller {

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
		$this->load->model('model_municipio');
		$this->load->model('model_default');		
    }	 
	 

	public function index()
	{
		$data['js'] = 'municipio';
		
		$data['title'] = 'Painel Consolidação | Municipio';							
		$this->functions->load_site('_site', 'municipio/list', $data);
	
	}
	
	public function table_result()
	{

		$this->model_default->get_data_table('municipio', array('nome_municipio, SHA1(id)'));
	
	}	

	public function edit($id)
	{
		
		$data['js'] = 'municipio';
		$data['css'] = '';
		$data['sitetitle'] = 'Painel Consolidação | Municipio > Editar';
			
		$result = $this->model_default->get_row('municipio', $id, true);	
		
		if (sizeof($result) == 0) exit("Registro não encontrado");	
		
		$data = array_merge($data, $result);
									
		$this->functions->load_site('_site', 'municipio/edit', $data);
	
	}	
	
	
	public function create()
	{
		
		$data['js'] = 'municipio';
		$data['css'] = '';
		$data['sitetitle'] = 'Painel Consolidação | Municipio > Criar';
													
		$this->functions->load_site('_site', 'municipio/create', $data);
	
	}		
	
	
	public function insert()
	{
		
		$result = $this->model_municipio->insert_registry();
		
		
		if ($result == 1) {
		
			$data = "";
			$data .= '{';
			$data .= '"code": "200",';
			$data .= '"redirect": "' . ROOTPATH . 'municipio",';						
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
		
		$result = $this->model_municipio->update_registry();
		
		
		if ($result == 1) {
		
			$data = "";
			$data .= '{';
			$data .= '"code": "200",';
			$data .= '"redirect": "' . ROOTPATH . 'municipio",';			
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
	
		$result = $this->model_municipio->delete_registry($id);
		if ($result == 1) {
			header("Location: " . ROOTPATH . "municipio");	
		} else {
			header("Location: " . ROOTPATH . "municipio");	
		}
		
	}
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */