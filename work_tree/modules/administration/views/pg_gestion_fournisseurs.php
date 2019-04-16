<div class="page-header mt-0 shadow p-3">
								<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Tableau</a></li>
									
								</ol>
								<div class="btn-group mb-0">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?php echo base_url(); ?>administration/ajoutFournisseur"><i class="fas fa-plus mr-2"></i>Ajouter un fournisseur</a>
										
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
											<h2 class="text-white mb-0">Liste des fournisseurs</h2>
										</div>
										<div class="">
											<div class="grid-margin">
												<div class="">
													<div class="table-responsive">
														<table class="table card-table table-dark table-vcenter text-nowrap  align-items-center">
															<thead class="thead-dark">
																<tr>
																	<th>#</th>
																	<th>Fournisseur</th>
																	<th>Pays</th>
																	<th>Ville </th>
																	<th>Téléphone(s)</th>
																	<th>Email</th>
                                                                    <th>Action</th>
																</tr>
															</thead>
															<tbody>
                                                               
                                                               <?php
	
														             if(isset($list_fournisseurs)){
                                                                        $compt=0;
															            foreach ($list_fournisseurs as $info) {
																			$compt++;
																			
																			foreach($info["_id"] as $value){

																				$id_m_fournisseur=$value;
																			}
			                                                              
															    ?>

																<tr>
																	<td><?php echo $compt; ?></td>
																	<td><?php if(isset($info["raison_sociale_fournisseur"])) echo $info["raison_sociale_fournisseur"]; ?></td>
																	<td><?php if(isset($info["pays_fournisseur"])) echo $info["pays_fournisseur"]; ?></td>
																	<td><?php if(isset($info["ville_fournisseur"])) echo $info["ville_fournisseur"]; ?></td>
                                                                    <td><?php if(isset($info["téléphone1_fournisseur"])) echo $info["téléphone1_fournisseur"]; ?></td>
																	<td><?php if(isset($info["email_fournisseur"])) echo $info["email_fournisseur"]; ?></td>
																	
						
																	<td class="text-nowrap">

																		<a href="<?php echo base_url(); ?>administration/mdl_supprimFournisseur/<?php if(isset($id_m_fournisseur)) echo $id_m_fournisseur; ?>" class="btn btn-sm btn-primary mt-1 mb-1">Supprimer</a>
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