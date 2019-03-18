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
											<h2 class="text-white mb-0">Liste des clients</h2>
										</div>
										<div class="">
											<div class="grid-margin">
												<div class="">
													<div class="table-responsive">
														<table class="table card-table table-dark table-vcenter text-nowrap  align-items-center">
															<thead class="thead-dark">
																<tr>
																	<th>#</th>
																	<th>nom et prenoms </th>
                                                                    <th>Téléphone</th>
                                                                    <th>Numero carte / code</th>
                                                                    <th>date achat</th>
                                                                    
                                                                    <th>Commercial</th>
                                                                   
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

                                                                        $code_commercial=$info["code_commercial"];
                                                                        $infoCommercial=$this->administration_model->mdl_InfoCommercial($code_commercial);
                                                                        $commercial="";
                                                                        foreach($infoCommercial as $in){

                                                                            $commercial=$in["nom_prenoms_commerciaux"];
                                                                        }

                                                                        

			                                                              
															    ?>

																<tr>
																	<td><?php echo $compt; ?></td>
																	
																	<td><?php if(isset($info["nom_prenoms_client"])) echo $info["nom_prenoms_client"]; ?></td>
                                                                    <td><?php if(isset($info["numero_telephone_mobile_client"])) echo $info["numero_telephone_mobile_client"]; ?></td>
                                                                    <td><?php if(isset($info["numero_carte_client"])) echo $info["numero_carte_client"]."/".$info["mot_de_passe_carte_client"]; ?></td>
                                                                    <td><?php if(isset($info["date_achat_carte_client"])) echo $info["date_achat_carte_client"]; ?></td>
                                                                    <td><?php if(isset($commercial)) echo $commercial; ?></td>
																	
																	
																	
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