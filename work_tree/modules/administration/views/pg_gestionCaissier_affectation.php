<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Formulaire d'affectation de caisse</a></li>
									
								</ol>
								<div class="btn-group mb-0">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?php echo base_url(); ?>administration/gestionApproCartes"><i class="fas fa-eye mr-2"></i>Voir la liste des approvisionnements</a>
										
										
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i> Paramètres</a>
									</div>
								</div>
</div>
							<?php echo form_open('administration/gestionCaissier_affectation/'.$id_caisse); ?>
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Formulaire d'affectation d'un caissier à une caisse </h2>
										</div>

                                        
										<div class="card-body">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<h1> Infos caisse</h1>
                                                        <?php

                                                        if(isset($infoCaisse)){

                                                            foreach($infoCaisse as $info){ ?>

                                                              <h5><?php echo $info["libelle_caisse"]; ?> / <?php echo $info["date_creation_caisse"]; ?></h5>


                                                           <?php }


                                                        }

                                                        
                                                        ?>
													</div>

                                                    <div class="form-group" id="id_caisse_zone">
															<input type="text" class="form-control" name="id_caisse" value="<?php echo $id_caisse; ?>" >
															<?php echo form_error('id_caisse','<font color="red">','</font>'); ?>
														</div>
													<div class="form-group">
															
															<select class="form-control select2 w-100" name="id_caissier"  >
																<option selected="selected" value="">Selectionner un caissier</option>
																<?php
	
														             if(isset($list_caissier)){
                                                                        $compt=0;
															            foreach ($list_caissier as $info) {
																			$compt++;
																			
																			foreach($info["_id"] as $value){

																				$id_m_mongo=$value;

																			?>

																				<option value="<?php echo $id_m_mongo; ?>"><?php echo $info["nom_prenoms_administrateur"]; ?> </option>
																			
																			<?php

																			}
																		}

																	 }
			                                                              
															    ?>
															</select>
                                                            <?php echo form_error('id_caissier','<font color="red">','</font>'); ?>
														</div>

														

													

													
													</div>
													
													
												</div>
											
												<div class="col-md-12">
													
												</div>

												
												
											</div>
											<div class="row" style="margin-top: 20px;">
                                                <div class="col-md-12">
													<ul class="list-inline wizard mb-0">
															
															<li class="next list-inline-item float-right"><button type="submit" class="btn btn-primary mb-0 waves-effect waves-light">Affecter</button></li>
														</ul>
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
							<?php echo form_close(); ?>
<!-- file uploads js -->
<script src="<?php echo base_url(); ?>assets/administration/plugins/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/administration/plugins/fileuploads/js/dropify.min.js"></script>

    <script type="text/javascript">

        $( document ).ready(function() {

            $("#id_caisse_zone").hide();
            
            console.log( "ready!" );
        });
    </script>