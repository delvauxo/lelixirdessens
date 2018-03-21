<!--==============================content================================-->
        <div id="content">
        	<div class="padding-content">
                <div class="center">
					<div class="box">
						<div class="box-text">
							<span>
								Cher Administrateur !<br><br>
								Bienvenue dans la partie Back-Office de votre site-web. Il vous est désormais possible d'ajouter, modifier ou encore supprimer beaucoup d'objets.
								Cette interface d'administration à été conçue de manière à ce que ce soit le plus simple d'utilisation possible pour l'utilisateur.C'est la raison pour laquelle il n'y a qu'une seule et unique bar de menu pour gérer votre contenu.
								On ne peut plus simple...
								Si vous avez la moindre question, n'hésitez pas à contacter notre support technique qui se fera un plaisir de vous aider.
								L'équipe Micro-Web vous souhaite une agréable utilisation.
							</span>
						</div>
					</div>
					
					<div class="icons">

					<a href="<?php echo Router::url('admin/posts/contenu'); ?>" style="transition-property: transform; transition-duration: 0.22s; transition-timing-function: ease; transition-delay: 0s;">
					<div class="icon-1"><img src="<?php echo Router::webroot('img/layout/backoffice/icon01.png'); ?>" alt="" />
					<div class="icon-text"><span class="center">Contenu</span></div>
					</div>
					</a>
					
					<a href="<?php echo Router::url('admin/posts/index'); ?>">
					<div class="icon-1"><img src="<?php echo Router::webroot('img/layout/backoffice/icon02.png'); ?>" alt="" />
					<div class="icon-text"><span class="center">Articles</span></div>
					</div>
					</a>
					
					<a href="<?php echo Router::url('admin/slides/index'); ?>">
					<div class="icon-1-last"><img src="<?php echo Router::webroot('img/layout/backoffice/icon03.png'); ?>" alt="" />
					<div class="icon-text"><span class="center">Slideshow</span></div>
					</div>
					</a>
					
					<a href="<?php echo Router::url('admin/posts/analytics'); ?>">
					<div class="icon-2"><img src="<?php echo Router::webroot('img/layout/backoffice/icon04.png'); ?>" alt="" />
					<div class="icon-text"><span class="center">Statistiques</span></div>
					</div>
					</a>
					
					<a href="<?php echo Router::url('admin/parametres/index'); ?>">
					<div class="icon-2-last"><img src="<?php echo Router::webroot('img/layout/backoffice/icon05.png'); ?>" alt="" />
					<div class="icon-text"><span class="center">Configuration</span></div>
					</div>
					</a>
					
					</div>
					
				</div>
            </div>
        </div>
<!--==============================End content============================-->