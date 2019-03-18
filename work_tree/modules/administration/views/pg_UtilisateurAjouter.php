<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Formulaire d'ajout administrateur</a></li>
									
								</ol>
								<div class="btn-group mb-0">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?php echo base_url(); ?>administration/gestionUtilisateur"><i class="fas fa-eye mr-2"></i>Voir la liste des administrateurs</a>
										
										
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i> Paramètres</a>
									</div>
								</div>
</div>
							<?php echo form_open('administration/ajoutUtilisateur'); ?>
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Formulaire d'enregistrement d'utillisateur</h2>
										</div>
										<div class="card-body">
										 
											

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" class="form-control" name="nom_prenoms_administrateur" placeholder="Entrer le nom et prenom de l'administrateur" value="">
															<?php echo form_error('nom_prenoms_administrateur','<font color="red">','</font>'); ?>
														</div>
														<div class="form-group">
															<input type="text" class="form-control" name="telephone_mobile_administrateur" placeholder="Entrer le numéro de téléphone mobile" value="" >
															<?php echo form_error('telephone_mobile_administrateur','<font color="red">','</font>'); ?>
														</div>

														<div class="form-group">
															<input type="text" class="form-control" name="email_administrateur" id="email_administrateur" placeholder="Entrer le mail de l'administrateur" value="" >
															<?php echo form_error('email_administrateur','<font color="red">','</font>'); ?>
														</div>

														<div class="form-group">
														    <label>Login</label>
															<input type="text" class="form-control" name="login_administrateur" id="login_administrateur" placeholder="Entrer le login de l'administrateur" value="" >
															<?php echo form_error('login_administrateur','<font color="red">','</font>'); ?>
														</div>

													</div>	

													<div class="col-md-6">

													<div class="form-group">
															
															<select class="form-control select2 w-100" name="id_typePiece_administrateur" id="id_typePiece_administrateur" >
																<option selected="selected" value="">Selectionner le type de pièce</option>
																<?php
	
														             if(isset($list_typesPieces)){
                                                                        $compt=0;
															            foreach ($list_typesPieces as $info) {
																			$compt++;
																			
																			foreach($info["_id"] as $value){

																				$id_m_mongo=$value;

																			?>

																				<option value="<?php echo $id_m_mongo; ?>"><?php echo $info["libelle_typesPieces"]; ?> </option>
																			
																			<?php

																			}
																		}

																	 }
			                                                              
															    ?>
															</select>
														</div>

														<div class="form-group" id="numeroPiece_administrateur">
															<input type="text" class="form-control" name="numeroPiece_administrateur"  placeholder="Entrer le numéro de pièce" value="" >
															<?php echo form_error('numeroPiece_administrateur','<font color="red">','</font>'); ?>
														</div>

														<div class="form-group ">
															
															<select class="form-control select2 w-100" multiple="multiple" data-placeholder="Selectionner le ou les profils ..." name="profils[]">
															<?php
																
																if(isset($list_profils)){
																$compt=0;
																foreach ($list_profils as $info) {
																	$compt++;
																	
																	foreach($info["_id"] as $value){

																		$id_m_mongo=$value;

																	?>

																		<option value="<?php echo $info["code_profils"]; ?>"><?php echo $info["libelle_profils"]; ?> </option>
																	
																	<?php

																	}
																}

																}
																	
															?>
															</select>
														</div>

													
													</div>
														
														
													
												
													<div class="col-md-12">
														
													</div>

													
													
												</div>

											

										
											<div class="row" style="margin-top: 20px;">
                                                <div class="col-md-12">
													<ul class="list-inline wizard mb-0">
															
															<li class="next list-inline-item float-right"><button type="submit" class="btn btn-primary mb-0 waves-effect waves-light">Valider</button></li>
														</ul>
												</div>
											</div>

											<?php echo form_close(); ?>
										</div>
									</div>
									
								</div>
							</div>
<!-- file uploads js -->
<script src="<?php echo base_url(); ?>assets/administration/plugins/jquery/dist/jquery.min.js"></script>
   

<script type="text/javascript">

$( document ).ready(function() {

  
    console.log( "ready!" );
});

$('#email_administrateur').on('input', function(){

	
	$("#login_administrateur").empty();
	var email=$('#email_administrateur').val();
	$("#login_administrateur").val(email);





});


</script>