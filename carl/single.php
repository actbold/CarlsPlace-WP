<?php get_header(); // SINGLE ARTICLE TEMPLATE ?>
<main class="site-content">
	<?php if (have_posts()): while (have_posts()) : the_post(); 
		//Get Post type to determine template
		$PostType = get_post_type(); 
	?>
		<?php if ($PostType == "how_to_article"): ?>
			<?php get_part("article", "how-to-article"); ?>
		<?php endif; ?>
		<?php if ($PostType == "post"): ?>
			<?php get_part("article", "default"); ?>
		<?php endif; ?>
		<?php if ($PostType == "testimonial"): ?>
			<?php get_part("article", "testimonial"); ?>
		<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>
</main>
<?php get_footer();?>
