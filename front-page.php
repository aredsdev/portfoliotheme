<?php get_header(); ?>

<main>
    <div class="parallax parallax-top">
        <div class="hero">
            <div class="hero-content-sidebar">
                <?php if (is_active_sidebar('hero-area')) : ?>
                    <div class="hero-widget-area">
                        <?php dynamic_sidebar('hero-area'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="parallax-layer parallax-layer-back" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/blue_mountains.webp');">
            <!-- Background layer with mountains -->
        </div>
        <div class="parallax-layer parallax-layer-mid">
            <!-- Mid layer content if any -->
        </div>
    </div>

    <div class="below-hero-sidebar">
        <?php if (is_active_sidebar('below-hero-area')) : ?>
            <?php dynamic_sidebar('below-hero-area'); ?>
        <?php endif; ?>
    </div>



    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
</div>

<!-- New Parallax Section -->
<div class="bottom-dark-area">  
    <?php if (is_active_sidebar('bottom-dark-area')) : ?>
        <?php dynamic_sidebar('bottom-dark-area'); ?>
    <?php else: ?>
        <p>Placeholder content for bottom dark area.</p>
    <?php endif; ?>
</div> 
<div class="parallax parallax-bottom">
    <div class="bottom-parallax-mid">
        <?php if (is_active_sidebar('bottom-parallax-mid-area')) : ?>
            <div class="bottom-parallax-mid-widget-area">
                <?php dynamic_sidebar('bottom-parallax-mid-area'); ?>
            </div>
        <?php else: ?>
            <p>Placeholder content for bottom parallax mid area.</p>
        <?php endif; ?>
    </div>
    <div class="parallax-layer parallax-layer-back" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/blue_mountains.webp');">
        <!-- Background layer with mountains -->
    </div>
    <div class="parallax-layer parallax-layer-mid">
        <!-- Mid layer content if any -->
    </div>
</div>
</main>

<?php get_footer(); ?>
