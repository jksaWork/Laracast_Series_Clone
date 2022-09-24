<nav id="top">
    <div class="custom_container">
        <div class="align_item">
            <div class="text-right  logo">
                <h3> <a href="index.php" class="logo_link"> laracast Clone <img src="design/img/logo.png" alt=""
                            class="nav_img"></a></h3>
                <div class="custom_icon" onclick="
				let head = document.querySelector('.nav_links');
				if(head.style.height =='0px'){
					head.style.height ='50px'
				}else{
					head.style.height = 0
				}
				">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="nav_links">
                <ul>

                    <li class='{{-- !request()->routeIs('contact')?:'active' --}}'>
                        <a href="{{-- route('contact') --}}">Home</a>
                    </li>
                    <li class='{{-- !request()->routeIs('contact')?:'active' --}}'>
                        <a href="{{ route('series.front') }}">Series</a>
                    </li>
                    <li class='{{-- !request()->routeIs('Articals')?:'active' --}}'>
                        <a href="{{-- route('Articals') --}}">Create Series</a>
                    </li>

                    @auth
                    <li class='{{-- !request()->routeIs('howUs')?:'active' --}}'>
                        <a href="{{ route('profile', auth()->user()->name) }}"> Profile </a>
                    </li>
                    <li class='{{-- !request()->routeIs('contact')?:'active' --}}'>
                        <a href="{{ route('get.logout') }}">Logout</a>
                    </li>
                    @else
                    <li class='{{-- !request()->routeIs('contact')?:'active' --}}'>
                        <a href="{{ route('login') }}">login</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="social_link">
    <ul>
        <li>
            <img src="design/img/face.svg" alt="">
        </li>
        <li>
            <img src="design/img/whats.svg" alt="">
        </li>
        <li>
            <img src="design/img/twitter.svg" alt="">
        </li>
    </ul>
</div>
