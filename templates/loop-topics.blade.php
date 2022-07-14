{{-- Topics Loop --}}

@php( do_action( 'bbp_template_before_topics_loop' ) )

<ul id="bbp-forum-{{ bbp_forum_id() }}" class="bbp-topics w-full text-center">

    <li class="bbp-body">
      <ul class="card divide-y divide-rose-100 sm:m-0 mx-5 border border-rose-200 rounded-xl w-9/12">
        @while ( bbp_topics() )
          <li class="flex text-left">
            @php (bbp_the_topic())
            @php (bbp_get_template_part( 'loop', 'single-topic' ))
          </li>
        @endwhile
      </ul>
    </li>

    <li class="bbp-footer">
        <div class="tr">
            <p>
                <span class="td colspan{!! ( bbp_is_user_home() && ( bbp_is_favorites() || bbp_is_subscriptions() ) ) ? '5' : '4' !!}">&nbsp;</span>
            </p>
        </div><!-- .tr -->
    </li>
</ul><!-- #bbp-forum-{{ bbp_forum_id() }} -->

@php( do_action( 'bbp_template_after_topics_loop' ) )
