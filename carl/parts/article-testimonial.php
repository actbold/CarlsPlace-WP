<?php 
	$category = get_the_category();
	$PrimaryCategory = $category[0]->cat_name;
?>
<!-- Banner article start -->
<section class="banners banner-article">

</section>
<!-- Banner article end -->

<?php 
$post = get_post();
$nextLink =getNextTestimonial($post->ID);
?>

<!-- Article info start -->
<section class="article-info">
   <?php 
   if (!empty($nextLink)) {
	   ?>
		<div class="next-testimonial">
   		   <a href="<?= $nextLink ?>" class="next-testimonial-button">Next Testimonial</a>
		</div>
	   <?php
   }
   ?> 
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-xl-8">
				<div class="title"><?= $PrimaryCategory; ?></div>
				<h1><?php the_content(); ?></h1>

				<div class="name-date d-flex justify-content-center">
					<div class="name" style="text-transform: uppercase;"><?= get_post_meta(get_the_ID(), 'testimonial_client_and_location', true) ?></div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- Article info end -->

<!-- Article content start -->
<section class="article-content">
	<div class="container article-block">
		<div class="row justify-content-center">
			<div class="col-12 col-xl-10">
				<?php $galleryIDs = get_post_meta(get_the_ID(), 'testimonial_image_gallery');
				$images = [get_the_post_thumbnail_url(get_the_ID(),'full')];
				//var_dump($gallery);
				foreach($galleryIDs[0] as $mediaID) {
					$images[] = wp_get_attachment_url((int) $mediaID);
				}
				?>
                <?php //$imageUrl = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
				<ul class="gallery-slider">
					<?php foreach($images as $image): ?>
					<li><img src="<?php echo $image; ?>" /></li>
					<?php endforeach; ?>
				</ul>
				
				<?php //the_content(); ?>
				<div class="d-flex flex-wrap link-list">
					<?php foreach($category as $cat): ?>
						<a href="<?= get_category_link( $cat->term_id ); ?>" class="link-btn"><?= $cat->cat_name; ?></a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>

</section>
<!-- Article content end -->


<style>
.article-info .next-testimonial {
  position: absolute;
  top: 20px;
  right: 20px;
}
.article-info .next-testimonial-button {
  color: #116AC0;	
  outline: 1px solid #116AC0;
  padding: 10px;
  text-decoration: none;  
}

.article-info .next-testimonial-button:hover {
  text-decoration: underline;
}

.slick-slide {
	height: auto !important;
}
</style>


