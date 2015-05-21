<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {

	public $isLoggedIn = FALSE;

	function __construct(){
		parent::__construct();
		$this->load->library("Openid", array('host'=>base_url()));

		$this->isLoggedIn = $this->session->userdata('steam_id') ? true : false;
		
	}

    public function index(){
    	$data["openid"] = $this->openid;
    	$data["_STEAMAPI"]="01CCB218182009E56CFF18B1DCA17E66";
		$this->load->template("index",$data);
    }
    public function about(){
    	
    	$url = 'http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key=01CCB218182009E56CFF18B1DCA17E66&steamid='.$this->session->userdata('steam_id').'&format=json';
    	
    	$result = $this->openid->request($url);

    	$res = json_decode($result);

    	var_dump($res->response);

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */