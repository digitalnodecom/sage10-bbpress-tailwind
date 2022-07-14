{{-- New/Edit Forum --}}

@if ( bbp_is_forum_edit() )


    <div id="bbpress-forums" class="bbpress-wrapper">

      <div class="flex justify-center m-2 mt-6 mb-4">
        @php bbp_breadcrumb(); @endphp
      </div>

      @php bbp_single_forum_description( array( 'forum_id' => bbp_get_forum_id() ) ); @endphp


@endif



        @if ( bbp_current_user_can_access_create_forum_form() )


            <div id="new-forum-{{ bbp_forum_id() }}" class="bbp-forum-form max-w-2xl m-auto shadow-md rounded-md bg-white mt-10 border border-rose-100">

                <form id="new-post" name="new-post" method="post">

                    @php do_action( 'bbp_theme_before_forum_form' ); @endphp

                    <fieldset class="bbp-form">

                        <legend class="text-center border-b border-gray-100 py-6 w-full">


                            @if ( bbp_is_forum_edit() )
                              <h3 class="font-bold text-xl">
                                @php
                                    printf( esc_html__( 'Now Editing &ldquo;%s&rdquo;', 'bbpress' ), bbp_get_forum_title() );
                                @endphp
                              </h3>
                            @else
                              <h3 class="font-bold text-xl">
                                @php
                                    bbp_is_single_forum()
                                        ? printf( esc_html__( 'Create New Forum in &ldquo;%s&rdquo;', 'bbpress' ), bbp_get_forum_title() )
                                        : esc_html_e( 'Create New Forum', 'bbpress' );
                                @endphp
                              </h3>
                            @endif


                        </legend>

                        @php do_action( 'bbp_theme_before_forum_form_notices' ); @endphp


                        @if ( ! bbp_is_forum_edit() && bbp_is_forum_closed() )


                            <div class="bbp-template-notice text-center pt-6">
                                <ul>
                                    <li class="text-xs">@php esc_html_e( 'This forum is closed to new content, however your posting capabilities still allow you to post.', 'bbpress' ); @endphp</li>
                                </ul>
                            </div>


                        @endif



                        @if ( current_user_can( 'unfiltered_html' ) )


                            <div class="bbp-template-notice text-center pt-6">
                                <ul>
                                    <li class="text-xs">@php esc_html_e( 'Your account has the ability to post unrestricted HTML content.', 'bbpress' ); @endphp</li>
                                </ul>
                            </div>


                        @endif


                        @php do_action( 'bbp_template_notices' ); @endphp

                        <div>

                            @php do_action( 'bbp_theme_before_forum_form_title' ); @endphp

                            <p>
                              <div class="relative border border-gray-300 rounded-md px-2 py-1.5 mt-2 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                <label for="bbp_forum_title" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php printf( esc_html__( 'Forum Name (Maximum Length: %d):', 'bbpress' ), bbp_get_title_max_length() ); @endphp</label><br/>
                                <input type="text" id="bbp_forum_title" value="@php bbp_form_forum_title(); @endphp"
                                       size="40" name="bbp_forum_title"
                                       class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                                       maxlength="@php bbp_title_max_length(); @endphp"/>
                              </div>
                            </p>

                            @php do_action( 'bbp_theme_after_forum_form_title' ); @endphp

                            @php do_action( 'bbp_theme_before_forum_form_content' ); @endphp

                            <div class="relative border border-gray-300 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                              @php bbp_the_content( array( 'context' => 'forum' ) ); @endphp
                            </div>

                            @php do_action( 'bbp_theme_after_forum_form_content' ); @endphp


                            @if ( ! ( bbp_use_wp_editor() || current_user_can( 'unfiltered_html' ) ) )


                                <p class="form-allowed-tags">
                                    <label>@php esc_html_e( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:','bbpress' ); @endphp</label><br/>
                                    <code>@php bbp_allowed_tags(); @endphp</code>
                                </p>


                            @endif



                            @if ( bbp_allow_forum_mods() && current_user_can( 'assign_moderators' ) )


                                @php do_action( 'bbp_theme_before_forum_form_mods' ); @endphp

                                <p>
                                  <div class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                    <label for="bbp_moderators" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Forum Moderators:', 'bbpress' ); @endphp</label><br/>
                                    <input type="text" value="@php bbp_form_forum_moderators(); @endphp" size="40"
                                            class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                                            name="bbp_moderators" id="bbp_moderators"/>
                                  </div>
                                </p>

                                @php do_action( 'bbp_theme_after_forum_form_mods' ); @endphp


                            @endif


                            @php do_action( 'bbp_theme_before_forum_form_type' ); @endphp

                            <p>
                              <div class="elative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                <label for="bbp_forum_type" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Forum Type:', 'bbpress' ); @endphp</label>
                                @php bbp_form_forum_type_dropdown(); @endphp
                              </div>
                            </p>

                            @php do_action( 'bbp_theme_after_forum_form_type' ); @endphp

                            @php do_action( 'bbp_theme_before_forum_form_status' ); @endphp

                            <p>
                              <div class="elative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                <label for="bbp_forum_status" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Status:', 'bbpress' ); @endphp</label>
                                @php bbp_form_forum_status_dropdown(); @endphp
                              </div>
                            </p>

                            @php do_action( 'bbp_theme_after_forum_form_status' ); @endphp

                            @php do_action( 'bbp_theme_before_forum_visibility_status' ); @endphp

                            <p>
                              <div class="elative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                <label for="bbp_forum_visibility" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Visibility:', 'bbpress' ); @endphp</label>
                                @php bbp_form_forum_visibility_dropdown(); @endphp
                              </div>
                            </p>

                            @php do_action( 'bbp_theme_after_forum_visibility_status' ); @endphp

                            @php do_action( 'bbp_theme_before_forum_form_parent' ); @endphp

                            <p>
                              <div class="elative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                <label for="bbp_forum_parent_id" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Parent Forum:', 'bbpress' ); @endphp</label><br/>

                                @php
                                    bbp_dropdown( array(
                                        'select_id' => 'bbp_forum_parent_id',
                                        'show_none' => esc_html__( '&mdash; No parent &mdash;', 'bbpress' ),
                                        'selected'  => bbp_get_form_forum_parent(),
                                        'exclude'   => bbp_get_forum_id()
                                    ) );
                                @endphp
                              </div>
                            </p>

                            @php do_action( 'bbp_theme_after_forum_form_parent' ); @endphp

                            @php do_action( 'bbp_theme_before_forum_form_submit_wrapper' ); @endphp

                            <div class="bbp-submit-wrapper border-t border-gray-100 flex justify-center lg:space-x-10 p-7 rounded-b-md">

                                @php do_action( 'bbp_theme_before_forum_form_submit_button' ); @endphp

                                <button type="submit" id="bbp_forum_submit" name="bbp_forum_submit"
                                        class="button submit text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-300">@php esc_html_e( 'Submit', 'bbpress' ); @endphp</button>

                                @php do_action( 'bbp_theme_after_forum_form_submit_button' ); @endphp

                            </div>

                            @php do_action( 'bbp_theme_after_forum_form_submit_wrapper' ); @endphp

                        </div>

                        @php bbp_forum_form_fields(); @endphp

                    </fieldset>

                    @php do_action( 'bbp_theme_after_forum_form' ); @endphp

                </form>
            </div>


        @elseif ( bbp_is_forum_closed() )


            <div id="no-forum-{{ bbp_forum_id() }}" class="bbp-no-forum max-w-2xl m-auto shadow-md rounded-md bg-white mt-10 border border-rose-100">
                <div class="bbp-template-notice text-center border-b border-gray-100 p-6">
                    <ul>
                        <li>@php printf( esc_html__( 'The forum &#8216;%s&#8217; is closed to new content.', 'bbpress' ), bbp_get_forum_title() ); @endphp</li>
                    </ul>
                </div>
            </div>


        @else


            <div id="no-forum-{{ bbp_forum_id() }}" class="bbp-no-forum max-w-2xl m-auto shadow-md rounded-md bg-white mt-10 border border-rose-100">
                <div class="bbp-template-notice text-center border-b border-gray-100 p-6">
                    <ul>
                        <li>@php is_user_logged_in()
					? esc_html_e( 'You cannot create new forums.',               'bbpress' )
					: esc_html_e( 'You must be logged in to create new forums.', 'bbpress' );
                            @endphp</li>
                    </ul>
                </div>
            </div>


        @endif



        @if ( bbp_is_forum_edit() )


    </div>


@endif
