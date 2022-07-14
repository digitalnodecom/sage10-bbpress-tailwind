{{-- User Login Form --}}
<div class="max-w-2xl m-auto shadow-md rounded-md bg-white mt-10 border border-rose-100">
  <form method="post" action="@php bbp_wp_login_action( array( 'context' => 'login_post' ) ); @endphp"
    class="bbp-login-form">

    <fieldset class="bbp-form">
        <legend class="text-center border-b border-gray-100 py-6 w-full">
          <h3 class="font-bold text-xl">
            @php esc_html_e( 'Log In', 'bbpress' ); @endphp
          </h3>
        </legend>

        <div class="bbp-username relative border border-gray-300 rounded-md px-2 py-1.5 mt-2 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
            <label for="user_login" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Username', 'bbpress' ); @endphp: </label>
            <input type="text" name="log" value="@php bbp_sanitize_val( 'user_login', 'text' ); @endphp" size="20"
                  class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                  maxlength="100" id="user_login" autocomplete="off"/>
        </div>

        <div class="bbp-password relative border border-gray-300 rounded-md px-2 py-1.5 mt-2 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
            <label for="user_pass" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Password', 'bbpress' ); @endphp: </label>
            <input type="password" name="pwd" value="@php bbp_sanitize_val( 'user_pass', 'password' ); @endphp"
                  class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                  size="20" id="user_pass" autocomplete="off"/>
        </div>

        <div class="bbp-remember-me text-center mb-4">
          <div class="flex items-center text-center">
            <div class="flex items-center justify-center w-full">

              <input type="checkbox" name="rememberme" value="forever"
                    class="h-4 w-4 m-2 text-center accent-rose-500 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"
                    @php checked( bbp_get_sanitize_val( 'rememberme', 'checkbox' ) ); @endphp id="rememberme"/>
              <label for="rememberme">@php esc_html_e( 'Keep me signed in', 'bbpress' ); @endphp</label>

            </div>
          </div>
        </div>

        @php do_action( 'login_form' ); @endphp

        <div class="bbp-submit-wrapper border-t border-gray-100 flex justify-center lg:space-x-10 p-7 rounded-b-md">

            <button type="submit" name="user-submit" id="user-submit"
                    class="button submit user-submit text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-300">@php esc_html_e( 'Log In', 'bbpress' ); @endphp</button>

            @php bbp_user_login_fields(); @endphp

        </div>
    </fieldset>
  </form>
</div>
