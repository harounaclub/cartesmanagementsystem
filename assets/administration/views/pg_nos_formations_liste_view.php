<div class="page-header mt-0 shadow p-3">
								<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Tables</a></li>
									<li class="breadcrumb-item active" aria-current="page">Default Tables</li>
								</ol>
								<div class="btn-group mb-0">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?php echo base_url(); ?>administration/nosFormations"><i class="fas fa-plus mr-2"></i>Ajouter une formation</a>
										
										
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
											<h2 class="text-white mb-0">Tableau des formations</h2>
										</div>
										<div class="">
											<div class="grid-margin">
												<div class="">
													<div class="table-responsive">
														<table class="table card-table table-dark table-vcenter text-nowrap  align-items-center">
															<thead class="thead-dark">
																<tr>
																	<th>#</th>
																	<th>Titre</th>
																	<th>Date</th>
																	<th>Auteur</th>
																	<th>Desc 1</th>
																	<th>Desc 2 </th>
																	<th>Action</th>
																</tr>
															</thead>
															<tbody>

																<?php

														             if(isset($listeFormation)){
                                                                        $compt=0;
															            foreach ($listeFormation as $info) {
															            	$compt++;
			                                                              
															    ?>

																<tr>
																	<td><?php echo $compt; ?></td>
																	<td><?php if(isset($info->titre)) echo substr($info->titre, 0,25)." ..."; ?></td>
																	<td><?php if(isset($info->date_formation)) echo $info->date_formation; ?></td>
																	<td><?php if(isset($info->auteur)) echo substr($info->auteur, 0,15)." ..."; ?> </td>
																	<td class="text-nowrap"><?php if(isset($info->description_court)) echo substr($info->description_court, 0,15)." ..."; ?></td>
																	<td><?php if(isset($info->description_complete)) echo substr($info->description_complete, 0,15)." ..."; ?> </td>
																	
																	<td class="text-nowrap">
																		
																		<a href="<?php echo base_url(); ?>administration/formationModifier/<?php if(isset($info->id_formation)) echo $info->id_formation; ?>"  class="btn btn-sm btn-primary mt-1 mb-1">Modifier</a>

																		<a href="<?php echo base_url(); ?>administration/supprim_formation/<?php if(isset($info->id_formation)) echo $info->id_formation; ?>" class="btn btn-sm btn-primary mt-1 mb-1">Supprimer</a>
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