{{-- Single User Content Part --}}
<div id="bbpress-forums" class="bbpress-wrapper">

  @php do_action( 'bbp_template_notices' ); @endphp

  @php do_action( 'bbp_template_before_user_wrapper' ); @endphp

  <div id="bbp-user-wrapper">

      @php bbp_get_template_part( 'user', 'details' ); @endphp

      <div id="bbp-user-body">
          @php if ( bbp_is_favorites()               ) bbp_get_template_part( 'user', 'favorites'       ); @endphp
          @php if ( bbp_is_subscriptions()           ) bbp_get_template_part( 'user', 'subscriptions'   ); @endphp
          @php if ( bbp_is_single_user_engagements() ) bbp_get_template_part( 'user', 'engagements'     ); @endphp
          @php if ( bbp_is_single_user_topics()      ) bbp_get_template_part( 'user', 'topics-created'  ); @endphp
          @php if ( bbp_is_single_user_replies()     ) bbp_get_template_part( 'user', 'replies-created' ); @endphp
          @php if ( bbp_is_single_user_edit()        ) bbp_get_template_part( 'form', 'user-edit'       ); @endphp
          @php if ( bbp_is_single_user_profile()     ) bbp_get_template_part( 'user', 'profile'         ); @endphp
      </div>
  </div>

  @php do_action( 'bbp_template_after_user_wrapper' ); @endphp

</div>
