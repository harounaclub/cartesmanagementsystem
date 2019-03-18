<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item">
                                    <a href="<?php echo base_url(); ?>administration/gestionCaisses_ajout">Ajouter une caisse</a>
                                    </li>

                                    <li class="breadcrumb-item">
                                    <a href="<?php echo base_url(); ?>administration/gestionCaissier_ajout">Ajouter un(e) caissier(e)</a>
                                    </li>
									
								</ol>
								
</div>
<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Listes des caisses</h2>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
													<thead>
														<tr>
                                                            <th>#</th>
                                                            <th>Noms et prenoms</th>
                                                            <th>login</th>
                                                            <th>Mot de passe</th>
                                                            <th>Profil(s)</th>
                                                            
                                                            <th>Action</th>
														</tr>

														<?php

															if(isset($liste_caissier)){
															$compt=0;
															foreach ($liste_caissier as $info) {
																$compt++;
																
																foreach($info["_id"] as $value){

																	$id=$value;
                                                                }
                                                                

                                                                
																
															?>

															<tr>
															<td><?php echo $compt; ?></td>
																	<td><?php if(isset($info["nom_prenoms_administrateur"])) echo $info["nom_prenoms_administrateur"]; ?></td>
																	<td><?php if(isset($info["login_administrateur"])) echo $info["login_administrateur"]; ?></td>
																	<td><?php if(isset($info["mot_de_passe_administrateur"])) echo $info["mot_de_passe_administrateur"]; ?></td>
                                                                    <td>Caissier</td>
															
															
									
															<td class="text-nowrap">

															<a href="<?php echo base_url(); ?>administration/sortieCartesLot/<?php if(isset($info["id_lot"])) echo $info["id_lot"]; ?>" class="btn btn-sm btn-primary mt-1 mb-1">Affecté un caissier(e)</a>
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