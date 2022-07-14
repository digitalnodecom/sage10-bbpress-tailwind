{{-- bbPress User Profile Edit Part --}}
  <style>
    /*
      - This hides ACF form input for the users
      - Please note that the content is still there it is just not displayed
      - Use at your own risk
    */
      .acf-label {
        display: none;
      }
      .form-table {
        display: none;
      }
      #acf-form-data {
        display: none;
      }
      #acf-form-data + h2 {
        display: none;
      }
  </style>
    <form id="bbp-your-profile" method="post" enctype="multipart/form-data" class="bbp-reply-move max-w-2xl m-auto shadow-md rounded-md bg-white my-10 border border-rose-100">

      @php do_action( 'bbp_user_edit_before' ); @endphp

      <fieldset class="bbp-form">
          <legend class="text-center border-b border-gray-100 py-6 w-full">
            <h3 class="font-bold text-xl">
              @php esc_html_e( 'Name', 'bbpress' ) @endphp
            </h3>
          </legend>

          @php do_action( 'bbp_user_edit_before_name' ); @endphp
          <div class="text-center m-4 my-6 space-y-8">

            <div class="relative border border-gray-300 rounded-md px-2 py-1.5 mt-2 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                <label for="first_name" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'First Name', 'bbpress' ) @endphp</label>
                <input type="text" name="first_name" id="first_name"
                      class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                      value="@php bbp_displayed_user_field( 'first_name', 'edit' ); @endphp" class="regular-text"/>
            </div>

            <div class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
              <label for="last_name" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Last Name', 'bbpress' ) @endphp</label>
              <input type="text" name="last_name" id="last_name"
                    class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                    value="@php bbp_displayed_user_field( 'last_name', 'edit' ); @endphp" class="regular-text"/>
            </div>

            <div class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                <label for="nickname" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Nickname', 'bbpress' ); @endphp</label>
                <input type="text" name="nickname" id="nickname"
                      class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                      value="@php bbp_displayed_user_field( 'nickname', 'edit' ); @endphp" class="regular-text"/>
            </div>

            <div class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                <label for="display_name" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Display Name', 'bbpress' ) @endphp</label>

                {{-- NO FILTER (EXPLORE OTHER OPTIONS) --}}
                @php bbp_edit_user_display_name(); @endphp

            </div>

          </div>

          @php do_action( 'bbp_user_edit_after_name' ); @endphp

      </fieldset>

      <fieldset class="bbp-form">
          <legend class="text-center border-b border-t border-gray-100 py-6 w-full">
            <h3 class="font-bold text-xl">
              @php esc_html_e( 'Contact Info', 'bbpress' ) @endphp
            </h3>
          </legend>

          @php do_action( 'bbp_user_edit_before_contact' ); @endphp

          <div class="text-center m-4 my-6 space-y-8">

            <div class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                <label for="url" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Website', 'bbpress' ) @endphp</label>
                <input type="text" name="url" id="url" value="@php bbp_displayed_user_field( 'user_url', 'edit' ); @endphp"
                      class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                      maxlength="200" class="regular-text code"/>
            </div>


            @foreach ( bbp_edit_user_contact_methods() as $name => $desc )

                <div class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                    <label for="{!! esc_attr( $name ) !!}" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">{!! apply_filters( 'user_' . $name . '_label', $desc ) !!}</label>
                    <input type="text" name="{!! esc_attr( $name ) !!}" id="{!! esc_attr( $name ) !!}"
                          class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                          value="@php bbp_displayed_user_field( $name, 'edit' ); @endphp" class="regular-text"/>
                </div>

            @endforeach



          </div>

          @php do_action( 'bbp_user_edit_after_contact' ); @endphp

      </fieldset>

      <fieldset class="bbp-form">
          <legend class="text-center border-b border-t border-gray-100 py-6 w-full">
            <h3 class="font-bold text-xl">
              @php bbp_is_user_home_edit()
                ? esc_html_e( 'About Yourself', 'bbpress' )
                : esc_html_e( 'About the user', 'bbpress' );
              @endphp
            </h3>
          </legend>

          @php do_action( 'bbp_user_edit_before_about' ); @endphp

          <div class="text-center m-4 my-6 space-y-8">

            <div class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                <label for="description" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Biographical Info', 'bbpress' ); @endphp</label>
                <textarea name="description" id="description" rows="5"
                        class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                        cols="30">@php bbp_displayed_user_field( 'description', 'edit' ); @endphp</textarea>
            </div>

          </div>

          @php do_action( 'bbp_user_edit_after_about' ); @endphp


      </fieldset>


      <fieldset class="bbp-form">
          <legend class="text-center border-b border-t border-gray-100 py-6 w-full">
            <h3 class="font-bold text-xl">
              @php esc_html_e( 'Account', 'bbpress' ) @endphp
            </h3>
          </legend>

          @php do_action( 'bbp_user_edit_before_account' ); @endphp

          <div class="text-center m-4 my-6 space-y-8">

            <div class="relative border bg-stone-100 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                <label for="user_login" class="absolute -top-2 left-2 -mt-px inline-block px-1 text-xs font-medium text-gray-900">@php esc_html_e( 'Username', 'bbpress' ); @endphp</label>
                <input type="text" name="user_login" id="user_login"
                      value="@php bbp_displayed_user_field( 'user_login', 'edit' ); @endphp" maxlength="100"
                      disabled="disabled" class="regular-text appearance-none block w-full px-2 py-2 rounded-md placeholder-stone-100 bg-stone-100 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"/>
            </div>

            <div class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                <label for="email" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Email', 'bbpress' ); @endphp</label>
                <input type="text" name="email" id="email"
                      value="@php bbp_displayed_user_field( 'user_email', 'edit' ); @endphp" maxlength="100"
                      class="regular-text appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm" autocomplete="off"/>
            </div>

            @php bbp_get_template_part( 'form', 'user-passwords' ); @endphp

            <div class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                <label for="url" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Language', 'bbpress' ) @endphp</label>

                @php bbp_edit_user_language(); @endphp

            </div>

          </div>


          @php do_action( 'bbp_user_edit_after_account' ); @endphp

      </fieldset>


      @if ( ! bbp_is_user_home_edit() && current_user_can( 'promote_user', bbp_get_displayed_user_id() ) )


          <fieldset class="bbp-form">
              <legend class="text-center border-b border-t border-gray-100 py-6 w-full">
                <h3 class="font-bold text-xl">
                  @php esc_html_e( 'User Role', 'bbpress' ); @endphp
                </h3>
              </legend>

              @php do_action( 'bbp_user_edit_before_role' ); @endphp

              <div class="text-center m-4 my-6 space-y-8">

                @if ( is_multisite() && is_super_admin() && current_user_can( 'manage_network_options' ) )


                    <div>
                        <label for="super_admin">@php esc_html_e( 'Network Role', 'bbpress' ); @endphp</label>
                        <label>
                            <input class="checkbox" type="checkbox" id="super_admin"
                                  name="super_admin"@php checked( is_super_admin( bbp_get_displayed_user_id() ) ); @endphp />
                            @php esc_html_e( 'Grant this user super admin privileges for the Network.', 'bbpress' ); @endphp
                        </label>
                    </div>


                @endif


                @php bbp_get_template_part( 'form', 'user-roles' ); @endphp

              </div>

              @php do_action( 'bbp_user_edit_after_role' ); @endphp

          </fieldset>


      @endif


      @php do_action( 'bbp_user_edit_after' ); @endphp

      <fieldset class="submit">

          <legend class="text-center border-b border-t border-gray-100 py-6 w-full">
            <h3 class="font-bold text-xl">
              @php esc_html_e( 'Save Changes', 'bbpress' ); @endphp
            </h3>
          </legend>

          <div class="text-center m-4 my-6 space-y-8">

              <button type="submit" id="bbp_user_edit_submit" name="bbp_user_edit_submit"
                      class="button submit user-submit text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-300">
                      @php bbp_is_user_home_edit()
                        ? esc_html_e( 'Update Profile', 'bbpress' )
                        : esc_html_e( 'Update User',    'bbpress' );
                      @endphp
                  </button>

              @php bbp_edit_user_form_fields(); @endphp

          </div>
      </fieldset>
    </form>
  </div>   {{-- CLOSING DIV FROM PREVIOUS --}}
</div>   {{-- CLOSING DIV FROM PREVIOUS --}}
