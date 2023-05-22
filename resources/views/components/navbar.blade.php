<script src="{{asset('js/navbar.js')}}"></script>
<div class="navbar">
    <div class="nav-items">
        <span class="name">
            Prakash Poudel
        </span>
        <span class='nav-links'>
            @foreach($links as $key => $link)
            <a target="_blank" class="nav-link" href="{{$link}}">{{$key}}</a>
            @endforeach
        </span>
        <span class="hamburger-icon">
            <div class="hamburger"></div>
            <div class="hamburger"></div>
            <div class="hamburger"></div>
        </span>
    </div>
</div>
