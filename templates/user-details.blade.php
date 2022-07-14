{{-- User Details --}}
@php( do_action( 'bbp_template_before_user_details' ) )

<div id="bbp-single-user-details" class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8">
    <div id="bbp-user-avatar" class="m-4 lg:ml-8 mt-8 flex items-center space-x-5 justify-center lg:justify-start">
      <div class="flex-shrink-0">
        <div class="relative">
          <span class='vcard'>
            <a class="url fn n" href="{{ bbp_user_profile_url() }}"
                     title="@php bbp_displayed_user_field( 'display_name' ); @endphp" rel="me">
                  {!! bbp_get_current_user_avatar( 64 ) !!}
            </a>
          </span>
        </div>
      </div>
      <div>
        <h1 class="text-2xl font-bold text-gray-900">{{ bbp_displayed_user_field( 'first_name' ) }} {{ bbp_displayed_user_field( 'last_name' ) }}</h1>
        <p class="text-sm font-medium text-gray-500">Username: @<span class="text-rose-500">{{ bbp_displayed_user_field( 'user_login' ) }}</span></p>
      </div>
    </div>

    @php do_action( 'bbp_template_before_user_details_menu_items' ); @endphp

    <div id="bbp-user-navigation">
      <div class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-full lg:grid-flow-col-dense lg:grid-cols-4">
          <section aria-labelledby="timeline-title" class="lg:col-start-4 lg:col-span-1">
            <div class="bg-white px-4 py-5 border sm:rounded-lg sm:px-6">
              <h2 id="timeline-title" class="text-lg font-medium text-gray-900">Navigation</h2>

              <!-- Activity Feed -->
              <div class="mt-6 flow-root">
                <ul role="list" class="w-full">
                  <li class="@if ( bbp_is_single_user_profile() ) current @endif m-2">
                    <span class="vcard bbp-user-profile-link">
                      <a class="url fn n w-full hover:bg-gray-100 @if ( bbp_is_single_user_profile() ) bg-gray-100 @endif transition text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md" href="@php bbp_user_profile_url(); @endphp"
                        title="@php printf( esc_attr__( "%s's Profile", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); @endphp"
                        rel="me">

                        <svg xmlns="http://www.w3.org/2000/svg" class="@if ( bbp_is_single_user_profile() ) text-rose-500 @else text-gray-500 @endif flex-shrink-0 -ml-1 mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        @php esc_html_e( 'Profile', 'bbpress' ); @endphp
                      </a>
                    </span>
                  </li>

                  <li class="@if ( bbp_is_single_user_topics() ) current @endif m-2">
                    <span class='bbp-user-topics-created-link'>
                      <a href="@php bbp_user_topics_created_url(); @endphp"
                        class="hover:bg-gray-100 @if ( bbp_is_single_user_topics() ) bg-gray-100 @endif transition text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
                        title="@php printf( esc_attr__( "%s's Topics Started", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); @endphp">

                        <svg xmlns="http://www.w3.org/2000/svg" class="@if ( bbp_is_single_user_topics() ) text-rose-500 @else text-gray-500 @endif flex-shrink-0 -ml-1 mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>

                        @php esc_html_e( 'Topics Started', 'bbpress' ); @endphp

                      </a>
                    </span>
                  </li>

                  <li class="@if ( bbp_is_single_user_replies() ) current @endif m-2">
                      <span class='bbp-user-replies-created-link'>
                        <a href="@php bbp_user_replies_created_url(); @endphp"
                            class="hover:bg-gray-100 @if ( bbp_is_single_user_replies() ) bg-gray-100 @endif transition text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
                            title="@php printf( esc_attr__( "%s's Replies Created", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); @endphp">

                            <svg xmlns="http://www.w3.org/2000/svg" class="@if ( bbp_is_single_user_replies() ) text-rose-500 @else text-gray-500 @endif flex-shrink-0 -ml-1 mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                            </svg>

                            @php esc_html_e( 'Replies Created', 'bbpress' ); @endphp

                          </a>
                      </span>
                  </li>

                  @if ( bbp_is_engagements_active() )
                    <li class="@if ( bbp_is_single_user_engagements() ) current @endif m-2">
                      <span class='bbp-user-engagements-created-link'>
                        <a href="@php bbp_user_engagements_url(); @endphp"
                          class="hover:bg-gray-100 @if ( bbp_is_single_user_engagements() ) bg-gray-100 @endif transition text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
                          title="@php printf( esc_attr__( "%s's Engagements", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); @endphp">

                          <svg xmlns="http://www.w3.org/2000/svg" class="@if ( bbp_is_single_user_engagements() ) text-rose-500 @else text-gray-500 @endif flex-shrink-0 -ml-1 mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                          </svg>

                            @php esc_html_e( 'Engagements', 'bbpress' ); @endphp

                        </a>
                      </span>
                    </li>
                  @endif

                  @if ( bbp_is_favorites_active() )
                    <li class="@if ( bbp_is_favorites() ) current @endif m-2">
                      <span class="bbp-user-favorites-link">
                        <a href="@php bbp_favorites_permalink(); @endphp"
                          class="hover:bg-gray-100 @if ( bbp_is_favorites() ) bg-gray-100 @endif transition text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
                          title="@php printf( esc_attr__( "%s's Favorites", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); @endphp">

                          <svg xmlns="http://www.w3.org/2000/svg" class="@if ( bbp_is_favorites() ) text-rose-500 @else text-gray-500 @endif flex-shrink-0 -ml-1 mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                          </svg>

                          @php esc_html_e( 'Favorites', 'bbpress' ); @endphp

                        </a>
                      </span>
                    </li>
                  @endif

                  @if ( bbp_is_user_home() || current_user_can( 'edit_user', bbp_get_displayed_user_id() ) )

                    @if ( bbp_is_subscriptions_active() )
                      <li class="@if ( bbp_is_subscriptions() ) current @endif m-2">
                        <span class="bbp-user-subscriptions-link">
                          <a href="@php bbp_subscriptions_permalink(); @endphp"
                            class="hover:bg-gray-100 @if ( bbp_is_subscriptions() ) bg-gray-100 @endif transition text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
                            title="@php printf( esc_attr__( "%s's Subscriptions", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); @endphp">

                            <svg xmlns="http://www.w3.org/2000/svg" class="@if ( bbp_is_subscriptions() ) text-rose-500 @else text-gray-500 @endif flex-shrink-0 -ml-1 mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>

                            @php esc_html_e( 'Subscriptions', 'bbpress' ); @endphp

                          </a>
                        </span>
                      </li>
                    @endif



                    <li class="@if ( bbp_is_single_user_edit() ) current @endif m-2">
                      <span class="bbp-user-edit-link">
                        <a href="@php bbp_user_profile_edit_url(); @endphp"
                          class="hover:bg-gray-100 @if ( bbp_is_single_user_edit() ) bg-gray-100 @endif transition text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
                          title="@php printf( esc_attr__( "Edit %s's Profile", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); @endphp">

                          <svg xmlns="http://www.w3.org/2000/svg" class="@if ( bbp_is_single_user_edit() ) text-rose-500 @else text-gray-500 @endif flex-shrink-0 -ml-1 mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                          </svg>

                          <span class="truncate">
                            @php esc_html_e( 'Edit', 'bbpress' ); @endphp
                          </span>

                        </a>
                      </span>
                    </li>

                  @endif

                </ul>

                @php do_action( 'bbp_template_after_user_details_menu_items' ); @endphp

                @php do_action( 'bbp_template_after_user_details' ); @endphp
              </div>
            </div>
          </section>
          <div class="space-y-6 lg:col-start-1 lg:col-span-3 border rounded-md">
    {{-- </div> --}}
{{-- </div> --}}
{{-- DON'T FORGET TO ADD THESE 2 CLOSING </div>s TO THE LOADED TEMPLATE !!!! --}}
