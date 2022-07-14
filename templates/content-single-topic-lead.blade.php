{{-- Single Topic Lead Content Part --}}
@php( do_action( 'bbp_template_before_lead_topic' ) )
<ul id="bbp-topic-{{ bbp_topic_id() }}-lead" class="bbp-lead-topic">

	<li class="bbp-header">

		<div class="bbp-topic-author">
			{{ __( 'Creator',  'bbpress' ) }}
		</div><!-- .bbp-topic-author -->

		<div class="bbp-topic-content">

			{{ __( 'Topic', 'bbpress' ) }}

		</div><!-- .bbp-topic-content -->

	</li><!-- .bbp-header -->

	<li class="bbp-body">

		<div class="bbp-topic-header">

			<div class="bbp-meta">

				<span class="bbp-topic-post-date">
				  {{ bbp_topic_post_date() }}
				</span>

				<a href="{{ bbp_topic_permalink() }}" class="bbp-topic-permalink">#{{ bbp_topic_id() }}</a>

				@php( do_action( 'bbp_theme_before_topic_admin_links' ) )

				@php( bbp_topic_admin_links() )

				@php( do_action( 'bbp_theme_after_topic_admin_links' ) )

			</div><!-- .bbp-meta -->

		</div><!-- .bbp-topic-header -->

		<div id="post-{{ bbp_topic_id() }}" {{ bbp_topic_class() }}>

			<div class="bbp-topic-author">

				@php( do_action( 'bbp_theme_before_topic_author_details' ) )

				@php( bbp_topic_author_link( [ 'show_role' => true ] ) )


				@if( current_user_can( 'moderate', bbp_get_reply_id() ) )

					@php( do_action( 'bbp_theme_before_topic_author_admin_details' ) )

					<div class="bbp-topic-ip">
						{{ bbp_author_ip( bbp_get_topic_id() ) }}
					</div>

					@php( do_action( 'bbp_theme_after_topic_author_admin_details' ) )

				@endif

				@php( do_action( 'bbp_theme_after_topic_author_details' ) )

			</div><!-- .bbp-topic-author -->

			<div class="bbp-topic-content">

				@php( do_action( 'bbp_theme_before_topic_content' ) )

				{{ bbp_topic_content() }}

				@php( do_action( 'bbp_theme_after_topic_content' ) )

			</div><!-- .bbp-topic-content -->

		</div><!-- #post-{{ bbp_topic_id() }} -->

	</li><!-- .bbp-body -->

	<li class="bbp-footer">

		<div class="bbp-topic-author">
			{{ __( 'Creator',  'bbpress' ) }}
		</div>

		<div class="bbp-topic-content">

			{{ __( 'Topic', 'bbpress' ) }}

		</div><!-- .bbp-topic-content -->

	</li>

</ul><!-- #bbp-topic-{{ bbp_topic_id() }}-lead -->

@php( do_action( 'bbp_template_after_lead_topic' ) )
