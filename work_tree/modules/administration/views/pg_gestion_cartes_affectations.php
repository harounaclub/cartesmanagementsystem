<div class="page-header mt-0 shadow p-3">
								<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Tableau</a></li>
									
								</ol>
								<div class="btn-group mb-0">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?php echo base_url(); ?>administration/gestionCartesAffectations_ajout"><i class="fas fa-plus mr-2"></i>Faire une affectation</a>
										
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i> Paramètres</a>
									</div>
								</div>
							</div>
							<!-- Table -->
							
							<!-- Dark table -->
							<div class="row">
								<div class="col-12">
									<div class="card shadow bg-default">
										<div class="card-header bg-transparent border-0">
											<h2 class="text-white mb-0">Liste des cartes spéciales</h2>
										</div>
										<div class="">
											<div class="grid-margin">
												<div class="">
													<div class="table-responsive">
														<table class="table card-table table-dark table-vcenter text-nowrap  align-items-center">
															<thead class="thead-dark">
																<tr>
																	<th>#</th>
																	<th>Libellé</th>
																	<th>Quantite</th>

																	<th>Lots</th>																
																	
																	<th>Prem. carte</th>
																	<th>Dern. carte</th>

																	<th>date</th>

																	
                                                                   
																</tr>
															</thead>
															<tbody>
                                                               
                                                               <?php

														             if(isset($liste_cartes_affectations)){
                                                                        $compt=0;
															            foreach ($liste_cartes_affectations as $info) {
																			$compt++;
																			
																			foreach($info["_id"] as $value){

																				$id_affect=$value;
																				
																			}
																			$id_lot=$info["id_lot"];
																			
																			
																			
			                                                              
															    ?>

																<tr>
																	<td><?php echo $compt; ?></td>
																	<td><?php if(isset($info["libelle_cartesAffectations"])) echo $info["libelle_cartesAffectations"]; ?></td>
																	<td><?php if(isset($info["quantite_cartesAffectations"])) echo $info["quantite_cartesAffectations"]; ?></td>
																
                                                                    <td><?php if(isset($info["carte_alpha_cartesAffectations"])) echo $info["carte_alpha_cartesAffectations"]; ?></td>
																	<td><?php if(isset($info["carte_omega_cartesAffectations"])) echo $info["carte_omega_cartesAffectations"]; ?></td>

																	<td><?php if(isset($info["quantite_cartesAffectations"])) echo $info["quantite_cartesAffectations"]; ?></td>
																	<td><?php if(isset($info["date_carte_alpha_cartesAffectations"])) echo $info["date_carte_alpha_cartesAffectations"]; ?></td>
																	
																	
						
																	
																</tr>


																<?php }
												                    }

												                ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</div>
<script src="<?php echo base_url(); ?>assets/administration/plugins/jquery/dist/jquery.min.js"></script>