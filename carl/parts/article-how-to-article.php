<?php 
	$Banner = get_field("banner_image"); 
	$EnableCalc = get_field("enable_ssc_btn");
	$ButtonText = get_field("ht_dl_btn_txt");
	$File = get_field("ht_file");
	$FeaturedArticle1 = get_field("ht_fa_1");
	$FeaturedArticle2 = get_field("ht_fa_2");
?>
<?php if ($Banner) { ?>
<section class="banner-howto banners" style="background-image:url(<?= $Banner['url']; ?>);">
<?php } else { ?>
	<section class="banner-howto banners">
<?php } ?>
 	<div class="container">
		<div class="row flex-column justify-content-center">
			<div class="col">
				<nav class="breadcrumb">
					<a class="breadcrumb-item" href="#">Home</a>
					<span class="breadcrumb-item active">Home Theater</span>
				</nav>
			</div>
			<h1><?php echo wordwrap(get_the_title(), 20, '<br />'); ?></h1>
		</div>
	</div>
</section>
<section class="howto-build">
	<div class="container">
		<div class="row">
			<div class="col-12 col-xl-6">
				<h2><?php the_field("ht_headline"); ?></h2>
				<p><?php the_field("ht_description"); ?></p>
				<div class="row">
					<div class="col-12 col-lg-6">
						<?php if($EnableCalc): ?>
						<a class="btn btn-primary" href="#" role="button"><span>SCREEN SIZE CALCULATOR</span><img src="/wp-content/themes/carl/assets/img/home/screen-calc.png" alt="icon"></a>
						<?php endif; ?>
						<?php if($File): ?>
						<a class="btn btn-secondary btn-lg" href="<?= $File['url']; ?>" role="button" download><?= $ButtonText; ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-12 col-xl-6 videos">
				<div class="row">
					<div class="col-12 col-sm-6 d-flex justify-content-center px-2 item">
						<div class="card">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
							</div>
							<div class="info-line d-flex justify-content-start align-items-center">
								<div class="autor d-flex mr-auto">
									<div class="name">by <?= get_the_author($FeaturedArticle1); ?></div>
									<div class="date"><?= get_the_date('m/d/Y', $FeaturedArticle1); ?></div>
								</div>
								<i class="fa fa-info-circle" aria-hidden="true"></i>
							</div>
							<div class="card-block">
								<a href="<?php the_permalink($FeaturedArticle1); ?>">
								<h4 class="card-title"><?= get_the_title($FeaturedArticle1); ?></h4>
								</a>
								<p class="card-text"><?= get_the_excerpt($FeaturedArticle1); ?></p>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 d-flex justify-content-center px-2 item">
						<div class="card">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
							</div>
							<div class="info-line d-flex justify-content-start align-items-center">
								<div class="autor d-flex mr-auto">
									<div class="name">by <?= get_the_author($FeaturedArticle2); ?></div>
									<div class="date"><?= get_the_date('m/d/Y', $FeaturedArticle2); ?></div>
								</div>
								<i class="fa fa-info-circle" aria-hidden="true"></i>
							</div>
							<div class="card-block">
								<a href="<?php the_permalink($FeaturedArticle2); ?>">
								<h4 class="card-title"><?= get_the_title($FeaturedArticle2); ?></h4>
								</a>
								<p class="card-text"><?= get_the_excerpt($FeaturedArticle2); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_part("article", "how-to-article-steps"); ?>
