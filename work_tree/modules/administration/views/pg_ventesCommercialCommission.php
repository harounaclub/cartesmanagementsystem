<div class="page-header mt-0 shadow p-3">
								<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="#">Tableau</a></li>
									
								</ol>
								<div class="btn-group mb-0">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?php echo base_url(); ?>administration/ajoutProfils"><i class="fas fa-plus mr-2"></i>Ajouter un profil</a>
										
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
											<h2 class="text-white mb-0">Résumés des commissions commerciales</h2>
										</div>
										<div class="">
											<div class="grid-margin">
												<div class="">
													<div class="table-responsive">
														<table class="table card-table table-dark table-vcenter text-nowrap  align-items-center">
															<thead class="thead-dark">
																<tr>
																	<th>#</th>
																	<th>Commercial </th>
                                                                    <th>Nbre vente</th>
                                                                    <th>Comm./vente</th>
                                                                    <th>Total commission</th>
                                                                  
                                                                   
																</tr>
															</thead>
															<tbody>
                                                               
                                                               <?php

														             if(isset($liste_commercial)){
                                                                        $compt=0;
															            foreach ($liste_commercial as $info) {
																			$compt++;
																			
																			foreach($info["_id"] as $value){


																				$id_mongo=$value;

                                                                            }

                                                                        $code_commercial=$info["code_commerciaux"];
                                                                        $commercial=$info["nom_prenoms_commerciaux"];

                                                                        $nb_vente=$this->administration_model->mdl_compterVenteCommercial($code_commercial);
                                                                        $comm_vente=$info["commission_commerciaux"];

                                                                        $total_commission=$nb_vente*$comm_vente;

			                                                              
															    ?>

																<tr>
																	<td><?php echo $compt; ?></td>
																	<td><?php if(isset($commercial)) echo $commercial; ?></td>
																	<td><?php if(isset($nb_vente)) echo $nb_vente; ?></td>
                                                                    <td><?php if(isset($comm_vente)) echo $comm_vente; ?></td>
                                                                    
                                                                    <td><?php if(isset($total_commission)) echo $total_commission; ?></td>
																	
																	
																	
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