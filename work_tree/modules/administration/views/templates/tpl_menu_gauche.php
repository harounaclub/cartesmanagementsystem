<aside class="app-sidebar ">
				<div class="sidebar-img">
					<a class="navbar-brand" href="index-2.html"><img alt="..." class="navbar-brand-img main-logo" src="<?php echo base_url(); ?>assets/administration/img/brand/logo-dark.png"> <img alt="..." class="navbar-brand-img logo" src="<?php echo base_url(); ?>assets/administration/img/brand/logo.png"></a>
					<ul class="side-menu">

						<!--Menu tableau de bord debut-->

						<li class="slide">
							<a class="side-menu__item active" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-home"></i>Tableau de bord </a>			
						</li>

						<!--Menu tableau de bord fin-->

						<!--Menu site internet debut-->

						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Logistiques</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li>
									<a href="<?php echo base_url(); ?>administration/gestionApproCartes" class="slide-item">Approvisionnement cartes</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>administration/gestionCartes" class="slide-item">Enregistrement lots cartes</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>administration/gestionCartesLot" class="slide-item">Sortie lot  de cartes</a>
								</li>

								<li>
									<a href="<?php echo base_url(); ?>administration/gestionCartesTous" class="slide-item">Sortie de cartes</a>
								</li>
								
								
							</ul>
						</li>

						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Marketing/Ventes</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li>
									<a href="<?php echo base_url(); ?>administration/venteCarte" class="slide-item">Vente de cartes</a>
								</li>

								<li>
									<a href="<?php echo base_url(); ?>administration/gestionCommerciaux" class="slide-item">Enregistrement commerciaux</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>administration/infosGenerales" class="slide-item">Liste des clients</a>
								</li>
	
							</ul>
						</li>

						

						<!--Menu Menu site internet fin-->

                         <!--Menu paramètres debut-->

						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Paramètres</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li>
									<a href="<?php echo base_url(); ?>administration/gestionUtilisateur" class="slide-item">Gestion des administrateurs</a>
								</li>

								<!-- <li>
									<a href="<?php echo base_url(); ?>administration/gestionUtilisateur" class="slide-item">Paramètres APIs</a>
								</li> -->
								
								
							</ul>
						</li>

						<!--Menu paramètres fin-->

						<li>
							<a class="side-menu__item" href="#"><i class="side-menu__icon fa fa-question-circle"></i><span class="side-menu__label">Aide & Support</span></a>
						</li>
					</ul>
				</div>
			</aside>