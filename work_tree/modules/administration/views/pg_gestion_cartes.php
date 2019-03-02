<div class="page-header mt-0 shadow p-3">
								<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Tableau</a></li>
									
								</ol>
								<div class="btn-group mb-0">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?php echo base_url(); ?>administration/ajoutCartes"><i class="fas fa-plus mr-2"></i>Ajouter un lot de cartes</a>
										
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
											<h2 class="text-white mb-0">Liste des lots de cartes</h2>
										</div>
										<div class="">
											<div class="grid-margin">
												<div class="">
													<div class="table-responsive">
														<table class="table card-table table-dark table-vcenter text-nowrap  align-items-center">
															<thead class="thead-dark">
																<tr>
																	<th>#</th>
																	<th>Numéro du lot</th>
																	<th>désignation</th>
																	<th>date</th>		
																	<th>Total cartes</th>
                                                                    <th>Action</th>
																</tr>
															</thead>
															<tbody>
                                                               
                                                               <?php

														             if(isset($list_cartesLot)){
                                                                        $compt=0;
															            foreach ($list_cartesLot as $info) {
																			$compt++;
																			
																			foreach($info["_id"] as $value){

																				$id=$value;
																			}
			                                                              
															    ?>

																<tr>
																	<td><?php echo $compt; ?></td>
																	<td><?php if(isset($info["numero_cartes_lot"])) echo $info["numero_cartes_lot"]; ?></td>
																	<td><?php if(isset($info["designation_lot"])) echo $info["designation_lot"]; ?></td>
																	<td><?php if(isset($info["date_enregistrement_lot"])) echo $info["date_enregistrement_lot"]; ?></td>
                                                                    <td><?php if(isset($info["nbre_total_cartes_lot"])) echo $info["nbre_total_cartes_lot"]; ?></td>
																	
						
																	<td class="text-nowrap">

																		<a href="<?php echo base_url(); ?>administration/supprimCaissiere/<?php if(isset($id_m_caissiere)) echo $id_m_caissiere; ?>" class="btn btn-sm btn-primary mt-1 mb-1">Supprimer</a>
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