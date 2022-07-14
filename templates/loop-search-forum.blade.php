{{-- Search Loop - Single Forum --}}
<div class="start bg-white border rounded-md w-10/12 block justify-center my-2">
  <div class="permalink text-center m-2">
  <div class="bbp-forum-header m-2">
    <div class="bbp-meta">
        <span class="bbp-forum-post-date text-gray-500">@php printf( esc_html__( 'Last updated %s', 'bbpress' ), bbp_get_forum_last_active_time() ); @endphp</span><br>
        <a href="@php bbp_forum_permalink(); @endphp" class="bbp-forum-permalink text-gray-400 hover:text-rose-600 transition">#{{ bbp_forum_id() }}</a>
    </div><!-- .bbp-meta -->
  </div>

    <div class="bbp-forum-title mb-4 border-t border-b border-rose-200 p-2">

        @php do_action( 'bbp_theme_before_forum_title' ); @endphp

        <h3 class="text-rose-500">@php esc_html_e( 'Forum:', 'bbpress' ); @endphp
            <a class="text-gray-400 hover:text-rose-600 transition capitalize" href="@php bbp_forum_permalink(); @endphp">@php bbp_forum_title(); @endphp</a></h3>

        @php do_action( 'bbp_theme_after_forum_title' ); @endphp

    </div><!-- .bbp-forum-title -->
  </div><!-- .bbp-forum-header -->

  <div id="post-{{ bbp_forum_id() }}" @php bbp_forum_class(); @endphp>
    <div class="bbp-forum-content my-4 mx-2">

        @php do_action( 'bbp_theme_before_forum_content' ); @endphp

        <p class="text-gray-500 text-lg mb-2">Description</p>

        @php bbp_forum_content(); @endphp

        @php do_action( 'bbp_theme_after_forum_content' ); @endphp

    </div><!-- .bbp-forum-content -->
  </div><!-- #post-{{ bbp_forum_id() }} -->
</div><!-- .start -->
