<?php if( have_rows('banner_slides') ): ?>
	<?php $iterator = 1;
	 while( have_rows('banner_slides') ): the_row();
		if($iterator == 1){
			$bg = get_sub_field("image"); 
			$content = get_sub_field("content");
			$icon = get_sub_field('icon');
			$title = get_sub_field('title');
		}
		$iterator++;
	endwhile;
endif;
	?>
<section class="main-banner" style="background-image: url('<?= $bg['url']; ?>')">
	<div class="container">
		<div class="row justify-content-center">
			<div id="banner-content" class="col">
				<?= $content; ?>
			</div>
		</div>
	</div>
	<div class="nav-banner-container">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-xl-8">
					<?php get_part("homepage", "banner-controls"); ?>
				</div>
			</div>
		</div>
	</div>
</section>
