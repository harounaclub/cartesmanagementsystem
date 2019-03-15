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

//gestion des fournisseurs
    function gestionFournisseurs(){
            
        $data["list_fournisseurs"]=$this->administration_model->mdl_listFournisseur();
        $data["pg_content"]="pg_gestion_fournisseurs";
        $this->load->view("main_view",$data);
    
    }

    function mdl_supprimFournisseur($id){
        
        if($this->administration_model->mdl_supprimFournisseur($id)){

            $this->gestionFournisseurs();

        }
    
    }

    function ajoutFournisseur(){

        $this->form_validation->set_rules('raison_sociale_fournisseur', 'raison_sociale_fournisseur', 'trim');
        $this->form_validation->set_rules('pays_fournisseur', 'pays_fournisseur', 'trim');
        $this->form_validation->set_rules('ville_fournisseur', 'ville_fournisseur', 'trim');
        $this->form_validation->set_rules('téléphone1_fournisseur', 'téléphone1_fournisseur', 'trim');
        $this->form_validation->set_rules('téléphone2_fournisseur', 'téléphone2_fournisseur', 'trim');
        $this->form_validation->set_rules('email_fournisseur', 'email_fournisseur', 'trim');
        $this->form_validation->set_rules('site_internet_fournisseur', 'site_internet_fournisseur', 'trim');
        $this->form_validation->set_rules('commentaire_fournisseur', 'commentaire_fournisseur', 'trim');
    
        
        if($this->form_validation->run()) 
        {
            
            $raison_sociale_fournisseur=$this->input->post('raison_sociale_fournisseur');
            $pays_fournisseur=$this->input->post('pays_fournisseur');
            $ville_fournisseur=$this->input->post('ville_fournisseur');

            $téléphone1_fournisseur=$this->input->post('téléphone1_fournisseur');
            $téléphone2_fournisseur=$this->input->post('téléphone2_fournisseur');

            $email_fournisseur=$this->input->post('email_fournisseur');
            $commentaire_fournisseur=$this->input->post('commentaire_fournisseur');

            
            

            $id_administrateur=$this->session->userdata('id_admin');



            $data_fournisseur = array(

                'raison_sociale_fournisseur'  => $raison_sociale_fournisseur,            
                'pays_fournisseur'=> $pays_fournisseur,
                'ville_fournisseur'=> $ville_fournisseur,
                'téléphone1_fournisseur'=> $téléphone1_fournisseur,
                'téléphone2_fournisseur'=> $téléphone2_fournisseur, 
                'email_fournisseur'=> $email_fournisseur,
                'commentaire_fournisseur'=> $commentaire_fournisseur, 

            );


           


            if($this->administration_model->mdl_ajoutFournisseur($data_fournisseur)){

                $this->gestionFournisseurs();

            }


            

                

        }else
        {
            $data["pg_content"]="pg_gestion_fournisseur_ajout";
            $this->load->view("main_view",$data);

        }

        
    
    }

