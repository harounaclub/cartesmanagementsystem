<div class="page-header mt-0 shadow p-3">
								
								
</div>
<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Listes des cartes par lot</h2>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
													<thead>
														<tr>
															<th class="wd-15p">#</th>
															<th class="wd-15p">Numéro du lot</th>
															<th class="wd-20p">Designation du lot</th>
															<th class="wd-15p"> date</th>
															<th class="wd-10p">Nbre de cartes</th>
															<th class="wd-25p">Status</th>
															<th class="wd-25p">Actions</th>
														</tr>

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
															<td>
															
															<?php 
																	  if(isset($info["status_cartes_lot"])){

																		$status=$info["status_cartes_lot"];
																		if($status == "0"){ ?>

																						<span class="badge badge-default">En stock</span>


																		<?php }else{ ?>

																						<span class="badge badge-success">hors stock</span>
                                                                                   
																		<?php }


																	  }
																	  
															
															?></td>


															<td class="text-nowrap">

															<a href="<?php echo base_url(); ?>administration/sortieCartesLot/<?php if(isset($info["id_lot"])) echo $info["id_lot"]; ?>" class="btn btn-sm btn-primary mt-1 mb-1">Faire sortir</a>
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