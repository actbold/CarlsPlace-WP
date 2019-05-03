<?php get_header(); //Template Name: Frequently Asked Questions ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<section class="section section--hero">
    <div class="container">
        <div class="block block--title">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="block block--content">
            <div class="category-buttons">
                <?php
                    /* FAQ Tags */
                    $tags = get_terms(array(
                        'taxonomy' => 'faq_tag',
                        'hide_empty' => true
                    ));
                ?>
                <?php $i = 0; foreach($tags as $tag): $i++; ?>
                    <button class="btn faq--tag" data-tag='<?= $tag->slug; ?>'><?= $tag->name; ?></button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<section class="section section--faqs">
    <div class="container">
        <?php 		
            /* FAQs */
            $args = array(
                'post_type' => 'faq',
                'posts_per_page' => -1
            );
            $faqs = new WP_Query($args);
        ?>
        <div id="frequently-asked-questions" class="faqs">
            <?php $i = 0; while ( $faqs->have_posts() ) : $faqs->the_post(); $i++; ?>
            <div class="faq">
                <div class="faq-question">
                    <p><?php the_title(); ?></p>
                    <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M16 2 L16 30 M2 16 L30 16" /></svg></div>
                </div>
                <div class="faq-answer"><?php the_content(); ?></div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
    <?php endwhile; endif; ?>
<?php get_footer(); ?>
