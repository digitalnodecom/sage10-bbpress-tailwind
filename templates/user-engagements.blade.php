{{-- User Engagements --}}

    @php( do_action( 'bbp_template_before_user_engagements' ) )

      <div id="bbp-user-engagements" class="bbp-user-engagements">

          @php (bbp_get_template_part( 'form', 'topic-search' ))

          <div class="text-center">
            <h2 class="entry-title capitalize text-xl text-gray-400">@php(esc_html_e( 'Topics Engaged In', 'bbpress' ))</h2>
          </div>

          <div class="bbp-user-section">


              @if ( bbp_get_user_engagements() )

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

                <div class="h-56 flex items-center justify-center">
                  @php (bbp_get_template_part( 'feedback', 'no-topics' ))
                </div>

              @endif


          </div>
      </div><!-- #bbp-user-engagements -->

    @php(do_action( 'bbp_template_after_user_engagements' ))
  </div>   {{-- CLOSING DIV FROM PREVIOUS --}}
</div>   {{-- CLOSING DIV FROM PREVIOUS --}}
