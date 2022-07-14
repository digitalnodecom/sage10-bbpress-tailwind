{{-- User Password Generator --}}

@if ( apply_filters( 'show_password_fields', true, bbpress()->displayed_user ) )


    <div id="password">
      <div class="user-pass1-wrap relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
        <label for="user_login" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Password', 'bbpress' ); @endphp</label>
        <span class="password-input-wrapper">
          <input type="password" name="pass1" id="pass1" class="regular-text border-y text-center my-4 block w-full px-2 py-2 placeholder-gray-400 focus:outline-none focus:ring-0 sm:text-sm" value="" autocomplete="off"
                       data-pw="{!! esc_attr( wp_generate_password( 24 ) ) !!}" aria-describedby="pass-strength-result"/>
        </span>

        <button type="button"
                class="button wp-generate-pw hide-if-no-js mb-4 text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-300">@php esc_html_e( 'Generate Password', 'bbpress' ); @endphp</button>

        <fieldset class="bbp-form password wp-pwd hide-if-js">

          <span class="password-button-wrapper space-x-2 border-y p-2">
            <button type="button" class="button wp-hide-pw hide-if-no-js hover:bg-gray-100 rounded p-1 px-2 transition" data-toggle="0"
                          aria-label="@php esc_attr_e( 'Hide password', 'bbpress' ); @endphp">
              <span class="dashicons dashicons-hidden text-blue-600 mt-0.5"></span>
              <span class="text">@php esc_html_e( 'Hide', 'bbpress' ); @endphp</span>
            </button>

            <button type="button" class="button wp-cancel-pw hide-if-no-js hover:bg-gray-100 rounded p-1 px-2 transition" data-toggle="0"
                                  aria-label="@php esc_attr_e( 'Cancel password change', 'bbpress' ); @endphp">
              <span class="dashicons dashicons-no text-rose-600 mt-0.5"></span>
              <span class="text">@php esc_html_e( 'Cancel', 'bbpress' ); @endphp</span>
            </button>
          </span>

          <div style="display:none" id="pass-strength-result" aria-live="polite" class="my-6 m-2 border-y"></div>

        </fieldset>

          <div class="user-pass2-wrap hide-if-js">
              <label for="pass2">@php esc_html_e( 'Repeat New Password', 'bbpress' ); @endphp</label>
              <input name="pass2" type="password" id="pass2" class="regular-text" value="" autocomplete="off"/>
              <p class="description">@php esc_html_e( 'Type your new password again.', 'bbpress' ); @endphp</p>
          </div>

          <div class="pw-weak">

            <div class="text-center mb-4">
              <div class="flex items-center text-center">
                <div class="flex items-center justify-center w-full">
                  <input type="checkbox" name="pw_weak" class="pw-checkbox checkbox h-4 w-4 m-2 text-center accent-rose-500 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"/>
                  <label for="pw_weak">@php esc_html_e( 'Confirm', 'bbpress' ); @endphp</label>
                </div>
              </div>
            </div>

            <p class="description indicator-hint text-gray-400">{!! wp_get_password_hint() !!}</p>

          </div>
      </div>
    </div>



@endif
