{{-- Search Loop - Single Reply --}}
<div class="start bg-white border rounded-md w-10/12 block justify-center my-2">
  <div class="permalink text-center m-2">
  <div class="bbp-reply-header m-2">
    <div class="bbp-meta">
        <span class="bbp-reply-post-date text-gray-500">@php bbp_reply_post_date(); @endphp</span><br>
        <a href="@php bbp_reply_url(); @endphp" class="bbp-reply-permalink text-gray-400 hover:text-rose-600 transition">#@php bbp_reply_id(); @endphp</a>
    </div><!-- .bbp-meta -->
  </div>
    <div class="bbp-reply-title mb-4 border-t border-b border-rose-200 p-2">
        <h3 class="text-gray-500">@php esc_html_e( 'In ', 'bbpress' ); @endphp
            <span class="text-rose-500">@php esc_html_e( 'reply ', 'bbpress' ); @endphp</span>
            @php esc_html_e( 'to: ', 'bbpress' ); @endphp
            <a class="bbp-topic-permalink text-gray-400 hover:text-rose-500 transition"
              href="@php bbp_topic_permalink( bbp_get_reply_topic_id() ); @endphp">@php bbp_topic_title( bbp_get_reply_topic_id() ); @endphp</a>
        </h3>
    </div><!-- .bbp-reply-title -->
  </div><!-- .bbp-reply-header -->

  <div id="post-@php bbp_reply_id(); @endphp" @php bbp_reply_class(); @endphp>
    <div class="bbp-reply-author text-center p-2 my-2 ml-2">

        @php do_action( 'bbp_theme_before_reply_author_details' ); @endphp

        <div class="flex justify-center">
          @php bbp_reply_author_link( array( 'type' => 'avatar' ) ); @endphp
        </div>

        <div class="text-gray-400 hover:text-rose-600 transition mt-1">
          @php bbp_reply_author_link( array( 'type' => 'name' ) ); @endphp
        </div>

        <div class="-m-1">
          @php bbp_reply_author_link( array( 'show_role' => true, 'type' => 'role' ) ); @endphp
        </div>

        @if ( bbp_is_user_keymaster() )


            @php do_action( 'bbp_theme_before_reply_author_admin_details' ); @endphp

            <div class="bbp-reply-ip">@php bbp_author_ip( bbp_get_reply_id() ); @endphp</div>

            @php do_action( 'bbp_theme_after_reply_author_admin_details' ); @endphp


        @endif


        @php do_action( 'bbp_theme_after_reply_author_details' ); @endphp

    </div><!-- .bbp-reply-author -->

    <div class="bbp-reply-content text-left p-2">

        @php do_action( 'bbp_theme_before_reply_content' ); @endphp

        @php bbp_reply_content(); @endphp

        @php do_action( 'bbp_theme_after_reply_content' ); @endphp

    </div><!-- .bbp-reply-content -->
  </div><!-- #post-@php bbp_reply_id(); @endphp -->
</div><!-- .start -->
