<script src="{{ asset('js/navbar.js') }}"></script>
<div class="navbar">
    <div class="nav-items">
        @if (isset($owner))
            <span class="name">
                {{ $owner->content }}
            </span>
        @else
            <span class="name">HOME</span>
        @endif
        @if(isset($links))
        <span class='nav-links'>
            @foreach ($links as $link)
                <a target="_blank" class="nav-link" href="{{ $link->content }}">{{ $link->title }}</a>
            @endforeach
        </span>
        <span class="hamburger-icon">
            <div class="hamburger"></div>
            <div class="hamburger"></div>
            <div class="hamburger"></div>
        </span>
        @endif
    </div>
</div>
