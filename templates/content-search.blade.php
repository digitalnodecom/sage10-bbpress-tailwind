{{-- Search Content Part --}}
<div id="bbpress-forums" class="bbpress-wrapper">

  <div class="flex justify-center m-2 mt-4 mb-4">
    @php bbp_breadcrumb(); @endphp
  </div>

  @php bbp_set_query_name( bbp_get_search_rewrite_id() ); @endphp

  @php do_action( 'bbp_template_before_search' ); @endphp


  @if ( bbp_has_search_results() )

    <div class="flex justify-center m-2">
      @php (bbp_get_template_part( 'pagination', 'search' ))
    </div>

    <div class="flex justify-center m-2">
      @php (bbp_get_template_part( 'loop',       'search' ))
    </div>

    <div class="flex justify-center m-2">
      @php (bbp_get_template_part( 'pagination', 'search' ))
    </div>


  @elseif ( bbp_get_search_terms() )

    <div class="h-56 flex items-center justify-center">
      @php (bbp_get_template_part( 'feedback',   'no-search' ))
    </div>


  @else


      @php (bbp_get_template_part( 'form', 'search' ))


  @endif


  @php (do_action( 'bbp_template_after_search_results' ))

</div>
