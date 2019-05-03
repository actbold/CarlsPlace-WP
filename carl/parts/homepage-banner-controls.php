<?php if( have_rows('banner_slides') ): ?>
	<div class="row nav-banner">
	<?php while( have_rows('banner_slides') ): the_row();
		$bg = get_sub_field("image"); 
		$content = get_sub_field("content");
		$icon = get_sub_field('icon');
		$title = get_sub_field('title');
	?>
		<div class="banner-control col-3 p-0 item"
			 data-background="<?= $bg['url']; ?>"
			 data-content="<?= htmlspecialchars($content); ?>"
		>
		<a class="_active">
			<img src="<?= $icon['url']; ?>" />
			<?= $title; ?>
		</a>
		</div>
	<?php endwhile; ?>
	</div>
<?php endif; ?>
