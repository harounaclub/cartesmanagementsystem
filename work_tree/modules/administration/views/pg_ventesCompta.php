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
											<h2 class="text-white mb-0">Résumés des ventes</h2>
										</div>
										<div class="">
											<div class="grid-margin">
												<div class="">
													<div class="table-responsive">
														<table class="table card-table table-dark table-vcenter text-nowrap  align-items-center">
															<thead class="thead-dark">
																<tr>
																	<th>#</th>
																	<th>Caisse </th>
                                                                    <th>Date</th>
                                                                    <th>Numero carte</th>
                                                                    <th>Montant</th>
                                                                    <th>Client</th>
                                                                   
																</tr>
															</thead>
															<tbody>
                                                               
                                                               <?php

														             if(isset($liste_vente)){
                                                                        $compt=0;
															            foreach ($liste_vente as $info) {
																			$compt++;
																			
																			foreach($info["_id"] as $value){


																				$id_mongo=$value;

                                                                            }

                                                                        $id_caisse=$info["id_caisse"];
                                                                        $infoCaisse=$this->administration_model->mdl_infoCaisses($id_caisse);
                                                                        $caisse="";
                                                                        foreach($infoCaisse as $in){

                                                                            $caisse=$in["libelle_caisse"];
                                                                        }

			                                                              
															    ?>

																<tr>
																	<td><?php echo $compt; ?></td>
																	<td><?php if(isset($caisse)) echo $caisse."/".$info["nom_prenoms_caissier"]; ?></td>
																	<td><?php if(isset($info["date_achat_carte_client"])) echo $info["date_achat_carte_client"]; ?></td>
                                                                    <td><?php if(isset($info["numero_carte_client"])) echo $info["numero_carte_client"]; ?></td>
                                                                    <td>10 000 </td>
                                                                    <td><?php if(isset($info["nom_prenoms_client"])) echo $info["nom_prenoms_client"]; ?></td>
																	
																	
																	
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