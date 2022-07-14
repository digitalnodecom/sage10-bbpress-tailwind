{{-- Forums Loop - Single Forum --}}
  <div class="flex items-start flex-wrap p-7 space-x-6 border rounded mx-8 md:mx-16 my-4 rounded-xl">

    <ul id="bbp-forum-{{ bbp_forum_id() }}" @php bbp_forum_class(); @endphp>
      <li class="bbp-forum-info">


          @if ( bbp_is_user_home() && bbp_is_subscriptions() )


              <span class="bbp-row-actions">

                  @php do_action( 'bbp_theme_before_forum_subscription_action' ); @endphp

                    @php bbp_forum_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); @endphp

                  @php do_action( 'bbp_theme_after_forum_subscription_action' ); @endphp

              </span>

          @endif
      </li>
    </ul>

    <a href="@php bbp_forum_permalink(); @endphp" class="w-14 h-14 relative mt-1 order-1">
        <img src="https://logopond.com/avatar/257420/logopond.png" alt="" class="rounded-md">
    </a>
    <div class="flex-1 sm:order-2">
      <div class="flex items-start">
        <h4 class="text-base text-gray-500 font-medium mr-4">Forum</h4>
      </div>
      @php do_action( 'bbp_theme_before_topic_author' ); @endphp
        <span class="bbp-topic-freshness-author flex text-center text-gray-400 mb-2"> Created by:&nbsp;<span class="hover:text-rose-600 transition">@php bbp_author_link(array( 'post_id' => bbp_get_forum_last_active_id(), 'type' => 'name' )); @endphp</span></span>
      @php do_action( 'bbp_theme_after_topic_author' ); @endphp

      @php do_action( 'bbp_theme_before_forum_title' ); @endphp
          <a href="@php bbp_forum_permalink(); @endphp" class="bbp-forum-title hover:text-rose-600 transition">
              <h3 class="text-xl font-medium mb-4"> @php bbp_forum_title(); @endphp </h3>
          </a>
        @php do_action( 'bbp_theme_after_forum_title' ); @endphp

        @php do_action( 'bbp_theme_before_forum_description' ); @endphp
        <p>
          @php bbp_forum_content(); @endphp
        </p>
        @php do_action( 'bbp_theme_after_forum_description' ); @endphp

        <div class="job-tags mt-5 mb-2 space-x-2.5 space-y-2">
            <div class="border px-3 py-1.5 rounded-md text-sm inline-block bbp-forum-topic-count"> Topics: @php bbp_forum_topic_count(); @endphp </div>
            <div class="border px-3 py-1.5 rounded-md text-sm inline-block bbp-forum-reply-count"> Replies: @php bbp_show_lead_topic() ? bbp_forum_reply_count() : bbp_forum_post_count(); @endphp </div>
            @php do_action( 'bbp_theme_before_forum_freshness_link' ); @endphp
              <div class="border px-3 py-1.5 rounded-md text-sm inline-block bbp-topic-meta justify-center inline-block"> @php bbp_forum_freshness_link(); @endphp </div></div>
            @php do_action( 'bbp_theme_after_forum_freshness_link' ); @endphp
        </div>
    </div>
</div>
