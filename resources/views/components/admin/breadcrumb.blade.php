<ul class="breadcrumb breadcrumb-line text-muted fw-bold fs-base my-1">
    @foreach ($breadcrumbs as $index => $breadcrumb)
        <li class="breadcrumb-item text-muted">
            @if ($index < count($breadcrumbs) - 1)
                <a href="{{ url($breadcrumb['url']) }}" class="text-muted">{{ $breadcrumb['name'] }}</a>
            @else
                <span class="text-dark">{{ $breadcrumb['name'] }}</span>
            @endif
        </li>
    @endforeach
</ul>