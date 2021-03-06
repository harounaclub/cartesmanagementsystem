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
        $this->form_validation->set_rules('option_sms', 'option_sms', 'trim');
        $this->form_validation->set_rules('mot_de_passe_cartes', 'mot_de_passe_cartes', 'trim');
        
        
        
	    if($this->form_validation->run()) 
	    {
            
            $raison_sociale_client=$this->input->post('raison_sociale_client');
            $date_naissance_client=$this->input->post('date_naissance_client');
            $lieu_habitation_client=$this->input->post('lieu_habitation_client');
            $profession_client=$this->input->post('profession_client');
            $type_client=$this->input->post('type_client');

            $option_sms=$this->input->post('option_sms');
            $mot_de_passe_cartes=$this->input->post('mot_de_passe_cartes');

            $date_achat_carte_client=date("d-m-Y");
            $date_achat_carte_client_strtotime=strtotime($date_achat_carte_client);


            $civilite=$this->input->post('civilite');
            $code_commercial=$this->input->post('code_commercial');
            $code_carte=$this->input->post('code_carte');
            $nom_prenoms_client=$this->input->post('nom_prenoms_client');

            $numero_telephone_mobile_client=$this->input->post('numero_telephone_mobile_client');
            $email_client=$this->input->post('email_client');

            $id_administrateur=$this->session->userdata('id_admin');
            $nom_prenoms_caissier=$this->session->userdata('admin_nomPrenoms');
            $id_caisse=$this->administration_model->mdl_infoCaissesCaissier($id_administrateur);
            


            $id_client=$this->administration_model->clePrimaire(10);

            

            if($mot_de_passe_cartes <> ""){


                $this->administration_model->mdl_modCartesAchatStatusMotdePasse($code_carte,$mot_de_passe_cartes);


            }else{

                $mot_de_passe_cartes=$this->administration_model->mdl_infoMotdepasseClient($id_client);


            }


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
                'numero_carte_client'=> $code_carte,
                'mot_de_passe_carte_client'=> $mot_de_passe_cartes,
                'date_achat_carte_client'=> $date_achat_carte_client,
                'date_achat_carte_client_strtotime'=> $date_achat_carte_client_strtotime,
                'code_commercial'=> $code_commercial, 
                'id_caisse'=> $id_caisse, 
                'id_caissier'=> $id_administrateur,
                'nom_prenoms_caissier'=> $nom_prenoms_caissier, 
               
            );


            $this->administration_model->mdl_ajoutClient($data_client);
            $this->administration_model->mdl_modCartesAchatStatus($code_carte);
            $this->administration_model->mdl_modCartesAchatClient($code_carte,$id_client);

            
            



            
            
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

        if($option_sms == "0"){

            $token=$this->get_token();

            $message=urlencode("Bonjour $nom_complet,votre carte prixkdo n°$code_carte est désormais active.Connectez-vous et profitez de réductions sur www.prixkdo.ci MDP : $mot_de_passe_client");
            $result=file_get_contents("http://cartes.gloohost.net/sms/sendSms.php?token=$token&tel=$numero_telephone_mobile_client&message=$message");


        }else{

            echo "option envoyé sms non active";
        }

        
        
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

        $this->form_validation->set_rules('nom_prenoms_administrateur', 'nom_prenoms_administrateur', 'trim|required');
        $this->form_validation->set_rules('telephone_mobile_administrateur', 'telephone_mobile_administrateur', 'trim|required');
        $this->form_validation->set_rules('email_administrateur', 'email_administrateur', 'trim');
        $this->form_validation->set_rules('login_administrateur', 'login_administrateur', 'trim');
        $this->form_validation->set_rules('id_typePiece_administrateur', 'id_typePiece_administrateur', 'trim');
        $this->form_validation->set_rules('numeroPiece_administrateur', 'numeroPiece_administrateur', 'trim');
        $this->form_validation->set_rules('profils', 'profils', 'trim');
	   
	      
	    if($this->form_validation->run()) 
	    {
            
            $nom_prenoms_administrateur=$this->input->post('nom_prenoms_administrateur');
            $telephone_mobile_administrateur=$this->input->post('telephone_mobile_administrateur');
            $email_administrateur=$this->input->post('email_administrateur');
            $login_administrateur=$this->input->post('login_administrateur');
            $mot_de_passe_administrateur=$this->administration_model->clePrimaire(10);
            $id_typePiece_administrateur=$this->input->post('id_typePiece_administrateur');
            $numeroPiece_administrateur=$this->input->post('numeroPiece_administrateur');
            $profils=$this->input->post('profils');
            $cle_profils=$this->administration_model->clePrimaire(10);
            
          

            $data_utilisateur = array(

                'nom_prenoms_administrateur'  => $nom_prenoms_administrateur,            
                'telephone_mobile_administrateur'=> $telephone_mobile_administrateur,
                'email_administrateur'=> $email_administrateur, 
                'login_administrateur'=> $login_administrateur, 
                'mot_de_passe_administrateur'=> $mot_de_passe_administrateur, 
                'id_typePiece_administrateur'=> $id_typePiece_administrateur,
                'numeroPiece_administrateur'=> $numeroPiece_administrateur,
                'cle_profils'=> $cle_profils,
    
            );

           if($this->administration_model->mdl_ajoutUtilisateur($data_utilisateur)){

            foreach($profils as $val){

                $data_asso_admin_profils = array(

                    'cle_profils'  => $cle_profils,            
                    'profil'=> $val,
                    
                );

                if($val == "caisse"){

                    $this->administration_model->mdl_modifierUtilisateurCaissier($cle_profils);
                    $this->administration_model->mdl_modifierUtilisateurCaissierStatus($cle_profils);
                    
                }

                $this->administration_model->mdl_ajoutadminProfil($data_asso_admin_profils);

            }

            $this->gestionUtilisateur();


           }


            
          

	    }else
	    {

            $data["list_profils"]=$this->administration_model->mdl_listProfils();
            $data["list_typesPieces"]=$this->administration_model->mdl_listTypesPieces();
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

     //gestion des profils

     function gestionProfils(){
        
        $data["liste_profils"]=$this->administration_model->mdl_listProfils();
        $data["pg_content"]="pg_listeProfils";
        $this->load->view("main_view",$data);
      
    }
    
    function supprimProfils($id){
        
        if($this->administration_model->mdl_supprimProfils($id)){

            $this->gestionProfils();

        }
      
    }

    function ajoutProfils(){

        $this->form_validation->set_rules('libelle_profils', 'libelle_profils', 'trim|required');
        $this->form_validation->set_rules('code_profils', 'code_profils', 'trim|required');
        $this->form_validation->set_rules('commentaire_profils', 'commentaire_profils', 'trim');
       
	      
	    if($this->form_validation->run()) 
	    {
            
            $libelle_profils=$this->input->post('libelle_profils');
            $code_profils=$this->input->post('code_profils');
            $commentaire_profils=$this->input->post('commentaire_profils');
            $date_creation_profils=date("d-m-Y");
            $id_administrateur=$this->session->userdata('id_admin');
            

        
            

            $data_profils = array(

                'libelle_profils'  => $libelle_profils,            
                'code_profils'=> $code_profils,
                'date_creation_profils'=> $date_creation_profils, 
                'id_administrateur'=> $id_administrateur, 
                'commentaire_profils'=> $commentaire_profils, 

            );


            if($this->administration_model->mdl_ajoutProfils($data_profils)){
 
                $this->gestionProfils();

            }
            


           

	               

	    }else
	    {
	        $data["pg_content"]="pg_listeProfils_ajout";
            $this->load->view("main_view",$data);

	    }
        
        
      
    }


    //gestion des caisses

    function gestionCaisses(){

        $nb_caisse=$this->administration_model->mdl_compterCaisses();
        $id_administrateur=$this->session->userdata('id_admin');
        $date_creation_caisse=date("d-m-Y");

        if($nb_caisse == 0){

            $data_caisse = array(

                'libelle_caisse'  => "caisse principale",            
                'date_creation_caisse'=> $date_creation_caisse, 
                'type_caisse'=> "caisse principale", 
                'id_caissier'=> 0, 
                'id_administrateur'=> $id_administrateur

            );

            $this->administration_model->mdl_ajoutCaisse($data_caisse);

           
        }



        $data["liste_caisses"]=$this->administration_model->mdl_listCaisses();
        $data["pg_content"]="pg_gestion_caisses";
        $this->load->view("main_view",$data);

           


    }

    function gestionCaisses_ajout(){

         
        $nb_caisse=$this->administration_model->mdl_compterCaisses();
        $numero_caisse=$nb_caisse+1;

        $libelle_caisse="Caisse n° ".$numero_caisse;
        $id_administrateur=$this->session->userdata('id_admin');
        $date_creation_caisse=date("d-m-Y");

        

            $data_caisse = array(

                'libelle_caisse'  => $libelle_caisse,            
                'date_creation_caisse'=> $date_creation_caisse, 
                'type_caisse'=> "caisse secondaire", 
                'id_caissier'=> 0, 
                'id_administrateur'=> $id_administrateur

            );

            $this->administration_model->mdl_ajoutCaisse($data_caisse);
            header('Location: http://cartes.gloohost.net/administration/gestionCaisses'); 

            
	  

    }

    //gestion caissier

    function gestionCaissier(){

        $data["liste_caissier"]=$this->administration_model->mdl_listCaissier();
        
        $data["pg_content"]="pg_gestionCaissier";
        $this->load->view("main_view",$data);


    }

    function gestionCaissier_ajout(){

        $this->form_validation->set_rules('nom_prenoms_administrateur', 'nom_prenoms_administrateur', 'trim|required');
        $this->form_validation->set_rules('telephone_mobile_administrateur', 'telephone_mobile_administrateur', 'trim|required');
        $this->form_validation->set_rules('email_administrateur', 'email_administrateur', 'trim');
        $this->form_validation->set_rules('login_administrateur', 'login_administrateur', 'trim');
        $this->form_validation->set_rules('id_typePiece_administrateur', 'id_typePiece_administrateur', 'trim');
        $this->form_validation->set_rules('numeroPiece_administrateur', 'numeroPiece_administrateur', 'trim');
        $this->form_validation->set_rules('profils', 'profils', 'trim');
       
	      
	    if($this->form_validation->run()) 
	    {
            
            $nom_prenoms_administrateur=$this->input->post('nom_prenoms_administrateur');
            $telephone_mobile_administrateur=$this->input->post('telephone_mobile_administrateur');
            $email_administrateur=$this->input->post('email_administrateur');
            $login_administrateur=$this->input->post('login_administrateur');
            $mot_de_passe_administrateur=$this->administration_model->clePrimaire(10);
            $id_typePiece_administrateur=$this->input->post('id_typePiece_administrateur');
            $numeroPiece_administrateur=$this->input->post('numeroPiece_administrateur');
            $profils=$this->input->post('profils');
            $cle_profils=$this->administration_model->clePrimaire(10);
            $status_caissier=0;
            
          

            $data_utilisateur = array(

                'nom_prenoms_administrateur'  => $nom_prenoms_administrateur,            
                'telephone_mobile_administrateur'=> $telephone_mobile_administrateur,
                'email_administrateur'=> $email_administrateur, 
                'login_administrateur'=> $login_administrateur, 
                'mot_de_passe_administrateur'=> $mot_de_passe_administrateur, 
                'id_typePiece_administrateur'=> $id_typePiece_administrateur,
                'numeroPiece_administrateur'=> $numeroPiece_administrateur,
                'status_caissier'=> $status_caissier,
                'type_caissier'=> $status_caissier,
                'cle_profils'=> $cle_profils,
    
            );

           if($this->administration_model->mdl_ajoutUtilisateur($data_utilisateur)){

            $data_asso_admin_profils = array(

                'cle_profils'  => $cle_profils,            
                'profil'=> $profils,
                
            );

            $this->administration_model->mdl_ajoutadminProfil($data_asso_admin_profils);

            $this->gestionCaissier();


           }
         

	    }else
	    {

            $data["list_profils"]=$this->administration_model->mdl_listProfils();
            $data["list_typesPieces"]=$this->administration_model->mdl_listTypesPieces();
	        $data["pg_content"]="pg_gestionCaissier_ajout";
            $this->load->view("main_view",$data);

	    }
    }

    function gestionCaissier_affectation($id_caisse){

        $this->form_validation->set_rules('id_caisse', 'id_caisse', 'trim|required');
        $this->form_validation->set_rules('id_caissier', 'caissier', 'trim|required');
       
       
	      
	    if($this->form_validation->run()) 
	    {
            
            $id_caisse=$this->input->post('id_caisse');
            $id_caissier=$this->input->post('id_caissier');
            
            
            if($this->administration_model->mdl_modCaisseCaissier($id_caisse,$id_caissier)){

                $this->administration_model->mdl_modifierUtilisateurCaissierStatus($id_caissier);
                $this->gestionCaisses();
            }



	    }else
	    {
            
            $data["id_caisse"]=$id_caisse;
            $data["list_caissier"]=$this->administration_model->mdl_listCaissierDisponible();
            $data["infoCaisse"]=$this->administration_model->mdl_infoCaisses($id_caisse);
            $data["list_profils"]=$this->administration_model->mdl_listProfils();
            $data["list_typesPieces"]=$this->administration_model->mdl_listTypesPieces();
	        $data["pg_content"]="pg_gestionCaissier_affectation";
            $this->load->view("main_view",$data);

	    }
    }

    // resume des ventes

    function resumeVente(){

        $data["liste_vente"]=$this->administration_model->mdl_listVentesClients(); 
        $data["pg_content"]="pg_ventesCompta";
        $this->load->view("main_view",$data);


    }

    function resumeCommercial(){

        $data["liste_vente"]=$this->administration_model->mdl_listVentesClients(); 
        $data["pg_content"]="pg_ventesCommercial";
        $this->load->view("main_view",$data);


    }


    function listeClients(){

        $data["liste_vente"]=$this->administration_model->mdl_listVentesClients(); 
        $data["pg_content"]="pg_ventesClients";
        $this->load->view("main_view",$data);


    }

    function modifierClient($id_client){

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
        $this->form_validation->set_rules('option_sms', 'option_sms', 'trim');
        $this->form_validation->set_rules('mot_de_passe_cartes', 'mot_de_passe_cartes', 'trim');
        
        
        
	    if($this->form_validation->run()) 
	    {
            
            $raison_sociale_client=$this->input->post('raison_sociale_client');
            $date_naissance_client=$this->input->post('date_naissance_client');
            $lieu_habitation_client=$this->input->post('lieu_habitation_client');
            $profession_client=$this->input->post('profession_client');
            $type_client=$this->input->post('type_client');

            $option_sms=$this->input->post('option_sms');
            $mot_de_passe_cartes=$this->input->post('mot_de_passe_cartes');

            $date_achat_carte_client=date("d-m-Y");
            $date_achat_carte_client_strtotime=strtotime($date_achat_carte_client);


            $civilite=$this->input->post('civilite');
            $code_commercial=$this->input->post('code_commercial');
            $code_carte=$this->input->post('code_carte');
            $nom_prenoms_client=$this->input->post('nom_prenoms_client');

            $numero_telephone_mobile_client=$this->input->post('numero_telephone_mobile_client');
            $email_client=$this->input->post('email_client');

            $id_administrateur=$this->session->userdata('id_admin');
            $nom_prenoms_caissier=$this->session->userdata('admin_nomPrenoms');
            $id_caisse=$this->administration_model->mdl_infoCaissesCaissier($id_administrateur);
            


            $id_client=$this->administration_model->clePrimaire(10);

            

            if($mot_de_passe_cartes <> ""){


                $this->administration_model->mdl_modCartesAchatStatusMotdePasse($code_carte,$mot_de_passe_cartes);


            }else{

                $mot_de_passe_cartes=$this->administration_model->mdl_infoMotdepasseClient($id_client);


            }


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
                'numero_carte_client'=> $code_carte,
                'mot_de_passe_carte_client'=> $mot_de_passe_cartes,
                'date_achat_carte_client'=> $date_achat_carte_client,
                'date_achat_carte_client_strtotime'=> $date_achat_carte_client_strtotime,
                'code_commercial'=> $code_commercial, 
                'id_caisse'=> $id_caisse, 
                'id_caissier'=> $id_administrateur,
                'nom_prenoms_caissier'=> $nom_prenoms_caissier, 
               
            );


            $this->administration_model->mdl_ajoutClient($data_client);
            $this->administration_model->mdl_modCartesAchatStatus($code_carte);
            $this->administration_model->mdl_modCartesAchatClient($code_carte,$id_client);

            
            



            
            
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

        if($option_sms == "0"){

            $token=$this->get_token();

            $message=urlencode("Bonjour $nom_complet,votre carte prixkdo n°$code_carte est désormais active.Connectez-vous et profitez de réductions sur www.prixkdo.ci MDP : $mot_de_passe_client");
            $result=file_get_contents("http://cartes.gloohost.net/sms/sendSms.php?token=$token&tel=$numero_telephone_mobile_client&message=$message");


        }else{

            echo "option envoyé sms non active";
        }

        
        
            $arr = array(
                'status' => 1,
              );
            echo json_encode($arr);

        
            

           

	               

	    }else
	    {

            $data["id_client"]=$id_client;
            $data["infos_client"]=$this->administration_model->mdl_InfoClient($id_client);
            
	        $data["pg_content"]="pg_clients_modifier";
            $this->load->view("main_view",$data);

	    }


    }

    function commercialCommission(){

        $data["liste_commercial"]=$this->administration_model->mdl_listCommerciaux(); 
        $data["pg_content"]="pg_ventesCommercialCommission";
        $this->load->view("main_view",$data);


    }

    


    //resume vente par commercial

    function resumeVenteParCommercial(){

        $data["liste_vente"]=$this->administration_model->mdl_listVentesClients(); 
        $data["pg_content"]="pg_ventesCompta";
        $this->load->view("main_view",$data);


    }



    //Sms

    function envoiSmsTest(){

        $token=$this->get_token();
        $tel="59900019";
        //$message="Bonjour Binta juste vous informer que les sms sont a nouveau fonctionnel";
        $message="Bonjour Dion ,juste vous notifier que vos clients ont recu leur sms d activation";
        
        //$result=file_get_contents("http://cartes.gloohost.net/sms/sendSms.php?token=$token&tel=$tel&message=$message");
        $result=file_get_contents("http://cartes.prixkdo.local/sms/sendSms.php?token=$token&tel=$tel&message=$message");
        echo $result;
    }

    function envoiSmsClient(){

        $this->form_validation->set_rules('numero_client', 'numero_client', 'trim|required');
        $this->form_validation->set_rules('message_client', 'message_client', 'trim|required');
       
        
        if($this->form_validation->run()) 
        {
            
            $token=$this->get_token();
            $tel=$this->input->post('numero_client');
            $mes=$this->input->post('message_client');
            $message=urlencode($mes);


            
            
            $result=file_get_contents("http://cartes.gloohost.net/sms/sendSms.php?token=$token&tel=$tel&message=$message");
            if($result == "Done!"){


                $lien=base_url();


                echo "<h1 style='color:green'>Sms envoyé avec succès </h1></br></br><a href='".$lien."/administration/listeClients'>Retour à la liste des client </a>";


            }  

        }

        
    }

    function modifierNumeroClient($id_client){


        $this->administration_model->mdl_modifierNumClient($id_client);


    }

    function renvoyerSmsClient($id_client){

        $data["infos_client"]=$this->administration_model->mdl_InfoClient($id_client);
        $data["pg_content"]="pg_renvoyerSmsClient_view";
        $this->load->view("main_view",$data);

    }


    //gestion de la vitrine

    //gestion des villes

    function gestionVilles(){
        
        $data["list_villes"]=$this->administration_model->mdl_listvilles();
        $data["pg_content"]="pg_gestion_villes";
        $this->load->view("main_view",$data);
       
    }

    function check_ville(){

        $id="5caff3ff0777d5063208b874";
        $nb_ville=$this->administration_model->mdl_compterVille($id);
        echo $nb_ville;


    }

    function supprimVilles($id){
        
        if($this->administration_model->mdl_supprimApproCartes($id)){

            $this->gestionApproCartes();

        }
      
    }

    function ajoutVille(){

        $this->form_validation->set_rules('vitrine_ville', 'ville', 'trim|required');
        $this->form_validation->set_rules('descriptionVille_vitrine', 'descriptionVille_vitrine', 'trim');
       
	      
	    if($this->form_validation->run()) 
	    {
            

            
            $vitrine_ville=$this->input->post('vitrine_ville');
            $descriptionVille_vitrine=$this->input->post('descriptionVille_vitrine');
            $dateCreation_vitrine=date("d-m-Y");
            $id_administrateur=$this->session->userdata('id_admin');



            $data_ville = array(

                'vitrine_ville'  => $vitrine_ville,            
                'descriptionVille_vitrine'=> $descriptionVille_vitrine,
                'dateCreation_vitrine'=> $dateCreation_vitrine,
                'id_administrateur'=> $id_administrateur, 

            );

            

            if($this->administration_model->mdl_ajoutVilleVitrine($data_ville)){

                $this->gestionVilles();
            }


            

	               

	    }else
	    {
            
	        $data["pg_content"]="pg_gestion_villes_ajout";
            $this->load->view("main_view",$data);

	    }

        
      
    }

    //gestion des categories

    function gestionCategoriesPartenaires(){
        
        $data["list_categories"]=$this->administration_model->mdl_listCategories();
        $data["pg_content"]="pg_gestion_categories";
        $this->load->view("main_view",$data);
       
    }

    //gestion des categories

    function editerPartenaires($cle_image){
        
        $data["cle_image"]=$cle_image;
        $data["pg_content"]="pg_gestion_partenaires_editer_images";
        $this->load->view("main_view",$data);
       
    }

    function supprimCategoriesPartenaires($id){
        
        if($this->administration_model->mdl_supprimApproCartes($id)){

            $this->gestionApproCartes();

        }
      
    }

    function ajoutCategoriesPartenaire(){

        
        

        $this->form_validation->set_rules('codecategorie_vitrine', 'codecategorie_vitrine', 'trim');
        $this->form_validation->set_rules('iconecategorie_vitrine', 'iconecategorie_vitrine', 'trim');

        $this->form_validation->set_rules('categorie_vitrine', 'categories', 'trim|required');
        $this->form_validation->set_rules('categoriedescription_vitrine', 'categorie description vitrine', 'trim');
      
	   
	      
	    if($this->form_validation->run()) 
	    {
            

            $type_categorie=0;
            $codecategorie_vitrine=$this->input->post('codecategorie_vitrine');
            $iconecategorie_vitrine=$this->input->post('iconecategorie_vitrine');
            $categorie_vitrine=$this->input->post('categorie_vitrine');
            $categorieDescription_vitrine=$this->input->post('categoriedescription_vitrine');
            $dateCreation_vitrine=date("d-m-Y");
            $id_administrateur=$this->session->userdata('id_admin');



            $data_categories = array(

                'type_categorie'  => $type_categorie,
                'codecategorie_vitrine'  => $codecategorie_vitrine,
                'iconecategorie_vitrine'  => $iconecategorie_vitrine,
                'categorie_vitrine'  => $categorie_vitrine,            
                'categorieDescription_vitrine'=> $categorieDescription_vitrine,
                'dateCreation_vitrine'=> $dateCreation_vitrine,
                'id_administrateur'=> $id_administrateur, 

            );

            

            if($this->administration_model->mdl_ajoutVilleCategorie($data_categories)){

                $this->gestionCategoriesPartenaires();
            }           

	    }else
	    {
           
	        $data["pg_content"]="pg_gestion_categories_ajout";
            $this->load->view("main_view",$data);

	    }

    }

    function modifierCategoriePage($id_categorie){

        $data["id_categorie"]=$id_categorie;
        $data["info_categorie"]=$this->administration_model->mdl_listCategoriesParId($id_categorie);
        $data["pg_content"]="pg_gestion_categories_modifier";
        $this->load->view("main_view",$data);


    }

    function modifierCategoriesPartenaire(){

        
        $this->form_validation->set_rules('codecategorie_vitrine', 'codecategorie_vitrine', 'trim');
        $this->form_validation->set_rules('iconecategorie_vitrine', 'iconecategorie_vitrine', 'trim');

        $this->form_validation->set_rules('categorie_vitrine', 'categories', 'trim|required');
        $this->form_validation->set_rules('categoriedescription_vitrine', 'categorie description vitrine', 'trim');
      
	   
	      
	    if($this->form_validation->run()) 
	    {
            

            $type_categorie=$this->input->post('type_categorie');

           
            $id_categorie=$this->input->post('id_categorie');
            $codecategorie_vitrine=$this->input->post('codecategorie_vitrine');
            $iconecategorie_vitrine=$this->input->post('iconecategorie_vitrine');
            $categorie_vitrine=$this->input->post('categorie_vitrine');
            $categorieDescription_vitrine=$this->input->post('categoriedescription_vitrine');
            $dateCreation_vitrine=date("d-m-Y");
            $id_administrateur=$this->session->userdata('id_admin');



            $data_categories = array(

                'type_categorie'  => $type_categorie,
                'codecategorie_vitrine'  => $codecategorie_vitrine,
                'iconecategorie_vitrine'  => $iconecategorie_vitrine,
                'categorie_vitrine'  => $categorie_vitrine,            
                'categorieDescription_vitrine'=> $categorieDescription_vitrine,
                'codecategorie_vitrine'=> $codecategorie_vitrine,
                'dateCreation_vitrine'=> $dateCreation_vitrine,
                'id_administrateur'=> $id_administrateur, 

            );

            

            if($this->administration_model->mdl_modifierCategorie($id_categorie,$data_categories)){

                $this->gestionCategoriesPartenaires();
            }



            

	               

	    }else
	    {
           
	        $data["pg_content"]="pg_gestion_categories_ajout";
            $this->load->view("main_view",$data);

	    }

        
      
    }

    //gestion partenaires

    function gestionPartenaires(){
        
        $data["list_partenaires"]=$this->administration_model->mdl_listPartenaires();
        $data["pg_content"]="pg_gestion_partenaires";
        $this->load->view("main_view",$data);
       
    }

    function supprimPartenaires($id){
        
        if($this->administration_model->mdl_supprimApproCartes($id)){

            $this->gestionApproCartes();

        }
      
    }

    function ajoutPartenaire(){

        $this->form_validation->set_rules('partenaireNom_vitrine', 'nom du partenaire', 'trim');
        $this->form_validation->set_rules('partenaireLocalisation_vitrine', 'localisation du partenaire', 'trim');
        $this->form_validation->set_rules('partenaireReduction_vitrine', 'partenaireReduction_vitrine', 'trim');
        $this->form_validation->set_rules('partenaireHoraire_vitrine', 'horaires du partenaire', 'trim');
        $this->form_validation->set_rules('partenaireTelephone_vitrine', 'telephone', 'trim');
        $this->form_validation->set_rules('partenaireTelephone_mobile_vitrine', 'telephone', 'trim');
        $this->form_validation->set_rules('partenaireEmail_vitrine', 'mail', 'trim');
        $this->form_validation->set_rules('partenaireSiteWeb_vitrine', 'site web', 'trim');
        $this->form_validation->set_rules('partenaireGoogleMaps_vitrine', 'partenaireGoogleMaps_vitrine', 'trim');
       
        $this->form_validation->set_rules('id_categorie', 'categorie', 'trim');
        $this->form_validation->set_rules('id_ville', 'ville', 'trim');
        $this->form_validation->set_rules('partenaireDescription_vitrine', 'partenaireDescription_vitrine', 'trim');
        $this->form_validation->set_rules('partenaireContenuDescription_vitrine', 'partenaireContenuDescription_vitrine', 'trim');
        
        
        
        

	   
	      
	    if($this->form_validation->run()) 
	    {
         
            $partenaireNom_vitrine=$this->input->post('partenaireNom_vitrine');
            $partenaireLocalisation_vitrine=$this->input->post('partenaireLocalisation_vitrine');
            $partenaireHoraire_vitrine=$this->input->post('partenaireHoraire_vitrine');
            $partenaireTelephone_vitrine=$this->input->post('partenaireTelephone_vitrine');
            $partenaireTelephone_mobile_vitrine=$this->input->post('partenaireTelephone_mobile_vitrine');
            $partenaireEmail_vitrine=$this->input->post('partenaireEmail_vitrine');
            $partenaireSiteWeb_vitrine=$this->input->post('partenaireSiteWeb_vitrine');

            $partenaireContenuDescription_vitrine=$this->input->post('partenaireContenuDescription_vitrine');
            
            $partenaireReduction_vitrine=$this->input->post('partenaireReduction_vitrine');
            $partenaireGoogleMaps_vitrine=$this->input->post('partenaireGoogleMaps_vitrine');
            
            $id_categorie=$this->input->post('id_categorie');
            $cle_image=$this->input->post('cle_image');
            $id_ville=$this->input->post('id_ville');
            $partenaireDescription_vitrine=$this->input->post('partenaireDescription_vitrine');
            $partenaireSiteWeb_vitrine=$this->input->post('partenaireSiteWeb_vitrine');
            
            $dateCreation_vitrine=date("d-m-Y");
            $partenaire_status=1;

          
           
            $id_administrateur=$this->session->userdata('id_admin');



            $data_partenaire = array(

                'partenaireNom_vitrine'  => $partenaireNom_vitrine,            
                'partenaireLocalisation_vitrine'=> $partenaireLocalisation_vitrine,
                'partenaireHoraire_vitrine'=> $partenaireHoraire_vitrine,
                'partenaireTelephone_vitrine'=> $partenaireTelephone_vitrine, 
                'partenaireTelephone_mobile_vitrine'=> $partenaireTelephone_mobile_vitrine, 
                'partenaireEmail_vitrine'=> $partenaireEmail_vitrine, 
                'partenaireSiteWeb_vitrine'=> $partenaireSiteWeb_vitrine, 
                'partenaireReduction_vitrine'=> $partenaireReduction_vitrine, 
                'partenaireGoogleMaps_vitrine'=> $partenaireGoogleMaps_vitrine, 
                
                'dateCreation_vitrine'=> $dateCreation_vitrine,
                'id_categorie'=> $id_categorie,
                'partenaire_status'=> $partenaire_status,
                'id_ville'=> $id_ville,
                'partenaireDescription_vitrine'=> $partenaireDescription_vitrine,
                'partenaireContenuDescription_vitrine'=> $partenaireContenuDescription_vitrine,
                'cle_image'=> $cle_image,

                'id_administrateur'=> $id_administrateur, 

            );

            

            if($this->administration_model->mdl_ajoutPartenaire($data_partenaire)){

                $this->gestionPartenaires();
            }


            

	               

	    }else
	    {

            $data["cle_image"]=$this->administration_model->clePrimaire(10);
            $data["list_villes"]=$this->administration_model->mdl_listvilles();
            $data["list_categories"]=$this->administration_model->mdl_listCategories();
	        $data["pg_content"]="pg_gestion_partenaires_ajout";
            $this->load->view("main_view",$data);

	    }

        
      
    }

    function editerPartenaireInfo($id_partenaire){

        $this->form_validation->set_rules('partenaireNom_vitrine', 'nom du partenaire', 'trim');
        $this->form_validation->set_rules('partenaireLocalisation_vitrine', 'localisation du partenaire', 'trim');
        $this->form_validation->set_rules('partenaireReduction_vitrine', 'partenaireReduction_vitrine', 'trim');
        $this->form_validation->set_rules('partenaireHoraire_vitrine', 'horaires du partenaire', 'trim');
        $this->form_validation->set_rules('partenaireTelephone_vitrine', 'telephone', 'trim');
        $this->form_validation->set_rules('partenaireTelephone_mobile_vitrine', 'telephone', 'trim');
        $this->form_validation->set_rules('partenaireEmail_vitrine', 'mail', 'trim');
        $this->form_validation->set_rules('partenaireSiteWeb_vitrine', 'site web', 'trim');
        $this->form_validation->set_rules('partenaireGoogleMaps_vitrine', 'partenaireGoogleMaps_vitrine', 'trim');
       
        $this->form_validation->set_rules('id_categorie', 'categorie', 'trim');
        $this->form_validation->set_rules('id_ville', 'ville', 'trim');
        $this->form_validation->set_rules('partenaireDescription_vitrine', 'partenaireDescription_vitrine', 'trim');
        $this->form_validation->set_rules('partenaireContenuDescription_vitrine', 'partenaireContenuDescription_vitrine', 'trim');
        
        
        
        

	   
	      
	    if($this->form_validation->run()) 
	    {
         
            $partenaireNom_vitrine=$this->input->post('partenaireNom_vitrine');
            $partenaireLocalisation_vitrine=$this->input->post('partenaireLocalisation_vitrine');
            $partenaireHoraire_vitrine=$this->input->post('partenaireHoraire_vitrine');
            $partenaireTelephone_vitrine=$this->input->post('partenaireTelephone_vitrine');
            $partenaireTelephone_mobile_vitrine=$this->input->post('partenaireTelephone_mobile_vitrine');
            $partenaireEmail_vitrine=$this->input->post('partenaireEmail_vitrine');
            $partenaireSiteWeb_vitrine=$this->input->post('partenaireSiteWeb_vitrine');

            $partenaireContenuDescription_vitrine=$this->input->post('partenaireContenuDescription_vitrine');
            
            $partenaireReduction_vitrine=$this->input->post('partenaireReduction_vitrine');
            $partenaireGoogleMaps_vitrine=$this->input->post('partenaireGoogleMaps_vitrine');
            
            $id_categorie=$this->input->post('id_categorie');
            $cle_image=$this->input->post('cle_image');
            $id_ville=$this->input->post('id_ville');
            $partenaireDescription_vitrine=$this->input->post('partenaireDescription_vitrine');
            
            $dateCreation_vitrine=date("d-m-Y");
            $partenaire_status=1;

          
           
            $id_administrateur=$this->session->userdata('id_admin');
            $id_partenaire=$this->input->post('id_partenaire');

           


        



            $data_partenaire = array(

                'partenaireNom_vitrine'  => $partenaireNom_vitrine,            
                'partenaireLocalisation_vitrine'=> $partenaireLocalisation_vitrine,
                'partenaireHoraire_vitrine'=> $partenaireHoraire_vitrine,
                'partenaireTelephone_vitrine'=> $partenaireTelephone_vitrine, 
                'partenaireTelephone_mobile_vitrine'=> $partenaireTelephone_mobile_vitrine, 
                'partenaireEmail_vitrine'=> $partenaireEmail_vitrine, 
                'partenaireReduction_vitrine'=> $partenaireReduction_vitrine, 
                'partenaireGoogleMaps_vitrine'=> $partenaireGoogleMaps_vitrine, 
                
                'dateCreation_vitrine'=> $dateCreation_vitrine,
                'id_categorie'=> $id_categorie,
                'partenaire_status'=> $partenaire_status,
                'id_ville'=> $id_ville,
                'partenaireDescription_vitrine'=> $partenaireDescription_vitrine,
                'partenaireContenuDescription_vitrine'=> $partenaireContenuDescription_vitrine,
                'cle_image'=> $cle_image,

                'id_administrateur'=> $id_administrateur, 

            );


            

            

            if($this->administration_model->mdl_modifierPartenaire($id_partenaire,$data_partenaire)){

                $this->gestionPartenaires();
            }


            

	               

	    }else
	    {

            $data["cle_image"]=$this->administration_model->clePrimaire(10);
            $data["list_villes"]=$this->administration_model->mdl_listvilles();
            $data["list_categories"]=$this->administration_model->mdl_listCategories();
            $data["info_partenaire"]=$this->administration_model->mdl_infoPartenaire($id_partenaire);
	        $data["pg_content"]="pg_gestion_partenaires_editer";
            $this->load->view("main_view",$data);

	    }

        
      
    }

    //upload logo partenaire
    public function upload_logo()
    {
        if (!empty($_FILES)) {
            $targetPath = getcwd() . '/uploads/logo';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = date("Y_m_d_H_i_s_").rand();
            $config['upload_path'] = $targetPath;
            $config['allowed_types'] = 'jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file')) {
                $fichier = $this->upload->data();
            }
                        
            $cle_image=$this->input->post('cle_image');           
            $image_name= $fichier['file_name'];

            $data_partenaire_logo = array(

                'cle_image'  => $cle_image, 
                'logo'  => "1",            
                'image'=> $image_name,
                

            );
                        		
			$this->administration_model->mdl_ajoutPartenaireLogo($data_partenaire_logo);
                
        }
    }
    
    public function upload_images_partenaires()
    {
        if (!empty($_FILES)) {
            $targetPath = getcwd() . '/uploads/partenaires';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = date("Y_m_d_H_i_s_").rand();
            $config['upload_path'] = $targetPath;
            $config['allowed_types'] = 'jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file')) {
                $fichier = $this->upload->data();
            }
                        
            $cle_image=$this->input->post('cle_image');           
            $image_name= $fichier['file_name'];

            $data_partenaire_image = array(

                'cle_image'  => $cle_image,
                'logo'  => "0",             
                'image'=> $image_name,
                

            );
                        		
			$this->administration_model->mdl_ajoutPartenaireImages($data_partenaire_image);
                
        }
    }


    function mdl_supprimPartenaire($id){
        
        if($this->administration_model->mdl_supprimPartenaire($id)){

            $this->gestionPartenaires();

        }
    
    }

    function mise_ajour_Categorie(){


        $liste_categorie=$this->administration_model->mdl_listCategories();
        foreach($liste_categorie as $categorie){

            $id_mongo=$categorie["_id"];
            foreach($id_mongo as $val){

                $id_categorie=$val;
                $this->administration_model->mdl_modifierCategorieType($id_categorie);
            }




        }

        echo "done";


    }
    












    function get_token(){

        //$token=file_get_contents("http://cartes.gloohost.net/sms/getToken.php");
        $token=file_get_contents("http://cartes.prixkdo.local/sms/getToken.php");
        return $token;
    }

 
    function seDeconnecter(){

        session_destroy();
        redirect("login");
    } 




}
