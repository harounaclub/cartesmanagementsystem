<div class="page-header mt-0 shadow p-3">
								
								
</div>
<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Listes des cartes</h2>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
													<thead>
														<tr>
															<th class="wd-15p">#</th>
															<th class="wd-15p">N° carte</th>
															<th class="wd-15p">Mot de passe</th>
															<th class="wd-20p">Validité</th>
															<th class="wd-15p"> date</th>
									
															<th class="wd-25p">Status</th>
															<th class="wd-25p">Actions</th>
														</tr>

														<?php

															if(isset($list_cartes)){
															$compt=0;
															foreach ($list_cartes as $info) {
																$compt++;
																
																foreach($info["_id"] as $value){

																	$id=$value;
																}
																
															?>

															<tr>
															<td><?php echo $compt; ?></td>
															<td><?php if(isset($info["numero_cartes"])) echo $info["numero_cartes"]; ?></td>
															<td><?php if(isset($info["mot_de_passe_cartes"])) echo $info["mot_de_passe_cartes"]; ?></td>
															<td><?php if(isset($info["validite_cartes"])) echo $info["validite_cartes"]; ?></td>
															<td><?php if(isset($info["date_enregistrement_cartes"])) echo $info["date_enregistrement_cartes"]; ?></td>
															
															<td>
															
															<?php 
																	  if(isset($info["status_cartes"])){

																		$status=$info["status_cartes"];
																		if($status == "0"){ ?>

																						<span class="badge badge-default">En stock</span>


																		<?php }else{ 

																			if($status == "1"){
	
																			
																		?>

																						<span class="badge badge-warning">hors stock</span>
                                                                                   
																		<?php }else{ ?>
																		           
																						<span class="badge badge-success">Vendu</span>



																		<?php }

																		}


																	  }
																	  
															
															?></td>


															<td class="text-nowrap">

															<a href="<?php echo base_url(); ?>administration/sortieCartes/<?php if(isset($info["id_lot"])) echo $info["id_lot"]; ?>" class="btn btn-sm btn-primary mt-1 mb-1">Faire sortir</a>
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