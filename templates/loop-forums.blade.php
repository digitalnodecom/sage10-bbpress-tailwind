{{-- Forums Loop --}}
@php( do_action( 'bbp_template_before_forums_loop' ) )

<div class="flex justify-center">
  <ul id="forums-list-{{ bbp_forum_id() }}" class="bbp-forums w-full">

      <li class="bbp-body w-full">

            @while ( bbp_forums() )
              <div class="card divide-y divide-gray-100 sm:m-0">

                @php(bbp_the_forum())

                @php(bbp_get_template_part( 'loop', 'single-forum' ))
              </div>
            @endwhile

        </li><!-- .bbp-body -->

      <li class="bbp-footer">

          <div class="tr">
              <p class="td colspan4">&nbsp;</p>
          </div><!-- .tr -->

      </li><!-- .bbp-footer -->

  </ul><!-- .forums-directory -->

  @php (do_action( 'bbp_template_after_forums_loop' ))

</div>

