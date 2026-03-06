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

        <div class="col-12 col-md-6 mb-3 origin-item" data-aos="fade-up">

            <div class="wrap_card_biotech">

                <?php if (has_post_thumbnail()): ?>
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                        data-src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" 
                        alt="<?php echo esc_attr(get_the_title()); ?>" 
                        class="lazyload col-12 col-md-7 img-fluid p-0"
                    >
                <?php endif; ?>

                <div class="col-12 col-md-5 wrap_content <?php echo esc_attr($bg_class); ?>">

                    <h3 class="font-weight-bold">
                        <?php the_title(); ?>
                    </h3>



                    <?php
                        $content = get_the_content();
                            $blocks = parse_blocks($content);

                            $button_link = '';

                            foreach ($blocks as $block) {

                                if ($block['blockName'] === 'core/buttons' && !empty($block['innerBlocks'])) {

                                    foreach ($block['innerBlocks'] as $inner) {

                                        if ($inner['blockName'] === 'core/button') {

                                            if (!empty($inner['attrs']['url'])) {
                                                $button_link = $inner['attrs']['url'];
                                            } elseif (!empty($inner['innerHTML'])) {

                                                preg_match('/href="([^"]+)"/', $inner['innerHTML'], $matches);

                                                if (!empty($matches[1])) {
                                                    $button_link = $matches[1];
                                                }

                                            }

                                            break 2;

                                        }

                                    }

                                }

                            }

                    ?>

                    <?php
                        $content = get_the_content();
                        $blocks = parse_blocks($content);
                        
                        $text_content = '';
                        
                        foreach ($blocks as $block) {
                        
                            if ($block['blockName'] === 'core/buttons' || $block['blockName'] === 'core/button') {
                                continue;
                            }
                        
                            if (!empty($block['innerHTML'])) {
                                $text_content .= ' ' . wp_strip_all_tags($block['innerHTML']);
                            }
                        
                        }
                        
                        $excerpt = wp_trim_words($text_content, 30, '...');
                    ?>

                    <p><?php echo esc_html($excerpt); ?></p>

                    <a 
                        href="<?php echo esc_url($button_link); ?>"
                        class="btn btn-rounded btn-origin btn-sm">
                        Read More
                    </a>

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