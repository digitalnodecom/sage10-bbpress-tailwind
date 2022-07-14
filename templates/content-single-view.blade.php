{{-- Single View Content Part --}}
<div id="bbpress-forums" class="bbpress-wrapper">

  @php bbp_breadcrumb(); @endphp

  @php bbp_set_query_name( bbp_get_view_rewrite_id() ); @endphp


  @if ( bbp_view_query() )


      @php bbp_get_template_part( 'pagination', 'topics'    ); @endphp

      @php bbp_get_template_part( 'loop',       'topics'    ); @endphp

      @php bbp_get_template_part( 'pagination', 'topics'    ); @endphp


  @else


      @php bbp_get_template_part( 'feedback',   'no-topics' ); @endphp


  @endif


  @php bbp_reset_query_name(); @endphp

</div>
