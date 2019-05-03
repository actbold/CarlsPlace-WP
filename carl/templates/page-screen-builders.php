<?php get_header(); //Template Name: Screen Builders ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<main role="main">
    <div class="screen-builder-banner" style="background-image:url(<?= get_asset('img/screen-builder/screen-builder-bg.jpg'); ?>);">
        <div class="container">
            <div class="headline">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="builder-description">
                <?php the_content(); ?>
            </div>
            <div class="builder-links">

                <nav>
                    <ul>
                        <li>
                            <a href="/shop/home-theater-builder" title="Home Theater Projector Screen Builder"><div class="icon"><?php inline_svg('home-theater'); ?></div><span>Home Theater</span></a>
                        </li>
                        <li>
                            <a href="/shop/backyard-theater-builder" title="Outdoor & Backyard Projector Screen Builder"><div class="icon"><?php inline_svg('backyard-screens'); ?></div><span>Backyard</span></a>
                        </li>
                        <li>
                            <a href="/shop/large-venue-builder" title="Large Venue Projector Screen Builder"><div class="icon"><?php inline_svg('large-venue'); ?></div><span>Large Venue</span></a>
                        </li>
                        <li>
                            <a href="/shop/golf-simulator-builder" title="Golf Simulator Screen Builder"><div class="icon"><?php inline_svg('golf-simulator'); ?></div><span>Golf Simulator</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</main>
<!--url rewrite-->
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
