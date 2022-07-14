{{-- Replies Loop - Single Reply --}}
<div class="block p-6 w-full bg-white rounded-lg border shadow-md hover:bg-gray-50 transition">
<div id="post-@php bbp_reply_id(); @endphp" class="bbp-reply-header">
  <div class="bbp-meta flex justify-center mb-4 border-b border-rose-200 p-2">
    <div class="text-center">
      <span class="bbp-reply-post-date text-gray-500">@php bbp_reply_post_date(); @endphp</span>
      <br>

      @if ( bbp_is_single_user_replies() )

      <div class="text-gray-500">
        <span class="bbp-header">
    @php esc_html_e( 'in reply to: ', 'bbpress' ); @endphp
    <a class="bbp-topic-permalink text-gray-400 hover:text-rose-600 transition"
               href="@php bbp_topic_permalink( bbp_get_reply_topic_id() ); @endphp">@php bbp_topic_title( bbp_get_reply_topic_id() ); @endphp</a>
      </div>
    </span>

      <br>
      @endif

      <a href="@php bbp_reply_url(); @endphp" class="bbp-reply-permalink text-gray-400 hover:text-rose-600 transition">#@php bbp_reply_id(); @endphp</a>
      <br>

      @php do_action( 'bbp_theme_before_reply_admin_links' ); @endphp

      @php bbp_reply_admin_links(); @endphp

      @php do_action( 'bbp_theme_after_reply_admin_links' ); @endphp
    </div>


  </div><!-- .bbp-meta -->
</div><!-- #post-@php bbp_reply_id(); @endphp -->

<div @php bbp_reply_class(); @endphp>
  <div class="bbp-reply-author text-center">

      @php do_action( 'bbp_theme_before_reply_author_details' ); @endphp
      <div class="flex justify-center mb-2">
        @php bbp_reply_author_link( array( 'type' => 'avatar' ) ); @endphp
      </div>
      @php bbp_reply_author_link( array( 'show_role' => true, 'type' => 'name' ) ); @endphp


      @if ( current_user_can( 'moderate', bbp_get_reply_id() ) )


          @php do_action( 'bbp_theme_before_reply_author_admin_details' ); @endphp

          <div class="bbp-reply-ip">@php bbp_author_ip( bbp_get_reply_id() ); @endphp</div>

          @php do_action( 'bbp_theme_after_reply_author_admin_details' ); @endphp


      @endif


      @php do_action( 'bbp_theme_after_reply_author_details' ); @endphp

  </div><!-- .bbp-reply-author -->

  <div class="bbp-reply-content">

      @php do_action( 'bbp_theme_before_reply_content' ); @endphp

      @php bbp_reply_content(); @endphp

      @php do_action( 'bbp_theme_after_reply_content' ); @endphp

  </div><!-- .bbp-reply-content -->
</div><!-- .reply -->
</div>
