

<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Formulaire d'ajout</a></li>
									
								</ol>
								<div class="btn-group mb-0">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?php echo base_url(); ?>administration/ajoutCommerciaux"><i class="fas fa-eye mr-2"></i>Voir la liste des approvisionnements</a>
										
										
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i> Paramètres</a>
									</div>
								</div>
</div>
							<?php echo form_open('administration/ajoutCommerciaux'); ?>
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Formulaire de modifier du client Prixkdo</h2>
										</div>
										<div class="card-body">

                                           
											


                                            


                                            <div class="row" id="block_info_carte" style="padding:20px;">
                                                <div class="col-md-6">
                                                <h3>Info client</h3>
                                                <span class="infocarte"></span>
                                                </div>
                                                <div class="col-md-6">

                                                <div class="form-group" id="bl_type_client">
                                                
                                                        <select class="form-control" id="type_client">
                                                            <option value="">Selectionner le type de client</option>
                                                            <option value="particulier">Particulier</option>
                                                            <option value="entreprise">Entreprise</option>
                                                        </select>
                                                </div>



                                                <div class="form-group" id="bl_raison_sociale_client">
                                                                        <input type="text" class="form-control" id="raison_sociale_client" placeholder="Entrer la raison sociale du client" value="">
                                                                        
                                                </div>

                                                <div class="form-group" id="bl_id_client">
                                                                        <input type="text" class="form-control" id="id_client" value="<?php echo $id_client; ?>">
                                                                        
                                                </div>

                                                <div class="form-group" id="bl_civilite"> 
                                                <select class="form-control" id="civilite">
                                                <option value="">Selectionner la civilité</option>
                                                    <option value="Mr">Monsieur</option>
                                                    <option value="Mme">Madame</option>
                                                    <option value="Mlle">Mademoiselle</option>
                                                   
                                                </select>
                                                </div> 

                                                    <div class="form-group" id="bl_nom_prenom_client">
                                                                        <input type="text" class="form-control" id="nom_prenoms_client" placeholder="Entrer le nom et le prenoms du client" value="">
                                                                        
                                                    </div>

                                                    <div class="form-group" id="bl_date_naissance_client">
                                                                        <input type="text" class="form-control" id="date_naissance_client" placeholder="Entrer la date de naissance du client" value="">
                                                                        
                                                    </div>

                                                    <div class="form-group" id="bl_lieu_habitation_client">
                                                       
                                                        <select class="form-control" id="lieu_habitation_client">
                                                            <option value="">Selectionner le lieu d'habitation du client</option>
                                                            <?php 

                                                            if(isset($liste_lieu_habitation)){

                                                                foreach($liste_lieu_habitation as $item){ 
                                                                    
                                                                     $id_mongo=$item["_id"];
                                                                     foreach($id_mongo as $it){

                                                                        $id_lieu=$it;

                                                                     }
                                                                    
                                                                    ?>

                                                                   
                                                                        <option value="<?php echo $id_lieu; ?>"><?php echo ucfirst($item["denomination"]); ?></option>


                                                               <?php }
                                                            }
                                                            ?>
                                                        
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="bl_profession_client">
                                                                        <input type="text" class="form-control" id="profession_client" placeholder="Entrer la profession du client" value="">
                                                                        
                                                    </div> 
                                                    <div class="form-group" id="bl_numero_telephone_mobile_client">
                                                                        <input type="text" class="form-control" id="numero_telephone_mobile_client" placeholder="Entrer le numéro de téléphone du client" value="">
                                                                        
                                                    </div>

                                                    <div class="form-group" id="bl_email_client">
                                                                        <input type="text" class="form-control" id="email_client" placeholder="Entrer le email du client" value="">
                                                                        
                                                    </div>

                                                    <div class="form-group" id="bl_mot_de_passe_cartes">
                                                                        <input type="text" class="form-control" id="mot_de_passe_cartes" placeholder="Entrer le mot de passe de la carte" value="">
                                                                        
                                                    </div>

                                                    <div class="form-group" id="bl_option_sms">
                                                       
                                                        <select class="form-control" id="option_sms">
                                                            <option value="0">Envoyer le code de la carte par SMS</option>
                                                            <option value="1">Ne pas envoyer le code de la carte par SMS</option>
                                                            
                                                        
                                                        </select>
                                                    </div>

                                                   

                                                    <div class="row" style="margin-top: 20px;">
                                                        <div class="col-md-12">
                                                        <img src="<?php echo base_url(); ?>assets/administration/img/loading.gif" class="img_loading">
                                                            <ul class="list-inline wizard mb-0">
                                                                    
                                                                    <li class="next list-inline-item float-right"><button type="submit" id="btn_valider" class="btn btn-primary mb-0 waves-effect waves-light">Valider</button></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    
                                                    
                                                </div>
                                            </div>


                                            
											
										</div>
									</div>
									
								</div>
							</div>
							<?php echo form_close(); ?>
