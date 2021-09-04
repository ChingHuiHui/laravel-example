<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px" />
        </button>
    </x-slot>

    <x-dropdown-item href="/posts?{{ http_build_query(request()->except('category', 'page')) }}"
        :active="request()->routeIs('posts')">All</x-dropdown-item>

    @foreach ($categories as $category)
    <!-- http_build_query — Generate URL-encoded query string -->
    <x-dropdown-item
        href="/posts?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
        :active='request()->is("category/{{ $category->slug }}")'>
        {{ ucwords($category->name) }}
    </x-dropdown-item>
    @endforeach

</x-dropdown>
