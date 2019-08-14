<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>administration/ajoutPartenaire">Ajouter une partenaire</a></li>
									
								</ol>
								
</div>
<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Listes des partenaires</h2>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
													<thead>
														<tr>
															<th class="wd-15p">#</th>
															<th class="wd-15p">Partenaire</th>
															<th class="wd-20p">telephone</th>
															<th class="wd-15p">Email</th>
                                                            <th class="wd-15p">localisation</th>
															<th class="wd-25p">Actions</th>
														</tr>

														<?php

															if(isset($list_partenaires)){
															$compt=0;
															foreach ($list_partenaires as $info) {
																$compt++;
																
																foreach($info["_id"] as $value){

																	$id=$value;
																}
																
															?>

															<tr>
															<td><?php echo $compt; ?></td>
															<td><?php if(isset($info["partenaireNom_vitrine"])) echo $info["partenaireNom_vitrine"]; ?></td>
															<td><?php if(isset($info["partenaireTelephone_vitrine"])) echo $info["partenaireTelephone_vitrine"]."/".$info["partenaireTelephone_mobile_vitrine"]; ?></td>
															<td><?php if(isset($info["partenaireEmail_vitrine"])) echo $info["partenaireEmail_vitrine"]; ?></td>
															<td><?php if(isset($info["partenaireLocalisation_vitrine"])) echo $info["partenaireLocalisation_vitrine"]; ?></td>
															
															
															


															<td class="text-nowrap">

															

															<a href="<?php echo base_url(); ?>administration/editerPartenaires/<?php if(isset($info["cle_image"])) echo $info["cle_image"]; ?>" class="btn btn-sm btn-primary mt-1 mb-1">Voir images</a>

															<a href="<?php echo base_url(); ?>administration/editerPartenaireInfo/<?php if(isset($id)) echo $id; ?>" class="btn btn-sm btn-default mt-1 mb-1">Modifier partenaire</a>
                                                         
                                                            <a href="<?php echo base_url(); ?>administration/mdl_supprimPartenaire/<?php if(isset($id)) echo $id; ?>" class="btn btn-sm btn-danger mt-1 mb-1">Supprimer</a>
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