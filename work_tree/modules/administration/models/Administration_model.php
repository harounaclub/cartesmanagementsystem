<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administration_model extends CI_Model {

    function __construct() {

        parent::__construct();
        $this->load->library('mongo_db',array('activate'=>'default'),'mongo_db');

    }


    //gestion utilisateur

    function mdl_ajoutUtilisateur($data)
    {

        $this->mongo_db->insert('administrateur', $data);
        return True;

    }

    function mdl_infoUtilisateur($id)
    {
        $convertedid=new MongoDB\BSON\ObjectId($id);
        $infoAdministrateur=$this->mongo_db->where(array('_id' => $convertedid))->get('administrateur');
        return $infoAdministrateur;

    }

    function mdl_listUtilisateur()
    {


        $list_auteur=$this->mongo_db->get('administrateur');
        return $list_auteur;


    }

    
    function mdl_modifierUtilisateurCaissier($cle_profils)
    {

       
        $this->mongo_db->where(array('cle_profils'=>$cle_profils))->set('type_caissier',0)->update('administrateur');
        return TRUE;


    }

    function mdl_modifierUtilisateurCaissierStatus($cle_profils)
    {

        
        $this->mongo_db->where(array('cle_profils'=>$cle_profils))->set('status_caissier',1)->update('administrateur');
        return TRUE;


    }

    function mdl_modifierUtilisateurCaissierstatus_caissier($id)
    {

       
        $this->mongo_db->where(array('_id'=>$cle_profils))->set('status_caissier',1)->update('administrateur');
        return TRUE;


    }

    function mdl_supprimUtilisateur($id){


       
        $convertedid=new MongoDB\BSON\ObjectId($id);
 
        $this->mongo_db->where('_id',$convertedid);
        $this->mongo_db->delete('administrateur');
         return TRUE;
 
    }

     //gestion fournisseur

     function mdl_ajoutFournisseur($data)
     {
 
         $this->mongo_db->insert('appro_fournisseurs', $data);
         return True;
 
     }
 
     function mdl_listFournisseur()
     {
 
 
         $listFournisseur=$this->mongo_db->get('appro_fournisseurs');
         return $listFournisseur;
 
 
     }

     function mdl_nomFournisseur($id)
     {
 
        $convertedid=new MongoDB\BSON\ObjectId($id);
        $listFournisseur=$this->mongo_db->where(array('_id' => $convertedid))->get('appro_fournisseurs');
        
        $nom_fournisseur="Indefinie";
        foreach($listFournisseur as $fournisseur){

            $nom_fournisseur=$fournisseur["raison_sociale_fournisseur"];
        }
        
         return $nom_fournisseur;
 
 
     }
 
     function mdl_supprimFournisseur($id){
 
 
        
         $convertedid=new MongoDB\BSON\ObjectId($id);
  
         $this->mongo_db->where('_id',$convertedid);
         $this->mongo_db->delete('appro_fournisseurs');
          return TRUE;
  
     }

    //gestion ApproCartes

    function mdl_ajoutApproCartes($data)
    {

        $this->mongo_db->insert('appro_cartes', $data);
        return True;

    }

    function mdl_listApproCartes()
    {


        $listApproCartes=$this->mongo_db->get('appro_cartes');
        return $listApproCartes;


    }

    function mdl_compterApproCartes(){

        $nb_compterApproCartess=$this->mongo_db->count('appro_cartes');
        return $nb_compterApproCartess;
    
    
    }

    function mdl_supprimApproCartes($id){


       
        $convertedid=new MongoDB\BSON\ObjectId($id);
 
        $this->mongo_db->where('_id',$convertedid);
        $this->mongo_db->delete('appro_cartes');
         return TRUE;
 
    }


     //gestion Cartes par lots

     function mdl_ajoutCartesLots($data)
     {
 
         $this->mongo_db->insert('cartes_lot', $data);
         return True;
 
     }
 
     function mdl_listLotCartes()
     {
 
 
         $listApproCartes=$this->mongo_db->get('cartes_lot');
         return $listApproCartes;
 
 
     }

     function mdl_compterLotCartes(){

        $nb_compterLotCartes=$this->mongo_db->count('cartes_lot');
        return $nb_compterLotCartes;
    
    
    }
 
     function mdl_supprimLotCartes($id){
 
 
        
         $convertedid=new MongoDB\BSON\ObjectId($id);
  
         $this->mongo_db->where('_id',$convertedid);
         $this->mongo_db->delete('lot_cartes');
          return TRUE;
          
     }


      //gestion Cartes 

      function mdl_ajoutCartes($data)
      {
  
          $this->mongo_db->insert('cartes', $data);
          return True;
  
      }

      function mdl_listCartesInfo($numero_cartes)
      {
  
  
        $listCartesEnStock=$this->mongo_db->where(array('numero_cartes' => $numero_cartes,'status_cartes' => 1))->get('cartes');
        return $listCartesEnStock;
  
  
      }
  
      function mdl_listCartes()
      {
  
  
          $listApproCartes=$this->mongo_db->get('cartes');
          return $listApproCartes;
  
  
      }

      function mdl_infoMotdepasseClient($id_client)
      {
  
        $infoCartesClient=$this->mongo_db->where(array('id_client' => $id_client))->get('cartes');
        $mot_de_passe_client="0000";
        foreach($infoCartesClient as $value){

            $mot_de_passe_client=$value["mot_de_passe_cartes"];
        }

        return $mot_de_passe_client;
    
  
      }

    function mdl_modifierNumClient($id_client)
    {

        $numero_telephone_mobile_client="08891055";
        $this->mongo_db->where(array('id_client'=>$id_client))->set('numero_telephone_mobile_client',$numero_telephone_mobile_client)->update('clients');
        return TRUE;


    }

      function mdl_infoTelClient($id_client)
      {
  
        $infoCartesClient=$this->mongo_db->where(array('id_client' => $id_client))->get('clients');
        $numero_telephone_mobile_client="0000";
        foreach($infoCartesClient as $value){

            $numero_telephone_mobile_client=$value["numero_telephone_mobile_client"];
        }

        return $numero_telephone_mobile_client;
    
  
      }

      function mdl_listCartesEnStock($id_lot)
      {

           $listCartesEnStock=$this->mongo_db->where(array('status_cartes' => '0','id_lot' => $id_lot))->get('cartes');
           return $listCartesEnStock;
  
      }

      function mdl_modCartes($id_lot){

        $this->mongo_db->where(array('status_cartes' => '0','id_lot'=>$id_lot))->set('status_cartes',1)->update('cartes');
        return TRUE;

      }

      function mdl_modCartesMotdePasse($id_lot){

        $this->mongo_db->where(array('status_cartes' => '0','id_lot'=>$id_lot))->set('status_cartes',1)->update('cartes');
        return TRUE;

      }

      function mdl_modCartesAchatStatus($numero_cartes){

        $this->mongo_db->where(array('numero_cartes' => $numero_cartes))->set('status_cartes',2)->update('cartes');
        return TRUE;

      }

      function mdl_modCartesAchatStatusMotdePasse($numero_cartes,$mot_de_passe_cartes){

        $this->mongo_db->where(array('numero_cartes' => $numero_cartes))->set('mot_de_passe_cartes',$mot_de_passe_cartes)->update('cartes');
        return TRUE;

      }

      function mdl_modCartesAchatClient($numero_cartes,$id_client){

        $this->mongo_db->where(array('numero_cartes' => $numero_cartes))->set('id_client',$id_client)->update('cartes');
        return TRUE;

      }

     
  
      function mdl_supprimCartes($id){
  
  
         
          $convertedid=new MongoDB\BSON\ObjectId($id);
   
          $this->mongo_db->where('_id',$convertedid);
          $this->mongo_db->delete('cartes');
           return TRUE;
   
      }

      function mdl_checkCodeCartes($numero_cartes){

        $status_cartes=1;
        $list_cartes=$this->mongo_db->where(array('numero_cartes' => $numero_cartes,'status_cartes' => 1))->get('cartes');
        $nb_cartes=count($list_cartes);

        if($nb_cartes >0){

            return True;
        }else{

            return False;
        }
    }

       //gestion cartes lot 

       function mdl_ajoutCartesLot($data)
       {
   
           $this->mongo_db->insert('cartes_lot', $data);
           return True;
   
       }

      function mdl_modCartesLot($id_lot){

        $this->mongo_db->where(array('id_lot'=>$id_lot))->set('status_cartes_lot',1)->update('cartes_lot');
        return TRUE;

      }

      
   
       function mdl_listCartesLot()
       {
   
   
           $listApproCartes=$this->mongo_db->get('cartes_lot');
           return $listApproCartes;
   
   
       }
   
       function mdl_supprimCartesLot($id){
   
   
          
           $convertedid=new MongoDB\BSON\ObjectId($id);
    
           $this->mongo_db->where('_id',$convertedid);
           $this->mongo_db->delete('cartes_lot');
            return TRUE;
    
       }


      //gestion Commerciaux 

      function mdl_ajoutCommerciaux($data)
      {
  
          $this->mongo_db->insert('commerciaux', $data);
          return True;
  
      }

      function mdl_checkCodeCommercial($code_commerciaux){

        $list_commerciaux=$this->mongo_db->where(array('code_commerciaux' => $code_commerciaux))->get('commerciaux');
        $nb_commerciaux=count($list_commerciaux);

        if($nb_commerciaux >0){

            return True;
        }else{

            return False;
        }
    }

    function mdl_InfoCommercial($code_commerciaux){

        $list_commerciaux=$this->mongo_db->where(array('code_commerciaux' => $code_commerciaux))->get('commerciaux');
        return $list_commerciaux;
    }
  
      function mdl_listCommerciaux()
      {
  
  
          $listApproCartes=$this->mongo_db->get('commerciaux');
          return $listApproCartes;
  
  
      }
  
      function mdl_supprimCommerciaux($id){
  
  
         
          $convertedid=new MongoDB\BSON\ObjectId($id);
   
          $this->mongo_db->where('_id',$convertedid);
          $this->mongo_db->delete('commerciaux');
           return TRUE;
   
      }

      //gestion Clients 

      function mdl_ajoutClient($data)
      {
  
          $this->mongo_db->insert('clients', $data);
          return True;
  
      }
  
      function mdl_listClients()
      {
  
  
          $listApproCartes=$this->mongo_db->get('clients');
          return $listApproCartes;
  
  
      }

      function mdl_listClients_lieu_Habitations()
      {
  
  
        $listlieu_habitation=$this->mongo_db->get('clients_lieu_habitation');
        return $listlieu_habitation;
  
  
      }

      function mdl_listTypeClient()
      {
  
  
        $clients_type=$this->mongo_db->get('clients_type');
        return $clients_type;
  
  
      }
  
      function mdl_supprimClients($id){
  
  
         
          $convertedid=new MongoDB\BSON\ObjectId($id);
   
          $this->mongo_db->where('_id',$convertedid);
          $this->mongo_db->delete('clients');
           return TRUE;
   
      }

      //gestion ventes 

      function mdl_ajoutVente($data)
      {
  
          $this->mongo_db->insert('ventes', $data);
          return True;
  
      }
  
      function mdl_listVentes()
      {
  
  
          $listApproCartes=$this->mongo_db->get('ventes');
          return $listApproCartes;
  
  
      }

      function mdl_listVentesLotStatusVente($id_lot)
      {
  
          $status=0;
          $listCartes=$this->mongo_db->where(array('id_lot' => $id_lot,'status_vente' => $status))->get('cartes');
          return $listCartes;
  
  
      }
  
      function mdl_supprimVente($id){
  
  
         
          $convertedid=new MongoDB\BSON\ObjectId($id);
   
          $this->mongo_db->where('_id',$convertedid);
          $this->mongo_db->delete('ventes');
           return TRUE;
   
      }

      //gestion profils 

    function mdl_ajoutadminProfil($data)
    {

        $this->mongo_db->insert('administrateur_asso_adminProfils', $data);
        return True;

    }

    function mdl_listeProfilsAdmin($cle_profils)
    {

        $listProfils=$this->mongo_db->where(array('cle_profils' => $cle_profils))->get('administrateur_asso_adminProfils');
        return $listProfils;

    }



      function mdl_ajoutProfils($data)
      {
  
          $this->mongo_db->insert('administrateur_profils', $data);
          return True;
  
      }
  
      function mdl_listProfils()
      {
  
  
          $listProfils=$this->mongo_db->get('administrateur_profils');
          return $listProfils;
  
  
      }

      function mdl_supprimProfils($id){
  
  
         
          $convertedid=new MongoDB\BSON\ObjectId($id);
   
          $this->mongo_db->where('_id',$convertedid);
          $this->mongo_db->delete('administrateur_profils');
           return TRUE;
   
      }


      //types pieces

      function mdl_listTypesPieces()
      {
  
          $listProfils=$this->mongo_db->get('administrateur_types_pieces');
          return $listProfils;
  
  
      }


      //affectations cartes

      function mdl_listaffectationLots()
      {
  
  
          $listcartes_affectations=$this->mongo_db->get('cartes_affectations');
          return $listcartes_affectations;
  
  
      }

      function affectionLots($id_lot,$numero_cartes){

        
        $this->mongo_db->where(array('id_lot' => $id_lot,'numero_cartes' => $numero_cartes))->set('status_vente',1)->update('cartes');
        return TRUE;

      }


     function mdl_nomLot($id)
     {
 
        $convertedid=new MongoDB\BSON\ObjectId($id);
        $infoslot=$this->mongo_db->where(array('_id' => $convertedid))->get('cartes_lot');
        
        $numero_cartes_lot="Indefinie";
        foreach($infoslot as $lot){

            $numero_cartes_lot=$lot["numero_cartes_lot"];
        }
        
         return $numero_cartes_lot;
 
 
     }


      function mdl_ajoutAffection($data)
      {
  
          $this->mongo_db->insert('cartes_affectations', $data);
          return True;
  
      }


       //gestion caisses

       function mdl_listCaisses()
       {
   
           $listCaisses=$this->mongo_db->get('caisses');
           return $listCaisses;
   
   
       }

       function mdl_infoCaisses($id)
       {
        
        $convertedid=new MongoDB\BSON\ObjectId($id);
   
         
         $infoCaisses=$this->mongo_db->where(array('_id' => $convertedid))->get('caisses');
         return $infoCaisses;
   
   
       }

       function mdl_infoCaissesCaissier($id_caissier)
       {
        
 
         $infoCaisses=$this->mongo_db->where(array('id_caissier' => $id_caissier))->get('caisses');
         $id_caisse="";
         foreach($infoCaisses as $info){
         
            $id_mongo=$info["_id"];
            foreach($id_mongo as $val){

                $id_caisse=$val;
            }

         }

         return $id_caisse;
         
   
   
    }

       function mdl_nomCaissier($id)
     {
 
        $convertedid=new MongoDB\BSON\ObjectId($id);
        $listnomCaissier=$this->mongo_db->where(array('_id' => $convertedid))->get('administrateur');
        
        $nom_nomCaissier="Indefinie";
        foreach($listnomCaissier as $caissier){

            $nom_nomCaissier=$caissier["nom_prenoms_administrateur"];
        }
        
         return $nom_nomCaissier;
 
 
     }


       function mdl_supprimCaisse($id){
  
  
    
        $convertedid=new MongoDB\BSON\ObjectId($id);
 
        $this->mongo_db->where('_id',$convertedid);
        $this->mongo_db->delete('caisses');
         return TRUE;
 
        }


        function mdl_modCaisseCaissier($id,$id_caissier){

        $convertedid=new MongoDB\BSON\ObjectId($id);
        $this->mongo_db->where(array('_id' => $convertedid))->set('id_caissier',$id_caissier)->update('caisses');
        return TRUE;

        }

        

        function mdl_compterCaisses(){

            $nb_compterCaisses=$this->mongo_db->count('caisses');
            return $nb_compterCaisses;
        
        
        }

 
       function mdl_ajoutCaisse($data)
       {
   
           $this->mongo_db->insert('caisses', $data);
           return True;
   
       }

        //gestion caissier

        function mdl_listCaissier()
        {
    
            $status_caissier=0;
            $list_listCaissier=$this->mongo_db->where(array('type_caissier' => $status_caissier))->get('administrateur');
            return $list_listCaissier;
    
    
        }

        function mdl_listCaissierDisponible()
        {
    
            $status_caissier=0;
            $list_listCaissier=$this->mongo_db->where(array('type_caissier' => $status_caissier))->get('administrateur');
            return $list_listCaissier;
    
    
        }
 
 
        function mdl_supprimCaissier($id){
   
         $convertedid=new MongoDB\BSON\ObjectId($id);
  
         $this->mongo_db->where('_id',$convertedid);
         $this->mongo_db->delete('caisses_caissier');
          return TRUE;
  
         }
 
 
         function mdl_modCaissier($id_lot){
 
         $this->mongo_db->where(array('status_cartes' => '0','id_lot'=>$id_lot))->set('status_cartes',1)->update('cartes');
         return TRUE;
 
         }
 
         function mdl_compterCaissier(){
 
             $nb_compterCaisses=$this->mongo_db->count('caisses_caissier');
             return $nb_compterCaisses;
         
         
         }

        //resume ventes /clients

        function mdl_listVentesClients()
        {
    
            
            $list_listVente=$this->mongo_db->get('clients');
            return $list_listVente;
    
    
        }


        function mdl_compterVenteCommercial($code_commercial){

            $this->mongo_db->where('code_commercial',$code_commercial);
            $nb_compterCaisses=$this->mongo_db->count('clients');
            return $nb_compterCaisses;
        
        
        }

        function mdl_listVentesClientsParCommercial()
        {
       
            $list_listVente=$this->mongo_db->get('clients');
            return $list_listVente;
    
        }

        function mdl_InfoClient($id_client)
        {
            $convertedid=new MongoDB\BSON\ObjectId($id_client);
            $list_listClients=$this->mongo_db->where('_id',$convertedid)->get('clients');
            return $list_listClients;
    
        }


        //Ville vitrine

        function mdl_listvilles()
        {


            $listApproCartes=$this->mongo_db->get('vitrine_ville');
            return $listApproCartes;


        }

        function mdl_ajoutVilleVitrine($data)
        {
    
            $this->mongo_db->insert('vitrine_ville', $data);
            return True;
    
        }

        //categories vitrine

        function mdl_listCategories()
        {


            $listApproCartes=$this->mongo_db->get('vitrine_categorie');
            return $listApproCartes;


        }

        function mdl_listCategoriesParId($id)
        {

            $convertedid=new MongoDB\BSON\ObjectId($id);
            $listApproCartes=$this->mongo_db->where(array('_id'=>$convertedid))->get('vitrine_categorie');
            return $listApproCartes;


        }

        function mdl_modifierCategorieType($id)
        {
    
            $convertedid=new MongoDB\BSON\ObjectId($id);
            $this->mongo_db->where(array('_id'=>$convertedid))->set('type_categorie',1)->update('vitrine_categorie');
            return TRUE;
    
    
        }

        function mdl_modifierCategorie($id, $data)
        {
            $convertedid=new MongoDB\BSON\ObjectId($id);
            $this->mongo_db->where(array('_id' => $convertedid));
            $this->mongo_db->set($data);
            $option = array('upsert' => true);
            $this->mongo_db->update('vitrine_categorie', $option);


            return true ;
        }

        function mdl_ajoutVilleCategorie($data)
        {
    
            $this->mongo_db->insert('vitrine_categorie', $data);
            return True;
    
        }

         //partenaires vitrine

         function mdl_listPartenaires()
         {
 
 
             $listApproCartes=$this->mongo_db->get('vitrine_partenaire');
             return $listApproCartes;
 
 
         }

         function mdl_listPartenairesCleImage($cle_image)
         {
 
 
            $infoPartenaire=$this->mongo_db->where(array('cle_image' => $cle_image))->get('vitrine_partenaire');
            return $infoPartenaire;
 
 
         }

         function mdl_infoPartenaire($id_partenaire)
         {
 
            $convertedid=new MongoDB\BSON\ObjectId($id_partenaire);
            $infoPartenaire=$this->mongo_db->where(array('_id' => $convertedid))->get('vitrine_partenaire');
            return $infoPartenaire;
 
 
         }
 
         function mdl_ajoutPartenaire($data)
         {
     
             $this->mongo_db->insert('vitrine_partenaire', $data);
             return True;
     
         }

         function mdl_ajoutPartenaireLogo($data)
         {
     
             $this->mongo_db->insert('vitrine_partenaire_logo', $data);
             return True;
     
         }

         function mdl_ajoutPartenaireImages($data)
         {
     
             $this->mongo_db->insert('vitrine_partenaire_images', $data);
             return True;
     
         }

        function mdl_imageLogo($cle_image)
        {
    
            
            $image_logo=$this->mongo_db->where(array('cle_image' => $cle_image))->get('vitrine_partenaire_logo');
            return $image_logo;
    
    
        }

        function mdl_ListImagesPartenairesAutres($cle_image)
        {
    
            
            $images_partenaires=$this->mongo_db->where(array('cle_image' => $cle_image))->get('vitrine_partenaire_images');
            return $images_partenaires;
    
    
        }

         function mdl_supprimPartenaire($id){
        
            $convertedid=new MongoDB\BSON\ObjectId($id);
     
            $this->mongo_db->where('_id',$convertedid);
            $this->mongo_db->delete('vitrine_partenaire');
             return TRUE;
     
        }

       



 
  
        
 


      

  


    



    

       // generateur de clé primaire
   function clePrimaire( $taille ) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$taille);

   }

   function clePrimaireCM( $taille ) {

    $chars = "0123456789";
    return substr(str_shuffle($chars),0,$taille);

   }

  


  

}