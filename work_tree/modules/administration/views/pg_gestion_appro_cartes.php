<div class="page-header mt-0 shadow p-3">
								<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Tableau</a></li>
									
								</ol>
								<div class="btn-group mb-0">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?php echo base_url(); ?>administration/ajoutApproCartes"><i class="fas fa-plus mr-2"></i>Faire un approvisionnement</a>
										
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
											<h2 class="text-white mb-0">Liste des approvisionnements</h2>
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
																	<th>date Appro</th>																
																	
																	<th>Prem. carte</th>
																	<th>Dern. carte</th>

																	<th>quantité</th>

																	<th>Fournisseur</th>
                                                                    <th>Action</th>
																</tr>
															</thead>
															<tbody>
                                                               
                                                               <?php

														             if(isset($list_appro_cartes)){
                                                                        $compt=0;
															            foreach ($list_appro_cartes as $info) {
																			$compt++;
																			
																			foreach($info["_id"] as $value){

																				$id_m_appro=$value;
																				
																			}
                                                                            $id_fournisseur_approCartes=$info["id_fournisseur_approCartes"];
																			$fournisseur=$this->administration_model->mdl_nomFournisseur($id_fournisseur_approCartes);
			                                                              
															    ?>

																<tr>
																	<td><?php echo $compt; ?></td>
																	<td><?php if(isset($info["designation_approCartes"])) echo $info["designation_approCartes"]; ?></td>
																	<td><?php if(isset($info["date_commande_approCartes"])) echo $info["date_commande_approCartes"]; ?></td>
																	<td><?php if(isset($info["carte_alpha_approCartes"])) echo $info["carte_alpha_approCartes"]; ?></td>
                                                                    <td><?php if(isset($info["carte_omega_approCartes"])) echo $info["carte_omega_approCartes"]; ?></td>

																	<td><?php if(isset($info["quantite"])) echo $info["quantite"]; ?></td>
																	<td><?php if(isset($fournisseur)) echo $fournisseur; ?></td>
																	
						
																	<td class="text-nowrap">

																		<a href="<?php echo base_url(); ?>administration/supprimApproCartes/<?php if(isset($id_m_appro)) echo $id_m_appro; ?>" class="btn btn-sm btn-primary mt-1 mb-1">Supprimer</a>
																	</td>
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