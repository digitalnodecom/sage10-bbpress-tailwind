{{-- Edit Topic Tag --}}

@if ( current_user_can( 'edit_topic_tags' ) )


    <div id="edit-topic-tag-@php bbp_topic_tag_id(); @endphp" class="bbp-topic-tag-form  max-w-2xl m-auto shadow-md rounded-md bg-white mt-10 border border-rose-100">

        <fieldset class="bbp-form" id="bbp-edit-topic-tag">

            <legend class="text-center border-b border-gray-100 py-6 w-full">
              <h3 class="font-bold text-xl">
                @php printf( esc_html__( 'Manage Tag: "%s"', 'bbpress' ), bbp_get_topic_tag_name() ); @endphp
              </h3>
            </legend>

            <fieldset class="bbp-form" id="tag-rename">

              <legend class="text-center border-b border-gray-100 py-6 w-full">
                <h3 class="font-bold text-xl">
                  @php esc_html_e( 'Rename', 'bbpress' ); @endphp
                </h3>
              </legend>

                <div class="bbp-template-notice info text-center pt-6 p-4">
                    <ul>
                        <li class="text-xs">@php esc_html_e( 'Leave the slug empty to have one automatically generated.', 'bbpress' ); @endphp</li>
                    </ul>
                </div>

                <div class="bbp-template-notice text-center pt-6 p-4">
                    <ul>
                        <li class="text-xs">@php esc_html_e( 'Changing the slug affects its permalink. Any links to the old slug will stop working.', 'bbpress' ); @endphp</li>
                    </ul>
                </div>

                <form id="rename_tag" name="rename_tag" method="post">

                    <div class="relative border border-gray-300 rounded-md px-2 py-1.5 mt-2 mb-4 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                        <label for="tag-name" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Name:', 'bbpress' ); @endphp</label>
                        <input type="text" id="tag-name" name="tag-name" size="20" maxlength="40"
                              class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                              value="{!! esc_attr( bbp_get_topic_tag_name() ) !!}"/>
                    </div>

                    <div class="relative border border-gray-300 rounded-md px-2 py-1.5 mt-2 mb-4 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                        <label for="tag-slug" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Slug:', 'bbpress' ); @endphp</label>
                        <input type="text" id="tag-slug" name="tag-slug" size="20" maxlength="40"
                              class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                              value="{!! esc_attr( apply_filters( 'editable_slug', bbp_get_topic_tag_slug() ) ) !!}"/>
                    </div>

                    <div class="relative border border-gray-300 rounded-md px-2 py-1.5 mt-2 mb-4 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                        <label for="tag-description" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Description:', 'bbpress' ); @endphp</label>
                        <input type="text" id="tag-description" name="tag-description" size="20"
                              class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                              value="{!! esc_attr( bbp_get_topic_tag_description( array( 'before' => '', 'after' => '' ) ) ) !!}"/>
                    </div>

                    <div class="bbp-submit-wrapper border-t border-gray-100 flex justify-center lg:space-x-10 p-7 rounded-b-md">
                        <button type="submit"
                                class="button submit text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-300">@php esc_attr_e( 'Update', 'bbpress' ); @endphp</button>

                        <input type="hidden" name="tag-id" value="@php bbp_topic_tag_id(); @endphp"/>
                        <input type="hidden" name="action" value="bbp-update-topic-tag"/>

                        @php wp_nonce_field( 'update-tag_' . bbp_get_topic_tag_id() ); @endphp

                    </div>
                </form>

            </fieldset>

            <fieldset class="bbp-form" id="tag-merge">

                <legend class="text-center border-b border-gray-100 py-6 w-full">
                  <h3 class="font-bold text-xl">
                    @php esc_html_e( 'Merge', 'bbpress' ); @endphp
                  </h3>
                </legend>

                <div class="bbp-template-notice text-center pt-6 p-4">
                    <ul>
                        <li class="text-xs">@php esc_html_e( 'Merging tags together cannot be undone.', 'bbpress' ); @endphp</li>
                    </ul>
                </div>

                <form id="merge_tag" name="merge_tag" method="post">

                    <div class="relative border border-gray-300 rounded-md px-2 py-1.5 mt-2 mb-4 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
                        <label for="tag-existing-name" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Existing tag:', 'bbpress' ); @endphp</label>
                        <input type="text" id="tag-existing-name" name="tag-existing-name" size="22" maxlength="40"
                              class="appearance-none block w-full px-2 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-0 sm:text-sm"
                          />
                    </div>

                    <div class="bbp-submit-wrapper border-t border-gray-100 flex justify-center lg:space-x-10 p-7 rounded-b-md">
                        <button type="submit" class="button submit text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-300"
                                onclick="return confirm('{!! esc_js( sprintf( esc_html__( 'Are you sure you want to merge the "%s" tag into the tag you specified?', 'bbpress' ), bbp_get_topic_tag_name() ) ) !!}');">@php esc_attr_e( 'Merge', 'bbpress' ); @endphp</button>

                        <input type="hidden" name="tag-id" value="@php bbp_topic_tag_id(); @endphp"/>
                        <input type="hidden" name="action" value="bbp-merge-topic-tag"/>

                        @php wp_nonce_field( 'merge-tag_' . bbp_get_topic_tag_id() ); @endphp
                    </div>
                </form>

            </fieldset>


            @if ( current_user_can( 'delete_topic_tags' ) )


                <fieldset class="bbp-form" id="delete-tag">

                    <legend class="text-center border-b border-gray-100 py-6 w-full">
                      <h3 class="font-bold text-xl">
                        @php esc_html_e( 'Delete', 'bbpress' ); @endphp
                      </h3>
                    </legend>

                    <div class="bbp-template-notice info text-center pt-6 p-4">
                        <ul>
                            <li class="text-xs">@php esc_html_e( 'This does not delete your topics. Only the tag itself is deleted.', 'bbpress' ); @endphp</li>
                        </ul>
                    </div>
                    <div class="bbp-template-notice  text-center pt-6 p-4">
                        <ul>
                            <li class="text-xs">@php esc_html_e( 'Deleting a tag cannot be undone.', 'bbpress' ); @endphp</li>
                            <li class="text-xs">@php esc_html_e( 'Any links to this tag will no longer function.', 'bbpress' ); @endphp</li>
                        </ul>
                    </div>

                    <form id="delete_tag" name="delete_tag" method="post">

                        <div class="bbp-submit-wrapper border-t border-gray-100 flex justify-center lg:space-x-10 p-7 rounded-b-md">
                            <button type="submit" class="button submit text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-300"
                                    onclick="return confirm('{!! esc_js( sprintf( esc_html__( 'Are you sure you want to delete the "%s" tag? This is permanent and cannot be undone.', 'bbpress' ), bbp_get_topic_tag_name() ) ) !!}');">@php esc_attr_e( 'Delete', 'bbpress' ); @endphp</button>

                            <input type="hidden" name="tag-id" value="@php bbp_topic_tag_id(); @endphp"/>
                            <input type="hidden" name="action" value="bbp-delete-topic-tag"/>

                            @php wp_nonce_field( 'delete-tag_' . bbp_get_topic_tag_id() ); @endphp
                        </div>
                    </form>

                </fieldset>


            @endif


        </fieldset>
    </div>


@endif

