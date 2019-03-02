<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administration_model extends CI_Model {

    function __construct() {

        parent::__construct();

    }


     function getInfo_generales(){

      $id_infos="1234";
      $this->db->where('id_infos',$id_infos);
      $q = $this->db->get('infos_generales');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }

     function modifier_infos_generale($id_infos,$data){
       
        $this->db->where('id_infos',$id_infos);
        $this->db->update('infos_generales', $data);
        return True;

   }

     function getInfo_sliders(){

      $q = $this->db->get('sliders');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }

     function ajoutSlider($data){
       
     $this->db->insert('sliders', $data); 
     return True;

   }

   function modifier_sliders($id_slide,$data){
       
        $this->db->where('id_slide',$id_slide);
        $this->db->update('sliders', $data);
        return True;

   }

     function getInfo_sliders_id($id_slide){
   
      $this->db->where('id_slide',$id_slide);
      $q = $this->db->get('sliders');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }

     function delete_slider($id_slide){
     
      $this->db->delete('sliders', array('id_slide' => $id_slide));
      return True; 

   }


    function getInfo_equipe(){

      $q = $this->db->get('equipe');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }

    function ajoutEquipe($data){
       
     $this->db->insert('equipe', $data); 
     return True;

   }


     function getInfo_equipe_id($id_equipe){
      
      $this->db->where('id_equipe',$id_equipe);
      $q = $this->db->get('equipe');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }


    function ajoutActualite($data){
       
     $this->db->insert('actualite', $data); 
     return True;

   }


    function delete_equipe($id_equipe){
     
      $this->db->delete('equipe', array('id_equipe' => $id_equipe));
      return True; 

   }


    function getInfo_actualite(){

      $q = $this->db->get('actualite');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }

     function getInfo_actualite_id($id_actualite){
      
      $this->db->where('id_actualite',$id_actualite);
      $q = $this->db->get('actualite');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }

    function delete_actualite($id_actualite){
     
      $this->db->delete('actualite', array('id_actualite' => $id_actualite));
      return True; 

   }



    function getInfo_activite(){

      $q = $this->db->get('activite');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }

    function ajoutActivite($data){
       
     $this->db->insert('activite', $data); 
     return True;

   }


    function getInfo_activite_id($id_activite){
      
      $this->db->where('id_activite',$id_activite);
      $q = $this->db->get('activite');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }


    function delete_activite($id_activite){
     
      $this->db->delete('activite', array('id_activite' => $id_activite));
      return True; 
       }

    function getInfo_projets(){

      $q = $this->db->get('projet');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }

    function ajoutProjet($data){
       
     $this->db->insert('projet', $data); 
     return True;

   }


    function getInfo_projet_id($id_projet){
      
      $this->db->where('id_projet',$id_projet);
      $q = $this->db->get('projet');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }
    

    function delete_projet($id_projet){
     
      $this->db->delete('projet', array('id_projet' => $id_projet));
      return True; 

      }

    function getInfo_formation(){

      $q = $this->db->get('formation');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }


    function ajoutFormation($data){
       
     $this->db->insert('formation', $data); 
     return True;

   }


    function getInfo_formation_id($id_formation){
   
      $this->db->where('id_formation',$id_formation);
      $q = $this->db->get('formation');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }

    function delete_formation($id_formation){
     
	      $this->db->delete('formation', array('id_formation' => $id_formation));
	      return True; 

      }


    function getInfo_photos(){

      $q = $this->db->get('photo');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }

     function ajoutPhoto($data){
       
     $this->db->insert('photo', $data); 
     return True;

   }


    function getInfo_photo_id($id_photo){
   
      $this->db->where('id_photo',$id_photo);
      $q = $this->db->get('photo');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }

    function delete_photo($id_photo){
     
      $this->db->delete('photo', array('id_photo' => $id_photo));
      return True; 

      }


     function getInfo_videos(){

      $q = $this->db->get('video');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }


    function ajoutVideo($data){
       
     $this->db->insert('video', $data); 
     return True;

   }


    function getInfo_video_id($id_video){
   
      $this->db->where('id_video',$id_video);
      $q = $this->db->get('video');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }

    function delete_video($id_video){
     
      $this->db->delete('video', array('id_video' => $id_video));
      return True; 

      }


    function getInfo_admin(){

      $q = $this->db->get('administrateur');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }

    function ajoutAdmin($data){
       
     $this->db->insert('administrateur', $data); 
     return True;

   }


    function getInfo_admin_id($id_administrateur){
   
      $this->db->where('id_administrateur',$id_administrateur);
      $q = $this->db->get('administrateur');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }

    function delete_admin($id_administrateur){
     
      $this->db->delete('administrateur', array('id_administrateur' => $id_administrateur));
      return True; 

      }



    


  

}