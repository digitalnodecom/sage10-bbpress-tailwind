{{-- Search Loop --}}

@php( do_action( 'bbp_template_before_search_results_loop' ) )

<ul id="bbp-search-results" class="forums bbp-search-results w-full">

    <li class="bbp-header">


        <div class="bbp-search-content flex justify-center m-4">
          <h3 class="text-gray-400 text-2xl">
            @php (esc_html_e( 'Search Results', 'bbpress' ))
          </h3>
        </div><!-- .bbp-search-content -->

    </li><!-- .bbp-header -->

    <li class="bbp-body flex justify-center">

      <div class="card w-full text-center sm:m-0">
        @while ( bbp_search_results() )

            @php (bbp_the_search_result())

                <div class="flex justify-center">
                  @php (bbp_get_template_part( 'loop', 'search-' . get_post_type() ))
                </div>


              @endwhile

      </div>

    </li><!-- .bbp-body -->

    <li class="bbp-footer">


    </li><!-- .bbp-footer -->

</ul><!-- #bbp-search-results -->

@php(do_action( 'bbp_template_after_search_results_loop' ))
