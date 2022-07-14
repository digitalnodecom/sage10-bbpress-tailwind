{{-- New/Edit Reply --}}
@if ( bbp_is_reply_edit() )


    <div id="bbpress-forums" class="bbpress-wrapper">

        <div class="flex justify-center m-2 mt-16">
          @php bbp_breadcrumb(); @endphp
        </div>


        @endif



        @if ( bbp_current_user_can_access_create_reply_form() )


            <div id="new-reply-{{ bbp_topic_id() }}" class="bbp-reply-form max-w-2xl m-auto shadow-md rounded-md bg-white mt-10 border border-rose-100">

                <form id="new-post" name="new-post" method="post">

                    @php do_action( 'bbp_theme_before_reply_form' ); @endphp

                    <fieldset class="bbp-form">
                        <div class="text-center border-b border-gray-100 py-6">
                          <h3 class="font-bold text-xl">
                            @php printf( esc_html__( 'Reply To: %s', 'bbpress' ), ( bbp_get_form_reply_to() ) ? sprintf( esc_html__( 'Reply #%1$s in %2$s', 'bbpress' ), bbp_get_form_reply_to(), bbp_get_topic_title() ) : bbp_get_topic_title() ); @endphp
                          </h3>
                        </div>

                        @php do_action( 'bbp_theme_before_reply_form_notices' ); @endphp


                          @if ( ! bbp_is_topic_open() && ! bbp_is_reply_edit() )


                              <div class="bbp-template-notice text-center border-b border-gray-100 p-6">
                                  <ul>
                                      <li>@php esc_html_e( 'This topic is marked as closed to new replies, however your posting capabilities still allow you to reply.', 'bbpress' ); @endphp</li>
                                  </ul>
                              </div>


                          @endif



                          @if ( ! bbp_is_reply_edit() && bbp_is_forum_closed() )


                              <div class="bbp-template-notice text-center border-b border-gray-100 p-6">
                                  <ul>
                                      <li>@php esc_html_e( 'This forum is closed to new content, however your posting capabilities still allow you to post.', 'bbpress' ); @endphp</li>
                                  </ul>
                              </div>


                          @endif



                          @if ( current_user_can( 'unfiltered_html' ) )


                              <div class="bbp-template-notice text-center border-b border-gray-100 p-6">
                                  <ul>
                                      <li>@php esc_html_e( 'Your account has the ability to post unrestricted HTML content.', 'bbpress' ); @endphp</li>
                                  </ul>
                              </div>


                          @endif


                          @php do_action( 'bbp_template_notices' ); @endphp
                          <div class="p-10 space-y-7">

                              @php bbp_get_template_part( 'form', 'anonymous' ); @endphp

                              @php do_action( 'bbp_theme_before_reply_form_content' ); @endphp

                              <div class="relative border border-gray-300 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                @php bbp_the_content( array( 'context' => 'reply' ) ); @endphp
                              </div>

                              @php do_action( 'bbp_theme_after_reply_form_content' ); @endphp


                              @if ( ! ( bbp_use_wp_editor() || current_user_can( 'unfiltered_html' ) ) )


                                  <p class="form-allowed-tags">
                                      <label>@php esc_html_e( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:','bbpress' ); @endphp</label><br/>
                                      <code>@php bbp_allowed_tags(); @endphp</code>
                                  </p>


                              @endif



                              @if ( bbp_allow_topic_tags() && current_user_can( 'assign_topic_tags', bbp_get_topic_id() ) )


                                  @php do_action( 'bbp_theme_before_reply_form_tags' ); @endphp

                                  <div class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                      <label for="bbp_topic_tags" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Tags:', 'bbpress' ); @endphp</label>
                                      <input type="text" value="@php bbp_form_topic_tags(); @endphp" size="40"
                                            name="bbp_topic_tags"
                                            id="bbp_topic_tags"
                                            placeholder="Tags"
                                            class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                                            @php disabled( bbp_is_topic_spam() ); @endphp />
                                  </div>

                                  @php do_action( 'bbp_theme_after_reply_form_tags' ); @endphp


                              @endif



                              @if ( bbp_is_subscriptions_active() && ! bbp_is_anonymous() && ( ! bbp_is_reply_edit() || ( bbp_is_reply_edit() && ! bbp_is_reply_anonymous() ) ) )


                                  @php do_action( 'bbp_theme_before_reply_form_subscription' ); @endphp

                                  <div class="flex items-center justify-center">
                                    <div class="flex items-center text-center">
                                      <input name="bbp_topic_subscription" id="bbp_topic_subscription" type="checkbox"
                                            class="h-4 w-4 accent-rose-500 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"
                                            value="bbp_subscribe"@php bbp_form_topic_subscribed(); @endphp />


                                      @if ( bbp_is_reply_edit() && ( bbp_get_reply_author_id() !== bbp_get_current_user_id() ) )


                                          <label for="bbp_topic_subscription" class="ml-2 block text-gray-900 text-sm">@php esc_html_e( 'Notify the author of follow-up replies via email', 'bbpress' ); @endphp</label>


                                      @else


                                          <label for="bbp_topic_subscription" class="ml-2 block text-gray-900 text-sm">@php esc_html_e( 'Notify me of follow-up replies via email', 'bbpress' ); @endphp</label>


                                      @endif

                                    </div>

                                  </div>

                                  @php do_action( 'bbp_theme_after_reply_form_subscription' ); @endphp


                              @endif



                              @if ( bbp_is_reply_edit() )



                                  @if ( current_user_can( 'moderate', bbp_get_reply_id() ) )


                                      @php do_action( 'bbp_theme_before_reply_form_reply_to' ); @endphp

                                      <div class="form-reply-to relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                          <label for="bbp_reply_to" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Reply To:', 'bbpress' ); @endphp</label>
                                          @php bbp_reply_to_dropdown(); @endphp
                                      </div>

                                      @php do_action( 'bbp_theme_after_reply_form_reply_to' ); @endphp

                                      @php do_action( 'bbp_theme_before_reply_form_status' ); @endphp

                                      <div class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                          <label for="bbp_reply_status" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Reply Status:', 'bbpress' ); @endphp</label>
                                          @php bbp_form_reply_status_dropdown(); @endphp
                                      </div>

                                      @php do_action( 'bbp_theme_after_reply_form_status' ); @endphp


                                  @endif



                                  @if ( bbp_allow_revisions() )


                                      @php do_action( 'bbp_theme_before_reply_form_revisions' ); @endphp

                                      <fieldset>
                                        <div class="bbp-form flex items-center justify-center m-2">
                                          <legend class="flex items-center text-center">
                                              <input name="bbp_log_reply_edit" id="bbp_log_reply_edit" type="checkbox"
                                                    value="1"
                                                    class="h-4 w-4 accent-rose-500 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"
                                                    @php bbp_form_reply_log_edit(); @endphp />
                                              <label for="bbp_log_reply_edit" class="ml-2 block text-gray-900 text-sm">@php esc_html_e( 'Keep a log of this edit:', 'bbpress' ); @endphp</label><br/>
                                          </legend>
                                        </div>
                                          <div class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                              <label for="bbp_reply_edit_reason" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php printf( esc_html__( 'Optional reason for editing:', 'bbpress' ), bbp_get_current_user_name() ); @endphp</label>
                                              <input type="text" value="@php bbp_form_reply_edit_reason(); @endphp"
                                                    placeholder="Optional"
                                                    class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                                                    size="40" name="bbp_reply_edit_reason" id="bbp_reply_edit_reason"/>
                                          </div>
                                      </fieldset>

                                      @php do_action( 'bbp_theme_after_reply_form_revisions' ); @endphp


                                  @endif



                              @endif


                              @php do_action( 'bbp_theme_before_reply_form_submit_wrapper' ); @endphp

                              <div class="bbp-submit-wrapper border-t border-gray-100 flex justify-center lg:space-x-10 p-7 rounded-b-md">

                                  @php do_action( 'bbp_theme_before_reply_form_submit_button' ); @endphp

                                  @php bbp_cancel_reply_to_link(); @endphp

                                  <button type="submit" id="bbp_reply_submit" name="bbp_reply_submit"
                                          class="button submit text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-300">@php esc_html_e( 'Submit', 'bbpress' ); @endphp</button>

                                  @php do_action( 'bbp_theme_after_reply_form_submit_button' ); @endphp

                              </div>

                              @php do_action( 'bbp_theme_after_reply_form_submit_wrapper' ); @endphp

                          </div>

                          @php bbp_reply_form_fields(); @endphp

                      </fieldset>

                      @php do_action( 'bbp_theme_after_reply_form' ); @endphp
                </form>
            </div>


        @elseif ( bbp_is_topic_closed() )


            <div id="no-reply-{{ bbp_topic_id() }}" class="bbp-no-reply">
                <div class="bbp-template-notice">
                    <ul>
                        <li>@php printf( esc_html__( 'The topic &#8216;%s&#8217; is closed to new replies.', 'bbpress' ), bbp_get_topic_title() ); @endphp</li>
                    </ul>
                </div>
            </div>


        @elseif ( bbp_is_forum_closed( bbp_get_topic_forum_id() ) )


            <div id="no-reply-{{ bbp_topic_id() }}" class="bbp-no-reply">
                <div class="bbp-template-notice">
                    <ul>
                        <li>@php printf( esc_html__( 'The forum &#8216;%s&#8217; is closed to new topics and replies.', 'bbpress' ), bbp_get_forum_title( bbp_get_topic_forum_id() ) ); @endphp</li>
                    </ul>
                </div>
            </div>


        @else


            <div id="no-reply-{{ bbp_topic_id() }}" class="bbp-no-reply">
                <div class="bbp-template-notice">
                    <ul>
                        <li>@php is_user_logged_in()
          ? esc_html_e( 'You cannot reply to this topic.',               'bbpress' )
          : esc_html_e( 'You must be logged in to reply to this topic.', 'bbpress' );
                            @endphp</li>
                    </ul>
                </div>


                @if ( ! is_user_logged_in() )


                    @php bbp_get_template_part( 'form', 'user-login' ); @endphp


                @endif


            </div>


        @endif



        @if ( bbp_is_reply_edit() )


    </div>


@endif
