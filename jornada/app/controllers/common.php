<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Controller {

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
		$this->load->model('model_default');		
    }	 
	 

	public function index()
	{
	
	}
	

	
	public function get_bairro($municipio_id) {
		echo json_encode($this->model_default->get_table('bairro', array('*'), 'municipio_id=' . $municipio_id, 'nome_bairro'));
	}	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */