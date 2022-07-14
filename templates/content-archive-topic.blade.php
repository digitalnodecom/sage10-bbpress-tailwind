{{-- Archive Topic Content Part  --}}
<div id="bbpress-forums" class="bbpress-wrapper">

  @if ( bbp_allow_search() )

      <div class="bbp-search-form">

          @php bbp_get_template_part( 'form', 'search' ); @endphp

      </div>


  @endif


  @php bbp_breadcrumb(); @endphp

  @php do_action( 'bbp_template_before_topic_tag_description' ); @endphp


  @if ( bbp_is_topic_tag() )


      @php bbp_topic_tag_description( array( 'before' => '<div class="bbp-template-notice info"><ul><li>', 'after' => '</li></ul></div>' ) ); @endphp


  @endif


  @php do_action( 'bbp_template_after_topic_tag_description' ); @endphp

  @php do_action( 'bbp_template_before_topics_index' ); @endphp


  @if ( bbp_has_topics() )


      @php bbp_get_template_part( 'pagination', 'topics'    ); @endphp

      @php bbp_get_template_part( 'loop',       'topics'    ); @endphp

      @php bbp_get_template_part( 'pagination', 'topics'    ); @endphp


  @else


      @php bbp_get_template_part( 'feedback',   'no-topics' ); @endphp


  @endif


  @php do_action( 'bbp_template_after_topics_index' ); @endphp

</div>
