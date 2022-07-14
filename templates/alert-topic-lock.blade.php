{{-- Topic Lock Alert  --}}
@php( do_action( 'bbp_theme_before_alert_topic_lock' ) )

@if ( bbp_show_topic_lock_alert() )

    <div class="bbp-alert-outer">
        <div class="bbp-alert-inner">
            <p class="bbp-alert-description">@php (bbp_topic_lock_description()) </p>
            <p class="bbp-alert-actions">
                <a class="bbp-alert-back"
                   href="@php (bbp_forum_permalink( bbp_get_topic_forum_id() ))">@php (esc_html_e( 'Leave', 'bbpress' ))</a>
                <a class="bbp-alert-close" href="#">@php (esc_html_e( 'Stay', 'bbpress' ))</a>
            </p>
        </div>
    </div>

@endif

@php( do_action( 'bbp_theme_after_alert_topic_lock' ) )
