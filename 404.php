<?php
/**
 * 404.php
 * WordPress automatically serves this for any unmatched URL.
 */
get_header();
?>

<main class="w-full">

  <section class="max-w-3xl mx-auto px-6 pt-20 pb-16 text-center">
    <div class="reveal flex justify-center mb-8">
      <span class="hex w-20 h-20 bg-cell flex items-center justify-center">
        <span class="font-mono text-[13px] text-honey">404</span>
      </span>
    </div>

    <h1 class="reveal font-display font-extrabold text-[30px] md:text-[40px] tracking-tight text-ink">This page took a wrong turn</h1>
    <p class="reveal mt-4 text-[15.5px] text-slate leading-relaxed max-w-md mx-auto">The page you're looking for doesn't exist, may have moved, or the link might have a typo. Try searching, or head back to a page that does.</p>

    <div class="reveal mt-8 max-w-md mx-auto">
      <?php get_search_form(); ?>
    </div>

    <div class="reveal mt-8 flex flex-wrap items-center justify-center gap-3">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="px-4 py-2 rounded-full text-[13px] font-medium bg-ink text-paper hover:bg-honeydark transition-colors">Home</a>
      <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="px-4 py-2 rounded-full text-[13px] font-medium border border-hive text-slate hover:border-honey hover:text-ink transition-colors">Services</a>
      <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="px-4 py-2 rounded-full text-[13px] font-medium border border-hive text-slate hover:border-honey hover:text-ink transition-colors">Blog</a>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="px-4 py-2 rounded-full text-[13px] font-medium border border-hive text-slate hover:border-honey hover:text-ink transition-colors">Contact</a>
    </div>
  </section>

  <!-- ============ RECENT POSTS — gives a lost visitor somewhere useful to land ============ -->
  <?php
  $recent = new WP_Query( array( 'posts_per_page' => 3, 'ignore_sticky_posts' => 1 ) );
  if ( $recent->have_posts() ) :
  ?>
  <section class="bg-white border-y border-hive">
    <div class="max-w-6xl mx-auto px-6 py-16 md:py-20">
      <h2 class="reveal font-display font-bold text-[18px] mb-8 text-center">Or start with a recent article</h2>
      <div class="grid md:grid-cols-3 gap-6">
        <?php while ( $recent->have_posts() ) : $recent->the_post();
          $category = get_the_category();
          $primary_category = ! empty( $category ) ? $category[0] : null;
        ?>
        <article class="reveal post-card rounded-lg border border-hive overflow-hidden hover:border-honey hover:-translate-y-1 motion-safe:transition-all duration-300">
          <a href="<?php the_permalink(); ?>" aria-hidden="true">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full aspect-[3/2] object-cover', 'loading' => 'lazy' ) ); ?>
            <?php else : ?>
              <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/post-fallback.jpg' ); ?>" alt="" class="w-full aspect-3/2 object-cover" loading="lazy" width="600" height="400">
            <?php endif; ?>
          </a>
          <div class="p-5">
            <?php if ( $primary_category ) : ?>
              <span class="font-mono text-[11px] tracking-[0.06em] text-honeydark uppercase"><?php echo esc_html( $primary_category->name ); ?></span>
            <?php endif; ?>
            <h3 class="font-display font-bold text-[15px] mt-2.5 leading-snug">
              <a href="<?php the_permalink(); ?>" class="hover:text-honeydark transition-colors"><?php the_title(); ?></a>
            </h3>
          </div>
        </article>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

</main>

<?php get_footer(); ?>