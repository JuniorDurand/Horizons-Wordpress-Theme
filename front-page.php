            <?php
				get_header();
				echo "<!-- front-page.php -->";
            ?>


<!-- Featured -->
<div class="wrapper style2">
				<section class="container">
					<header class="major">
						<h2><?=  get_theme_mod('first-section-title');?></h2>
						<span class="byline"><?=  get_theme_mod('first-section-sub-title');?></span>
					</header>
					<div class="row no-collapse-1">
						<section class="4u">
							<a href="#" class="image feature"><img src="<?php echo wp_get_attachment_url(get_theme_mod('first-section-item-1-image')); ?>" alt=""></a>
							<p><?php echo get_theme_mod('first-section-item-1-text'); ?></p>
						</section>
						<section class="4u">
							<a href="#" class="image feature"><img src="<?php echo(get_template_directory_uri()."/images/pic03.jpg") ?>" alt=""></a>
							<p>Donec ornare neque ac sem. Mauris aliquet. Aliquam sem leo, vulputate sed, convallis. Donec magna.</p>
						</section>
						<section class="4u">
							<a href="#" class="image feature"><img src="<?php echo( get_template_directory_uri()."/images/pic04.jpg") ?>" alt=""></a>
							<p>Curabitur sem urna, consequat vel, suscipit convallis sem leo, mattis placerat, nulla. Sed ac leo.</p>
						</section>
	
					</div>
				</section>
			</div>

		<!-- Main -->
			<div id="main" class="wrapper style1">
				<section class="container">
					<header class="major">
						<h2>Nulla luctus eleifend</h2>
						<span class="byline">Mauris vulputate dolor sit amet nibh</span>
					</header>
					<div class="row">
					
						<!-- Content -->
							<div class="6u">
								<section>
									<ul class="style">
										<li>
											<span class="fa fa-wrench"></span>
											<h3>Integer ultrices</h3>
											<span>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim.</span>
										</li>
										<li>
											<span class="fa fa-cloud"></span>
											<h3>Aliquam luctus</h3>
											<span>Pellentesque viverra vulputate enim. Aliquam erat volutpat. Maecenas condimentum enim tincidunt risus accumsan.</span>
										</li>
									</ul>
								</section>
							</div>
							<div class="6u">
								<section>
									<ul class="style">
										<li>
											<span class="fa fa-cogs"></span>
											<h3>Integer ultrices</h3>
											<span>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim.</span>
										</li>
										<li>
											<span class="fa fa-leaf"></span>
											<h3>Aliquam luctus</h3>
											<span>Pellentesque viverra vulputate enim. Aliquam erat volutpat. Maecenas condimentum enim tincidunt risus accumsan.</span>
										</li>
									</ul>
								</section>
							</div>

					</div>
				</section>
            </div>
            
            <?php
                get_footer();
            ?>