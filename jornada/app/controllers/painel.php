<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//if (session_status() == PHP_SESSION_NONE) {
if (session_id() === "") {
    session_start();
}
class Painel extends CI_Controller {

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
	
		$data['total_consolidando'] = $this->model_default->get_data_value('TOTAL_CONSOLIDANDO', 'SELECT COUNT(1) TOTAL_CONSOLIDANDO FROM usuario_consolidado WHERE usuario_id = ' . $_SESSION['s_usuario_id']);
		
		
		$data['total_aguardando'] = $this->model_default->get_data_value('TOTAL_AGUARDANDO', 'SELECT COUNT(1) TOTAL_AGUARDANDO FROM usuario_consolidado WHERE usuario_id = ' . $_SESSION['s_usuario_id']);
		
		$data['total_contactado'] = $this->model_default->get_data_value('TOTAL_CONTACTADO', 'SELECT COUNT(1) TOTAL_CONSOLIDANDO FROM usuario_consolidado WHERE usuario_id = ' . $_SESSION['s_usuario_id']);

		$data['title'] = 'Painel Jornada | Dashboard';	
//	    $this->functions->load_site('_site', 'dashboard', $data);
		
		//verificar se grupo for = consolidacao exibir o dashboard da consolidacao
		
/*		if ($_SESSION['s_nivel_id'] > 4) {
		    $this->functions->load_site('_site', 'dashboard/consolidacao', $data);
		} else {
		    $this->functions->load_site('_site', 'dashboard', $data);			
		}*/
		
		$this->functions->load_site('_site', 'dashboard/consolidacao', $data);
		
		
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */