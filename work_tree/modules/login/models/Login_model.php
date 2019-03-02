<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('mongo_db',array('activate'=>'default'),'mongo_db');
    }

   
    

    
    function check_connection($login,$password){

        $list_administrateur=$this->mongo_db->where(array('login_administrateur' => $login,'mot_de_passe_administrateur' => $password))->get('administrateur');
        $nb_administrateur=count($list_administrateur);

        if($nb_administrateur >0){

            return True;
        }else{

            return False;
        }
    }

    
    function getInfo_user($login,$password){

        $list_administrateur=$this->mongo_db->where(array('login_administrateur' => $login,'mot_de_passe_administrateur' => $password))->get('administrateur');
        return $list_administrateur;

    }

    

    
	
			  
  
   }