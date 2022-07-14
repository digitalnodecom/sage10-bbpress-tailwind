{{-- Merge Topic --}}
<div id="bbpress-forums" class="bbpress-wrapper">

  <div class="flex justify-center m-2 mt-6 mb-4">
    @php bbp_breadcrumb(); @endphp
  </div>

  @if ( is_user_logged_in() && current_user_can( 'edit_topic', bbp_get_topic_id() ) )


      <div id="merge-topic-{{ bbp_topic_id() }}" class="bbp-topic-merge max-w-2xl m-auto shadow-md rounded-md bg-white mt-10 border border-rose-100">

          <form id="merge_topic" name="merge_topic" method="post">

              <fieldset class="bbp-form">

                  <legend class="text-center border-b border-gray-100 py-6 w-full">
                    <h3 class="font-bold text-xl">
                      @php printf( esc_html__( 'Merge topic "%s"', 'bbpress' ), bbp_get_topic_title() ); @endphp
                    </h3>
                  </legend>

                  <div>

                      <div class="bbp-template-notice info text-center pt-6 p-4">
                          <ul>
                              <li class="text-xs">@php esc_html_e( 'Select the topic to merge this one into. The destination topic will remain the lead topic, and this one will change into a reply.', 'bbpress' ); @endphp</li>
                              <li class="text-xs">@php esc_html_e( 'To keep this topic as the lead, go to the other topic and use the merge tool from there instead.',                                  'bbpress' ); @endphp</li>
                          </ul>
                      </div>

                      <div class="bbp-template-notice text-center pt-6 p-4">
                          <ul>
                              <li class="text-xs">@php esc_html_e( 'Replies to both topics are merged chronologically, ordered by the time and date they were published. Topics may be updated to a 1 second difference to maintain chronological order based on the merge direction.', 'bbpress' ); @endphp</li>
                          </ul>
                      </div>

                      <fieldset class="bbp-form">
                          <legend class="text-center border-b border-gray-100 py-6 w-full">
                            <h3 class="font-bold text-xl">
                              @php esc_html_e( 'Destination', 'bbpress' ); @endphp
                            </h3>
                          </legend>

                          <div class="text-center w-full mx-4 my-6">

                              @if ( bbp_has_topics( array( 'show_stickies' => false, 'post_parent' => bbp_get_topic_forum_id( bbp_get_topic_id() ), 'post__not_in' => array( bbp_get_topic_id() ) ) ) )

                                <div class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                  <label for="bbp_destination_topic" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Merge with this topic:', 'bbpress' ); @endphp</label>

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

                              @else


                                  <label class="text-md text-rose-600">@php esc_html_e( 'There are no other topics in this forum to merge with.', 'bbpress' ); @endphp</label>


                              @endif


                          </div>

                      </fieldset>

                      <fieldset class="bbp-form">
                          <legend class="text-center border-b border-gray-100 py-6 w-full">
                            <h3 class="font-bold text-xl">
                              @php esc_html_e( 'Topic Extras', 'bbpress' ); @endphp
                            </h3>
                          </legend>

                          <div class="checkboxes">


                              @if ( bbp_is_subscriptions_active() )

                                <div class="text-center mb-4">
                                  <div class="flex items-center text-center">
                                    <div class="flex items-center justify-center w-full">

                                      <input name="bbp_topic_subscribers" id="bbp_topic_subscribers" type="checkbox"
                                              class="h-4 w-4 m-2 text-center accent-rose-500 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"
                                              value="1" checked="checked"/>
                                      <label for="bbp_topic_subscribers">@php esc_html_e( 'Merge topic subscribers', 'bbpress' ); @endphp</label>

                                    </div>
                                  </div>
                                </div>


                              @endif

                              <div class="text-center mb-4">
                                <div class="flex items-center text-center">
                                  <div class="flex items-center justify-center w-full">

                                    <input name="bbp_topic_favoriters" id="bbp_topic_favoriters" type="checkbox" value="1"
                                            class="h-4 w-4 m-2 text-center accent-rose-500 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"
                                            checked="checked"/>
                                    <label for="bbp_topic_favoriters">@php esc_html_e( 'Merge topic favoriters', 'bbpress' ); @endphp</label>

                                  </div>
                                </div>
                              </div>

                              @if ( bbp_allow_topic_tags() )

                              <div class="text-center mb-4">
                                <div class="flex items-center text-center">
                                  <div class="flex items-center justify-center w-full">

                                      <input name="bbp_topic_tags" id="bbp_topic_tags" type="checkbox" value="1"
                                      class="h-4 w-4 m-2 text-center accent-rose-500 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"
                                            checked="checked"/>
                                      <label for="bbp_topic_tags">@php esc_html_e( 'Merge topic tags', 'bbpress' ); @endphp</label>

                                  </div>
                                </div>
                              </div>

                              @endif


                          </div>
                      </fieldset>

                      <div class="bbp-template-notice error text-center font-bold text-xl text-rose-600 uppercase mb-4">
                          <ul>
                            <li>@php esc_html_e( 'This process ', 'bbpress' ); @endphp <span class="underline">@php esc_html_e( 'cannot', 'bbpress' ); @endphp</span> @php esc_html_e( ' be undone.', 'bbpress' ); @endphp</li>
                          </ul>
                      </div>

                      <div class="bbp-submit-wrapper border-t border-gray-100 flex justify-center lg:space-x-10 p-7 rounded-b-md">
                          <button type="submit" id="bbp_merge_topic_submit" name="bbp_merge_topic_submit"
                                  class="button submit text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-300">@php esc_html_e( 'Submit', 'bbpress' ); @endphp</button>
                      </div>
                  </div>

                  @php bbp_merge_topic_form_fields(); @endphp

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
