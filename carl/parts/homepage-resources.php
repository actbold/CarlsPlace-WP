<section class="resource">
	<h2><?php the_field("resources_headline"); ?></h2>
	<div class="container">
<!--        changes here-->
		<div class="row justify-content-center links-group" style="display: none;">
			<div class="col-7">
				<div class="d-flex justify-content-between">
				<?php if( have_rows('resources_buttons') ): ?>
					<?php while( have_rows('resources_buttons') ): the_row(); 
						$title = get_sub_field('title');
						$link = get_sub_field('link');
					?>
						<a href="<?= $link; ?>" class="btn btn-outline-primary"><?= $title; ?></a>

					<?php endwhile; ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="row m-0 justify-content-center select-group" >
<!--            disable for mobile2-->
			<div class="col-12 text-center" style="display: none;">
				<?php if( have_rows('resources_buttons') ): ?>
				<select class="custom-select">
					<option selected>Select Category</option>
					<?php while( have_rows('resources_buttons') ): the_row(); 
						$title = get_sub_field('title');
						$link = get_sub_field('link');
					?>
					<option value="<?= $link; ?>"><?= $title; ?></option>
					<?php endwhile; ?>
				</select>				
				<?php endif; ?>
			</div>
		</div>
		<div class="carousel product-tales">				
			
				<?php if( have_rows('featured_articles') ): ?>
					<?php while( have_rows('featured_articles') ): the_row(); 
						$Article = get_sub_field('article');
						$image = get_the_post_thumbnail_url($Article, 'full');
						$title = get_the_title($Article);
						$link = get_the_permalink($Article); 
						$excerpt = get_the_excerpt($Article);
					?>
					<div class="col-3 px-2">
						<div class="card">
							<div class="img-container">
								<a href="#" class="img-a-c" style="background-image:url(<?= $image; ?>)"><img class="card-img-top" src="<?= $image; ?>" alt="Card image cap"></a>
							</div>
							<div class="card-block">
								<h4 class="card-title"><?= $title; ?></h4>
								<p class="card-text"><?= substr($excerpt, 0, 60); ?>...</p>
								<a href="<?= $link; ?>" class="link">Read more</a>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				<?php endif; ?>
		</div>
	</div>
	<div class="button-container d-flex justify-content-center">
		<a class="btn btn-secondary btn-lg" href="/resources/" role="button"><span>READ ALL</span><img src="wp-content/themes/carl/assets/img/home/arr-right-accent.png" alt="icon"></a>
	</div>
</section>