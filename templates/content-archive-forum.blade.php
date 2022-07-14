{{-- Archive Forum Content Part --}}
<div id="bbpress-forums" class="bbpress-wrapper">

  <div class="flex justify-center m-2 mt-4 mb-4">
    @php bbp_breadcrumb(); @endphp
  </div>

  @php bbp_get_template_part( 'form', 'search' ); @endphp


  @php bbp_forum_subscription_link(); @endphp

  @php do_action( 'bbp_template_before_forums_index' ); @endphp


  @if ( bbp_has_forums() )


      @php bbp_get_template_part( 'loop',     'forums'    ); @endphp


  @else

    <div class="h-56 flex items-center justify-center">
      @php bbp_get_template_part( 'feedback', 'no-forums' ); @endphp
    </div>


  @endif


  @php do_action( 'bbp_template_after_forums_index' ); @endphp
</div>
