<footer class="site-footer">
  <div class="footer-container">

    <!-- LEFT SIDE -->
    <div class="footer-left">

      <!-- Social Icons -->
      <div class="footer-social">
        <?php if ($instagram) : ?>
          <a target="_blank" href="<?php echo esc_url($instagram); ?>">
            <i class="fab fa-instagram"></i>
          </a>
        <?php endif; ?>

        <?php if ($facebook) : ?>
          <a target="_blank" href="<?php echo esc_url($facebook); ?>">
            <i class="fab fa-facebook"></i>
          </a>
        <?php endif; ?>

        <?php if ($linkedin) : ?>
          <a target="_blank" href="<?php echo esc_url($linkedin); ?>">
            <i class="fab fa-linkedin"></i>
          </a>
        <?php endif; ?>

        <?php if ($youtube) : ?>
          <a target="_blank" href="<?php echo esc_url($youtube); ?>">
            <i class="fab fa-youtube"></i>
          </a>
        <?php endif; ?>

        <?php if ($tiktok) : ?>
          <a target="_blank" href="<?php echo esc_url($tiktok); ?>">
            <i class="fab fa-tiktok"></i>
          </a>
        <?php endif; ?>
      </div>

      <!-- Menu Columns -->
      <div class="footer-menus">

        <div class="footer-menu">
          <h4>About</h4>
          <?php wp_nav_menu([
            'theme_location' => 'footer_menu_about',
            'container' => false,
            'menu_class' => 'footer-links',
            'depth' => 1,
          ]); ?>
        </div>

        <div class="footer-menu">
          <h4>Solutions</h4>
          <?php wp_nav_menu([
            'theme_location' => 'footer_menu_solutions',
            'container' => false,
            'menu_class' => 'footer-links',
            'depth' => 1,
          ]); ?>
        </div>

        <div class="footer-menu">
          <h4>Sustainability</h4>
          <?php wp_nav_menu([
            'theme_location' => 'footer_menu_sustainability',
            'container' => false,
            'menu_class' => 'footer-links',
            'depth' => 1,
          ]); ?>
        </div>

        <div class="footer-menu">
          <h4>Contact</h4>
          <?php wp_nav_menu([
            'theme_location' => 'footer_menu_contact',
            'container' => false,
            'menu_class' => 'footer-links',
            'depth' => 1,
          ]); ?>
        </div>

      </div>

    </div>

    <!-- RIGHT SIDE (LOGO) -->
    <div class="footer-right">
      <?php if ($logo_footer) : ?>
        <img src="<?php echo esc_url($logo_footer['url']); ?>" 
             alt="<?php echo esc_attr($logo_footer['alt']); ?>" 
             class="footer-logo">
      <?php endif; ?>
    </div>

  </div>

  <div class="footer-bottom">
    <p><?php echo esc_html($footer_copyright); ?></p>
  </div>
</footer>