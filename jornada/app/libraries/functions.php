<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Functions {
	
	
	public function __construct($params = array()) {
		
		//$this->load_template($data);
        		
		if (!isset($params['allowanonymous'])) {
			$this->validate_session();
		}
		

		
    }
	
	public function load_site($template, $site, $data = array()) {
		$CI =& get_instance();
		if (!is_array($data)) {			
			//$data = array();
			exit("Parâmetros inválidos em load_site. Deve ser array();");
		}
			
		$data['sitetitle'] = isset($data['sitetitle'])?$data['sitetitle']:'Painel IBL';	
		
		$data['css'] = isset($data['css'])?$data['css']:$site;
		$data['js'] = isset($data['js'])?$data['js']:$site;		
		
		$data['header_view'] = $CI->load->view ('_templates/header', $data, TRUE);
		$data['sidebarl_view'] = $CI->load->view ('_templates/sidebarl', $data, TRUE);		
		$data['sidebarr_view'] = $CI->load->view ('_templates/sidebarr', $data, TRUE);
		$data['container_view'] = $CI->load->view ($site, $data, TRUE);			
		$data['footer_view'] = $CI->load->view ('_templates/footer', $data, TRUE);
							
		
		$data['nothing'] = $CI->load->view ('_templates/nothing', $data, TRUE);	
		
		$CI->load->view($template, $data);
	}
	
	public function validate_session() {

		
		if (!isset($_SESSION['s_login'])) {
			 header("Location: " . ROOTPATH . "login/logout/Sua sessão expirou. Faça o login novamente.");
			 exit("Sua sessão expirou. Faça o login novamente. <a href='" . ROOTPATH . "login/logout'>Clique aqui</a>");
		}

		
	}
	
	/***
	 * Função para remover acentos de uma string
	 *
	 * @autor Thiago Belem <contato@thiagobelem.net>
	 */
	function remove_acento($string, $slug = false) {
		$string = strtolower($string);
	
		// Código ASCII das vogais
		$ascii['a'] = range(224, 230);
		$ascii['e'] = range(232, 235);
		$ascii['i'] = range(236, 239);
		$ascii['o'] = array_merge(range(242, 246), array(240, 248));
		$ascii['u'] = range(249, 252);
	
		// Código ASCII dos outros caracteres
		$ascii['b'] = array(223);
		$ascii['c'] = array(231);
		$ascii['d'] = array(208);
		$ascii['n'] = array(241);
		$ascii['y'] = array(253, 255);
	
		foreach ($ascii as $key=>$item) {
			$acentos = '';
			foreach ($item AS $codigo) $acentos .= chr($codigo);
			$troca[$key] = '/['.$acentos.']/i';
		}
	
		$string = preg_replace(array_values($troca), array_keys($troca), $string);
	
		// Slug?
		if ($slug) {
			// Troca tudo que não for letra ou número por um caractere ($slug)
			$string = preg_replace('/[^a-z0-9]/i', $slug, $string);
			// Tira os caracteres ($slug) repetidos
			$string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
			$string = trim($string, $slug);
		}
	
		return $string;
	}	
	
	public function send_email($from = 'contato@consolidaibl.com.br', $to, $subject, $bodyhtml, $bodyplan = '' ) {
	
		$CI =& get_instance();
		
		$CI->load->library('My_PHPMailer');
		
		$mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        //$mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "sis.consolidaibl.com.br";      // setting GMail as our SMTP server
        $mail->Port       = 587;                   // SMTP port to connect to GMail
        $mail->Username   = "naoresponda@consolidaibl.com.br";  // user email address
        $mail->Password   = "D1@D2015";            // password in GMail
        
		$mail->SetFrom($from);  //Who is sending the email
		
        $mail->Subject    = $subject;
		$mail->IsHTML(true);
        $mail->Body      = $bodyhtml;
		
//        $mail->AltBody    = $bodyplan;
		
		
		foreach($to as $email => $name)
		{
		   $mail->AddAddress($email, $name);
		}
               
			   
/*$recipients = array(
   'person1@domain.com' => 'Person One',
   'person2@domain.com' => 'Person Two',
   // ..
);
*/			   
		

//        $mail->AddAttachment("images/phpmailer.gif");      // some attached files
//        $mail->AddAttachment("images/phpmailer_mini.gif"); // as many as you want
  
        if(!$mail->Send()) {
            $result["message"] = "Erro: " . $mail->ErrorInfo;
        } else {
            $result["message"] = "Enviado com sucesso!";
        }

		return $result;			
	
	
	}
	
	
	
	

	
			
}