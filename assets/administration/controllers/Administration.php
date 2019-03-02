<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Administration extends MX_Controller {
        
    public function __construct()
	{
	
		parent::__construct();
        $this->load->model('administration_model');
    
	}

    function index(){

        $data["pg_content"]="pg_dashboard_view";
        $this->load->view("main_view",$data);
    }

  
     function infosGenerales(){

        $this->form_validation->set_rules('libelle_organisation', 'Libellé Organisation', 'trim|required');
        $this->form_validation->set_rules('pays', 'pays', 'trim');
        $this->form_validation->set_rules('ville', 'ville', 'trim');
        $this->form_validation->set_rules('commune', 'commune', 'trim');
        $this->form_validation->set_rules('email', 'email', 'trim');

        $this->form_validation->set_rules('telephone', 'Telephone organisation ', 'trim');
        $this->form_validation->set_rules('horaire_travail', 'Heure de travail', 'trim');
        $this->form_validation->set_rules('copyright', 'copyright', 'trim');
        $this->form_validation->set_rules('facebook', 'Facebook', 'trim');
        $this->form_validation->set_rules('twitter', 'Twitter', 'trim');

        $this->form_validation->set_rules('instagram', 'Instagram', 'trim');
        $this->form_validation->set_rules('youtube', 'Youtube', 'trim');
        $this->form_validation->set_rules('slogan', 'slogan', 'trim');
        $this->form_validation->set_rules('bref_description', 'Bref description', 'trim');
        
        if ($this->form_validation->run()){

            $libelle_organisation=$this->input->post('libelle_organisation');
            $pays=$this->input->post('pays');
            $ville=$this->input->post('ville');
            $commune=$this->input->post('commune');
            $email=$this->input->post('email');

            $telephone=$this->input->post('telephone');
            $horaire_travail=$this->input->post('horaire_travail');
            $copyright=$this->input->post('copyright');
            $facebook=$this->input->post('facebook');
            $twitter=$this->input->post('twitter');

            $instagram=$this->input->post('instagram');
            $youtube=$this->input->post('youtube');
            $slogan=$this->input->post('slogan');
            $bref_description=$this->input->post('bref_description');

             $data=array( 
                          'libelle_organisation' =>$libelle_organisation,
                          'pays' =>$pays,
                          'ville' =>$ville,
                          'commune' =>$commune,
                          'email' =>$email,

                          'telephone' =>$telephone,
                          'horaire_travail' =>$horaire_travail,
                          'copyright' =>$copyright,
                          'facebook' =>$facebook,
                          'twitter' =>$twitter,

                          'instagram' =>$instagram,
                          'youtube' =>$youtube,
                          'slogan' =>$slogan,
                          'bref_description' =>$bref_description,
                                
                        );


            $config = array(
            'upload_path' => '/uploads/logo',
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
            );
 
            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success',$data);
            }
            else
            {
            $error = array('error' => $this->upload->display_errors());
               
            }

            

             $id_infos="1234";

             $this->administration_model->modifier_infos_generale($id_infos,$data);
            

             $data["pg_content"]="pg_infos_generales_view";
             $data["infosGenerales"]=$this->administration_model->getInfo_generales();
             $this->load->view("main_view",$data);



            

        }else{


              $data["pg_content"]="pg_infos_generales_view";
             $data["infosGenerales"]=$this->administration_model->getInfo_generales();
             $this->load->view("main_view",$data);

              
                
                

       }

       
    }

    function sliders(){
        




        $this->form_validation->set_rules('titre1', 'Titre 1', 'trim');
        $this->form_validation->set_rules('titre2', 'Titre 2', 'trim');
        $this->form_validation->set_rules('titre3', 'Titre 3', 'trim');
        $this->form_validation->set_rules('titre4', 'Titre 4', 'trim');
       
        
        if ($this->form_validation->run()){

            $titre1=$this->input->post('titre1');
            $titre2=$this->input->post('titre2');
            $titre3=$this->input->post('titre3');
            $titre4=$this->input->post('titre4');
            

             $data=array( 
                          'titre1' =>$titre1,
                          'titre2' =>$titre2,
                          'titre3' =>$titre3,
                          'titre4' =>$titre4,
                          
                                
                        );


            $config = array(
            'upload_path' => '/uploads/logo',
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
            );
 
            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success',$data);
            }
            else
            {
            $error = array('error' => $this->upload->display_errors());
               
            }

            

             $this->administration_model->ajoutSlider($data);
            

              $data["listeSliders"]=$this->administration_model->getInfo_sliders();
              $data["pg_content"]="pg_sliders_liste_view";  
              $this->load->view("main_view",$data);



            

        }else{


        $data["pg_content"]="pg_sliders_ajouter_view";
        $this->load->view("main_view",$data);
       

       }

        
    }

     function slidersModifier($id_slide){

        $this->form_validation->set_rules('titre1', 'Titre 1', 'trim|required');
        $this->form_validation->set_rules('titre2', 'Titre 2', 'trim');
        $this->form_validation->set_rules('titre3', 'Titre 3', 'trim');
        $this->form_validation->set_rules('titre4', 'Titre 4', 'trim');
        
        if ($this->form_validation->run()){

            $titre1=$this->input->post('titre1');
            $titre2=$this->input->post('titre2');
            $titre3=$this->input->post('titre3');
            $titre4=$this->input->post('titre4');
            
             $data=array( 
                          'titre1' =>$titre1,
                          'titre2' =>$titre2,
                          'titre3' =>$titre3,
                          'titre4' =>$titre4,
                          
                                
                        );


            $config = array(
            'upload_path' => '/uploads/logo',
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
            );
 
            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success',$data);
            }
            else
            {
            $error = array('error' => $this->upload->display_errors());
               
            }



             $this->administration_model->modifier_sliders($id_slide,$data);


            

               $data["listeSliders"]=$this->administration_model->getInfo_sliders();
              $data["pg_content"]="pg_sliders_liste_view";  
              $this->load->view("main_view",$data);




            

        }else{


             $data["info_slide_id"]=$this->administration_model->getInfo_sliders_id($id_slide);
             $data["id_slide"]=$id_slide;
             $data["pg_content"]="pg_sliders_modifier_view";
             $this->load->view("main_view",$data);

              
                
                

       }
        
        
    }

    function supprim_slider($id_slide){
     
      if($this->administration_model->delete_slider($id_slide)){

        redirect("administration/slidersListes");

      }else{
        
        redirect("administration/slidersListes");
      }

   }


    function notreEquipe(){



        $this->form_validation->set_rules('nom', 'Nom', 'trim');
        $this->form_validation->set_rules('titre', 'Titre', 'trim');
        $this->form_validation->set_rules('facebook', 'Facebook', 'trim');
        $this->form_validation->set_rules('twitter', 'Twitter', 'trim');
       
        
        if ($this->form_validation->run()){

            $nom=$this->input->post('nom');
            $titre=$this->input->post('titre');
            $facebook=$this->input->post('facebook');
            $twitter=$this->input->post('twitter');
            

             $data=array( 
                          'nom' =>$nom,
                          'titre' =>$titre,
                          'facebook' =>$facebook,
                          'twitter' =>$twitter,
                          
                                
                        );


            $config = array(
            'upload_path' => '/uploads/logo',
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
            );
 
            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success',$data);
            }
            else
            {
            $error = array('error' => $this->upload->display_errors());
               
            }

            

             $this->administration_model->ajoutEquipe($data);
            

              $data["listeEquipe"]=$this->administration_model->getInfo_equipe();
              $data["pg_content"]="pg_notre_equipe_ajouter_view";
              $this->load->view("main_view",$data);



            

        }else{


        $data["pg_content"]="pg_notre_equipe_ajouter_view";
        $this->load->view("main_view",$data);
       

       }


        
    }


    function equipeModifier($id_equipe){
        
        $data["info_equipe_id"]=$this->administration_model->getInfo_equipe_id($id_equipe);
        $data["pg_content"]="pg_notre_equipe_modifier_view";
        $this->load->view("main_view",$data);
    }


    function supprim_equipe($id_equipe){
     
      if($this->administration_model->delete_equipe($id_equipe)){

        redirect("administration/notreEquipeListes");

      }else{
        
        redirect("administration/notreEquipeListes");
      }

   }




    function nosActualites(){

        $this->form_validation->set_rules('titre', 'Titre', 'trim');
        $this->form_validation->set_rules('date_actualite', 'date actualite', 'trim');
        $this->form_validation->set_rules('auteur', 'auteur', 'trim');
        $this->form_validation->set_rules('cible', 'cible', 'trim');
        $this->form_validation->set_rules('description_court', 'description courte', 'trim');
        $this->form_validation->set_rules('description_complete', 'description complète', 'trim');
       
        
        if ($this->form_validation->run()){

            $titre=$this->input->post('titre');
            $date_actualite=$this->input->post('date_actualite');
            $auteur=$this->input->post('auteur');
            $cible=$this->input->post('cible');
            $description_court=$this->input->post('description_court');
            $description_complete=$this->input->post('description_complete');
            

             $data=array( 
                          'titre' =>$titre,
                          'date_actualite' =>$date_actualite,
                          'auteur' =>$auteur,
                          'cible' =>$cible,
                          'description_court' =>$description_court,
                          'description_complete' =>$description_complete,

                          
                                
                        );


            $config = array(
            'upload_path' => '/uploads/logo',
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
            );
 
            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success',$data);
            }
            else
            {
            $error = array('error' => $this->upload->display_errors());
               
            }

            

             $this->administration_model->ajoutActualite($data);
            

              $data["listeActualite"]=$this->administration_model->getInfo_actualite();
              $data["pg_content"]="pg_nos_actualites_ajouter_view";
              $this->load->view("main_view",$data);



            

        }else{


        $data["pg_content"]="pg_nos_actualites_ajouter_view";
        $this->load->view("main_view",$data);

        }
    }


    function nosActualitesModifier($id_actualite){
        
        $data["info_actualite_id"]=$this->administration_model->getInfo_actualite_id($id_actualite);
        $data["pg_content"]="pg_nos_actualites_modifier_view";
        $this->load->view("main_view",$data);
    }




    function supprim_actualite($id_actualite){
     
      if($this->administration_model->delete_actualite($id_actualite)){

        redirect("administration/nosActualitesListes");

      }else{
        
        redirect("administration/nosActualitesListes");
      }

   }



    function nosActivites(){

        $this->form_validation->set_rules('nom_activite', 'Nom activité', 'trim');
        $this->form_validation->set_rules('description_court', 'description courte', 'trim');
        $this->form_validation->set_rules('description_complete', 'description complète', 'trim');
        
        
        if ($this->form_validation->run()){

            $nom_activite=$this->input->post('nom_activite');
            $description_court=$this->input->post('description_court');
            $description_complete=$this->input->post('description_complete');
            
            

             $data=array( 
                          'nom_activite' =>$nom_activite,
                          'description_court' =>$description_court,
                          'description_complete' =>$description_complete,
                          

                          
                                
                        );


            $config = array(
            'upload_path' => '/uploads/logo',
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
            );
 
            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success',$data);
            }
            else
            {
            $error = array('error' => $this->upload->display_errors());
               
            }

            

             $this->administration_model->ajoutActivite($data);
            

              $data["listeActivite"]=$this->administration_model->getInfo_activite();
              $data["pg_content"]="pg_nos_activites_ajouter_view";
              $this->load->view("main_view",$data);



            

        }else{


        $data["pg_content"]="pg_nos_activites_ajouter_view";
        $this->load->view("main_view",$data);

        }

        
    }


    function activiteModifier($id_activite){
        
        $data["info_activite_id"]=$this->administration_model->getInfo_activite_id($id_activite);
        $data["pg_content"]="pg_nos_activites_modifier_view";
        $this->load->view("main_view",$data);
    }



    function supprim_activites($id_activite){
     
      if($this->administration_model->delete_activite($id_activite)){

        redirect("administration/nosActivitesListes");

      }else{
        
        redirect("administration/nosActivitesListes");
      }

   }



    function nosProjets(){

        $this->form_validation->set_rules('nom_projet', 'Nom projet', 'trim');
        $this->form_validation->set_rules('description_court', 'description courte', 'trim');
        $this->form_validation->set_rules('description_complete', 'description complète', 'trim');
        
        
        if ($this->form_validation->run()){

            $nom_projet=$this->input->post('nom_projet');
            $description_court=$this->input->post('description_court');
            $description_complete=$this->input->post('description_complete');
            
            

             $data=array( 
                          'nom_projet' =>$nom_projet,
                          'description_court' =>$description_court,
                          'description_complete' =>$description_complete,
                          

                          
                                
                        );


            $config = array(
            'upload_path' => '/uploads/logo',
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
            );
 
            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success',$data);
            }
            else
            {
            $error = array('error' => $this->upload->display_errors());
               
            }

            

             $this->administration_model->ajoutProjet($data);
            

              $data["listeProjets"]=$this->administration_model->getInfo_projets();
              $data["pg_content"]="pg_nos_projets_ajouter_view";
              $this->load->view("main_view",$data);

  

        }else{


        $data["pg_content"]="pg_nos_projets_ajouter_view";
        $this->load->view("main_view",$data);

        }

        
    }


    function projetModifier($id_projet){
        
        $data["info_projet_id"]=$this->administration_model->getInfo_projet_id($id_projet);
        $data["pg_content"]="pg_nos_projets_modifier_view";
        $this->load->view("main_view",$data);
    }


    function supprim_projet($id_projet){
     
      if($this->administration_model->delete_projet($id_projet)){

        redirect("administration/nosProjetsListes");

      }else{
        
        redirect("administration/nosProjetsListes");
      }

   }



    function nosFormations(){
        
        $this->form_validation->set_rules('titre', 'Titre', 'trim');
        $this->form_validation->set_rules('date_formation', 'Date formation', 'trim');
        $this->form_validation->set_rules(' auteur', ' auteur', 'trim');
        
        $this->form_validation->set_rules('cible', 'cible', 'trim');
        $this->form_validation->set_rules('description_court', 'Description courte', 'trim');
        $this->form_validation->set_rules(' description_complete', 'Description complète', 'trim');
        
        if ($this->form_validation->run()){

            $titre=$this->input->post('titre');
            $date_formation=$this->input->post('date_formation');
            $auteur=$this->input->post('auteur');

            $cible=$this->input->post('cible');
            $description_court=$this->input->post('description_court');
            $description_complete=$this->input->post('description_complete');
            
            

             $data=array( 
                          'titre' =>$nom_projet,
                          'date_formation' =>$description_court,
                          'auteur' =>$description_complete,

                          'cible' =>$nom_projet,
                          'description_court' =>$description_court,
                          'description_complete' =>$description_complete,
                          

                          
                                
                        );


            $config = array(
            'upload_path' => '/uploads/logo',
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
            );
 
            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success',$data);
            }
            else
            {
            $error = array('error' => $this->upload->display_errors());
               
            }

            

             $this->administration_model->ajoutFormation($data);
            

              $data["listeFormation"]=$this->administration_model->getInfo_formation();
              $data["pg_content"]="pg_nos_formations_ajouter_view";
              $this->load->view("main_view",$data);

  

        }else{


        $data["pg_content"]="pg_nos_formations_ajouter_view";
        $this->load->view("main_view",$data);

        }


        
    }


    function formationModifier($id_formation){
        
        $data["info_formation_id"]=$this->administration_model->getInfo_formation_id($id_formation);
        $data["pg_content"]="pg_nos_formations_modifier_view";
        $this->load->view("main_view",$data);
    }


    function supprim_formation($id_formation){
     
      if($this->administration_model->delete_formation($id_formation)){

        redirect("administration/nosFormationsListes");

      }else{
        
        redirect("administration/nosFormationsListes");
      }

   }


    function nosPhotos(){

        $data["pg_content"]="pg_nos_photos_ajouter_view";
        $this->load->view("main_view",$data);
    }


    function photoModifier($id_photo){
        
        $data["info_photo_id"]=$this->administration_model->getInfo_photo_id($id_photo);
        $data["pg_content"]="pg_nos_photos_modifier_view";
        $this->load->view("main_view",$data);
    }


    function supprim_photo($id_photo){
     
      if($this->administration_model->delete_photo($id_photo)){

        redirect("administration/nosPhotosListes");

      }else{
        
        redirect("administration/nosPhotosListes");
      }

   }


    function nosVideos(){

        $data["pg_content"]="pg_nos_videos_ajouter_view";
        $this->load->view("main_view",$data);
    }


    function videoModifier($id_video){
        
        $data["info_video_id"]=$this->administration_model->getInfo_video_id($id_video);
        $data["pg_content"]="pg_nos_videos_modifier_view";
        $this->load->view("main_view",$data);
    }

    function supprim_video($id_video){
     
      if($this->administration_model->delete_video($id_video)){

        redirect("administration/nosVideosListes");

      }else{
        
        redirect("administration/nosVideosListes");
      }

   }

    function adminAjouter(){

        $data["pg_content"]="pg_administrateurs_ajouter_view";
        $this->load->view("main_view",$data);
    }


    function modifierAdmin($id_administrateur){
        
       $data["info_admin_id"]=$this->administration_model->getInfo_admin_id($id_administrateur);
        $data["pg_content"]="pg_administrateurs_modifier_view";
        $this->load->view("main_view",$data);
    }


    function supprim_admin($id_administrateur){
     
      if($this->administration_model->delete_admin($id_administrateur)){

        redirect("administration/adminListes");

      }else{
        
        redirect("administration/adminListes");
      }

   }


