

<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
									
									
								</ol>
								<div class="btn-group mb-0">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?php echo base_url(); ?>administration/listeClients"><i class="fas fa-eye mr-2"></i>Retour à la liste des clients</a>
										
										
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i> Paramètres</a>
									</div>
								</div>
</div>

<?php

if(isset($infos_client)){

    

    foreach($infos_client as $info){

        $civilite=$info["civilite"];
        $nom_prenoms_client=$info["nom_prenoms_client"];
        $nom_complet=$civilite." ".$nom_prenoms_client;
        $numero_telephone_mobile_client=$info["numero_telephone_mobile_client"];
        $numero_carte_client=$info["numero_carte_client"];
        $mot_de_passe_carte_client=$info["mot_de_passe_carte_client"];
        

        $message="Bonjour $nom_complet,votre carte prixkdo n°$numero_carte_client est désormais active.Connectez-vous et profitez de réductions sur www.prixkdo.ci MDP : $mot_de_passe_carte_client";


    }
}

?>
							<?php echo form_open('administration/envoiSmsClient'); ?>
							<div class="row">
								<div class="col-md-12">
									<div class="card shadow">
										<div class="card-header">
											<h2 class="mb-0">Formulaire de renvoi de sms au client <?php echo $nom_complet; ?></h2>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<input type="text" class="form-control" name="numero_client" value="<?php echo $numero_telephone_mobile_client; ?>">
														<?php echo form_error('numero_client','<font color="red">','</font>'); ?>
													</div>
													

                                                    <div class="form-group">
                                                        <textarea class="form-control" class="md-textarea form-control" name="message_client" rows="3"><?php echo $message; ?></textarea>
                                                                 
                                                        
													    <?php echo form_error('message_client','<font color="red">','</font>'); ?>
													</div>
													
												</div>
											
												<div class="col-md-12">
													
												</div>

												
												
											</div>
											<div class="row" style="margin-top: 20px;">
                                                <div class="col-md-12">
													<ul class="list-inline wizard mb-0">
															
															<li class="next list-inline-item float-right"><button type="submit" class="btn btn-primary mb-0 waves-effect waves-light">Valider</button></li>
														</ul>
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
							<?php echo form_close(); ?>
<!-- file uploads js -->
<script src="<?php echo base_url(); ?>assets/administration/plugins/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/administration/plugins/fileuploads/js/dropify.min.js"></script>
							<script>
		$('.dropify').dropify({
			messages: {
				
				'replace': 'Cliquer/déposer ou remplacer le logo',
				'remove': 'Supprimer',
				'error': 'Ooops, something wrong appended.'
			},
			error: {
				'fileSize': 'The file size is too big (2M max).'
			}
		});
	</script>