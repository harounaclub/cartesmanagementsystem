<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>administration/gestionPartenaires">Retour à la liste des partenaires</a></li>
									
								</ol>
								
</div>
<div class="row">

<?php

$infoPartenaire=$this->administration_model->mdl_listPartenairesCleImage($cle_image);
foreach($infoPartenaire as $infoPartenaire){

    $lib_partenaire=$infoPartenaire["partenaireNom_vitrine"];
}

$infoLogo=$this->administration_model->mdl_imageLogo($cle_image);
foreach($infoLogo as $infoLogo){


    $logo_image=$infoLogo["image"];


}

$listImagesPartenaire=$this->administration_model->mdl_ListImagesPartenairesAutres($cle_image);






?>

<h3>Editer les images et le contenu du partenaire <b> <?php if(isset($lib_partenaire)) echo $lib_partenaire; ?></b> </h3>
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">logo du partenaire </h2>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
													<thead>
														<tr>
															<th class="wd-15p">#</th>
															<th class="wd-15p">logo</th>
                                                            <th class="wd-15p">Partenaire</th>
															<th class="wd-25p">Actions</th>
														</tr>

														
															<tr>
															<td>1</td>
															<td width="10%"><img width="100px" src="<?php echo base_url(); ?>uploads/logo/<?php echo $logo_image; ?>"></td>
															<td><?php if(isset($lib_partenaire)) echo $lib_partenaire; ?></td>
															

															<td class="text-nowrap">

                                                                <a href="<?php echo base_url(); ?>administration/mdl_supprimPartenaire/<?php if(isset($id)) echo $id; ?>" class="btn btn-sm btn-danger mt-1 mb-1">Supprimer logo</a>

															</td>
															</tr>


															
													</thead>
													<tbody>
														
													</tbody>
												</table>
											</div>
										</div>


                                        <div class="card-header">
											<h2 class="mb-0">Autres images du partenaire </h2>
										</div>

                                        <div class="card-body">
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
													<thead>
														<tr>
															<th class="wd-15p">#</th>
															<th class="wd-15p">Images</th>
                                                            <th class="wd-15p">Partenaire</th>
															<th class="wd-25p">Actions</th>
														</tr>

                                                        <?php

                                                        if(isset($listImagesPartenaire)){

                                                            $compt=0;
                                                            foreach($listImagesPartenaire as $imagesPartenaires){ 

                                                                $compt=$compt+1;
                                                            ?>

                                                            <tr>
                                                                <td><?php echo $compt; ?></td>
                                                                <td width="10%"><img width="100px" src="<?php echo base_url(); ?>uploads/partenaires/<?php echo $imagesPartenaires["image"]; ?>"></td>
                                                                <td><?php if(isset($lib_partenaire)) echo $lib_partenaire; ?></td>
                                                                

                                                                <td class="text-nowrap">

                                                                    <a href="#" class="btn btn-sm btn-danger mt-1 mb-1">Supprimer Image partenaire</a>

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