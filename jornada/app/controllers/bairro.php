<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bairro extends CI_Controller {

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
		$this->load->model('model_bairro');
		$this->load->model('model_default');		
    }	 
	 

	public function index()
	{
		$data['js'] = 'bairro';
		
		$data['title'] = 'Painel Consolidação | Bairro';							
		$this->functions->load_site('_site', 'bairro/list', $data);
	
	}
	
	public function table_result()
	{

//		$this->model_default->get_data_table('bairro', array('nome_bairro, SHA1(id)'));
		$this->model_default->get_data_table('municipio, bairro', array('nome_municipio, nome_bairro, shaid'),'', 'SELECT nome_municipio, nome_bairro, SHA1(bairro.id) shaid FROM bairro LEFT JOIN municipio ON municipio_id = municipio.id');		
	
	}	

	public function edit($id)
	{
		
		$data['js'] = 'bairro';
		$data['css'] = '';
		$data['sitetitle'] = 'Painel Consolidação | Bairro > Editar';
		
		$data['municipios'] = $this->model_default->get_table('municipio', array('*'), '1=1');
			
		$result = $this->model_default->get_row('bairro', $id, true);	
		
		if (sizeof($result) == 0) exit("Registro não encontrado");	
		
		$data = array_merge($data, $result);
									
		$this->functions->load_site('_site', 'bairro/edit', $data);
	
	}	
	
	
	public function create()
	{
		
		$data['js'] = 'bairro';
		$data['css'] = '';
		$data['sitetitle'] = 'Painel Consolidação | Bairro > Criar';
		
		$data['municipios'] = $this->model_default->get_table('municipio', array('*'), '1=1');
													
		$this->functions->load_site('_site', 'bairro/create', $data);
	
	}		
	
	
	public function insert()
	{
		
		$result = $this->model_bairro->insert_registry();
		
		
		if ($result == 1) {
		
			$data = "";
			$data .= '{';
			$data .= '"code": "200",';
			$data .= '"redirect": "' . ROOTPATH . 'bairro",';						
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
		
		$result = $this->model_bairro->update_registry();
		
		
		if ($result == 1) {
		
			$data = "";
			$data .= '{';
			$data .= '"code": "200",';
			$data .= '"redirect": "' . ROOTPATH . 'bairro",';			
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
	
		$result = $this->model_bairro->delete_registry($id);
		if ($result == 1) {
			header("Location: " . ROOTPATH . "bairro");	
		} else {
			header("Location: " . ROOTPATH . "bairro");	
		}
		
	}
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */