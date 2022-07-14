{{-- Pagination for pages of search results --}}
@php( do_action( 'bbp_template_before_pagination_loop' ) )

<div class="bbp-pagination">
    <div class="bbp-pagination-count">@php bbp_search_pagination_count(); @endphp</div>
    <div class="bbp-pagination-links">@php bbp_search_pagination_links(); @endphp</div>
</div>

@php do_action( 'bbp_template_after_pagination_loop' );
@endphp
