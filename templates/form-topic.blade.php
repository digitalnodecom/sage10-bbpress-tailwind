{{-- New/Edit Topic --}}

@if ( ! bbp_is_single_forum() )


    <div id="bbpress-forums" class="bbpress-wrapper">
      <div class="flex justify-center m-2 mt-6 mb-4">
        @php bbp_breadcrumb(); @endphp
      </div>

        @endif



        @if ( bbp_is_topic_edit() )


            @php bbp_topic_tag_list( bbp_get_topic_id() ); @endphp

            @php bbp_single_topic_description( array( 'topic_id' => bbp_get_topic_id() ) ); @endphp

            @php bbp_get_template_part( 'alert', 'topic-lock' ); @endphp


        @endif



        @if ( bbp_current_user_can_access_create_topic_form() )


            <div id="new-topic-{{ bbp_topic_id() }}" class="bbp-topic-form max-w-2xl m-auto shadow-md rounded-md bg-white mt-10 border border-rose-100">

                <form id="new-post" name="new-post" method="post">

                    @php do_action( 'bbp_theme_before_topic_form' ); @endphp

                    <fieldset class="bbp-form">

                        <legend class="text-center border-b border-gray-100 py-6 w-full">


                            @if ( bbp_is_topic_edit() )
                              <h3 class="font-bold text-xl">
                                @php
                                    printf( esc_html__( 'Now Editing &ldquo;%s&rdquo;', 'bbpress' ), bbp_get_topic_title() );
                                @endphp
                              </h3>
                            @else
                              <h3 class="font-bold text-xl">
                                @php
                                                            ( bbp_is_single_forum() && bbp_get_forum_title() )
                                ? printf( esc_html__( 'Create New Topic in &ldquo;%s&rdquo;', 'bbpress' ),
                                bbp_get_forum_title() )
                                : esc_html_e( 'Create New Topic', 'bbpress' );
                                @endphp
                              </h3>
                            @endif


                        </legend>

                        @php do_action( 'bbp_theme_before_topic_form_notices' ); @endphp


                        @if ( ! bbp_is_topic_edit() && bbp_is_forum_closed() )


                            <div class="bbp-template-notice text-center pt-6 p-4">
                                <ul>
                                    <li class="text-xs">@php esc_html_e( 'This forum is marked as closed to new topics, however your posting capabilities still allow you to create a topic.', 'bbpress' ); @endphp</li>
                                </ul>
                            </div>


                        @endif



                        @if ( current_user_can( 'unfiltered_html' ) )


                            <div class="bbp-template-notice text-center pt-6 p-4">
                                <ul>
                                    <li class="text-xs">@php esc_html_e( 'Your account has the ability to post unrestricted HTML content.', 'bbpress' ); @endphp</li>
                                </ul>
                            </div>


                        @endif


                        @php do_action( 'bbp_template_notices' ); @endphp

                        <div class="border-t py-6 space-y-5 px-4 mt-2">

                            @php bbp_get_template_part( 'form', 'anonymous' ); @endphp

                            @php do_action( 'bbp_theme_before_topic_form_title' ); @endphp

                            <p class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                <label for="bbp_topic_title" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php printf( esc_html__( 'Topic Title (Maximum Length: %d):', 'bbpress' ), bbp_get_title_max_length() ); @endphp</label>
                                <input type="text" id="bbp_topic_title" value="@php bbp_form_topic_title(); @endphp"
                                       size="40" name="bbp_topic_title"
                                       class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                                       maxlength="@php bbp_title_max_length(); @endphp"/>
                            </p>

                            @php do_action( 'bbp_theme_after_topic_form_title' ); @endphp

                            @php do_action( 'bbp_theme_before_topic_form_content' ); @endphp

                            <div class="relative border border-gray-300 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                              @php bbp_the_content( array( 'context' => 'topic' ) ); @endphp
                            </div>

                            @php do_action( 'bbp_theme_after_topic_form_content' ); @endphp


                            @if ( ! ( bbp_use_wp_editor() || current_user_can( 'unfiltered_html' ) ) )


                                <p class="form-allowed-tags text-center pt-6 p-4">
                                    <label>@php printf( esc_html__( 'You may use these %s tags and attributes:', 'bbpress' ), '<abbr title="HyperText Markup Language">HTML</abbr>' ); @endphp</label><br/>
                                    <code>@php bbp_allowed_tags(); @endphp</code>
                                </p>


                            @endif



                            @if ( bbp_allow_topic_tags() && current_user_can( 'assign_topic_tags', bbp_get_topic_id() ) )


                                @php do_action( 'bbp_theme_before_topic_form_tags' ); @endphp

                                <p class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                    <label for="bbp_topic_tags" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Topic Tags:', 'bbpress' ); @endphp</label>
                                    <input type="text" value="@php bbp_form_topic_tags(); @endphp" size="40"
                                           name="bbp_topic_tags"
                                           class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                                           id="bbp_topic_tags" @php disabled( bbp_is_topic_spam() ); @endphp />
                                </p>

                                @php do_action( 'bbp_theme_after_topic_form_tags' ); @endphp


                            @endif



                            @if ( ! bbp_is_single_forum() )


                                @php do_action( 'bbp_theme_before_topic_form_forum' ); @endphp

                                <p class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                    <label for="bbp_forum_id" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Forum:', 'bbpress' ); @endphp</label><br/>
                                    @php
                                        bbp_dropdown( array(
                                            'show_none' => esc_html__( '&mdash; No forum &mdash;', 'bbpress' ),
                                            'selected'  => bbp_get_form_topic_forum()
                                        ) );
                                    @endphp
                                </p>

                                @php do_action( 'bbp_theme_after_topic_form_forum' ); @endphp


                            @endif



                            @if ( current_user_can( 'moderate', bbp_get_topic_id() ) )


                                @php do_action( 'bbp_theme_before_topic_form_type' ); @endphp

                                <p class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">

                                    <label for="bbp_stick_topic" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Topic Type:', 'bbpress' ); @endphp</label>

                                    @php bbp_form_topic_type_dropdown(); @endphp

                                </p>

                                @php do_action( 'bbp_theme_after_topic_form_type' ); @endphp

                                @php do_action( 'bbp_theme_before_topic_form_status' ); @endphp

                                <p class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">

                                    <label for="bbp_topic_status" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Topic Status:', 'bbpress' ); @endphp</label>

                                    @php bbp_form_topic_status_dropdown(); @endphp

                                </p>

                                @php do_action( 'bbp_theme_after_topic_form_status' ); @endphp


                            @endif



                            @if ( bbp_is_subscriptions_active() && ! bbp_is_anonymous() && ( ! bbp_is_topic_edit() || ( bbp_is_topic_edit() && ! bbp_is_topic_anonymous() ) ) )


                                @php do_action( 'bbp_theme_before_topic_form_subscriptions' ); @endphp

                                <p>
                                  <div class="text-center mb-4">
                                    <div class="flex items-center text-center">
                                      <div class="flex items-center justify-center w-full">
                                        <input name="bbp_topic_subscription" id="bbp_topic_subscription" type="checkbox"
                                              class="h-4 w-4 m-2 text-center accent-rose-500 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"
                                              value="bbp_subscribe" @php bbp_form_topic_subscribed(); @endphp />


                                        @if ( bbp_is_topic_edit() && ( bbp_get_topic_author_id() !== bbp_get_current_user_id() ) )


                                            <label for="bbp_topic_subscription">@php esc_html_e( 'Notify the author of follow-up replies via email', 'bbpress' ); @endphp</label>


                                        @else


                                            <label for="bbp_topic_subscription">@php esc_html_e( 'Notify me of follow-up replies via email', 'bbpress' ); @endphp</label>


                                        @endif

                                      </div>
                                    </div>
                                  </div>
                                </p>

                                @php do_action( 'bbp_theme_after_topic_form_subscriptions' ); @endphp


                            @endif



                            @if ( bbp_allow_revisions() && bbp_is_topic_edit() )


                                @php do_action( 'bbp_theme_before_topic_form_revisions' ); @endphp

                                <fieldset class="bbp-form">
                                    <legend>
                                      <div class="text-center mb-4">
                                        <div class="flex items-center text-center">
                                          <div class="flex items-center justify-center w-full">

                                            <input name="bbp_log_topic_edit" id="bbp_log_topic_edit" type="checkbox"
                                                  class="h-4 w-4 m-2 text-center accent-rose-500 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"
                                                  value="1" @php bbp_form_topic_log_edit(); @endphp />
                                            <label for="bbp_log_topic_edit">@php esc_html_e( 'Keep a log of this edit:', 'bbpress' ); @endphp</label><br/>

                                          </div>
                                        </div>
                                      </div>
                                    </legend>

                                    <div class="relative border border-gray-300 rounded-md px-2 py-1.5 mt-2 mb-4 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                        <label for="bbp_topic_edit_reason" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php printf( esc_html__( 'Optional reason for editing:', 'bbpress' ), bbp_get_current_user_name() ); @endphp</label><br/>
                                        <input type="text" value="@php bbp_form_topic_edit_reason(); @endphp" size="40"
                                              class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                                              name="bbp_topic_edit_reason" id="bbp_topic_edit_reason"/>
                                    </div>
                                </fieldset>

                                @php do_action( 'bbp_theme_after_topic_form_revisions' ); @endphp


                            @endif


                            @php do_action( 'bbp_theme_before_topic_form_submit_wrapper' ); @endphp

                            <div class="bbp-submit-wrapper border-t border-gray-100 flex justify-center lg:space-x-10 p-7 rounded-b-md">

                                @php do_action( 'bbp_theme_before_topic_form_submit_button' ); @endphp

                                <button type="submit" id="bbp_topic_submit" name="bbp_topic_submit"
                                        class="button submit text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-300">@php esc_html_e( 'Submit', 'bbpress' ); @endphp</button>

                                @php do_action( 'bbp_theme_after_topic_form_submit_button' ); @endphp

                            </div>

                            @php do_action( 'bbp_theme_after_topic_form_submit_wrapper' ); @endphp

                        </div>

                        @php bbp_topic_form_fields(); @endphp

                    </fieldset>

                    @php do_action( 'bbp_theme_after_topic_form' ); @endphp

                </form>
            </div>


        @elseif ( bbp_is_forum_closed() )


            <div id="forum-closed-{{ bbp_forum_id() }}" class="bbp-forum-closed max-w-2xl m-auto shadow-md rounded-md bg-white mt-10 border border-rose-100">
                <div class="bbp-template-notice text-center border-b border-gray-100 py-6 w-full">
                    <ul>
                        <li class="text-gray-400">@php printf( esc_html__( 'The forum &#8216;%s&#8217; is closed to new topics and replies.', 'bbpress' ), bbp_get_forum_title() ); @endphp</li>
                    </ul>
                </div>
            </div>


        @else


            <div id="no-topic-{{ bbp_forum_id() }}" class="bbp-no-topic max-w-2xl m-auto shadow-md rounded-md bg-white mt-10 border border-rose-100">
                <div class="bbp-template-notice text-center border-b border-gray-100 py-6 w-full">
                    <ul>
                        <li class="text-gray">@php is_user_logged_in()
					? esc_html_e( 'You cannot create new topics.',               'bbpress' )
					: esc_html_e( 'You must be logged in to create new topics.', 'bbpress' );
                            @endphp</li>
                    </ul>
                </div>


                @if ( ! is_user_logged_in() )


                    @php bbp_get_template_part( 'form', 'user-login' ); @endphp


                @endif


            </div>


        @endif



        @if ( ! bbp_is_single_forum() )


    </div>


@endif
