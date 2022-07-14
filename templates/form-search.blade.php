{{-- Search --}}

@if ( bbp_allow_search() )

<div class="flex justify-center">
  <div class="mb-6 w-11/12">
    <div class="bbp-search-form">
        <form role="search" method="get" id="bbp-search-form">
            <div class="relative">
              <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
              </div>
                <label class="screen-reader-text hidden"
                       for="bbp_search">@php esc_html_e( 'Search for:', 'bbpress' ); @endphp</label>
                <input type="hidden" name="action" value="bbp-search-request"/>
                <input type="search" value="@php bbp_search_terms(); @endphp" name="bbp_search" id="bbp_search"
                  class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-rose-500 focus:outline-none focus:border-rose-500"
                  placeholder="Search Mockups, Logos..."
                  />
                <input class="text-white absolute right-2.5 bottom-2.5 bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-300" type="submit" id="bbp_search_submit"
                       value="@php esc_attr_e( 'Search', 'bbpress' ); @endphp"/>
            </div>
        </form>
    </div>
  </div>
</div>

@endif
