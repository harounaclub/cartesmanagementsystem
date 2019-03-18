<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item">
                                    <a href="<?php echo base_url(); ?>administration/gestionCaisses_ajout">Ajouter une caisse</a>
                                    </li>

                                    <li class="breadcrumb-item">
                                    <a href="<?php echo base_url(); ?>administration/gestionCaissier_ajout">Ajouter un(e) caissier(e)</a>
                                    </li>
									
								</ol>
								
</div>
<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Listes des caisses</h2>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
													<thead>
														<tr>
															<th class="wd-15p">#</th>
															<th class="wd-15p">Caisse</th>
															<th class="wd-20p">Type caisse</th>
															<th class="wd-15p"> date création</th>
															<th class="wd-15p"> Caissier(e)</th>
															<th class="wd-25p">Actions</th>
														</tr>

														<?php

															if(isset($liste_caisses)){
															$compt=0;
															foreach ($liste_caisses as $info) {
																$compt++;
																
																foreach($info["_id"] as $value){

																	$id=$value;
                                                                }
                                                                

                                                                $idCaissier=$info["id_caissier"];
                                                                if($idCaissier == 0){

                                                                    $caissier="Aucun caissier(e)";
                                                                }else{


                                                                    $caissier=$this->administration_model->mdl_nomCaissier($idCaissier);


                                                                }
																
															?>

															<tr>
															<td><?php echo $compt; ?></td>
															<td><?php if(isset($info["libelle_caisse"])) echo $info["libelle_caisse"]; ?></td>
															<td><?php if(isset($info["type_caisse"])) echo $info["type_caisse"]; ?></td>
															<td><?php if(isset($info["date_creation_caisse"])) echo $info["date_creation_caisse"]; ?></td>
															<td><?php if(isset($caissier)) echo $caissier; ?></td>
															
															
															


															<td class="text-nowrap">

															<a href="<?php echo base_url(); ?>administration/gestionCaissier_affectation/<?php if(isset($id)) echo $id; ?>" class="btn btn-sm btn-primary mt-1 mb-1">Affecté un caissier(e)</a>
															</td>
															</tr>


															<?php }
															}

															?>
													</thead>
													<tbody>
														
													</tbody>
												</table>
											</div>
										</div>
									</div>
									
									
								</div>
</div>