//gestion Approvisionnement cartes
    function gestionApproCartes(){
        
        $data["list_appro_cartes"]=$this->administration_model->mdl_listApproCartes();
        $data["pg_content"]="pg_gestion_appro_cartes";
        $this->load->view("main_view",$data);
       
    }

    function supprimApproCartes($id){
        
        if($this->administration_model->mdl_supprimApproCartes($id)){

            $this->gestionApproCartes();

        }
      
    }

    function ajoutApproCartes(){

        $this->form_validation->set_rules('date_commande', 'date de la commande', 'trim|required');
        $this->form_validation->set_rules('n_debut', 'indice de cartes debut', 'trim');
        $this->form_validation->set_rules('n_fin', 'indice de cartes fin', 'trim');
        $this->form_validation->set_rules('commentaire', 'commentaire', 'trim');
        $this->form_validation->set_rules('id_fournisseur', 'commentaire', 'trim');
	   
	      
	    if($this->form_validation->run()) 
	    {
            

            $nb_appro=$this->administration_model->mdl_compterApproCartes();
            $nb_appro1=$nb_appro+1;
            $designation_approCartes="Cmd appro n°".$nb_appro1;
            $date_commande_approCartes=$this->input->post('date_commande');
            $date_commande_strtotime_approCartes=strtotime($date_commande_approCartes);
            $date_creation_approCartes=date("Y-m-d h:i:sa");
            $carte_alpha_approCartes=$this->input->post('n_debut');
            $carte_omega_approCartes=$this->input->post('n_fin');
            $quantite=($carte_omega_approCartes - $carte_alpha_approCartes)+1;
            $commentaire_approCartes=$this->input->post('commentaire');
            $id_fournisseur_approCartes=$this->input->post('id_fournisseur');
           
            $id_administrateur=$this->session->userdata('id_admin');



            $data_approCarte = array(

                'designation_approCartes'  => $designation_approCartes,            
                'date_commande_approCartes'=> $date_commande_approCartes,
                'date_commande_strtotime_approCartes'=> $date_commande_strtotime_approCartes,
                'date_creation_approCartes'=> $date_creation_approCartes,
                'carte_alpha_approCartes'=> $carte_alpha_approCartes, 
                'carte_omega_approCartes'=> $carte_omega_approCartes,
                'quantite'=> $quantite, 
                'commentaire_approCartes'=> $commentaire_approCartes, 
                'id_fournisseur_approCartes'=> $id_fournisseur_approCartes, 
                'id_administrateur'=> $id_administrateur, 

            );

            

            if($this->administration_model->mdl_ajoutApproCartes($data_approCarte)){

                $this->gestionApproCartes();
            }


            

	               

	    }else
	    {
            $data["list_fournisseurs"]=$this->administration_model->mdl_listFournisseur();
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

        
        $this->form_validation->set_rules('id_cmd_appro', 'id_cmd_appro', 'trim');
        $this->form_validation->set_rules('description_lot', 'description du lot', 'trim');
        $this->form_validation->set_rules('mois_expiration', 'mois_expiration', 'trim');
        $this->form_validation->set_rules('annee_expiration', 'annee_expiration', 'trim');
        $this->form_validation->set_rules('int_debut', 'indice de debut', 'trim|required');
        $this->form_validation->set_rules('int_fin', 'indice de fin', 'trim|required');
        
    
	    if($this->form_validation->run()) 
	    {
            
    
            $description_lot=$this->input->post('description_lot');
            $id_lot=$this->administration_model->clePrimaire(10);

            $id_cmd_appro=$this->input->post('id_cmd_appro');

            $date_expiration_mois=$this->input->post('mois_expiration');
            $date_expiration_annee=$this->input->post('annee_expiration');

            $numero_cartes=$this->input->post('numero_cartes');
            
           
            $date_enregistrement=date("Y-m-d h:i:s");
            $status="0";
            $id_client="0";
            $id_administrateur=$this->session->userdata('id_admin');

            $int_debut=$this->input->post('int_debut');
            $int_fin=$this->input->post('int_fin');

            $nbre_total_cartes_lot=$int_fin-$int_debut+1;
            $nbre_total_int=$int_fin-$int_debut;
            $total_lot=(int)$this->administration_model->mdl_compterLotCartes();
            $total_lot_plus=$total_lot+1;

            $numero_cartes_lot="lot n° ".$total_lot_plus;
            $nbre_init=0;


            $data_CarteLot = array(

                'numero_cartes_lot'  => $numero_cartes_lot,            
                'description_lot'=> $description_lot,
                'date_expiration_mois_lot'=> $date_expiration_mois,
                'date_expiration_annee_lot'=> $date_expiration_annee,
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
                'id_cmd_appro'=> $id_cmd_appro,
                'id_lot'=> $id_lot,    

            );

         

            $this->administration_model->mdl_ajoutCartesLot($data_CarteLot);

            $numero_cartes=$int_debut;

            for($i=0;$i <=$nbre_total_int; $i++){

                $mot_de_passe_cartes=$this->administration_model->clePrimaireCM(4);
                $num_carte_genere=(string)$numero_cartes;
                $num_carte_genere_court=substr($num_carte_genere,7,15);


                $data_Carte = array(

                    'numero_cartes'  => $num_carte_genere,
                    'numero_cartes_court'  => $num_carte_genere_court,            
                    'validite_cartes'=> $date_expiration_mois."/".$date_expiration_annee,
                    'validite_annee'=> $date_expiration_mois,
                    'validite_mois'=> $date_expiration_annee,
                    'mot_de_passe_cartes'=> $mot_de_passe_cartes,
                    'date_enregistrement_cartes'=> $date_enregistrement,
                    'status_cartes'=> $status,
                    'status_vente'=> $nbre_init, 
                    'id_client'=> $id_client,
                    'id_cmd_appro'=> $id_cmd_appro,
                    'id_lot'=> $id_lot,
                    'id_administrateur'=> $id_administrateur,
                    
    
                );
                $this->administration_model->mdl_ajoutCartes($data_Carte);
                $numero_cartes=$numero_cartes+1;

                



            }

            


           $this->gestionCartes();

	               

	    }else
	    {

            $data["list_cmdAppro"]=$this->administration_model->mdl_listApproCartes();
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


    //gestion cartes affectations

    function gestionCartesAffectations(){
        
      $data["liste_cartes_affectations"]=$this->administration_model->mdl_listaffectationLots();
      $data["pg_content"]="pg_gestion_cartes_affectations";
      $this->load->view("main_view",$data);


    }
    
    

    function gestionCartesAffectations_ajout(){

        $this->form_validation->set_rules('id_lot', 'id_lot', 'trim');
        $this->form_validation->set_rules('indice_depart', 'indice_depart', 'trim');
        $this->form_validation->set_rules('indice_fin', 'indice_fin', 'trim');
          
    
	    if($this->form_validation->run()) 
	    {
            
    
            $id_lot=$this->input->post('id_lot');
            $indice_depart=$this->input->post('indice_depart');
            $indice_fin=$this->input->post('indice_fin');
            $diff=$indice_fin-$indice_depart;
            $date=date("d-m-Y H:i:s");
            $id_administrateur=$this->session->userdata('id_admin');



            if($id_lot <> ""){

               
                $listCartesVendable=$this->administration_model->mdl_listVentesLotStatusVente($id_lot);
                $compt=0;
                foreach($listCartesVendable as $info){
                    $compt=$compt+1;

                    $numero_cartes=$info["numero_cartes"];
                    $this->administration_model->affectionLots($id_lot,$numero_cartes);
                }


                $data_affectations = array(

                    'libelle_cartesAffectations'  => "Cartes Gratuites", 
                    'quantite_cartesAffectations'=> $compt,           
                    'id_lot'=> $id_lot,
                    'carte_alpha_cartesAffectations'=> 0, 
                    'carte_omega_cartesAffectations'=> 0, 
                    'date_carte_alpha_cartesAffectations'=> $date,
                    'id_administrateur'=> $id_administrateur, 
    
                );

                if($this->administration_model->mdl_ajoutAffection($data_affectations)){

                    $this->gestionCartesAffectations();
                }

               

            

            }else{

                if($indice_depart <> "" AND $indice_fin <> ""){

                    $numero_cartes=$indice_depart;
                    $compt=0;
                    for($i=0;$i <=$diff;$i++){

                        $compt=$compt+1;

                        $this->administration_model->affectionLots($id_lot,$numero_cartes);
                        $numero_cartes=$numero_cartes+1;

                    }

                    $data_affectations = array(

                        'libelle_cartesAffectations'  => "Cartes Gratuites", 
                        'quantite_cartesAffectations'=> $compt,            
                        'id_lot'=> 0,
                        'carte_alpha_cartesAffectations'=> $indice_depart, 
                        'carte_omega_cartesAffectations'=> $indice_fin, 
                        'date_carte_alpha_cartesAffectations'=> $date,
                        'id_administrateur'=> $id_administrateur, 
        
                    );
    
                    if($this->administration_model->mdl_ajoutAffection($data_affectations)){
    
                        $this->gestionCartesAffectations();
                    }

                    


                }
            }

           

            


            
            


           

	               

	    }else
	    {

            
            $data["liste_lots"]=$this->administration_model->mdl_listLotCartes();
	        $data["pg_content"]="pg_gestion_cartes_affectations_ajout";
            $this->load->view("main_view",$data);

	    }
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
        
        $data["liste_lieu_habitation"]=$this->administration_model->mdl_listClients_lieu_Habitations();
        $data["pg_content"]="pg_vente_cartes";
        $this->load->view("main_view",$data);


    }

    function achatCarte(){


        
        $this->form_validation->set_rules('raison_sociale_client', 'raison_sociale_client', 'trim');
        $this->form_validation->set_rules('date_naissance_client', 'date_naissance_client', 'trim');
        $this->form_validation->set_rules('lieu_habitation_client', 'lieu_habitation_client', 'trim');
        $this->form_validation->set_rules('profession_client', 'profession_client', 'trim');

        $this->form_validation->set_rules('civilite', 'civilite', 'trim|required');
        $this->form_validation->set_rules('code_commercial', 'code commercial', 'trim|required');

        $this->form_validation->set_rules('civilite', 'civilite', 'trim|required');
        $this->form_validation->set_rules('code_commercial', 'code commercial', 'trim|required');

        $this->form_validation->set_rules('code_carte', 'code_carte', 'trim|required');
        $this->form_validation->set_rules('nom_prenoms_client', 'nom_prenoms_client', 'trim|required');
        $this->form_validation->set_rules('numero_telephone_mobile_client', 'numero_telephone_mobile_client', 'trim|required');
        $this->form_validation->set_rules('email_client', 'email_client', 'trim');
        $this->form_validation->set_rules('type_client', 'type_client', 'trim');
        
        
	    if($this->form_validation->run()) 
	    {
            
            $raison_sociale_client=$this->input->post('raison_sociale_client');
            $date_naissance_client=$this->input->post('date_naissance_client');
            $lieu_habitation_client=$this->input->post('lieu_habitation_client');
            $profession_client=$this->input->post('profession_client');
            $type_client=$this->input->post('type_client');


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
                'date_naissance_client'  => $date_naissance_client,
                'lieu_habitation_client'  => $lieu_habitation_client, 
                'profession_client'  => $profession_client,        
                'numero_telephone_mobile_client'=> $numero_telephone_mobile_client,
                'email_client'=> $email_client,
                'type_client'=> $type_client,
                'code_commercial'=> $code_commercial, 
               
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


            if($type_client == "entreprise"){
         
                $nom_complet=$raison_sociale_client;

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
