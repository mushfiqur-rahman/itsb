<!-- ============================================================
     footer.php
     Replaces the plain-text footer used across all templates.
     Add Font Awesome enqueue (below) to functions.php first.
     ============================================================ -->

<footer class="bg-paper w-full border-t border-hive">
  <div class="max-w-6xl mx-auto px-6 py-12 flex flex-col md:flex-row justify-between gap-8">

    <div>
      <div class="flex items-center gap-2.5">
        <span class="hex w-5 h-5 bg-ink inline-block"></span>
        <span class="font-display font-bold text-[14px]"><?php bloginfo( 'name' ); ?></span>
      </div>
      <!-- Personal branding line — swap the copy here to whatever you want as your one-line identity -->
      <p class="text-[13px] text-slate mt-2 max-w-xs">Remote Microsoft 365 &amp; Google Workspace support, migration, and IT help for growing businesses.</p>
    </div>

    <nav class="flex gap-6 text-[13px] text-slate" aria-label="Footer navigation">
      <?php
      wp_nav_menu( array(
          'theme_location' => 'footer',
          'container'      => false,
          'items_wrap'     => '%3$s',
          'link_before'    => '',
          'link_after'     => '',
          'fallback_cb'    => false,
      ) );
      ?>
    </nav>

    <div class="flex flex-col items-start md:items-end gap-3">
      <p class="text-xl font-bold text-slate">Social Link</p>
      <!-- Social icons -->
      <div class="flex items-center gap-3">
        <a href="https://www.linkedin.com/company/itsupportbee" target="_blank" rel="noopener noreferrer" aria-label="IT Support Bee on LinkedIn" class="w-8 h-8 rounded-full border border-hive flex items-center justify-center hover:border-honey hover:text-honeydark text-slate transition-colors">
          <i class="fa-brands fa-linkedin-in text-[13px]" aria-hidden="true"></i>
        </a>
        <a href="https://www.facebook.com/itsupportbee" target="_blank" rel="noopener noreferrer" aria-label="IT Support Bee on Facebook" class="w-8 h-8 rounded-full border border-hive flex items-center justify-center hover:border-honey hover:text-honeydark text-slate transition-colors">
          <i class="fa-brands fa-facebook-f text-[13px]" aria-hidden="true"></i>
        </a>
        <a href="https://x.com/itsupportbee" target="_blank" rel="noopener noreferrer" aria-label="IT Support Bee on X" class="w-8 h-8 rounded-full border border-hive flex items-center justify-center hover:border-honey hover:text-honeydark text-slate transition-colors">
          <i class="fa-brands fa-x-twitter text-[12px]" aria-hidden="true"></i>
        </a>
        <a href="https://www.youtube.com/@itsupportbee" target="_blank" rel="noopener noreferrer" aria-label="IT Support Bee on YouTube" class="w-8 h-8 rounded-full border border-hive flex items-center justify-center hover:border-honey hover:text-honeydark text-slate transition-colors">
          <i class="fa-brands fa-youtube text-[13px]" aria-hidden="true"></i>
        </a>
        <a href="https://www.instagram.com/itsupportbee" target="_blank" rel="noopener noreferrer" aria-label="IT Support Bee on Instagram" class="w-8 h-8 rounded-full border border-hive flex items-center justify-center hover:border-honey hover:text-honeydark text-slate transition-colors">
          <i class="fa-brands fa-instagram text-[13px]" aria-hidden="true"></i>
        </a>
        <a href="https://www.tiktok.com/@itsupportbee" target="_blank" rel="noopener noreferrer" aria-label="IT Support Bee on TikTok" class="w-8 h-8 rounded-full border border-hive flex items-center justify-center hover:border-honey hover:text-honeydark text-slate transition-colors">
          <i class="fa-brands fa-tiktok text-[12px]" aria-hidden="true"></i>
        </a>
      </div>
      
    </div>

  </div>

  <div class="border-t border-hive">
    <div class="max-w-6xl mx-auto px-6 py-4 text-[12px] text-slate">
      &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>