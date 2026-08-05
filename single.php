<?php
/**
 * Single Post Template — single.php (Tailwind CSS)
 */
get_header();
?>

<?php while ( have_posts() ) : the_post(); 
    $categories = get_the_category();
    $primary_category = ! empty( $categories ) ? $categories[0] : null;
    $post_tags = get_the_tags();
?>

<main class="w-full overflow-x-hidden bg-white text-slate-800 antialiased">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            
            <!-- ================= MAIN CONTENT (Left - 8 Columns) ================= -->
            <article class="lg:col-span-8 min-w-0">
                
                <!-- Title -->
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 leading-tight tracking-tight mb-6">
                    <?php the_title(); ?>
                </h1>

                <!-- Meta Header & Share Icons -->
                <div class="flex flex-wrap items-center justify-between gap-4 pb-6 mb-8 border-b border-slate-200">
                    <div class="flex items-center space-x-3 text-sm font-medium text-slate-600">
                        <?php if ( $primary_category ) : ?>
                            <a href="<?php echo esc_url( get_category_link( $primary_category->term_id ) ); ?>" class="text-indigo-600 hover:text-indigo-800 transition">
                                <?php echo esc_html( $primary_category->name ); ?>
                            </a>
                            <span class="inline-block w-1 h-1 rounded-full bg-slate-300"></span>
                        <?php endif; ?>
                        <time datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
                            <?php echo esc_html( get_the_date('d M, Y') ); ?>
                        </time>
                    </div>

                    <!-- Social Icons -->
                    <div class="flex items-center space-x-2 text-slate-500">
                        <button class="p-2 rounded-full hover:bg-slate-100 hover:text-slate-900 transition" aria-label="Share">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16"><path d="M12.6875 10.375C11.7612 10.375 10.945 10.8307 10.4323 11.5236L5.99969 9.25387C6.07328 9.00303 6.125 8.74306 6.125 8.46875C6.125 8.09669 6.04872 7.74297 5.91694 7.41762L10.5558 4.62612C11.0721 5.232 11.8309 5.625 12.6875 5.625C14.2384 5.625 15.5 4.36341 15.5 2.8125C15.5 1.26159 14.2384 0 12.6875 0C11.1366 0 9.875 1.26159 9.875 2.8125C9.875 3.16991 9.94859 3.50894 10.0707 3.82369L5.41797 6.62337C4.90216 6.0355 4.15428 5.65625 3.3125 5.65625C1.76159 5.65625 0.5 6.91784 0.5 8.46875C0.5 10.0197 1.76159 11.2812 3.3125 11.2812C4.25406 11.2812 5.08409 10.8122 5.59484 10.0998L10.0128 12.3622C9.93147 12.6248 9.875 12.8984 9.875 13.1875C9.875 14.7384 11.1366 16 12.6875 16C14.2384 16 15.5 14.7384 15.5 13.1875C15.5 11.6366 14.2384 10.375 12.6875 10.375Z"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Featured Image -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="mb-10 rounded-2xl overflow-hidden shadow-sm">
                        <?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-auto object-cover max-h-[500px]' ) ); ?>
                    </div>
                <?php endif; ?>

                <!-- Dynamic Content Area -->
                <div class="prose prose-lg max-w-none prose-slate prose-headings:font-bold prose-headings:text-slate-900 prose-a:text-indigo-600 prose-img:rounded-xl mb-12">
                    <?php the_content(); ?>
                </div>

                <!-- Tags & Social Footer -->
                <div class="flex flex-wrap items-center justify-between gap-4 py-6 my-8 border-y border-slate-200">
                    <?php if ( $post_tags ) : ?>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ( $post_tags as $tag ) : ?>
                                <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="px-3 py-1 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-full transition">
                                    #<?php echo esc_html( $tag->name ); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- WordPress Comments Section -->
                <div class="pt-8">
                    <?php
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>
                </div>

            </article>

            <!-- ================= SIDEBAR (Right - 4 Columns) ================= -->
            <aside class="lg:col-span-4 space-y-8 w-full">
                
                <!-- Search Box Widget -->
                <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                    <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="relative">
                        <input type="text" name="s" placeholder="Search..." value="<?php echo get_search_query(); ?>" class="w-full pr-12 pl-4 py-3 text-sm bg-white border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                            <svg class="w-5 h-5 stroke-current fill-none" viewBox="0 0 18 18"><path d="M8.6 16.2C12.7974 16.2 16.2 12.7974 16.2 8.6C16.2 4.40264 12.7974 1 8.6 1C4.40264 1 1 4.40264 1 8.6C1 12.7974 4.40264 16.2 8.6 16.2Z" stroke-width="1.5"/><path d="M16.9984 17L15.3984 15.4" stroke-width="1.5"/></svg>
                        </button>
                    </form>
                </div>

                <!-- Categories Widget -->
                <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                    <h3 class="text-lg font-bold text-slate-900 mb-4 pb-2 border-b border-slate-200">Categories</h3>
                    <ul class="space-y-3">
                        <?php
                        $all_cats = get_categories( array( 'number' => 5 ) );
                        foreach ( $all_cats as $cat ) : ?>
                            <li>
                                <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="flex items-center justify-between text-sm font-medium text-slate-600 hover:text-indigo-600 transition">
                                    <span><?php echo esc_html( $cat->name ); ?></span>
                                    <span class="text-xs bg-slate-200 text-slate-700 px-2 py-0.5 rounded-full">(<?php echo $cat->count; ?>)</span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Recent Posts Widget -->
                <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                    <h3 class="text-lg font-bold text-slate-900 mb-4 pb-2 border-b border-slate-200">Recent Posts</h3>
                    <div class="space-y-4">
                        <?php
                        $recent_posts = new WP_Query( array( 'posts_per_page' => 3, 'post__not_in' => array( get_the_ID() ) ) );
                        if ( $recent_posts->have_posts() ) :
                            while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
                                <div class="pb-3 border-b border-slate-200 last:border-0 last:pb-0">
                                    <a href="<?php the_permalink(); ?>" class="text-sm font-semibold text-slate-800 hover:text-indigo-600 transition line-clamp-2">
                                        <?php the_title(); ?>
                                    </a>
                                    <span class="text-xs text-slate-400 mt-1 block"><?php echo get_the_date('d M, Y'); ?></span>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                </div>

                <!-- CTA Banner Widget -->
                <div class="bg-slate-900 text-white p-8 rounded-2xl relative overflow-hidden text-center">
                    <h4 class="text-xl font-bold mb-4 relative z-10">Ready to optimize your marketing funnel for growth?</h4>
                    <a href="#" class="inline-block px-6 py-3 bg-amber-400 hover:bg-amber-300 text-slate-900 font-bold text-xs uppercase tracking-wider rounded-full transition relative z-10">
                        Let's Talk →
                    </a>
                </div>

            </aside>

        </div>
    </div>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>