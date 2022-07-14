{{-- Single Topic Content Part --}}
<div id="bbpress-forums" class="bbpress-wrapper">

  <div class="flex justify-center m-2 mt-4 mb-4">
    @php bbp_breadcrumb(); @endphp
  </div>

  @php do_action( 'bbp_template_before_single_topic' ); @endphp


  @if ( post_password_required() )


      @php bbp_get_template_part( 'form', 'protected' ); @endphp


  @else

      <div class="flex justify-center m-2">
        @php bbp_topic_tag_list(); @endphp
      </div>

      <div class="flex justify-center items-center text-center sm:text-left p-2">
        @php bbp_single_topic_description(); @endphp
      </div>


      @if ( bbp_show_lead_topic() )

          @php bbp_get_template_part( 'content', 'single-topic-lead' ); @endphp

      @endif



      @if ( bbp_has_replies() )

        <div class="flex justify-center">
          @php bbp_get_template_part( 'pagination', 'replies' ); @endphp
        </div>

        <div class="flex justify-center m-2">
          @php bbp_get_template_part( 'loop',       'replies' ); @endphp
        </div>

        <div class="flex justify-center m-2">
          @php bbp_get_template_part( 'pagination', 'replies' ); @endphp
        </div>


      @endif

      <div class="flex justify-center m-2 space-x-4 mt-10">
        @php bbp_forum_subscription_link(); @endphp
        @php bbp_topic_favorite_link(); @endphp
      </div>

      <div class="grid grid-cols-1 divide-y divide-rose-200 m-10 mt-12 rounded">
        <div></div>
        <div>&nbsp;</div>
        <div></div>
      </div>

      @php bbp_get_template_part( 'form', 'reply' ); @endphp


  @endif

  @php bbp_get_template_part( 'alert', 'topic-lock' ); @endphp

  @php do_action( 'bbp_template_after_single_topic' ); @endphp

</div>