<!-- file uploads js -->
<script src="<?php echo base_url(); ?>assets/administration/plugins/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {


  
    $(".img_loading").hide();

    $("#bl_civilite").show();
    $("#bl_raison_sociale_client").show();
    $("#bl_nom_prenom_client").show();
    $("#bl_date_naissance_client").show();
    $("#bl_lieu_habitation_client").show();
    $("#bl_profession_client").show();
    $("#bl_numero_telephone_mobile_client").show();
    $("#bl_email_client").show();
    $("#bl_mot_de_passe_cartes").show();
    $("#bl_option_sms").show();
    
    
    $("#btn_valider").show();
    
    
    
    
    
    console.log( "ready!" );
});

$("#type_client").change(function() {
  
  var type_client=$(this).val();

  if(type_client == "particulier"){

    $("#bl_civilite").show();
    $("#bl_raison_sociale_client").hide();
    $("#bl_nom_prenom_client").show();
    $("#bl_date_naissance_client").show();
    $("#bl_lieu_habitation_client").show();
    $("#bl_profession_client").show();
    $("#bl_numero_telephone_mobile_client").show();
    $("#bl_email_client").show();
    $("#bl_mot_de_passe_cartes").show();
    $("#bl_option_sms").show();
    $("#btn_valider").show();

  }else{

    $("#bl_civilite").show();
    $("#bl_raison_sociale_client").show();
    $("#bl_nom_prenom_client").show();
    $("#bl_date_naissance_client").show();
    $("#bl_lieu_habitation_client").show();
    $("#bl_profession_client").show();
    $("#bl_numero_telephone_mobile_client").show();
    $("#bl_email_client").show();
    $("#bl_mot_de_passe_cartes").show();
    $("#bl_option_sms").show();
    $("#btn_valider").show();


  }
  
});



  



$( "#btn_valider" ).click(function(e) {
    e.preventDefault();

    $("#btn_valider").prop("disabled",true);

    
    var type_client=$("#type_client").val();
    var raison_sociale_client=$("#raison_sociale_client").val();
    var date_naissance_client=$("#date_naissance_client").val();
    var lieu_habitation_client=$("#lieu_habitation_client").val();
    var profession_client=$("#profession_client").val();
    
    
    var code_commercial=$("#code_commercial").val();
    var code_carte=$("#code_carte").val();
    var civilite=$("#civilite").val();
    var nom_prenoms_client=$("#nom_prenoms_client").val();
    var numero_telephone_mobile_client=$("#numero_telephone_mobile_client").val();
    var email_client=$("#email_client").val();

    var option_sms=$("#option_sms").val();
    var mot_de_passe_cartes=$("#mot_de_passe_cartes").val();

    

    $.ajax({

        type: 'POST',
        url: '<?php echo base_url(); ?>administration/achatCarte',
        dataType:'html',
        data: {
            
            type_client:type_client,
            raison_sociale_client:raison_sociale_client,
            date_naissance_client:date_naissance_client,
            lieu_habitation_client:lieu_habitation_client,
            profession_client:profession_client,

            civilite:civilite,
            code_commercial:code_commercial,
            code_carte:code_carte,
            nom_prenoms_client:nom_prenoms_client,
            numero_telephone_mobile_client:numero_telephone_mobile_client,
            email_client:email_client,

            option_sms:option_sms,
            mot_de_passe_cartes:mot_de_passe_cartes,
        },
        success: function(response) {

        console.log(response);
        alert("Client enregistré avec succès");
        $("#block_info_com").show();
                  $("#block_info_carte").show();

        var status=response.status;
            if(status == 1){

                $("#block_info_com").show();
                  $("#block_info_carte").show();
                    

            }

        
        




        },
        complete: function(){
            
            $(".img_loading").show();
            
        },
        beforeSend: function(){
            
            
            $(".img_loading").show();

        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }

    });


    
    
});
</script>