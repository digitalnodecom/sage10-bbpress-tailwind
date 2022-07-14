{{-- Search Loop - Single Topic --}}
<div class="start bg-white border rounded-md w-10/12 block justify-center my-2">
  <div class="permalink text-center w-full">
    <div class="bbp-topic-header my-2">
      <div class="bbp-meta">
        <span class="bbp-topic-post-date text-gray-500">@php bbp_topic_post_date( bbp_get_topic_id() ); @endphp</span><br>
        <a href="@php bbp_topic_permalink(); @endphp" class="bbp-topic-permalink text-gray-400 hover:text-rose-600 transition">#{{ bbp_topic_id() }}</a>
      </div><!-- .bbp-meta -->
    </div><!-- .bbp-topic-header -->

  <div class="bbp-topic-title border-t border-b border-rose-200 mx-2 py-2">

      @php do_action( 'bbp_theme_before_topic_title' ); @endphp

      <h3 class="text-rose-500">@php esc_html_e( 'Topic:', 'bbpress' ); @endphp
          <a class="text-gray-400 hover:text-rose-600 transition" href="@php bbp_topic_permalink(); @endphp">@php bbp_topic_title(); @endphp</a></h3>

      <div class="bbp-topic-title-meta text-gray-500">


          @if ( function_exists( 'bbp_is_forum_group_forum' ) && bbp_is_forum_group_forum( bbp_get_topic_forum_id() ) )


              @php esc_html_e( 'In group forum ', 'bbpress' ); @endphp


          @else


              @php esc_html_e( 'In forum ', 'bbpress' ); @endphp


          @endif


          <a class="text-gray-400 hover:text-rose-600 transition" href="@php bbp_forum_permalink( bbp_get_topic_forum_id() ); @endphp">@php bbp_forum_title( bbp_get_topic_forum_id() ); @endphp</a>

      </div><!-- .bbp-topic-title-meta -->

      @php do_action( 'bbp_theme_after_topic_title' ); @endphp

  </div><!-- .bbp-topic-title -->

</div><!-- .permalink -->

  <div id="post-{{ bbp_topic_id() }}"
  class="flex items-start space-x-5 mt-2"
  >
  <div class="bbp-topic-author my-2 ml-4">

      @php do_action( 'bbp_theme_before_topic_author_details' ); @endphp

      <div class="flex justify-center">
        @php bbp_topic_author_link( array( 'type' => 'avatar', 'size' => 64 ) ); @endphp
      </div>

      <div class="text-gray-400 hover:text-rose-600 transition mt-2">
        @php bbp_topic_author_link( array( 'type' => 'name' ) ); @endphp
      </div>

      @php bbp_topic_author_link( array( 'show_role' => true, 'type' => 'role' ) ); @endphp


      @if ( bbp_is_user_keymaster() )


          @php do_action( 'bbp_theme_before_topic_author_admin_details' ); @endphp

          <div class="bbp-reply-ip">@php bbp_author_ip( bbp_get_topic_id() ); @endphp</div>

          @php do_action( 'bbp_theme_after_topic_author_admin_details' ); @endphp


      @endif


      @php do_action( 'bbp_theme_after_topic_author_details' ); @endphp

  </div><!-- .bbp-topic-author -->

  <div class="bbp-topic-content p-2 text-left">

      @php do_action( 'bbp_theme_before_topic_content' ); @endphp

      @php bbp_topic_content(); @endphp

      @php do_action( 'bbp_theme_after_topic_content' ); @endphp

  </div><!-- .bbp-topic-content -->
  </div><!-- #post-{{ bbp_topic_id() }} -->
</div><!-- .start -->
