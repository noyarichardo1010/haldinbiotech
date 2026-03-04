<?php
$parent = get_page_by_path('homepage/innovations-biotech');

if ($parent):

    $image = get_the_post_thumbnail_url($parent->ID, 'full');

    $args = [
        'post_type'      => 'page',
        'post_status'    => 'publish',
        'post_parent'    => $parent->ID,
        'orderby'        => 'menu_order',
        'order'          => 'ASC'
    ];

    $child_query = new WP_Query($args);
?>

<section id="innovations-biotech"
         style="background-image: url('<?php echo esc_url($image); ?>')"
         class="about_biotech full-heightx cover">

    <div class="wrap_this_about">

        <?php if ($child_query->have_posts()): 
            $no = 1;
            while ($child_query->have_posts()):
                $child_query->the_post();

                $bg_class = ($no == 1) ? 'green_bg_' : 'blue_bg_';
        ?>

        <div class="col-12 col-md-6 mb-3 origin-item">

            <div class="wrap_card_biotech row">

                <?php if (has_post_thumbnail()): ?>
                    <img 
                        src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" 
                        alt="<?php echo esc_attr(get_the_title()); ?>" 
                        class="col-12 col-md-7 img-fluid p-0"
                    >
                <?php endif; ?>

                <div class="col-12 col-md-5 wrap_content <?php echo esc_attr($bg_class); ?>">

                    <h3 class="font-weight-bold">
                        <?php the_title(); ?>
                    </h3>

                    <?php
                    $excerpt = wp_trim_words(
                        wp_strip_all_tags(get_the_content()),
                        30,
                        '...'
                    );
                    ?>

                    <p><?php echo esc_html($excerpt); ?></p>

                    <button 
                        class="btn btn-rounded btn-origin btn-sm"
                        data-toggle="modal"
                        data-target="#modal-<?php echo get_the_ID(); ?>">
                        Read More
                    </button>

                </div>

            </div>
        </div>


        <!-- Modal -->
        <div class="modal modal_biotech fade"
             id="modal-<?php echo get_the_ID(); ?>"
             tabindex="-1"
             role="dialog">

            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title"><?php the_title(); ?></h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <?php the_content(); ?>
                    </div>

                </div>
            </div>
        </div>

        <?php
                $no++;
            endwhile;
            wp_reset_postdata();
        endif;
        ?>

    </div>

</section>

<?php endif; ?>