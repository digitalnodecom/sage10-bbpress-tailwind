{{-- User Profile --}}

    @php( do_action( 'bbp_template_before_user_profile' ) )
      <section aria-labelledby="user-information">
        <div id="bbp-user-profile" class="bbp-user-profile bg-white shadow sm:rounded-lg">
          <div class="px-4 py-5 sm:px-6">
            <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900">User Information</h2>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">User details and statistics</p>
          </div>
          <div class="border-t border-gray-200 px-4 py-5 sm:px-6">

              <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="col-span-2 text-center md:text-left">
                  <dt class="text-sm font-medium text-gray-500 text-lg">Email</dt>
                  <dd class="entry-title text-xl">@php(bbp_displayed_user_field( 'user_email' ))</dd>
                </div>

              </dl>

              <div class="bbp-user-section">
                  <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2 mt-10">
                    {{-- HEADING --}}
                    <div class="col-span-2 border-b text-center">
                      <div></div>
                    </div>

                    <div class="col-span-2 text-center md:col-span-1 md:text-left">
                      <dt class="text-sm font-medium text-gray-500">Registered</dt>
                      <dd class="bbp-user-forum-role">@php(printf(bbp_get_time_since( bbp_get_displayed_user_field( 'user_registered' ) )))</dd>
                    </div>


                    @if ( bbp_get_displayed_user_field( 'description' ) )

                      <div class="col-span-2 text-center md:col-span-1 md:text-left">
                        <dt class="text-sm font-medium text-gray-500">Description</dt>
                        <dd class="bbp-user-description">{!! bbp_rel_nofollow( bbp_get_displayed_user_field( 'description' ) ) !!}</dd>
                      </div>

                    @endif



                    @if ( bbp_get_displayed_user_field( 'user_url' ) )

                      <div class="col-span-2 text-center md:col-span-1 md:text-left">
                        <dt class="text-sm font-medium text-gray-500">Website</dt>
                        <dd class="bbp-user-website">{!! bbp_rel_nofollow( bbp_make_clickable( bbp_get_displayed_user_field( 'user_url' ) ) ) !!}</dd>
                      </div>

                    @endif

                    {{-- HEADING --}}
                    <div class="col-span-2 border-b text-center mt-2">
                      <div></div>
                    </div>


                    @if ( bbp_get_user_last_posted() )

                      <div class="col-span-2 text-center md:col-span-1 md:text-left">
                        <dt class="text-sm font-medium text-gray-500">Last Activity</dt>
                        <dd class="bbp-user-last-activity">{!! bbp_get_time_since( bbp_get_user_last_posted(), false, true ) !!}</dd>
                      </div>

                    @endif

                    <div class="col-span-2 text-center md:col-span-1 md:text-left">
                      <dt class="text-sm font-medium text-gray-500">Topics Started</dt>
                      <dd class="bbp-user-last-activity">{{ bbp_get_user_topic_count() }}</dd>
                    </div>

                    <div class="col-span-2 text-center md:col-span-1 md:text-left">
                      <dt class="text-sm font-medium text-gray-500">Replies Created</dt>
                      <dd class="bbp-user-last-activity">{{ bbp_get_user_reply_count() }}</dd>
                    </div>

                    <div class="col-span-2 text-center md:col-span-1 md:text-left">
                      <dt class="text-sm font-medium text-gray-500">Forum Role</dt>
                      <dd class="bbp-user-last-activity">{{ bbp_get_user_display_role() }}</dd>
                    </div>
                  </dl>
                </div>
            </div>
        </div><!-- #bbp-author-topics-started -->
      </section>
    @php (do_action( 'bbp_template_after_user_profile' ))
  </div> {{-- CLOSING DIV FROM PREVIOUS --}}
</div>  {{-- CLOSING DIV FROM PREVIOUS --}}
