<?php
/**
 * sidebar.php
 * ------------------------------------------------------------
 * Include on the blog listing and single post templates with:
 *   get_sidebar();
 * inside an <aside> alongside the main content column.
 *
 * If widgets are added via Appearance → Widgets → Blog Sidebar,
 * those render instead of these defaults automatically.
 */
?>

<aside class="hidden lg:block w-full" aria-label="Sidebar">

  <?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>

    <?php dynamic_sidebar( 'blog-sidebar' ); ?>

  <?php else : ?>

    <!-- ============ SEARCH ============ -->
    <div class="reveal rounded-lg border border-hive p-5 mb-6">
      <p class="font-mono text-[11px] tracking-[0.06em] text-honeydark uppercase mb-4">Search</p>
      <?php get_search_form(); ?>
    </div>

    <!-- ============ CATEGORIES ============ -->
    <?php
    $categories = get_categories( array( 'hide_empty' => true, 'orderby' => 'count', 'order' => 'DESC' ) );
    if ( ! empty( $categories ) ) :
    ?>
    <div class="reveal rounded-lg border border-hive p-5 mb-6">
      <p class="font-mono text-[11px] tracking-[0.06em] text-honeydark uppercase mb-4">Categories</p>
      <ul class="space-y-2.5">
        <?php foreach ( $categories as $cat ) : ?>
          <li>
            <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="flex items-center justify-between text-[13.5px] text-slate hover:text-ink transition-colors <?php echo is_category( $cat->term_id ) ? 'text-ink font-medium' : ''; ?>">
              <span><?php echo esc_html( $cat->name ); ?></span>
              <span class="font-mono text-[11px] text-slate"><?php echo esc_html( $cat->count ); ?></span>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php endif; ?>

    <!-- ============ RECENT POSTS ============ -->
    <?php
    $recent = new WP_Query( array(
        'posts_per_page'      => 4,
        'post__not_in'        => array( get_the_ID() ),
        'ignore_sticky_posts'  => 1,
    ) );
    if ( $recent->have_posts() ) :
    ?>
    <div class="reveal rounded-lg border border-hive p-5">
      <p class="font-mono text-[11px] tracking-[0.06em] text-honeydark uppercase mb-4">Recent articles</p>
      <ul class="space-y-4">
        <?php while ( $recent->have_posts() ) : $recent->the_post(); ?>
          <li class="flex gap-3">
            <a href="<?php the_permalink(); ?>" class="shrink-0 w-14 h-14 rounded-md overflow-hidden bg-hive block">
              <?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'thumbnail', array( 'class' => 'w-full h-full object-cover' ) ); endif; ?>
            </a>
            <div>
              <a href="<?php the_permalink(); ?>" class="text-[13px] font-medium text-ink leading-snug hover:text-honeydark transition-colors line-clamp-2"><?php the_title(); ?></a>
              <time class="block text-[11px] font-mono text-slate mt-1" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
            </div>
          </li>
        <?php endwhile; wp_reset_postdata(); ?>
      </ul>
    </div>
    <?php endif; ?>

  <?php endif; ?>

</aside>