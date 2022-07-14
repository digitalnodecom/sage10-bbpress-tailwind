{{-- Single Reply Content Part --}}
<div id="bbpress-forums" class="bbpress-wrapper">

  @php bbp_breadcrumb(); @endphp

  @php do_action( 'bbp_template_before_single_reply' ); @endphp


  @if ( post_password_required() )


      @php bbp_get_template_part( 'form', 'protected' ); @endphp


  @else


      @php bbp_get_template_part( 'loop', 'single-reply' ); @endphp


  @endif


  @php do_action( 'bbp_template_after_single_reply' ); @endphp

</div>
