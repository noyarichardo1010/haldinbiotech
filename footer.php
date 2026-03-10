<footer class="site-footer">
  <div class="container">

    <div class="footer-wrapper">

      <!-- Social Icons -->
      <div class="footer-social">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
      </div>

      <!-- Footer Menus -->
      <div class="footer-menus">

        <div class="footer-col">
          <h4>About</h4>
          <ul>
            <li><a href="<?php echo home_url('/about/#who_we_are'); ?>">Who We Are</a></li>
            <li><a href="<?php echo home_url('/about/#what_we_do'); ?>">What We Do</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Solutions</h4>
          <ul>
            <li><a href="<?php echo home_url('/solutions/#story'); ?>">SUCCESS STORY</a></li>
            <li><a href="<?php echo home_url('/solutions/#why_our_products'); ?>">WHY OUR PRODUCTS</a></li>
            <li><a href="<?php echo home_url('/solutions/#our_products'); ?>">OUR PRODUCTS</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Sustainability</h4>
          <ul>
            <li><a href="<?php echo home_url('/sustainability/#purpose'); ?>">OUR PURPOSE</a></li>
            <li><a href="<?php echo home_url('/sustainability/#impact'); ?>">OUR IMPACT</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Contact</h4>
          <ul>
            <li><a href="<?php echo home_url('/contact'); ?>">Ask Us</a></li>
          </ul>
        </div>

      </div>

      <!-- Logo -->
      <div class="footer-logo">
        <img class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" data-src="<?php echo get_template_directory_uri(); ?>/images/logo-header.png" alt="Haldin Biotech">
      </div>

    </div>

    <div class="second_footer">
    © 2026 All Rights Reserved · haldinbiotech
    </div>
    
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>