<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>administration/ajoutCategoriesPartenaire">Ajouter une categorie</a></li>
									
								</ol>
								
</div>
<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Listes des categories</h2>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
													<thead>
														<tr>
															<th class="wd-15p">#</th>
															<th class="wd-15p">Categorie</th>
															<th class="wd-15p">Type de categorie</th>
															<th class="wd-15p">code</th>
															<th class="wd-20p">date</th>
															<th class="wd-15p">Nbres partenaires</th>
															<th class="wd-15p">Actions</th>
															
														</tr>

														<?php

															if(isset($list_categories)){
															$compt=0;
															$nb_categories=0;
															foreach ($list_categories as $info) {
																$compt++;
																
																foreach($info["_id"] as $value){

																	$id=$value;
																}

																$type_categorie=$info["type_categorie"];

																$nb_categories=$this->administration_model->mdl_compterCategorie($id);
																
															
															?>

															<tr>
															<td><?php echo $compt; ?></td>
															<td><?php if(isset($info["categorie_vitrine"])) echo $info["categorie_vitrine"]; ?></td>

															<?php

																if($type_categorie == 1){ ?>


																		<td>Categorie de base</td>

																		
															<?php }else{ ?>
															 
																		<td>Categorie simple</td>


															<?php }
															?>

															<td><?php if(isset($info["codecategorie_vitrine"])) echo $info["codecategorie_vitrine"]; ?></td>
															<td><?php if(isset($info["dateCreation_vitrine"])) echo $info["dateCreation_vitrine"]; ?></td>
															<td>0</td>
														
															
															


															<td class="text-nowrap">

                                                            <a href="<?php echo base_url(); ?>administration/modifierCategoriePage/<?php if(isset($id)) echo $id; ?>" class="btn btn-sm btn-primary mt-1 mb-1">Modifer</a>

																	<?php

																	if($type_categorie != 1){ ?>


																			<a href="#" class="btn btn-sm btn-danger mt-1 mb-1">Supprimer</a>

																		
																	 <?php }
																	?>
															
															</td>
															</tr>


															<?php }
															}

															?>
													</thead>
													<tbody>
														
													</tbody>
												</table>
											</div>
										</div>
									</div>
									
									
								</div>
</div>