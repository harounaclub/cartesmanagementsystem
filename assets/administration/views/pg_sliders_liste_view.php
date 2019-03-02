<div class="page-header mt-0 shadow p-3">
								<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Tableau</a></li>
									
								</ol>
								<div class="btn-group mb-0">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?php echo base_url(); ?>administration/sliders"><i class="fas fa-plus mr-2"></i>Ajouter un slide</a>
										
										
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
											<h2 class="text-white mb-0">Liste des slides</h2>
										</div>
										<div class="">
											<div class="grid-margin">
												<div class="">
													<div class="table-responsive">
														<table class="table card-table table-dark table-vcenter text-nowrap  align-items-center">
															<thead class="thead-dark">
																<tr>
																	<th>#</th>
																	<th>Images</th>
																	<th>Titre 1</th>
																	<th>Titre 2</th>
																	<th>Titre 3</th>
																	<th>Titre 4</th>
																	<th>Action</th>
																</tr>
															</thead>
															<tbody>
																<?php

														             if(isset($listeSliders)){
                                                                        $compt=0;
															            foreach ($listeSliders as $info) {
															            	$compt++;
			                                                              
															    ?>
																<tr>
																	<td><?php echo $compt; ?></td>
																	<td><img src="<?php echo base_url(); ?>uploads/sliders/<?php if(isset($info->img)) echo $info->img; ?>" width="100px;"></td>
																	<td><?php if(isset($info->titre1)) echo substr($info->titre1, 0,10)." ..."; ?></td>
																	<td><?php if(isset($info->titre2)) echo substr($info->titre2, 0,10)." ..."; ?></td>
																	<td><?php if(isset($info->titre3)) echo substr($info->titre3, 0,10)." ..."; ?></td>
																	<td class="text-nowrap"><?php if(isset($info->titre4)) echo substr($info->titre4, 0,10)." ..."; ?></td>
																	<td class="text-nowrap">
																		
																		<a href="<?php echo base_url(); ?>administration/slidersModifier/<?php if(isset($info->id_slide)) echo $info->id_slide; ?>"  class="btn btn-sm btn-primary mt-1 mb-1">Modifier</a>

																		<a href="<?php echo base_url(); ?>administration/supprim_slider/<?php if(isset($info->id_slide)) echo $info->id_slide; ?>" class="btn btn-sm btn-primary mt-1 mb-1">Supprimer</a>
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