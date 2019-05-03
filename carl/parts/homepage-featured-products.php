<section class="feature-prod">
	<h2><?php the_field("featured_products_headline"); ?></h2>
	<div class="container p-0">
		<div class="carousel-prod">
		<?php if( have_rows('featured_products') ): ?>
			<?php while( have_rows('featured_products') ): the_row(); 
				$image = get_sub_field('image');
				$title = get_sub_field('title');
				$price = get_sub_field('price');
				$link = get_sub_field('link');
			?>
			<div class="col-3 px-2 item">
				<div class="card">
					<div class="img-container">
						<a href="<?= $link; ?>">
							<img class="card-img-top" 
								 src="<?= $image['url']; ?>">
						</a>
					</div>
					<div class="card-block">
						<p class="card-text">
							<a href="<?= $link; ?>">
								<?= $title; ?>
							</a>
						</p>
						<div class="price">
							from <span><?= $price; ?></span>
						</div>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		<?php endif; ?>
		</div>
	</div>
	<div class="button-container d-flex justify-content-center">
		<a class="btn btn-secondary btn-lg" href="<?php the_field("featured_products_link"); ?>" role="button"><span>SHOP ALL</span><img src="wp-content/themes/carl/assets/img/home/arr-right-accent.png" alt="icon"></a>
	</div>
</section>