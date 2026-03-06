<?php
$parent = get_page_by_path('homepage');

if ($parent) {

    $args = [
        'post_type'      => 'page',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'post_parent'    => $parent->ID,
        'name'           => 'innovating-life-sciences-for-a-healthier-tomorrow'
    ];

    $child_query = new WP_Query($args);

    if ($child_query->have_posts()) :
        $child_query->the_post();

        $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>

        <section id="haldin-biotech"
                 style="background-image: url('<?php echo esc_url($image); ?>');"
                 class="biotech_banner full-height cover d-flex landing-page">

            <div class="container d-flex align-items-lg-center align-items-start">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 py-lg-0 py-5 position-relative d-flex align-items-center haldin-x-content">
                    <div class="home-caption-container" data-aos="fade-down">

                        <h1><?php the_title(); ?></h1>

                        <div class="home-caption-content">
                            <?php the_content(); ?>
                        </div>
                        
                        <div class="wrap_btn_landing">
                            <a href="<?php echo home_url('/solutions'); ?>" class="btn_link">
                                Check Out Our Products
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

        <?php
        wp_reset_postdata();
    endif;
}
?>