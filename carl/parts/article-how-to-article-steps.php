<section class="steps">
	<div class="container">
		<div class="row">
			<div class="col-12 intro">
				<h2><?php the_field("sbs_headline"); ?></h2>
				<p><?php the_field("sbs_description"); ?></p>
				<div class="button-container d-flex justify-content-center">
					<a class="link" href="<?php the_field("sbs_link"); ?>" role="button"><i class="fa fa-info-circle" aria-hidden="true"></i><span><?php the_field("sbs_link_title"); ?></span></a>
				</div>
			</div>
			<div class="steps-block col-12 p-0">
				<div class="row">
					<?php if( have_rows('sbs_steps') ): ?>
						<?php while( have_rows('sbs_steps') ): the_row(); 
							$image = get_sub_field('step_image');
							$title = get_sub_field('step_title');
							$description = get_sub_field('step_description');
						?>
						<div class="col-12 col-md-6 col-lg-4 step-item">
							<img src="<?= $image['url']; ?>">
							<div class="title"><?= $title; ?></div>
							<div class="text"><?= $description; ?></div>
						</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
