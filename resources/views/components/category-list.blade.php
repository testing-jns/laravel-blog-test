<li>
    @php
        $activePage = $requestCategoryName === $slug ? 'active' : '';
    @endphp

    <a href="{{ route('category', ['category' => $slug]) }}" class="d-flex {{ $activePage }}">
        {{ $name }}
        <small class="ml-auto">({{ $total }})</small>
    </a>
</li>
