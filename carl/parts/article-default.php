<?php 
	$category = get_the_category();
	$PrimaryCategory = $category[0]->cat_name;
?>
<!-- Banner article start -->
<section class="banners banner-article">
	<div class="container">
		<div class="row">
			<div class="col">
				<nav class="breadcrumb">
					<a class="breadcrumb-item" href="#">Home</a>
					<span class="breadcrumb-item active">Home Theater</span>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- Banner article end -->

<!-- Article info start -->
<section class="article-info">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-xl-8">
				<div class="title"><?= $PrimaryCategory; ?></div>
				<h1><?php the_title(); ?></h1>
				<div class="name-date d-flex justify-content-center">
					<div class="name"><?php the_author(); ?></div>
					<div class="date"><?php the_date('M d, Y'); ?></div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Article info end -->

<!-- Article content start -->
<section class="article-content">
	<div class="social-line">
		<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		<a href="#"><img src="/wp-content/themes/carl/assets/img/article/pinterest.png" alt="icon"></a>
		<a href="#"><img src="/wp-content/themes/carl/assets/img/article/envelope.png" alt="icon"></a>
	</div>
	<div class="container article-block">
		<div class="row justify-content-center">
			<div class="col-12 col-xl-10">
				<?php the_content(); ?>
				<div class="d-flex flex-wrap link-list">
					<?php foreach($category as $cat): ?>
						<a href="<?= get_category_link( $cat->term_id ); ?>" class="link-btn"><?= $cat->cat_name; ?></a>
					<?php endforeach; ?>
				</div>
				<div class="social-line end-article">
					<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a href="#"><img src="/wp-content/themes/carl/assets/img/article/pinterest.png" alt="icon"></a>
					<a href="#"><img src="/wp-content/themes/carl/assets/img/article/envelope.png" alt="icon"></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Article content end -->
<!-- Related article start -->
<section class="related-articles">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Related Articles</h2>
			</div>
		</div>
		<div class="carousel product-tales">
			<div class="col-3 px-2">
				<div class="card">
					<div class="img-container">
						<a href="#"><img class="card-img-top" src="/wp-content/themes/carl/assets/img/home/product-7.png" alt="Card image cap"></a>
					</div>
					<div class="card-block">
						<h4 class="card-title">Lorem ipsum dolor sit am consectetur</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
						<a href="#" class="link">Read more</a>
					</div>
				</div>
			</div>
			<div class="col-3 px-2">
				<div class="card">
					<div class="img-container">
						<a href="#"><img class="card-img-top" src="/wp-content/themes/carl/assets/img/home/product-8.png" alt="Card image cap"></a>
					</div>
					<div class="card-block">
						<h4 class="card-title">Lorem ipsum dolor sit am consectetur</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
						<a href="#" class="link">Read more</a>
					</div>
				</div>
			</div>
			<div class="col-3 px-2">
				<div class="card">
					<div class="img-container">
						<a href="#"><img class="card-img-top" src="/wp-content/themes/carl/assets/img/home/product-9.png" alt="Card image cap"></a>
					</div>
					<div class="card-block">
						<h4 class="card-title">Lorem ipsum dolor sit am consectetur</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
						<a href="#" class="link">Read more</a>
					</div>
				</div>
			</div>
			<div class="col-3 px-2">
				<div class="card">
					<div class="img-container">
						<a href="#"><img class="card-img-top" src="/wp-content/themes/carl/assets/img/home/product-7.png" alt="Card image cap"></a>
					</div>
					<div class="card-block">
						<h4 class="card-title">Lorem ipsum dolor sit am consectetur</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
						<a href="#" class="link">Read more</a>
					</div>
				</div>
			</div>
			<div class="col-3 px-2">
				<div class="card">
					<div class="img-container">
						<a href="#"><img class="card-img-top" src="/wp-content/themes/carl/assets/img/home/product-10.png" alt="Card image cap"></a>
					</div>
					<div class="card-block">
						<h4 class="card-title">Lorem ipsum dolor sit am consectetur</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
						<a href="#" class="link">Read more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Related article end -->
