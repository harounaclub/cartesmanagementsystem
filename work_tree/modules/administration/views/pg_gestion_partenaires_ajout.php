<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Formulaire d'ajout</a></li>
									
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

<div class="row" style="background-color:white; padding:10px;">
					<div class="col-xl-4">
						<section class="hk-sec-wrapper">
							<h5 class="hk-sec-title">Uploader le logo</h5>
							<p class="mb-40">cliquer ou deposer le logo.</p>
							<div  class="row">
								<div class="col-sm">
									<form action="<?php echo base_url(); ?>administration/upload_logo" method ="POST" class="dropzone" >
										<div class="fallback">
                                            <input name="file" type="file" multiple />
                                            
                 
                                        </div>
                                        <input class="form-control" id="cle_image" name="cle_image"  type="hidden" value="<?php if(isset($cle_image)) echo $cle_image;?>">
									</form>
								</div>
							</div>
						</section>
						
                    </div>

					<div class="col-xl-7">
						<section class="hk-sec-wrapper">
							<h5 class="hk-sec-title">Uploader les images du partenaire</h5>
							<p class="mb-40">cliquer ou deposer les images.</p>
							<div  class="row">
								<div class="col-sm">
									<form action="<?php echo base_url(); ?>administration/upload_images_partenaires" method ="POST" class="dropzone" >
										<div class="fallback">
                                            <input name="file" type="file" multiple />
                                            
                 
                                        </div>
                                        <input class="form-control" id="cle_image" name="cle_image"  type="hidden" value="<?php if(isset($cle_image)) echo $cle_image;?>">
									</form>
								</div>
							</div>
						</section>
						
                    </div>		
</div>

