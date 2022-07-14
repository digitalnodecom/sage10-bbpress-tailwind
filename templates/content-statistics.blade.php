{{-- Statistics Content Part --}}
@php( $stats = bbp_get_statistics(); )

<dl role="main">

    @php do_action( 'bbp_before_statistics' ); @endphp

    <dt>@php esc_html_e( 'Registered Users', 'bbpress' ); @endphp</dt>
    <dd>
        <strong>{!! esc_html( $stats['user_count'] ) !!}</strong>
    </dd>

    <dt>@php esc_html_e( 'Forums', 'bbpress' ); @endphp</dt>
    <dd>
        <strong>{!! esc_html( $stats['forum_count'] ) !!}</strong>
    </dd>

    <dt>@php esc_html_e( 'Topics', 'bbpress' ); @endphp</dt>
    <dd>
        <strong>{!! esc_html( $stats['topic_count'] ) !!}</strong>
    </dd>

    <dt>@php esc_html_e( 'Replies', 'bbpress' ); @endphp</dt>
    <dd>
        <strong>{!! esc_html( $stats['reply_count'] ) !!}</strong>
    </dd>

    <dt>@php esc_html_e( 'Topic Tags', 'bbpress' ); @endphp</dt>
    <dd>
        <strong>{!! esc_html( $stats['topic_tag_count'] ) !!}</strong>
    </dd>


    @if ( ! empty( $stats['empty_topic_tag_count'] ) )


        <dt>@php esc_html_e( 'Empty Topic Tags', 'bbpress' ); @endphp</dt>
        <dd>
            <strong>{!! esc_html( $stats['empty_topic_tag_count'] ) !!}</strong>
        </dd>


    @endif



    @if ( ! empty( $stats['topic_count_hidden'] ) )


        <dt>@php esc_html_e( 'Hidden Topics', 'bbpress' ); @endphp</dt>
        <dd>
            <strong>
                <abbr title="{!! esc_attr( $stats['hidden_topic_title'] ) !!}">{!! esc_html( $stats['topic_count_hidden'] ) !!}</abbr>
            </strong>
        </dd>


    @endif



    @if ( ! empty( $stats['reply_count_hidden'] ) )


        <dt>@php esc_html_e( 'Hidden Replies', 'bbpress' ); @endphp</dt>
        <dd>
            <strong>
                <abbr title="{!! esc_attr( $stats['hidden_reply_title'] ) !!}">{!! esc_html( $stats['reply_count_hidden'] ) !!}</abbr>
            </strong>
        </dd>


    @endif


    @php do_action( 'bbp_after_statistics' ); @endphp

</dl>

@php unset( $stats );
@endphp
