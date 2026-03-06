<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>
    <?php bloginfo('name'); ?><?php wp_title('|'); ?>
  </title>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="wrap-bio-header">



<nav class="header_biotech navbar navbar-expand-lg main-header">
  <div class="container d-flex align-items-center justify-content-between">

    <!-- Logo -->
    <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/images/logo-header.png" 
           alt="Haldin Biotech" 
           class="img-fluid header-logo">
    </a>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
      <ul class="navbar-nav header-menu">

        <li class="nav-item">
          <a class="nav-link" href="<?php echo home_url('/about'); ?>">About</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo home_url('/solutions'); ?>">Solutions</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo home_url('/sustainability'); ?>">Sustainability</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo home_url('/contact'); ?>">Contact</a>
        </li>

      </ul>
    </div>

  </div>
</nav>

</header>
