<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
 
  <title><?php wp_title(' - ', 'echo', 'right'); ?></title>

  <?php wp_head(); ?>
  <?php get_template_part( 'partials/favicons' ); ?>

</head>

<body id="body" <?php body_class(); ?> >
  <?php wp_body_open(); ?>

  <div class="skip-to-main" id="skip-to-main"><a href="#main"><span class="skip-text">Skip to main content</span></a></div>

  <div class="page-wrapper">

    <?php get_template_part( 'partials/header-nav' ); ?>

    <main id="main" class="main">