//modifier

   

    function notreEquipeModifier(){

        $data["pg_content"]="pg_notre_equipe_modifier_view";
        $this->load->view("main_view",$data);
    }

    

    function nosProjetsModifier(){

        $data["pg_content"]="pg_nos_projets_modifier_view";
        $this->load->view("main_view",$data);
    }


    function nosActivitesModifier(){

        $data["pg_content"]="pg_nos_activites_modifier_view";
        $this->load->view("main_view",$data);
    }


    function nosFormationsModifier(){

        $data["pg_content"]="pg_nos_formations_modifier_view";
        $this->load->view("main_view",$data);
    }


    function nosPhotosModifier(){

        $data["pg_content"]="pg_nos_photos_modifier_view";
        $this->load->view("main_view",$data);
    }


    function nosVideosModifier(){

        $data["pg_content"]="pg_nos_videos_modifier_view";
        $this->load->view("main_view",$data);
    }

    function adminModifier(){

        $data["pg_content"]="pg_administrateurs_modifier_view";
        $this->load->view("main_view",$data);
    }


    //liste

    
    function slidersListes(){

        $data["listeSliders"]=$this->administration_model->getInfo_sliders();
        $data["pg_content"]="pg_sliders_liste_view";  
        $this->load->view("main_view",$data);
    }

    function notreEquipeListes(){

        $data["listeEquipe"]=$this->administration_model->getInfo_equipe();
        $data["pg_content"]="pg_notre_equipe_liste_view";
        $this->load->view("main_view",$data);

        
    }

    function nosActualitesListes(){

        $data["listeActualite"]=$this->administration_model->getInfo_actualite();
        $data["pg_content"]="pg_nos_actualites_liste_view";
        $this->load->view("main_view",$data);
    }


    function nosActivitesListes(){
        
        $data["listeActivite"]=$this->administration_model->getInfo_activite();
        $data["pg_content"]="pg_nos_activites_listes_view";
        $this->load->view("main_view",$data);
    }


    function nosProjetsListes(){

        $data["listeProjets"]=$this->administration_model->getInfo_projets();
        $data["pg_content"]="pg_nos_projets_liste_view";
        $this->load->view("main_view",$data);
    }



    function nosFormationsListes(){

        $data["listeFormation"]=$this->administration_model->getInfo_formation();
        $data["pg_content"]="pg_nos_formations_liste_view";
        $this->load->view("main_view",$data);
    }


    function nosPhotosListes(){

        $data["listePhotos"]=$this->administration_model->getInfo_photos();
        $data["pg_content"]="pg_nos_photos_liste_view";
        $this->load->view("main_view",$data);
    }


    function nosVideosListes(){

        $data["listeVideos"]=$this->administration_model->getInfo_videos();
        $data["pg_content"]="pg_nos_videos_liste_view";
        $this->load->view("main_view",$data);
    }

    function adminListes(){

        $data["listeAdmin"]=$this->administration_model->getInfo_admin();
        $data["pg_content"]="pg_administrateurs_liste_view";
        $this->load->view("main_view",$data);
    }

    

     function seDeconnecter(){

        session_destroy();
        redirect("login");
    } 


}
