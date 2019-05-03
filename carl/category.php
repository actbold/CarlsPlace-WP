<?php get_header(); ?>
	<main role="main">
		<div class="wrapper">
		<?php get_part("category-hero"); ?>
			<?php if (have_posts()): ?>
			<div class="category-article-layout flex">
			<?php while (have_posts()) : the_post(); ?>
				<?php get_part("school-article"); ?>
			<?php endwhile; ?>
			</div>
			<?php endif; ?>
		</div>
	</main>
<?php get_footer(); ?>
