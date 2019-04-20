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
							<?php echo form_open('administration/modifierCategoriesPartenaire'); ?>
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Formulaire d'enregistrement d'une categorie </h2>
										</div>
										<div class="card-body">

                                        <?php
                                         if(isset($info_categorie)){
                                             foreach($info_categorie as $info){ ?>

                                            
											<div class="row">
												<div class="col-md-6">

                                                <input type="hidden" class="form-control" name="type_categorie"  value="<?php if(isset($info["type_categorie"])) echo $info["type_categorie"]; ?>">
                                                <input type="hidden" class="form-control" name="id_categorie"  value="<?php if(isset($id_categorie)) echo $id_categorie; ?>">
													<div class="form-group">
														<input type="text" class="form-control" name="categorie_vitrine" placeholder="Entrer le nom de la categorie" value="<?php if(isset($info["categorie_vitrine"])) echo $info["categorie_vitrine"]; ?>">
														<?php echo form_error('categorie_vitrine','<font color="red">','</font>'); ?>
													</div>

													<div class="form-group">
														<input type="text" class="form-control" name="codecategorie_vitrine" placeholder="Entrer le code de la categorie" value="<?php if(isset($info["codecategorie_vitrine"])) echo $info["codecategorie_vitrine"]; ?>">
														<?php echo form_error('codecategorie_vitrine','<font color="red">','</font>'); ?>
													</div>

													<div class="form-group">
														<textarea  class="form-control" name="categoriedescription_vitrine" placeholder="Entrer la description de la categorie" rows="5" ><?php if(isset($info["categorieDescription_vitrine"])) echo $info["categorieDescription_vitrine"]; ?></textarea>
													    <?php echo form_error('categoriedescription_vitrine','<font color="red">','</font>'); ?>
													</div>
													<div class="form-group">
														<input type="text" class="form-control" name="iconecategorie_vitrine" placeholder="Entrer le code de l'icone" value="<?php if(isset($info["iconecategorie_vitrine"])) echo $info["iconecategorie_vitrine"]; ?>">
														<?php echo form_error('iconecategorie_vitrine','<font color="red">','</font>'); ?>
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

                                        <?php }
                                         }
                                        ?>
									</div>
									
								</div>
							</div>
							<?php echo form_close(); ?>
<!-- file uploads js -->
<script src="<?php echo base_url(); ?>assets/administration/plugins/jquery/dist/jquery.min.js"></script>
   