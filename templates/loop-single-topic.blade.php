{{-- Topics Loop - Single --}}
<div class="flex items-start space-x-5 p-7 rounded-xl w-full">

  @if ( bbp_is_user_home() )

    @if ( bbp_is_favorites() )

      <span class="bbp-row-actions">

          @php do_action( 'bbp_theme_before_topic_favorites_action' ); @endphp

                    @php bbp_topic_favorite_link( array( 'before' => '', 'favorite' => '+', 'favorited' => '&times;' ) ); @endphp

                    @php do_action( 'bbp_theme_after_topic_favorites_action' ); @endphp

          </span>

            @elseif ( bbp_is_subscriptions() )

                <span class="bbp-row-actions">

          @php do_action( 'bbp_theme_before_topic_subscription_action' ); @endphp

                    @php bbp_topic_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); @endphp

                    @php do_action( 'bbp_theme_after_topic_subscription_action' ); @endphp

          </span>

    @endif

  @endif

  <div class="w-12 h-12 rounded rounded-full">
    @php
      $avatar = bbp_get_topic_author_link( array( 'type' => 'avatar'  ) );
      $avatar = str_replace( 'photo', 'photo w-12 h-12 rounded-md shadow-md', $avatar);
      printf( $avatar );
    @endphp
  </div>
  <div class="flex-1">
    @php do_action( 'bbp_theme_before_topic_title' ); @endphp
      <a href="@php bbp_topic_permalink(); @endphp" class="bbp-topic-permalink text-lg font-semibold line-clamp-1 mb-1 hover:text-rose-600 transition">@php bbp_topic_title(); @endphp </a>
    @php do_action( 'bbp_theme_after_topic_title' ); @endphp

    @php do_action( 'bbp_theme_before_topic_meta' ); @endphp
      @php do_action( 'bbp_theme_before_topic_started_by' ); @endphp
        <p class="text-sm text-gray-400 mb-2 bbp-topic-started-by">@php printf( esc_html__( 'Started by: %1$s', 'bbpress' ), bbp_get_topic_author_link( array( 'size' => '14', 'type' => 'name' ) ) ); @endphp</p>
      @php do_action( 'bbp_theme_after_topic_started_by' ); @endphp
    <p class="leading-6 line-clamp-2 mt-3">@php bbp_topic_content(); @endphp</p>
    <br>
    <div class="border px-3 py-1.5 rounded-md text-sm inline-block bbp-topic-voice-count"> Voices: @php bbp_topic_voice_count(); @endphp </div>
    @php do_action( 'bbp_theme_before_topic_freshness_link' ); @endphp
    <div class="border px-3 py-1.5 rounded-md text-sm inline-block bbp-topic-freshness text-gray-500"> Freshness: @php bbp_topic_freshness_link(); @endphp </div>
    @php do_action( 'bbp_theme_after_topic_freshness_link' ); @endphp
  </div>

  @if ( ! bbp_is_single_forum() || ( bbp_get_topic_forum_id() !== bbp_get_forum_id() ) )

    @php do_action( 'bbp_theme_before_topic_started_in' ); @endphp

    <span class="bbp-topic-started-in text-gray-400">@php printf( esc_html__( 'In: %1$s', 'bbpress' ), '<a href="' . bbp_get_forum_permalink( bbp_get_topic_forum_id() ) . '" class="hover:text-rose-600 transition">' . bbp_get_forum_title( bbp_get_topic_forum_id() ) . '</a>' ); @endphp</span>
    @php do_action( 'bbp_theme_after_topic_started_in' ); @endphp

  @endif

  @php do_action( 'bbp_theme_after_topic_meta' ); @endphp
  @php bbp_topic_row_actions(); @endphp

  <div class="sm:flex items-center space-x-4 hidden bbp-topic-reply-count">
      <svg class="w-7 h-7 text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path><path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"></path></svg>
      <span class="text-xl text-gray-500"> @php bbp_show_lead_topic() ? bbp_topic_reply_count() : bbp_topic_post_count(); @endphp </span>
  </div>
  @php bbp_topic_pagination(); @endphp
</div>
