<section class="prod-present">
	<div class="container">
		<div class="row">
			<?php if( have_rows('cards') ): ?>
				<?php while( have_rows('cards') ): the_row(); 
					$image = get_sub_field('image');
					$title = get_sub_field('title');
					$description = get_sub_field('description');
					$link = get_sub_field('link');
					$style = get_sub_field('card_style');
				?>
				<div class="col-12 col-lg-4 px-2">
					<div class="prod-card">
						<div class="block-descr <?= $style; ?>">
							<h3><?= $title; ?></h3>
							<div class="descr"><?= $description; ?></div>
							<a href="<?= $link; ?>" class="link"><img src="wp-content/themes/carl/assets/img/home/arr-right-circle.png"></a>
						</div>
						<img src="<?= $image['url']; ?>" alt="image">
					</div>
				</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
