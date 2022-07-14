{{-- Replies Loop --}}
@php( do_action( 'bbp_template_before_replies_loop' ) )

<ul id="topic-{{ bbp_topic_id() }}-replies" class="forums bbp-replies w-full">

	<li class="bbp-body w-full justify-center flex">
    <ul role="list" class="divide-y divide-gray-200 space-y-12 w-10/12">

@if ( bbp_thread_replies() )


			@php (bbp_list_replies())


@else



@while ( bbp_replies() )
  @php (bbp_the_reply())

				@php (bbp_get_template_part( 'loop', 'single-reply' ))


@endwhile


@endif

    </ul>
  </li><!-- .bbp-body -->

	<li class="bbp-footer">
	</li><!-- .bbp-footer -->
</ul><!-- #topic-{{ bbp_topic_id() }}-replies -->

@php (do_action( 'bbp_template_after_replies_loop' ))
