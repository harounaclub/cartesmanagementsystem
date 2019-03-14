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

    function mdl_listUtilisateur()
    {


        $list_auteur=$this->mongo_db->get('administrateur');
        return $list_auteur;


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
 
 
         $listApproCartes=$this->mongo_db->get('appro_fournisseurs');
         return $listApproCartes;
 
 
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

        $this->mongo_db->insert('approvisionnement_cartes', $data);
        return True;

    }

    function mdl_listApproCartes()
    {


        $listApproCartes=$this->mongo_db->get('approvisionnement_cartes');
        return $listApproCartes;


    }

    function mdl_supprimApproCartes($id){


       
        $convertedid=new MongoDB\BSON\ObjectId($id);
 
        $this->mongo_db->where('_id',$convertedid);
        $this->mongo_db->delete('approvisionnement_cartes');
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

      function mdl_modCartesAchatStatus($numero_cartes){

        $this->mongo_db->where(array('numero_cartes' => $numero_cartes))->set('status_cartes',2)->update('cartes');
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
  
      function mdl_supprimVente($id){
  
  
         
          $convertedid=new MongoDB\BSON\ObjectId($id);
   
          $this->mongo_db->where('_id',$convertedid);
          $this->mongo_db->delete('ventes');
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