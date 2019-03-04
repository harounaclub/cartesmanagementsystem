<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Administration extends MX_Controller {
        
    public function __construct()
	{
	
		parent::__construct();
        $this->load->model('administration_model');
    
	}

    function index(){

        if($this->session->userdata('id_admin')){

            $data["pg_content"]="pg_dashboard_view";
            $this->load->view("main_view",$data);

        }else{

            redirect("login");
        }

        
    }

//gestion Approvisionnement cartes
    function gestionApproCartes(){
        
        $data["list_appro_cartes"]=$this->administration_model->mdl_listApproCartes();
        $data["pg_content"]="pg_gestion_appro_cartes";
        $this->load->view("main_view",$data);
       
    }

    function supprimApproCartes($id){
        
        if($this->administration_model->mdl_supprimCaissiere($id)){

            $this->mdl_supprimApproCartes();

        }
      
    }

    function ajoutApproCartes(){

        $this->form_validation->set_rules('date_commande', 'date de la commande', 'trim|required');
        $this->form_validation->set_rules('quantite', 'quantite de cartes commandées', 'trim|required');
        $this->form_validation->set_rules('n_debut', 'indice de cartes debut', 'trim');
        $this->form_validation->set_rules('n_fin', 'indice de cartes fin', 'trim');
	   
	      
	    if($this->form_validation->run()) 
	    {
            
            $date_commande=$this->input->post('date_commande');
           
            $quantite=$this->input->post('quantite');
            $n_debut=$this->input->post('n_debut');
            $n_fin=$this->input->post('n_fin');
            $date_creation=date("Y-m-d h:i:sa");

            $id_administrateur=$this->session->userdata('id_admin');



            $data_approCarte = array(

                'date_commande'  => $date_commande,            
                'quantite'=> $quantite,
                'n_debut'=> $n_debut,
                'n_fin'=> $n_fin,
                'date_creation'=> $date_creation, 
                'id_administrateur'=> $id_administrateur, 

            );


            $this->administration_model->mdl_ajoutApproCartes($data_approCarte);


            $this->gestionApproCartes();

	               

	    }else
	    {
	        $data["pg_content"]="pg_gestion_appro_cartes_ajout";
            $this->load->view("main_view",$data);

	    }

        
      
    }

    //gestion cartes
    function gestionCartes(){
        
        $data["list_cartesLot"]=$this->administration_model->mdl_listLotCartes();
        $data["pg_content"]="pg_gestion_cartes";
        $this->load->view("main_view",$data);
       
    }

    function gestionCartesTous(){
        
        $data["list_cartes"]=$this->administration_model->mdl_listCartes();
        $data["pg_content"]="pg_gestion_sortie_cartes";
        $this->load->view("main_datatable_view",$data);
       
    }

    function supprimCartes($id){
        
        if($this->administration_model->mdl_supprimCartes($id)){

            $this->gestionCartes();

        }
      
    }

    function ajoutCartes(){

        
        $this->form_validation->set_rules('designation_lot', 'designation du lot', 'trim|required');
        $this->form_validation->set_rules('description_lot', 'description du lot', 'trim|required');
        $this->form_validation->set_rules('validite_cartes', 'Validité de la carte', 'trim|required');
        $this->form_validation->set_rules('int_debut', 'indice de debut', 'trim|required');
        $this->form_validation->set_rules('int_fin', 'indice de fin', 'trim|required');
        
    
	    if($this->form_validation->run()) 
	    {
            
            $designation_lot=$this->input->post('designation_lot');
            $description_lot=$this->input->post('description_lot');
            $id_lot=$this->administration_model->clePrimaire(10);

            $numero_cartes=$this->input->post('numero_cartes');
            $validite_cartes=$this->input->post('validite_cartes');
            $date_enregistrement=date("Y-m-d h:i:s");
            $status="0";
            $id_client="0";
            $id_administrateur=$this->session->userdata('id_admin');

            $int_debut=$this->input->post('int_debut');
            $int_fin=$this->input->post('int_fin');

            $nbre_total_cartes_lot=$int_fin-$int_debut;
            $total_lot=(int)$this->administration_model->mdl_compterLotCartes();
            $total_lot_plus=$total_lot+1;

            $numero_cartes_lot="lot n° ".$total_lot_plus;
            $nbre_init=0;


            $data_CarteLot = array(

                'numero_cartes_lot'  => $numero_cartes_lot, 
                'designation_lot'  => $designation_lot,            
                'description_lot'=> $description_lot,
                'date_enregistrement_lot'=> $date_enregistrement,
                'nbre_total_cartes_lot'=> $nbre_total_cartes_lot,
                'nbre_total_cartes_commercial'=> $nbre_init,
                'nbre_total_cartes_commercial_sorties'=> $nbre_init,
                'nbre_total_cartes_commercial_vendus'=> $nbre_init,
                'nbre_total_cartes_commercial_restantes'=> $nbre_init,
                'nbre_total_cartes_gratuit'=> $nbre_init,
                'nbre_total_cartes_gratuit_sorties'=> $nbre_init,
                'nbre_total_cartes_gratuit_distribue'=> $nbre_init,
                'nbre_total_cartes_gratuit_restantes'=> $nbre_init,
                'status_cartes_lot'=> $nbre_init,
                'id_lot'=> $id_lot,    

            );

            $this->administration_model->mdl_ajoutCartesLot($data_CarteLot);

            $numero_cartes=$int_debut;

            for($i=0;$i <=$nbre_total_cartes_lot; $i++){

                $mot_de_passe_cartes=$this->administration_model->clePrimaireCM(4);

                $data_Carte = array(

                    'numero_cartes'  => (string)$numero_cartes,            
                    'validite_cartes'=> $validite_cartes,
                    'mot_de_passe_cartes'=> $mot_de_passe_cartes,
                    'date_enregistrement_cartes'=> $date_enregistrement,
                    'status_cartes'=> $status, 
                    'id_client'=> $id_client,
                    'id_administrateur'=> $id_administrateur,
                    'id_lot'=> $id_lot,
                    
    
                );
                $this->administration_model->mdl_ajoutCartes($data_Carte);
                $numero_cartes=$numero_cartes+1;



            }

            


            $this->gestionCartes();

	               

	    }else
	    {
	        $data["pg_content"]="pg_gestion_cartes_ajout";
            $this->load->view("main_view",$data);

	    }

        
      
    }


    //gestion cartes par lot

    function gestionCartesLot(){
        
        $data["list_cartesLot"]=$this->administration_model->mdl_listLotCartes();
        $data["pg_content"]="pg_gestion_sortie_cartes_lot";
        $this->load->view("main_datatable_view",$data);
       
    }


    function sortieCartesLot($id_lot){


        $this->administration_model->mdl_modCartesLot($id_lot);

        $listCartesEnStock=$this->administration_model->mdl_listCartesEnStock($id_lot);
        foreach($listCartesEnStock as $value){

            $this->administration_model->mdl_modCartes($id_lot);

        }
        
        
    
        $this->gestionCartesLot();
        
    }

    function sortieCartes($id_lot){

        $this->administration_model->mdl_modCartes($id_lot);
        $this->gestionCartesTous();
        
    }



     //gestion des commerciaux

     function gestionCommerciaux(){
        
        $data["liste_commerciaux"]=$this->administration_model->mdl_listCommerciaux();
        $data["pg_content"]="pg_gestion_commerciaux";
        $this->load->view("main_datatable_view",$data);
      
    }
    
    function supprimCommerciaux($id){
        
        if($this->administration_model->mdl_supprimCommerciaux($id)){

            $this->gestionCommerciaux();

        }
      
    }

    function ajoutCommerciaux(){

        $this->form_validation->set_rules('nom_prenoms_commerciaux', 'nom(s) et prenom(s)', 'trim|required');
        $this->form_validation->set_rules('telephone_mobile_commerciaux', 'telephone_mobile_commerciaux', 'trim|required');
        $this->form_validation->set_rules('email_commerciaux', 'email_commerciaux', 'trim');
        $this->form_validation->set_rules('commission_commerciaux', 'commission_commerciaux', 'trim|required');
        
	      
	    if($this->form_validation->run()) 
	    {
            
            $nom_prenoms_commerciaux=$this->input->post('nom_prenoms_commerciaux');
            $telephone_mobile_commerciaux=$this->input->post('telephone_mobile_commerciaux');
            $email_commerciaux=$this->input->post('email_commerciaux');
            $commission_commerciaux=$this->input->post('commission_commerciaux');

            do {
                

                $code_commerciaux=$this->administration_model->clePrimaireCM(4);
                $val_bool=$this->administration_model->mdl_checkCodeCommercial($code_commerciaux);

            } while ($val_bool ==True);
            

            
            

            $data_commerciaux = array(

                'nom_prenoms_commerciaux'  => $nom_prenoms_commerciaux,            
                'telephone_mobile_commerciaux'=> $telephone_mobile_commerciaux,
                'email_commerciaux'=> $email_commerciaux, 
                'code_commerciaux'=> $code_commerciaux, 
                'commission_commerciaux'=> $commission_commerciaux, 

            );


            $this->administration_model->mdl_ajoutCommerciaux($data_commerciaux);
            $this->gestionCommerciaux();


           

	               

	    }else
	    {
	        $data["pg_content"]="pg_gestion_commerciaux_ajout";
            $this->load->view("main_view",$data);

	    }
        
        
      
    }

    function venteCarte(){

        $data["pg_content"]="pg_vente_cartes";
        $this->load->view("main_view",$data);


    }

    function achatCarte(){

        
        $this->form_validation->set_rules('civilite', 'civilite', 'trim|required');
        $this->form_validation->set_rules('code_commercial', 'code commercial', 'trim|required');
        $this->form_validation->set_rules('code_carte', 'code_carte', 'trim|required');
        $this->form_validation->set_rules('nom_prenoms_client', 'nom_prenoms_client', 'trim|required');
        $this->form_validation->set_rules('numero_telephone_mobile_client', 'numero_telephone_mobile_client', 'trim|required');
        $this->form_validation->set_rules('email_client', 'email_client', 'trim|required');
        
	      
	    if($this->form_validation->run()) 
	    {
            
            $civilite=$this->input->post('civilite');
            $code_commercial=$this->input->post('code_commercial');
            $code_carte=$this->input->post('code_carte');
            $nom_prenoms_client=$this->input->post('nom_prenoms_client');
            $numero_telephone_mobile_client=$this->input->post('numero_telephone_mobile_client');
            $email_client=$this->input->post('email_client');


            $id_client=$this->administration_model->clePrimaire(10);


            $data_client = array(

                'id_client'  => $id_client,
                'civilite'  => $civilite,
                'nom_prenoms_client'  => $nom_prenoms_client,            
                'numero_telephone_mobile_client'=> $numero_telephone_mobile_client,
                'email_client'=> $email_client, 
               
            );


            $this->administration_model->mdl_ajoutClient($data_client);
            $this->administration_model->mdl_modCartesAchatStatus($code_carte);
            $this->administration_model->mdl_modCartesAchatClient($code_carte,$id_client);



            $token=$this->get_token();
            
            $taille_nom_prenoms=strlen($nom_prenoms_client);
            if($taille_nom_prenoms <= 16){

                $nom_complet=$civilite." ".$nom_prenoms_client;
            }else{

                $nom_complet=$civilite." ".substr($nom_prenoms_client,0,14).".";
            }

            $mot_de_passe_client=$this->administration_model->mdl_infoMotdepasseClient($id_client);
            $tel_client=$this->administration_model->mdl_infoTelClient($id_client);
        
        $message=urlencode("Bonjour $nom_complet,votre carte prixkdo n°$code_carte est désormais active.Connectez-vous et profitez de réductions sur www.prixkdo.ci MDP : $mot_de_passe_client");
        $result=file_get_contents("http://cartes.prixkdo.local/sms/sendSms.php?token=$token&tel=$numero_telephone_mobile_client&message=$message");

            $arr = array(
                'status' => 1,
              );
            echo json_encode($arr);

        
            

           

	               

	    }else
	    {
	        $data["pg_content"]="pg_gestion_commerciaux_ajout";
            $this->load->view("main_view",$data);

	    }
        
        
      
    }
   

    //gestion des utilisateurs

    function gestionUtilisateur(){
        
        $data["liste_utilisateur"]=$this->administration_model->mdl_listUtilisateur();
        $data["pg_content"]="pg_listeUtilisateur";
        $this->load->view("main_view",$data);
      
    }
    
    function supprimUtilisateur($id){
        
        if($this->administration_model->mdl_supprimUtilisateur($id)){

            $this->gestionUtilisateur();

        }
      
    }

    function ajoutUtilisateur(){

        $this->form_validation->set_rules('nom_prenoms', 'nom(s) et prenom(s)', 'trim|required');
        $this->form_validation->set_rules('login', 'Mot de passe', 'trim|required');
        $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required');
	   
	      
	    if($this->form_validation->run()) 
	    {
            
            $nom_prenoms=$this->input->post('nom_prenoms');
            $login=$this->input->post('login');
            $password=$this->input->post('password');

            $data_utilisateur = array(

                'nom_prenoms'  => $nom_prenoms,            
                'login'=> $login,
                'mot_de_passe'=> $password, 

            );


            $this->administration_model->mdl_ajoutUtilisateur($data_utilisateur);


            print_r($data_utilisateur);

	               

	    }else
	    {
	        $data["pg_content"]="pg_UtilisateurAjouter";
            $this->load->view("main_view",$data);

	    }
        
        
      
    }


    function ajax_checkInfoCommercial(){

        $code_commercial=$this->input->post('code_commercial');
        if($this->administration_model->mdl_checkCodeCommercial($code_commercial)){

            $infoCommercial=$this->administration_model->mdl_InfoCommercial($code_commercial);
            $arr = array(
                          'status' => 1,
                          'infoCommercial' => $infoCommercial,
                        );
            echo json_encode($arr);



        }else{

            $arr = array('status' => 0);
            echo json_encode($arr);
        }
        

    }

    function ajax_checkInfoCarte(){

        $code_carte=$this->input->post('code_carte');
        if($this->administration_model->mdl_checkCodeCartes($code_carte)){

            $infoCarte=$this->administration_model->mdl_listCartesInfo($code_carte);
            $arr = array(
                          'status' => 1,
                          'infoCarte' => $infoCarte,
                        );
            echo json_encode($arr);



        }else{

            $arr = array('status' => 0);
            echo json_encode($arr);
        }
        

    }

    function envoiSmsTest(){

        $token=$this->get_token();
        $tel="54823136";
        $message="Bonjour M xxxxxxx xxxxxxxx,votre carte prixkdo n°0000 0000 0000 0000 est désormais active.Connectez-vous et profitez de réductions sur www.prixkdo.ci MDP : 0000 ";
        
        $result=file_get_contents("http://cartes.prixkdo.local/sms/sendSms.php?token=$token&tel=$tel&message=$message");
        echo $result;
    }


    private function get_token(){

        $token=file_get_contents("http://cartes.prixkdo.local/sms/getToken.php");
        return $token;
    }

 
    function seDeconnecter(){

        session_destroy();
        redirect("login");
    } 


}
