{{-- Topic Tag Edit Content Part --}}
<div id="bbpress-forums" class="bbpress-wrapper">

  @php bbp_breadcrumb(); @endphp

  @php do_action( 'bbp_template_before_topic_tag_description' ); @endphp

  @php bbp_topic_tag_description( array( 'before' => '<div class="bbp-template-notice info"><ul><li>', 'after' => '</li></ul></div>' ) ); @endphp

  @php do_action( 'bbp_template_after_topic_tag_description' ); @endphp

  @php do_action( 'bbp_template_before_topic_tag_edit' ); @endphp

  @php bbp_get_template_part( 'form', 'topic-tag' ); @endphp

  @php do_action( 'bbp_template_after_topic_tag_edit' ); @endphp

</div>
