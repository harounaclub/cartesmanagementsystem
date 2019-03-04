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
											<h2 class="mb-0">Formulaire de vente de carte PRIXKDO</h2>
										</div>
										<div class="card-body">
											<div class="row">

                                                <div class="col-md-4"></div>

                                                <div class="col-md-4">

                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="code_commercial" placeholder="Entrer le code du commercial" value="">
                                                                
                                                            </div>

                                                </div>

                                                <div class="col-md-4"></div>
	
											</div>


                                            <div class="row" id="block_info_com">
                                                <div class="col-md-6">
                                                  <h3>Info commercial</h3>
                                                <span class="infocomm"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="margin-top:50px">
                                                                        <input type="text" class="form-control" id="code_carte" placeholder="Entrer les 5 derniers chiffres de la cartes" value="">
                                                                        
                                                                    </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row" id="block_info_carte" style="padding:20px;">
                                                <div class="col-md-6">
                                                <h3>Info carte</h3>
                                                <span class="infocarte"></span>
                                                </div>
                                                <div class="col-md-6">

                                                <div class="form-group">
                                                <label for="sel1">Civilité</label>
                                                <select class="form-control" id="civilite">
                                                    <option value="Mr">Monsieur</option>
                                                    <option value="Mme">Madame</option>
                                                    <option value="Mlle">Mademoiselle</option>
                                                   
                                                </select>
                                                </div> 

                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" id="nom_prenoms_client" placeholder="Entrer le nom et le prenoms du client" value="">
                                                                        
                                                    </div>
                                                    <div class="form-group" >
                                                                        <input type="text" class="form-control" id="numero_telephone_mobile_client" placeholder="Entrer le numéro de téléphone du client" value="">
                                                                        
                                                    </div>

                                                    <div class="form-group" >
                                                                        <input type="text" class="form-control" id="email_client" placeholder="Entrer le email du client" value="">
                                                                        
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


    $("#block_info_com").hide();
    $("#block_info_carte").hide();
    $(".img_loading").hide();
    
    
    console.log( "ready!" );
});

    $('#code_commercial').on('input', function(){


    var recherche_commerciaux=$('#code_commercial').val();
    var longueur_recherche=$('#code_commercial').val().length;


    if(longueur_recherche === 0){

    // $( "#zone_rech_im" ).empty();
    $(".result").hide();

    }else{

    $.ajax({

                                        type: 'POST',
                                        url: '<?php echo base_url(); ?>administration/ajax_checkInfoCommercial',
                                        dataType:'json',
                                        data: {
                                            
                                            code_commercial:recherche_commerciaux,
                                        },
                                        success: function(response) {

                                        // console.log(response);
                                        var status=response.status;
                                        if(status == 1){

                                            var donnee_commercial=response.infoCommercial;
                                            $.each(donnee_commercial, function(index, value) {

                                                //console.log(value);
                                                
                                                var nom_prenoms_commerciaux=value['nom_prenoms_commerciaux'];
                                                var telephone_mobile_commerciaux=value['telephone_mobile_commerciaux'];
                                                var email_commerciaux=value['email_commerciaux'];
                                                var commission_commerciaux=value['commission_commerciaux'];

                                                $( '<p style="color:blue;"><h4>'+nom_prenoms_commerciaux+'</h4><h4>'+telephone_mobile_commerciaux+'</h4><h4>'+email_commerciaux+'</h4><h4>'+commission_commerciaux+'</h4><h4>').appendTo( $( ".infocomm" ) );


                                            }); 


                                            

                                            $("#block_info_com").show();


                                        }else{

                                            $("#block_info_com").hide();
                                        }

                                        

                                        },
                                        complete: function(){
                                            
                                            
                                            
                                        },
                                        beforeSend: function(){
                                            
                                            
                                            

                                        },
                                        error: function (xhr, ajaxOptions, thrownError) {
                                            alert(xhr.status);
                                            alert(thrownError);
                                        }

            });

    }

    });

    $('#code_carte').on('input', function(){


var recherche_carte=$('#code_carte').val();
var longueur_recherche=$('#code_carte').val().length;


if(longueur_recherche === 0){

// $( "#zone_rech_im" ).empty();
$(".result").hide();

}else{

$.ajax({

                                    type: 'POST',
                                    url: '<?php echo base_url(); ?>administration/ajax_checkInfoCarte',
                                    dataType:'json',
                                    data: {
                                        
                                        code_carte:recherche_carte,
                                    },
                                    success: function(response) {

                                   console.log(response);
                                    

                                    var status=response.status;
                                        if(status == 1){

                                            var donnee_carte=response.infoCarte;
                                            $.each(donnee_carte, function(index, value) {

                                                //console.log(value);
                                                
                                                var numero_cartes=value['numero_cartes'];
                                                var validite_cartes=value['validite_cartes'];
                                                var date_enregistrement_cartes=value['date_enregistrement_cartes'];
                                               

                                                $( '<p style="color:blue;"><h4>'+numero_cartes+'</h4><h4>'+validite_cartes+'</h4><h4>'+date_enregistrement_cartes+'</h4>').appendTo( $( ".infocarte" ) );


                                            }); 


                                            

                                            $("#block_info_carte").show();


                                        }else{

                                            $("#block_info_carte").hide();
                                        }

                                       
                                       

                                    
                                    

                                    },
                                    complete: function(){
                                        
                                        
                                        
                                    },
                                    beforeSend: function(){
                                        
                                        
                                        

                                    },
                                    error: function (xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status);
                                        alert(thrownError);
                                    }

        });

}

});

$( "#btn_valider" ).click(function(e) {
    e.preventDefault();

    $("#btn_valider").prop("disabled",true);

    var code_commercial=$("#code_commercial").val();
    var code_carte=$("#code_carte").val();
    var civilite=$("#civilite").val();
    var nom_prenoms_client=$("#nom_prenoms_client").val();
    var numero_telephone_mobile_client=$("#numero_telephone_mobile_client").val();
    var email_client=$("#email_client").val();

    console.log(civilite);

    $.ajax({

        type: 'POST',
        url: '<?php echo base_url(); ?>administration/achatCarte',
        dataType:'html',
        data: {
            
            civilite:civilite,
            code_commercial:code_commercial,
            code_carte:code_carte,
            nom_prenoms_client:nom_prenoms_client,
            numero_telephone_mobile_client:numero_telephone_mobile_client,
            email_client:email_client,
        },
        success: function(response) {

        console.log(response);


        var status=response.status;
            if(status == 1){

                $("#block_info_com").hide();
                  $("#block_info_carte").hide();
                    alert("Client enregistré avec succès");

            }

        
        




        },
        complete: function(){
            
            $(".img_loading").hide();
            
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