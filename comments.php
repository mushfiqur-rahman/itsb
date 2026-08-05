<?php
/**
 * Custom Comments Template — comments.php (Tailwind CSS)
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area mt-12 pt-10 border-t border-slate-200">

    <!-- ================= EXISTING COMMENTS LIST ================= -->
    <?php if ( have_comments() ) : ?>
        <h3 class="text-2xl font-bold text-slate-900 mb-8">
            <?php
            $comment_count = get_comments_number();
            echo esc_html( $comment_count . ( $comment_count === '1' ? ' Comment' : ' Comments' ) );
            ?>
        </h3>

        <ol class="space-y-6 mb-12">
            <?php
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 48,
                'callback'    => function( $comment, $args, $depth ) {
                    ?>
                    <li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'bg-slate-50 p-6 rounded-2xl border border-slate-100 flex gap-4 items-start' ); ?>>
                        <div class="shrink-0">
                            <?php echo get_avatar( $comment, 48, '', '', array( 'class' => 'rounded-full' ) ); ?>
                        </div>
                        <div class="grow min-w-0">
                            <div class="flex items-center justify-between mb-2">
                                <h5 class="text-sm font-bold text-slate-900">
                                    <?php comment_author_link(); ?>
                                </h5>
                                <span class="text-xs text-slate-400">
                                    <?php comment_date( 'F j, Y \a\t g:i a' ); ?>
                                </span>
                            </div>
                            <div class="text-sm text-slate-600 leading-relaxed mb-3 prose prose-slate">
                                <?php comment_text(); ?>
                            </div>
                            <div class="text-xs font-semibold text-indigo-600 hover:text-indigo-800">
                                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            ) );
            ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>


    <!-- ================= COMMENT FORM ================= -->
    <?php
    $commenter = wp_get_current_commenter();
    $req       = get_option( 'require_name_email' );
    $aria_req  = ( $req ? " aria-required='true'" : '' );

    $fields = array(
        'author' => '<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="Name *" ' . $aria_req . ' class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-indigo-500 transition">
                        </div>',
        'email'  => '   <div>
                            <input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="Email *" ' . $aria_req . ' class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-indigo-500 transition">
                        </div>
                    </div>',
        'url'    => '<div class="mb-4">
                        <input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="Website" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-indigo-500 transition">
                    </div>',
        'cookies' => '<div class="flex items-center gap-3 mb-6">
                        <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . ( empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"' ) . ' class="w-4 h-4 text-indigo-600 rounded border-slate-300 focus:ring-indigo-500">
                        <label for="wp-comment-cookies-consent" class="text-xs font-medium text-slate-600">Save my name, email, and website in this browser for the next time I comment.</label>
                    </div>',
    );

    $args = array(
        'fields'               => $fields,
        'comment_field'        => '<div class="mb-4">
                                     <textarea id="comment" name="comment" rows="5" placeholder="Write valuable comment *" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-indigo-500 transition"></textarea>
                                   </div>',
        'title_reply'          => 'Leave a Reply',
        'title_reply_before'   => '<h3 id="reply-title" class="text-2xl font-bold text-slate-900 mb-2">',
        'title_reply_after'    => '</h3>',
        'comment_notes_before' => '<p class="text-xs text-slate-500 mb-6">Your email address will not be published. Required fields are marked *</p>',
        'submit_button'        => '<button type="submit" id="%2$s" class="%3$s inline-flex items-center gap-2 px-6 py-3 bg-amber-400 hover:bg-amber-300 text-slate-900 font-bold text-xs uppercase tracking-wider rounded-full transition cursor-pointer">%4$s <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 14 14"><path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35765 6.59331L1.14783 13.8037C1.02165 13.9295 0.850656 14.0001 0.672431 14C0.539461 14 0.409486 13.9605 0.298934 13.8866C0.188382 13.8128 0.102217 13.7077 0.0513353 13.5849C0.000453949 13.462 -0.0128613 13.3269 0.013072 13.1965C0.0390053 13.066 0.103024 12.9462 0.197034 12.8522L7.40683 5.64241L2.41379 3.30208Z"/></svg></button>',
        'label_submit'         => 'Post Comment',
        'class_submit'         => 'submit-btn',
    );

    comment_form( $args );
    ?>

</div>