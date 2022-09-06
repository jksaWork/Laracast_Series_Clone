<nav id="top">
    <div class="custom_container">
        <div class="align_item">
            <div class="text-right  logo">
                <h3> <a href="index.php" class="logo_link">مدونه نقره <img src="design/img/logo.png" alt=""
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
                    <li class='{{ !request()->routeIs('contact')?:'active' }}'>
                        <a href="{{ route('contact') }}">اتصل بنا</a>
                    </li>
                    <li class='{{ !request()->routeIs('Articals')?:'active' }}'>
                        <a href="{{ route('Articals') }}">المقالات</a>
                    </li>
                    <li class='='{{ !request()->routeIs('howUs')?:'active' }}'>
                        <a href="{{ route('howUs') }}">عن المدونه ؟</a>
                    </li>
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
