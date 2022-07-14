{{-- User Replies Created --}}
    @php( do_action( 'bbp_template_before_user_replies' ) )

      <div id="bbp-user-replies-created" class="bbp-user-replies-created">

          @php (bbp_get_template_part( 'form', 'reply-search' ))

          <div class="text-center">
            <h2 class="entry-title capitalize text-xl text-gray-400">@php (esc_html_e( 'Forum Replies Created', 'bbpress' ))</h2>
          </div>

          <div class="bbp-user-section">


              @if ( bbp_get_user_replies_created() )

                <div class="text-center m-2 mb-6">
                  @php (bbp_get_template_part( 'pagination', 'replies' ))
                </div>

                <div>
                  @php (bbp_get_template_part( 'loop',       'replies' ))
                </div>

                <div class="text-center m-2 mb-6">
                  @php (bbp_get_template_part( 'pagination', 'replies' ))
                </div>


              @else

                <div class="h-56 flex items-center justify-center">
                  @php (bbp_get_template_part( 'feedback', 'no-replies' ))
                </div>

              @endif


          </div>
      </div><!-- #bbp-user-replies-created -->

    @php (do_action( 'bbp_template_after_user_replies' ))
  </div>   {{-- CLOSING DIV FROM PREVIOUS --}}
</div>   {{-- CLOSING DIV FROM PREVIOUS --}}
