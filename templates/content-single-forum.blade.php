{{-- Single Forum Content Part --}}

<div id="bbpress-forums" class="bbpress-wrapper">


  <div class="flex justify-center m-2 mt-4 mb-4">
    @php bbp_breadcrumb(); @endphp
  </div>

  @php do_action( 'bbp_template_before_single_forum' ); @endphp


  @if ( post_password_required() )


      @php bbp_get_template_part( 'form', 'protected' ); @endphp


  @else

      <div class="flex hidden justify-center">
        @php bbp_single_forum_description(); @endphp
      </div>

      @if ( bbp_has_forums() )

        @php bbp_get_template_part( 'loop', 'forums' ); @endphp

      @endif



      @if ( ! bbp_is_forum_category() && bbp_has_topics() )

        <div class="flex justify-center m-2">
          @php bbp_get_template_part( 'pagination', 'topics'    ); @endphp
        </div>

        <div>
          @php bbp_get_template_part( 'loop',       'topics'    ); @endphp
        </div>

        <div class="flex justify-center m-2">
          @php bbp_forum_subscription_link(); @endphp
        </div>

        <div class="flex justify-center m-2">
          @php bbp_get_template_part( 'pagination', 'topics'    ); @endphp
        </div>

        {{-- Divider --}}
        <div class="grid grid-cols-1 divide-y divide-rose-200 m-10 mt-12 rounded">
          <div></div>
          <div>&nbsp;</div>
          <div></div>
        </div>

        <div class="">
          @php bbp_get_template_part( 'form',       'topic'     ); @endphp
        </div>

      @elseif ( ! bbp_is_forum_category() )

        <div class="h-56 flex items-center justify-center">
          @php bbp_get_template_part( 'feedback',   'no-topics' ); @endphp
        </div>

          @php bbp_get_template_part( 'form',       'topic'     ); @endphp


      @endif



  @endif


  @php do_action( 'bbp_template_after_single_forum' ); @endphp

</div>
