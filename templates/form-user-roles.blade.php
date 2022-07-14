{{-- User Roles Profile Edit Part --}}
<div class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
  <label for="role" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Blog Role', 'bbpress' ) @endphp</label>
  {{-- NO FILTER --}}
  @php bbp_edit_user_blog_role(); @endphp

</div>

<div class="relative border border-gray-300 rounded-md px-2 py-1.5 shadow-sm focus-within:ring-1 focus-within:ring-rose-500 focus-within:border-rose-500">
  <label for="forum-role" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">@php esc_html_e( 'Forum Role', 'bbpress' ) @endphp</label>
  {{-- NO FILTER --}}
  @php bbp_edit_user_forums_role(); @endphp

</div>
