<div class="page-header mt-0 shadow p-3">
								<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Tableau</a></li>
									
								</ol>
								<div class="btn-group mb-0">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?php echo base_url(); ?>administration/notreEquipe"><i class="fas fa-plus mr-2"></i>Ajouter une équipe</a>
										
										
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
											<h2 class="text-white mb-0">Liste des équipes</h2>
										</div>
										<div class="">
											<div class="grid-margin">
												<div class="">
													<div class="table-responsive">
														<table class="table card-table table-dark table-vcenter text-nowrap  align-items-center">
															<thead class="thead-dark">
																<tr>
																	<th>#</th>
																	<th>Nom</th>
																	<th>Fonction</th>
																	<th>Image</th>
																	<th>Facebook</th>
																	<th>Twitter</th>
																	<th>Action</th>
																</tr>
															</thead>
															<tbody>

																<?php

														             if(isset($listeEquipe)){
                                                                        $compt=0;
															            foreach ($listeEquipe as $info) {
															            	$compt++;
			                                                              
															    ?>

																<tr>
																	<td><?php echo $compt; ?></td>
																	<td ><?php if(isset($info->nom)) echo substr($info->nom, 0,25)." ..."; ?></td>
																	<td><?php if(isset($info->titre)) echo substr($info->titre, 0,15)." ..."; ?></td>
																	<td><img src="<?php echo base_url(); ?>uploads/equipe/<?php if(isset($info->photo)) echo $info->photo; ?>" width="100px;"></td>
																	<td><?php if(isset($info->facebook)) echo substr($info->facebook, 0,15)." ..."; ?></td>
																	<td><?php if(isset($info->twitter)) echo substr($info->twitter, 0,15)." ..."; ?></td>
																	<td class="text-nowrap">
																		
																		<a href="<?php echo base_url(); ?>administration/equipeModifier/<?php if(isset($info->id_equipe)) echo $info->id_equipe; ?>"  class="btn btn-sm btn-primary mt-1 mb-1">Modifier</a>

																		

																		<a href="<?php echo base_url(); ?>administration/supprim_equipe/<?php if(isset($info->id_equipe)) echo $info->id_equipe; ?>" class="btn btn-sm btn-primary mt-1 mb-1">Supprimer</a>
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