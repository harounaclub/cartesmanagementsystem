<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {

	public function __construct()
	{
	
		parent::__construct();
	    $this->load->model('login_model');
		
	}

	public function index()
	{
   	
     $this->load->model('login_model');

		$this->form_validation->set_rules('login', 'nom d\'utilisateur', 'trim|required');
	    $this->form_validation->set_rules('pass', 'Mot de passe', 'trim|required');
	   
	      
	    if($this->form_validation->run()) 
	    {
			    if($this->login_model->check_connection($this->input->post('login'),$this->input->post('pass')))
	               {
	                   
	                   $admin_informations=$this->login_model->getInfo_user($this->input->post('login'),$this->input->post('pass'));
	                   
	                   foreach ($admin_informations as $lign) {

						    foreach($lign["_id"]as $value_id){

								$id_mAdmin=$value_id;
							}

	                       
	                        $id_admin=$id_mAdmin;	                        
							$admin_nomPrenoms=$lign["nom_prenoms_administrateur"];
							$admin_cle=$lign["cle_profils"];
							
	                       
	                         
	                        
	                        


	                   }

	                    $store_data_inSession = array(

	                                            'id_admin'  => $id_admin,            
												'admin_nomPrenoms'=> $admin_nomPrenoms,
												'admin_cle'=> $admin_cle,
	                                                                                                             
	                     );

	                    $this->session->set_userdata($store_data_inSession);
	                    redirect('administration');

                      
	                   
	               }
	               else {
	                   

	                   $data["mot_de_passe_erronee"]="erreur"; 
	                   $this->load->view('login_view',$data);
	                   
	               }

	      }else
	      {
	        $this->load->view('login_view');

	      }
	}

	public function caisse()
	{
   	
     

		$this->form_validation->set_rules('login', 'nom d\'utilisateur', 'trim|required');
	    $this->form_validation->set_rules('pass', 'Mot de passe', 'trim|required');
	   
	      
	    if($this->form_validation->run()) 
	    {
			    if($this->login_model->check_connection($this->input->post('login'),$this->input->post('pass')))
	               {
	                   
	                   $data['admin_informations']=$this->login_model->getInfo_user($this->input->post('login'),$this->input->post('pass'));
	                   
	                   foreach ($data['admin_informations'] as $lign) {

	                       
	                        $data['id_admin']=$lign->id_administrateur;	                        
	                        $data['nom_prenom']=$lign->nom_administrateur.' '.$lign->prenom_administrateur;
	                       
	                         
	                        
	                        


	                   }

	                    $store_data_inSession = array(

	                                            'id_admin'  => $data['id_admin'],            
	                                            'nom_prenom'=> $data['nom_prenom'],
	                                                                                                             
	                     );

	                    $this->session->set_userdata($store_data_inSession);
	                    redirect('administration');

                      
	                   
	               }
	               else {
	                   

	                   $data["mot_de_passe_erronee"]="erreur"; 
	                   $this->load->view('login_caisse_view',$data);
	                   
	               }

	      }else
	      {
	        $this->load->view('login_caisse_view');

	      }
	}




	
 

  

	
	

	




}