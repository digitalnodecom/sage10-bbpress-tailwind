{{-- Anonymous User --}}

@if ( bbp_current_user_can_access_anonymous_user_form() )


    @php do_action( 'bbp_theme_before_anonymous_form' ); @endphp

    <fieldset class="bbp-form">
        <legend class="text-center border-b border-gray-100 py-6 w-full">
          <h3 class="font-bold text-xs">
            <?php  (bbp_is_topic_edit() || bbp_is_reply_edit())
              ? esc_html_e( 'Author Information', 'bbpress' ) :
                esc_html_e( 'Your information:', 'bbpress' ); ?>
          </h3>
        </legend>

        @php do_action( 'bbp_theme_anonymous_form_extras_top' ); @endphp

        <p>
          <div class="relative border border-gray-300 rounded-md px-2 py-1.5 mt-2 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
            <label for="bbp_anonymous_author" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Name (required):', 'bbpress' ); @endphp</label><br/>
            <input type="text" id="bbp_anonymous_author" value="@php bbp_author_display_name(); @endphp" size="40"
                  class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                  maxlength="100" name="bbp_anonymous_name" autocomplete="off"/>
          </div>
        </p>

        <p>
          <div class="relative border border-gray-300 rounded-md px-2 py-1.5 mt-2 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
            <label for="bbp_anonymous_email" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Mail (will not be published) (required):', 'bbpress' ); @endphp</label><br/>
            <input type="text" id="bbp_anonymous_email" value="@php bbp_author_email(); @endphp" size="40"
                  class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                   maxlength="100" name="bbp_anonymous_email"/>
          </div>
        </p>

        <p>
          <div class="relative border border-gray-300 rounded-md px-2 py-1.5 mt-2 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
            <label for="bbp_anonymous_website" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Website:', 'bbpress' ); @endphp</label><br/>
            <input type="text" id="bbp_anonymous_website" value="@php bbp_author_url(); @endphp" size="40"
                  class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                  maxlength="200" name="bbp_anonymous_website"/>
          </div>
        </p>

        @php do_action( 'bbp_theme_anonymous_form_extras_bottom' ); @endphp

    </fieldset>

    @php do_action( 'bbp_theme_after_anonymous_form' ); @endphp


@endif
