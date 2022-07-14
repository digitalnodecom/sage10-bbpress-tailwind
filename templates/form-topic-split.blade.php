{{-- Split Topic --}}
<div id="bbpress-forums" class="bbpress-wrapper">

  <div class="flex justify-center m-2 mt-6 mb-4">
    @php bbp_breadcrumb(); @endphp
  </div>


  @if ( is_user_logged_in() && current_user_can( 'edit_topic', bbp_get_topic_id() ) )


      <div id="split-topic-{{ bbp_topic_id() }}" class="bbp-topic-split max-w-2xl m-auto shadow-md rounded-md bg-white mt-10 border border-rose-100">

          <form id="split_topic" name="split_topic" method="post">

              <fieldset class="bbp-form">

                  <legend class="text-center border-b border-gray-100 py-6 w-full">
                    <h3 class="font-bold text-xl">
                      @php printf( esc_html__( 'Split topic "%s"', 'bbpress' ), bbp_get_topic_title() ); @endphp
                    </h3>
                  </legend>

                  <div>

                      <div class="bbp-template-notice info text-center pt-6 p-4">
                          <ul>
                              <li class="text-xs">@php esc_html_e( 'When you split a topic, you are slicing it in half starting with the reply you just selected. Choose to use that reply as a new topic with a new title, or merge those replies into an existing topic.', 'bbpress' ); @endphp</li>
                          </ul>
                      </div>

                      <div class="bbp-template-notice text-center border-b border-gray-100 pb-6 p-4">
                          <ul>
                              <li class="text-xs">@php esc_html_e( 'If you use the existing topic option, replies within both topics will be merged chronologically. The order of the merged replies is based on the time and date they were posted.', 'bbpress' ); @endphp</li>
                          </ul>
                      </div>

                      <fieldset class="bbp-form text-center m-4">
                        {{-- <legend class="text-center mt-4 border-b border-t border-gray-100 py-4 w-full">
                            <h3 class="font-bold text-xl"> --}}
                          <legend class="text-center mt-4 border-b border-gray-100 pb-4 w-full">
                            <h3 class="font-bold text-xl">
                              @php esc_html_e( 'Split Method', 'bbpress' ); @endphp
                            </h3>
                          </legend>

                          <div class="text-center mb-4">
                            <div class="flex items-center text-center">
                              <div class="flex items-center justify-center w-full">

                                <input name="bbp_topic_split_option" id="bbp_topic_split_option_reply" type="radio"
                                      class="h-4 w-4 m-2 text-center accent-rose-500 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"
                                      checked="checked" value="reply"/>
                                <label for="bbp_topic_split_option_reply">@php printf( esc_html__( 'New topic in %s titled:', 'bbpress' ), bbp_get_forum_title( bbp_get_topic_forum_id( bbp_get_topic_id() ) ) ); @endphp</label>

                              </div>
                            </div>
                          </div>

                          <div class="relative border border-gray-300 rounded-md px-2 py-1.5 mt-2 mb-4 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                            <label for="bbp_topic_split_destination_title" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Title:', 'bbpress' ); @endphp</label>
                            <input type="text" id="bbp_topic_split_destination_title"
                                   value="@php printf( esc_html__( 'Split: %s', 'bbpress' ), bbp_get_topic_title() ); @endphp"
                                   class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                                   size="35" name="bbp_topic_split_destination_title"/>
                          </div>


                          @if ( bbp_has_topics( array( 'show_stickies' => false, 'post_parent' => bbp_get_topic_forum_id( bbp_get_topic_id() ), 'post__not_in' => array( bbp_get_topic_id() ) ) ) )


                              <div>
                                <div class="text-center mb-4">
                                  <div class="flex items-center text-center">
                                    <div class="flex items-center justify-center w-full">

                                      <input name="bbp_topic_split_option" id="bbp_topic_split_option_existing"
                                            class="h-4 w-4 m-2 text-center accent-rose-500 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"
                                            type="radio" value="existing"/>
                                      <label for="bbp_topic_split_option_existing">@php esc_html_e( 'Use an existing topic in this forum:', 'bbpress' ); @endphp</label>

                                    </div>
                                  </div>
                                </div>

                                <div class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                  <label for="bbp_destination_topic" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Topic:', 'bbpress' ); @endphp</label>
                                  @php
                                      bbp_dropdown( array(
                                          'post_type'   => bbp_get_topic_post_type(),
                                          'post_parent' => bbp_get_topic_forum_id( bbp_get_topic_id() ),
                                          'post_status' => bbp_get_public_topic_statuses(),
                                          'selected'    => -1,
                                          'exclude'     => bbp_get_topic_id(),
                                          'select_id'   => 'bbp_destination_topic'
                                      ) );
                                  @endphp

                                </div>

                              </div>


                          @endif


                      </fieldset>

                      <fieldset class="bbp-form mt-6 mx-2">

                          <legend class="text-center mt-4 border-b border-gray-100 py-4 w-full">
                            <h3 class="font-bold text-xl">
                              @php esc_html_e( 'Topic Extras', 'bbpress' ); @endphp
                            </h3>
                          </legend>

                          <div class="mx-2 my-4">
                            <div class="text-center mb-4 flex justify-center">

                              <div class="checkboxes">

                                <div class="flex items-center text-center">
                                  <div class="flex items-center justify-start w-full">

                                      @if ( bbp_is_subscriptions_active() )


                                          <input name="bbp_topic_subscribers" id="bbp_topic_subscribers" type="checkbox"
                                                class="h-4 w-4 m-2 text-center accent-rose-500 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"
                                                value="1" checked="checked"/>
                                          <label for="bbp_topic_subscribers">@php esc_html_e( 'Copy subscribers to the new topic', 'bbpress' ); @endphp</label>
                                          <br/>


                                      @endif

                                  </div>
                                </div>

                                  <div class="flex items-center text-left">
                                    <div class="flex items-center justify-start w-full">

                                      <input name="bbp_topic_favoriters" id="bbp_topic_favoriters" type="checkbox" value="1"
                                            class="h-4 w-4 m-2 text-center accent-rose-500 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"
                                            checked="checked"/>
                                      <label for="bbp_topic_favoriters">@php esc_html_e( 'Copy favoriters to the new topic', 'bbpress' ); @endphp</label><br/>

                                    </div>
                                  </div>

                                  <div class="flex items-center text-left">
                                    <div class="flex items-center justify-start w-full">
                                      @if ( bbp_allow_topic_tags() )


                                          <input name="bbp_topic_tags" id="bbp_topic_tags" type="checkbox" value="1"
                                                class="h-4 w-4 m-2 text-center accent-rose-500 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"
                                                checked="checked"/>
                                          <label for="bbp_topic_tags">@php esc_html_e( 'Copy topic tags to the new topic', 'bbpress' ); @endphp</label>
                                          <br/>


                                      @endif
                                    </div>
                                  </div>

                              </div>
                            </div>
                          </div>
                      </fieldset>

                      <div class="bbp-template-notice error text-center font-bold text-xl text-rose-600 uppercase mb-4" role="alert" tabindex="-1">
                          <ul>
                              {{-- <li>@php esc_html_e( 'This process cannot be undone.', 'bbpress' ); @endphp</li> --}}
                              <li>@php esc_html_e( 'This process ', 'bbpress' ); @endphp <span class="underline">@php esc_html_e( 'cannot', 'bbpress' ); @endphp</span> @php esc_html_e( ' be undone.', 'bbpress' ); @endphp</li>
                          </ul>
                      </div>

                      <div class="bbp-submit-wrapper border-t border-gray-100 flex justify-center lg:space-x-10 p-7 rounded-b-md">
                          <button type="submit" id="bbp_merge_topic_submit" name="bbp_merge_topic_submit"
                                  class="button submit text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-300">@php esc_html_e( 'Submit', 'bbpress' ); @endphp</button>
                      </div>
                  </div>

                  @php bbp_split_topic_form_fields(); @endphp

              </fieldset>
          </form>
      </div>


  @else


      <div id="no-topic-{{ bbp_topic_id() }}" class="bbp-no-topic max-w-2xl m-auto shadow-md rounded-md bg-white mt-10 border border-rose-100">
          <div class="entry-content w-full text-center text-3xl text-rose-600 m-4 p-2">@php is_user_logged_in()
      ? esc_html_e( 'You do not have permission to edit this topic.', 'bbpress' )
      : esc_html_e( 'You cannot edit this topic.',                    'bbpress' );
              @endphp</div>
      </div>


  @endif


</div>