<br>
<br>
							<?php echo form_open('administration/ajoutPartenaire'); ?>
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Formulaire d'enregistrement d'un partenaire </h2>
										</div>
										<div class="card-body">
											<div class="row">

											<input class="form-control" id="cle_image" name="cle_image"  type="hidden" value="<?php if(isset($cle_image)) echo $cle_image;?>">
												<div class="col-md-6">
													<div class="form-group">
														<input type="text" class="form-control" name="partenaireNom_vitrine" placeholder="Entrer le nom du partenaire" value="">
														<?php echo form_error('partenaireNom_vitrine','<font color="red">','</font>'); ?>
													</div>

                                                    <div class="form-group">
														<input type="text" class="form-control" name="partenaireTelephone_vitrine" placeholder="Entrer le numero de téléphone fixe" value="" >
													    <?php echo form_error('partenaireTelephone_vitrine','<font color="red">','</font>'); ?>
													</div>


                                                    <div class="form-group">
														<input type="text" class="form-control" name="partenaireTelephone_mobile_vitrine" placeholder="Entrer le numero de téléphone mbile" value="" >
													    <?php echo form_error('partenaireTelephone_mobile_vitrine','<font color="red">','</font>'); ?>
													</div>
													
                                                    

                                                    <div class="form-group">
														<input type="text" class="form-control" name="partenaireLocalisation_vitrine" placeholder="Entrer la localisation" value="" >
													    <?php echo form_error('partenaireLocalisation_vitrine','<font color="red">','</font>'); ?>
													</div>

													<div class="form-group">
														<input type="text" class="form-control" name="partenaireEmail_vitrine" placeholder="Entrer le mail" value="" >
													    <?php echo form_error('partenaireEmail_vitrine','<font color="red">','</font>'); ?>
													</div>
													
                                                   

                                                   
                                                    
													
											    </div>


                                                <div class="col-md-6">

                                                   

                                                    <div class="form-group">
													
														<select class="form-control select2 w-100" name="id_ville">
                                                        <option value="">Selectionner une ville </option>

														<?php
	
														             if(isset($list_villes)){
                                                                        $compt=0;
															            foreach ($list_villes as $info) {
																			$compt++;
																			
																			foreach($info["_id"] as $value){

																				$id_m_ville=$value;

																			?>

																				<option value="<?php echo $id_m_ville; ?>"><?php echo $info["vitrine_ville"]; ?> </option>
																			
																			<?php

																			}
																		}

																	 }
			                                                              
															    ?>
                                                       
                                                        
                                                   
														</select>
													</div>

                                                    <div class="form-group">
													
                                                        <select class="form-control select2 w-100" name="id_categorie">
                                                        <option value="">Selectionner une categorie </option>

                                                        <?php

                                                                    if(isset($list_categories)){
                                                                        $compt=0;
                                                                        foreach ($list_categories as $infos) {
                                                                            $compt++;
                                                                            
                                                                            foreach($infos["_id"] as $value){

                                                                                $id_m_categorie=$value;

                                                                            ?>

                                                                                <option value="<?php echo $id_m_categorie; ?>"><?php echo $infos["categorie_vitrine"]; ?> </option>
                                                                            
                                                                            <?php

                                                                            }
                                                                        }

                                                                    }
                                                                        
                                                                ?>
                                                    
                                                        
                                                
                                                        </select>
                                                    </div>

													<div class="form-group">
														<input type="text" class="form-control" name="partenaireReduction_vitrine" placeholder="Entrer la reduction en % du partenaire" value="" >
													    <?php echo form_error('partenaireReduction_vitrine','<font color="red">','</font>'); ?>
													</div>

                                                    

													<div class="form-group">
														<input type="text" class="form-control" name="partenaireHoraire_vitrine" placeholder="Entrer les horaires" value="" >
													    <?php echo form_error('partenaireHoraire_vitrine','<font color="red">','</font>'); ?>
													</div>

													

                                                    <div class="form-group">
														<input type="text" class="form-control" name="partenaireSiteWeb_vitrine" placeholder="Entrer le site web" value="" >
													    <?php echo form_error('partenaireSiteWeb_vitrine','<font color="red">','</font>'); ?>
													</div>

													

													
													 <!-- Textarea -->
      

													
                                                 
                                                </div>
												<div class="col-md-12">

												    <div class="form-group">
														<input type="text" class="form-control" name="partenaireGoogleMaps_vitrine" placeholder="Entrer le iframe google maps" value="" >
													    <?php echo form_error('partenaireHoraire_vitrine','<font color="red">','</font>'); ?>
													</div>
												     <div class="form-group">
														<textarea class="form-control" name="partenaireDescription_vitrine" placeholder="Entrer la courte description du commerce" rows="3"></textarea>
													 </div>
												</div>


												<div class="col-md-12">
												

												    <div class="form-group">

													   <textarea class='editor' name="partenaireContenuDescription_vitrine">

													   <h5 class="listing-title">Nom du commerce</h5>
                                                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque </p>
													   <h5 class="listing-title">Offre :</h5>
													   <ul>
													      <li>x % de réduction ....</li>
														  <li>x % de réduction ....</li>
														  <li>x % de réduction ....</li>
														  <li>x % de réduction ....</li>
													    </ul>

														<span> <b><i class="fa fa-phone" aria-hidden="true"></i>Contact :</b> 59 00 00 00 / 01 00 00 00 </span> <br>
														<span> <b><i class="fa fa-envelope-o" aria-hidden="true"></i>Adresse :</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque</span><br>
														<span> <b>Cuisine :</b> Patisserie</span>
													

														 



													  
														
														</textarea>
													</div>

												</div>

                                              
											
												

												
												
											</div>

                                           
											<div class="row" style="margin-top: 20px;">
                                                <div class="col-md-12">
													<ul class="list-inline wizard mb-0">
															
															<li class="next list-inline-item float-right"><button type="submit" class="btn btn-primary mb-0 waves-effect waves-light">Valider</button></li>
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
<!-- Script -->

<script>
    tinymce.init({ 
      selector:'.editor',
      theme: 'silver',
      height: 800
    });
    </script>
	