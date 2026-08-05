<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>IT Support Bee — Microsoft 365 & Google Workspace Support</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700;800&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          paper: '#F5F5F1',
          ink: '#171A1F',
          slate: '#565C6B',
          honey: '#90ee02',
          honeydark: '#2D058A',
          hive: '#DFDDD3',
          cell: '#1B1E24',
        },
        fontFamily: {
          display: ['Archivo', 'sans-serif'],
          body: ['Inter', 'sans-serif'],
          mono: ['"IBM Plex Mono"', 'monospace'],
        },
      },
    },
  };
</script>
<?php wp_head(); ?>
</head>
<body class="bg-paper text-ink font-body antialiased">

<!-- NAV -->
<header class="sticky top-0 z-50 bg-paper/90 backdrop-blur border-b border-hive">
  <div class="max-w-6xl mx-auto px-6 flex items-center justify-between h-16">
    <a href="#" class="flex items-center gap-2.5">
      <span class="hex w-6 h-6 bg-ink inline-block"></span>
      <span class="font-display font-bold text-[15px] tracking-tight">IT Support Bee</span>
    </a>
    <nav class="hidden md:flex items-center gap-8 text-[14px] font-medium text-slate">
      <a href="http://localhost/itsb/" class="hover:text-ink transition-colors">Home</a>
      <a href="http://localhost/itsb/about" class="hover:text-ink transition-colors">About</a>
      <a href="http://localhost/itsb/services" class="hover:text-ink transition-colors">Services</a>
      <a href="http://localhost/itsb/blog" class="hover:text-ink transition-colors">Blog</a>
      <a href="http://localhost/itsb/contact" class="hover:text-ink transition-colors">Contact</a>
    </nav>
    <a href="#contact" class="hidden md:inline-flex items-center rounded-md bg-ink text-paper text-[13px] font-medium px-4 py-2.5 hover:bg-honeydark transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-honey">Let's talk</a>
    <button id="menuBtn" aria-label="Open menu" aria-expanded="false" class="md:hidden w-9 h-9 flex items-center justify-center">
      <svg id="menuIcon" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M2 5h16M2 10h16M2 15h16" stroke="#171A1F" stroke-width="1.6" stroke-linecap="round"/></svg>
    </button>
  </div>
  <div id="mobileMenu" class="hidden md:hidden border-t border-hive bg-paper px-6 py-4 space-y-3 text-[14px] font-medium text-slate">
    <a href="http://localhost/itsb" class="block hover:text-ink">Home</a>
    <a href="http://localhost/itsb/about" class="block hover:text-ink">About</a>
    <a href="http://localhost/itsb/services" class="block hover:text-ink">Services</a>
    <a href="http://localhost/itsb/blog" class="block hover:text-ink">Blog</a>
    <a href="http://localhost/itsb/contact" class="block hover:text-ink">Contact</a>
    <a href="#" class="block rounded-md bg-ink text-paper text-center px-4 py-2.5 mt-2">Let's talk</a>
  </div>
</header>




<body <?php body_class(); ?>>