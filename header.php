<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>IT Support Bee — Microsoft 365 & Google Workspace Support</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700;800&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class('bg-paper text-ink font-body antialiased'); ?>>

<!-- NAV -->
<header class="sticky top-0 z-50 bg-paper/90 backdrop-blur border-b border-hive">
  <div class="max-w-6xl mx-auto px-6 flex items-center justify-between h-16">
    <div class="flex items-center gap-2.5">
  <?php if ( has_custom_logo() ) : ?>
    <div class="w-9 h-9 shrink-0 [&_a]:block [&_img]:w-full [&_img]:h-full [&_img]:object-contain">
      <?php the_custom_logo(); ?>
    </div>
  <?php else : ?>
    <!-- Fallback shown only if no logo is set yet in Customize → Site Identity -->
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <span class="hex w-6 h-6 bg-ink inline-block"></span>
    </a>
  <?php endif; ?>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="font-display font-bold text-[15px] tracking-tight">
    <?php bloginfo( 'name' ); ?>
  </a>
</div>
    <nav class="hidden md:flex items-center gap-8 text-[14px] font-medium text-slate">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-ink transition-colors">Home</a>
      <a href="<?php echo esc_url(home_url('/about/')); ?>" class="hover:text-ink transition-colors">About</a>
      <a href="<?php echo esc_url(home_url('/services/')); ?>" class="hover:text-ink transition-colors">Services</a>
      <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="hover:text-ink transition-colors">Blog</a>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="hover:text-ink transition-colors">Contact</a>
    </nav>
    <a href="https://calendly.com/itsupportbee/remote-it-support" target="_blank" class="hidden md:inline-flex items-center rounded-md bg-ink text-paper text-[13px] font-medium px-4 py-2.5 hover:bg-honeydark transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-honey">Let's talk</a>
    <button id="menuBtn" aria-label="Open menu" aria-expanded="false" class="md:hidden w-9 h-9 flex items-center justify-center">
      <svg id="menuIcon" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M2 5h16M2 10h16M2 15h16" stroke="#171A1F" stroke-width="1.6" stroke-linecap="round"/></svg>
    </button>
  </div>
  <div id="mobileMenu" class="hidden md:hidden border-t border-hive bg-paper px-6 py-4 space-y-3 text-[14px] font-medium text-slate">
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="block hover:text-ink">Home</a>
    <a href="<?php echo esc_url( home_url('/about/') ); ?>" class="block hover:text-ink">About</a>
    <a href="<?php echo esc_url(home_url('/services/')); ?>" class="block hover:text-ink">Services</a>
    <a href="<?php echo esc_url( home_url('/blog/') ); ?>" class="block hover:text-ink">Blog</a>
    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="block hover:text-ink">Contact</a>
    <a href="https://calendly.com/itsupportbee/remote-it-support" target="_blank" class="block rounded-md bg-ink text-paper text-center px-4 py-2.5 mt-2">Let's talk</a>
  </div>
</header>




<?php wp_body_open(); ?>