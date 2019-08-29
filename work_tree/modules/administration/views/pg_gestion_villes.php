<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>administration/ajoutVille">Ajouter une ville</a></li>
									
								</ol>
								
</div>
<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Listes des villes</h2>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
													<thead>
														<tr>
															<th class="wd-15p">#</th>
															<th class="wd-15p">Ville</th>
															<th class="wd-20p">date</th>
															<th class="wd-15p">Nbres partenaires</th>
															
														</tr>

														<?php

															if(isset($list_villes)){
															$compt=0;
															$nb_ville=0;
															foreach ($list_villes as $info) {
																$compt++;
																
																foreach($info["_id"] as $value){

																	$id=$value;

				
																}

																

																$nb_ville=$this->administration_model->mdl_compterVille($id);
																
																
															?>

															<tr>
															<td><?php echo $compt; ?></td>
															<td><?php if(isset($info["vitrine_ville"])) echo $info["vitrine_ville"]; ?></td>
															<td><?php if(isset($info["dateCreation_vitrine"])) echo $info["dateCreation_vitrine"]; ?></td>
															<td><?php if(isset($nb_ville)) echo $nb_ville; ?></td>
															
															
															


															<!-- <td class="text-nowrap">

															<a href="<?php echo base_url(); ?>administration/supprimCommerciaux/<?php if(isset($id)) echo $id; ?>" class="btn btn-sm btn-primary mt-1 mb-1">Supprimer</a>
															</td> -->
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