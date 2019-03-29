

<aside class="app-sidebar ">
<?php

$cle_admin=$this->session->userdata('admin_cle');
$listeProfils=$this->administration_model->mdl_listeProfilsAdmin($cle_admin);

foreach($listeProfils as $infoProfil){

	$listeProfil[]=$infoProfil["profil"];
}





?>
				<div class="sidebar-img">
					<a class="navbar-brand" href="index-2.html"><img alt="..." class="navbar-brand-img main-logo" src="<?php echo base_url(); ?>assets/administration/img/LOGO.jpg"> <img alt="..." class="navbar-brand-img logo" src="<?php echo base_url(); ?>assets/administration/img/LOGO.jpg"></a>
					<ul class="side-menu">

						<!--Menu tableau de bord debut-->

						<li class="slide">
							<a class="side-menu__item active" data-toggle="slide" href="#">
							<i class="side-menu__icon fe fe-home"></i>Tableau de bord </a>			
						</li>

						<!--Menu tableau de bord fin-->

						<!--Menu logistiques debut-->

						<?php

							if (in_array("logistic", $listeProfil) || in_array("super-admin", $listeProfil)) { ?>

							<li class="slide">
								<a class="side-menu__item" data-toggle="slide" href="#">
								<i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Logistiques</span>
								<i class="angle fa fa-angle-right"></i></a>
								<ul class="slide-menu">

									<li>
										<a href="<?php echo base_url(); ?>administration/gestionFournisseurs" class="slide-item">Gestion des fournisseurs</a>
									</li>

									<li>
										<a href="<?php echo base_url(); ?>administration/gestionApproCartes" class="slide-item">Approvisionnement cartes</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>administration/gestionCartes" class="slide-item">Enregistrement lots cartes</a>
									</li>

									<li>
										<a href="<?php echo base_url(); ?>administration/gestionCartesAffectations" class="slide-item">Affectation cartes ventes</a>
									</li>

									<li>
										<a href="<?php echo base_url(); ?>administration/gestionCartesLot" class="slide-item">Sortie lot  de cartes</a>
									</li>

									<li>
										<a href="<?php echo base_url(); ?>administration/gestionCartesTous" class="slide-item">Sortie de cartes</a>
									</li>
									
									
								</ul>
							</li>
								
							<?php
							}
						?>

						<!--Menu logistiques fin-->

						
					   <!--Menu compta debut-->
					   
					   <?php

							if (in_array("compta", $listeProfil) || in_array("super-admin", $listeProfil)) { ?>
						
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#">
							<i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Compta. /Caisses</span>
							<i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">

							    <li>
									<a href="<?php echo base_url(); ?>administration/resumeVente" class="slide-item">Resumé ventes</a>
								</li>

							    <li>
									<a href="<?php echo base_url(); ?>administration/gestionCaisses" class="slide-item">Gestion des caisses</a>
								</li>

								<li>
									<a href="<?php echo base_url(); ?>administration/gestionCaissier" class="slide-item">Gestion des caissiers</a>
								</li>
								
								
								
							</ul>
						</li>

						<?php
							}
						?>

						<!--Menu compta fin-->

						<!--Menu caisse debut-->

						<?php

						if (in_array("caisse", $listeProfil) || in_array("super-admin", $listeProfil)) { ?>

						<li class="slide">
							<a class="side-menu__item" data-toggle="slide">
								<i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Caisses</span>
								<i class="angle fa fa-angle-right"></i>
							</a>

							<ul class="slide-menu">

							    <li>
									<a href="<?php echo base_url(); ?>administration/venteCarte" class="slide-item">Gestion caisse</a>
								</li>

							   
								
								
								
							</ul>
							
						</li>

						<?php
							}
						?>

						<!--Menu caisse fin-->

						<!--Menu responsable commercial debut-->

						<?php

						if (in_array("resp-com", $listeProfil) || in_array("super-admin", $listeProfil)) { ?>

						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#">
							<i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Resp. commercial</span>
							<i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">

							    <li>
									<a href="<?php echo base_url(); ?>administration/resumeCommercial" class="slide-item">Resumé ventes</a>
								</li>

								<li>
									<a href="<?php echo base_url(); ?>administration/gestionCommerciaux" class="slide-item">Commerciaux</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>administration/listeClients" class="slide-item">Clients</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>administration/commercialCommission" class="slide-item">Commissions</a>
								</li>
								<li>
									<a href="#" class="slide-item">Reglements</a>
								</li>
								
							</ul>

						</li>

						<?php
							}
						?>

						<!--Menu responsable commercial fin-->

						<!--Menu commercial debut-->

						<?php

						if (in_array("com", $listeProfil) || in_array("super-admin", $listeProfil)) { ?>

						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#">
							<i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Commercial/Ventes</span>
							<i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li>
									<a href="#" class="slide-item">Mes Ventes</a>
								</li>

								<li>
									<a href="#" class="slide-item">Mes Clients</a>
								</li>
								<li>
									<a href="#" class="slide-item">Mes Commissions</a>
								</li>
								<li>
									<a href="#" class="slide-item">Mes Paiements Reçus</a>
								</li>
	
							</ul>
						</li>

						<?php
							}
						?>

						<!--Menu  commercial fin-->

						<!--Menu marketing debut-->

						<?php

						if (in_array("resp-marketing", $listeProfil) || in_array("super-admin", $listeProfil)) { ?>

						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#">
							<i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Resp. Marketing</span>
							<i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li>
									<a href="#" class="slide-item">SMS</a>
								</li>

								<li>
									<a href="#" class="slide-item">E-mail</a>
								</li>
							
	
							</ul>
						</li>

						<?php
							}
						?>

					

                       <!--Menu informatique debut-->

						<?php

							if (in_array("resp-marketing", $listeProfil) || in_array("super-admin", $listeProfil)) { ?>

						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Paramètres</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li>
									<a href="<?php echo base_url(); ?>administration/gestionUtilisateur" class="slide-item">Gestion des administrateurs</a>
								</li>

								<li>
									<a href="<?php echo base_url(); ?>administration/gestionProfils" class="slide-item">Gestion des profils</a>
								</li>

								<!-- <li>
									<a href="<?php echo base_url(); ?>administration/gestionUtilisateur" class="slide-item">Paramètres APIs</a>
								</li> -->
								
								
							</ul>
						</li>

						<?php
							}
						?>

						<!--Menu informatique fin-->

						<li>
							<a class="side-menu__item" href="#"><i class="side-menu__icon fa fa-question-circle"></i><span class="side-menu__label">Aide & Support</span></a>
						</li>
					</ul>
				</div>
			</aside>