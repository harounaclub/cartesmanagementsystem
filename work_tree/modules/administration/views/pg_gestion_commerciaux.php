<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>administration/ajoutCommerciaux">Ajouter un commercial</a></li>
									
								</ol>
								
</div>
<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Listes des commerciaux</h2>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
													<thead>
														<tr>
															<th class="wd-15p">#</th>
															<th class="wd-15p">Nom(s) et prenom(s)</th>
															<th class="wd-20p">Téléphone mobile</th>
															<th class="wd-15p"> Email</th>
															<th class="wd-15p"> code</th>
															<th class="wd-15p"> Commission</th>
															<th class="wd-25p">Actions</th>
														</tr>

														<?php

															if(isset($liste_commerciaux)){
															$compt=0;
															foreach ($liste_commerciaux as $info) {
																$compt++;
																
																foreach($info["_id"] as $value){

																	$id=$value;
																}
																
															?>

															<tr>
															<td><?php echo $compt; ?></td>
															<td><?php if(isset($info["nom_prenoms_commerciaux"])) echo $info["nom_prenoms_commerciaux"]; ?></td>
															<td><?php if(isset($info["telephone_mobile_commerciaux"])) echo $info["telephone_mobile_commerciaux"]; ?></td>
															<td><?php if(isset($info["email_commerciaux"])) echo $info["email_commerciaux"]; ?></td>
															<td><?php if(isset($info["code_commerciaux"])) echo $info["code_commerciaux"]; ?></td>
															<td><?php if(isset($info["commission_commerciaux"])) echo $info["commission_commerciaux"]; ?></td>
															
															


															<td class="text-nowrap">

															<a href="<?php echo base_url(); ?>administration/supprimCommerciaux/<?php if(isset($id)) echo $id; ?>" class="btn btn-sm btn-primary mt-1 mb-1">Supprimer</a>
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