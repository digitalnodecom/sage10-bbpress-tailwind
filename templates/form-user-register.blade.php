{{-- User Registration Form --}}
<div class="max-w-2xl m-auto shadow-md rounded-md bg-white mt-10 border border-rose-100">
  <form method="post" action="@php bbp_wp_login_action( array( 'context' => 'login_post' ) ); @endphp"
    class="bbp-login-form">
  <fieldset class="bbp-form">
      <legend class="text-center border-b border-gray-100 py-6 w-full">
        <h3 class="font-bold text-xl">
          @php esc_html_e( 'Create an Account', 'bbpress' ); @endphp
        </h3>
      </legend>

      @php do_action( 'bbp_template_before_register_fields' ); @endphp

      <div class="bbp-template-notice text-center pt-6 p-4">
          <ul>
              <li class="text-xs">@php esc_html_e( 'Your username must be unique, and cannot be changed later.',                        'bbpress' ); @endphp</li>
              <li class="text-xs">@php esc_html_e( 'We use your email address to email you a secure password and verify your account.', 'bbpress' ); @endphp</li>
          </ul>
      </div>

      <div class="bbp-username relative border border-gray-300 rounded-md px-2 py-1.5 mt-2 mb-4 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
          <label for="user_login" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Username', 'bbpress' ); @endphp: </label>
          <input type="text" name="user_login" value="@php bbp_sanitize_val( 'user_login' ); @endphp" size="20"
                class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                id="user_login" maxlength="100" autocomplete="off"/>
      </div>

      <div class="bbp-email relative border border-gray-300 rounded-md px-2 py-1.5 mt-2 mb-4 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
          <label for="user_email" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Email', 'bbpress' ); @endphp: </label>
          <input type="text" name="user_email" value="@php bbp_sanitize_val( 'user_email' ); @endphp" size="20"
                class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                id="user_email" maxlength="100" autocomplete="off"/>
      </div>

      @php do_action( 'register_form' ); @endphp

      <div class="bbp-submit-wrapper border-t border-gray-100 flex justify-center lg:space-x-10 p-7 rounded-b-md">

          <button type="submit" name="user-submit"
                  class="button submit user-submit text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-300">@php esc_html_e( 'Register', 'bbpress' ); @endphp</button>

          @php bbp_user_register_fields(); @endphp

      </div>

      @php do_action( 'bbp_template_after_register_fields' ); @endphp

  </fieldset>
  </form>
</div>
