{{-- Move Reply --}}
<div id="bbpress-forums" class="bbpress-wrapper">

  <div class="flex justify-center m-2 mt-6 mb-4">
    @php bbp_breadcrumb(); @endphp
  </div>


  @if ( is_user_logged_in() && current_user_can( 'edit_topic', bbp_get_topic_id() ) )


      <div id="move-reply-{{ bbp_topic_id() }}" class="bbp-reply-move max-w-2xl m-auto shadow-md rounded-md bg-white mt-10 border border-rose-100">

          <form id="move_reply" name="move_reply" method="post">

              <fieldset class="bbp-form">

                  <legend class="text-center border-b border-gray-100 py-6 w-full">
                    <h3 class="font-bold text-xl">
                      @php printf( esc_html__( 'Move reply "%s"', 'bbpress' ), bbp_get_reply_title() ); @endphp
                    </h3>
                  </legend>

                  <div>

                      <div class="bbp-template-notice info text-center pt-6">
                          <ul>
                              <li class="text-xs">@php esc_html_e( 'You can either make this reply a new topic with a new title, or merge it into an existing topic.', 'bbpress' ); @endphp</li>
                          </ul>
                      </div>

                      <div class="bbp-template-notice text-center border-b border-gray-100 pb-6">
                          <ul>
                              <li class="text-xs">@php esc_html_e( 'If you choose an existing topic, replies will be ordered by the time and date they were created.', 'bbpress' ); @endphp</li>
                          </ul>
                      </div>

                      <fieldset class="bbp-form text-center m-4">
                          <legend class="">@php esc_html_e( 'Move Method', 'bbpress' ); @endphp</legend>

                          <div class="text-center mb-4">
                            <div class="flex items-center text-center">
                              <div class="flex items-center justify-center w-full">
                                <input name="bbp_reply_move_option" id="bbp_reply_move_option_reply" type="radio"
                                      checked="checked" value="topic"
                                      class="h-4 w-4 m-2 text-center accent-rose-500 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"
                                      />
                                <label for="bbp_reply_move_option_reply">@php printf( esc_html__( 'New topic in %s titled:', 'bbpress' ), bbp_get_forum_title( bbp_get_reply_forum_id( bbp_get_reply_id() ) ) ); @endphp</label>
                              </div>
                            </div>

                            <div class="relative border border-gray-300 rounded-md px-2 py-1.5 mt-2 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                              <label for="bbp_reply_move_destination_title" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Title:', 'bbpress' ); @endphp</label>
                              <input type="text" id="bbp_reply_move_destination_title"
                              value="@php printf( esc_html__( 'Moved: %s', 'bbpress' ), bbp_get_reply_title() ); @endphp"
                              class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                              size="35" name="bbp_reply_move_destination_title"
                              />
                            </div>

                          </div>


                          @if ( bbp_has_topics( array( 'show_stickies' => false, 'post_parent' => bbp_get_reply_forum_id( bbp_get_reply_id() ), 'post__not_in' => array( bbp_get_reply_topic_id( bbp_get_reply_id() ) ) ) ) )


                              <div>
                                <div class="flex justify-center items-center m-4">
                                  <input name="bbp_reply_move_option" id="bbp_reply_move_option_existing" type="radio"
                                        class="h-4 w-4 m-2 text-center accent-rose-500 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"
                                        value="existing"/>
                                  <label for="bbp_reply_move_option_existing">@php esc_html_e( 'Use an existing topic in this forum:', 'bbpress' ); @endphp</label>
                                </div>
                                <div class="form-reply-to relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                                  <label for="bbp_destination_topic" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Reply To:', 'bbpress' ); @endphp</label>
                                  @php
                                      bbp_dropdown( array(
                                          'post_type'   => bbp_get_topic_post_type(),
                                          'post_parent' => bbp_get_reply_forum_id( bbp_get_reply_id() ),
                                          'selected'    => -1,
                                          'exclude'     => bbp_get_reply_topic_id( bbp_get_reply_id() ),
                                          'select_id'   => 'bbp_destination_topic'
                                      ) );
                                  @endphp
                                </div>

                              </div>


                          @endif


                      </fieldset>

                      <div class="bbp-template-notice error text-center font-bold text-xl text-rose-600 uppercase mb-4" role="alert" tabindex="-1">
                          <ul>
                              <li>@php esc_html_e( 'This process ', 'bbpress' ); @endphp <span class="underline">@php esc_html_e( 'cannot', 'bbpress' ); @endphp</span> @php esc_html_e( ' be undone.', 'bbpress' ); @endphp</li>
                          </ul>
                      </div>

                      <div class="bbp-submit-wrapper border-t border-gray-100 flex justify-center lg:space-x-10 p-7 rounded-b-md">
                          <button type="submit" id="bbp_move_reply_submit" name="bbp_move_reply_submit"
                                  class="button submit text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-300">@php esc_html_e( 'Submit', 'bbpress' ); @endphp</button>
                      </div>
                  </div>

                  @php bbp_move_reply_form_fields(); @endphp

              </fieldset>
          </form>
      </div>


  @else


      <div id="no-reply-@php bbp_reply_id(); @endphp" class="bbp-no-reply">
          <div class="entry-content">@php is_user_logged_in()
      ? esc_html_e( 'You do not have permission to edit this reply.', 'bbpress' )
      : esc_html_e( 'You cannot edit this reply.',                    'bbpress' );
              @endphp</div>
      </div>


  @endif


</div>
