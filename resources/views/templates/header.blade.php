<?php
$email = $_COOKIE["email"];
?>




<div class="home__header">
    <nav>
        <div class="header__nav wrapper">
            <div class="logo"><a class="header__mylogo" href="#">{{$title}}</a></div>
            <ul class="nav-links">
                <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                <li>
                    
                </li>
                <li><a href="#"><i class="fa-solid fa-bell"></i></a></li>
                <li>
                    <a href="#" class="desktop-item"><i class="fa-solid fa-circle-user"></i></a>
                    <input type="checkbox" id="showDrop">
                    <label for="showDrop" class="mobile-item"></label>
                    <ul class="drop-menu">
                        <li class="menu__info"></li>
                        <li><a href="/user/{{$email}}">Trang Cá Nhân</a></li>
                        <li><a href="/login">Đăng Xuất</a></li>
                    </ul>
                </li>
            </ul>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>

        

    </nav>
    
</div>