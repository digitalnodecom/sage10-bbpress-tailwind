{{-- User Subscriptions --}}
    @php( do_action( 'bbp_template_before_user_subscriptions' ) )

      @if ( bbp_is_subscriptions_active() )



          @if ( bbp_is_user_home() || current_user_can( 'edit_user', bbp_get_displayed_user_id() ) )


              <div id="bbp-user-subscriptions" class="bbp-user-subscriptions">

                  @php(bbp_get_template_part( 'form', 'topic-search' ))

                  <div class="text-center">
                    <h2 class="entry-title capitalize text-xl text-gray-400">@php(esc_html_e( 'Subscribed Forums', 'bbpress' ))</h2>
                  </div>

                  <div class="bbp-user-section">


                      @if ( bbp_get_user_forum_subscriptions() )


                          @php (bbp_get_template_part( 'loop', 'forums' ))


                      @else

                        <div class="h-28 flex items-center justify-center">
                          @php (bbp_get_template_part( 'feedback', 'no-forums' ))
                        </div>


                      @endif


                  </div>

                  <div class="text-center">
                    <h2 class="entry-title capitalize text-xl text-gray-400">@php(esc_html_e( 'Subscribed Topics', 'bbpress' ))</h2>
                  </div>

                  <div class="bbp-user-section">


                      @if ( bbp_get_user_topic_subscriptions() )


                        <div class="text-center m-2 mb-6">
                          @php (bbp_get_template_part( 'pagination', 'topics' ))
                        </div>

                        <div>
                          @php( bbp_get_template_part( 'loop',       'topics' ))
                        </div>

                        <div class="text-center m-2 mb-6">
                          @php (bbp_get_template_part( 'pagination', 'topics' ))
                        </div>


                      @else


                        <div class="h-28 flex items-center justify-center">
                          @php (bbp_get_template_part( 'feedback', 'no-topics' ))
                        </div>


                      @endif


                  </div>
              </div><!-- #bbp-user-subscriptions -->


          @endif



      @endif


    @php(do_action( 'bbp_template_after_user_subscriptions' ))
  </div>   {{-- CLOSING DIV FROM PREVIOUS --}}
</div>   {{-- CLOSING DIV FROM PREVIOUS --}}
