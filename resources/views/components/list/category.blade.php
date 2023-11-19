<li>
    <a href="{{ route('category', ['category' => $slug]) }}" class="d-flex {{ Request::is('category/' . $slug) ? 'active' : '' }}">
        {{ $name }}
        <small class="ml-auto">({{ $total }})</small>
    </a>
</li>
