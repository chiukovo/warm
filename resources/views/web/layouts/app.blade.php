<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ env('APP_NAME') }} </title>
  <link rel="stylesheet" href="/assets/web/css/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" href="/assets/web/css/style.css?v=1">
</head>
<body>
  @php
    $productData = getHeaderData();
    $setting = getSetting();
  @endphp
  <div id="app">
    <header class="header">
      <div class="nav">
        <div class="nav__top container">
          <div class="nav__left">
            <a href="/" class="nav__logo"><img src="/assets/web/image/logo.png" alt="互暖網"></a>
            <ul class="nav__infor">
              <li><i class="fas fa-headset"></i>{{ $setting->phone }}</li>
              <li><i class="far fa-clock"></i>營業時間 {{ $setting->business_hours }}</li>
            </ul>
          </div>
          <div class="nav__right">
            <ul class="nav__contact">
              <li><a href="{{ $setting->line_link }}"><img src="/assets/web/image/conatct_line.png"></a></li>
              <li><a href="{{ $setting->fb_link }}"><img src="/assets/web/image/conatct_fb.png"></a></li>
              <li><a href="{{ $setting->ig_link }}"><img src="/assets/web/image/conatct_ig.png"></a></li>
            </ul>
            <div class="nav__toggle"
              :class="navMenu ? 'show' : ''"
              @click="navMenu = !navMenu"
              ></div>
          </div>
        </div>
        <div class="nav__menu"
          :class="navMenu ? 'show' : ''"
          >
          <div class="nav__inner container">
            @if(showNavMenu())
            <div id="speed_nav" class="nav__title" style="cursor:pointer;">快速導覽</div>
            @endif
            <ul class="nav__list">
              @foreach($productData['headers'] as $header)
              <li class="nav__item has-submenu">
                <a href="/product/{{ $header->name }}" class="nav__link">{{ $header->name }}</a>
                <ul class="nav__submenu">
                  @foreach($header->subMenu as $data)
                  <li class="nav__subitem">
                    <a href="/product/{{ $header->name }}#{{ $data->name }}" class="nav__link">{{ $data->name }}</a>
                  </li>
                  @endforeach
                </ul>
              </li>
              @endforeach
              <li class="nav__item has-submenu">
                <a href="#" class="nav__link">關於我們</a>
                <ul class="nav__submenu">
                  @foreach(getAboutList() as $list)
                  <li class="nav__subitem">
                    <a href="/about/{{ $list->name }}" class="nav__link">{{ $list->name }}</a>
                  </li>
                  @endforeach
                </ul>
              </li>
              <li class="nav__item">
                <a href="/qa" class="nav__link">QA快速初審</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    @yield('content')
    <footer class="footer section">
      <div class="container">
        <div class="footer__info">
          <a href="#" class="nav__logo"><img src="/assets/web/image/logo.png" alt="互暖網"></a>
          <ul class="nav__infor">
            <li><i class="fas fa-headset"></i>{{ $setting->phone }}</li>
            <li><i class="far fa-clock"></i>營業時間 {{ $setting->business_hours }}</li>
          </ul>
        </div>
        <div class="footer__group">
          @foreach($productData['headers'] as $header)
          <ul class="footer__list">
            <li class="title"><a href="/product/{{ $header->name }}" class="footer__link footer__link-title">{{ $header->name }}</a></li>
            @foreach($header->subMenu as $data)
            <li><a href="/product/{{ $header->name }}#{{ $data->name }}" class="footer__link">{{ $data->name }}</a></li>
            @endforeach
          </ul>
          @endforeach
          <ul class="footer__list">
            <li class="title"><a href="#" class="footer__link footer__link-title">關於我們</a></li>
            @foreach(getAboutList() as $list)
            <li><a href="/about/{{ $list->name }}" class="footer__link">{{ $list->name }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </footer>
  </div>
<script src="/assets/web/js/jquery-3.6.0.min.js"></script>
  <script src="/assets/web/js/vue.js"></script>
  <script src="/assets/web/js/swiper-bundle.min.js"></script>
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        navMenu: false,
        navSubMenu: '0'
      }
    })
    new Swiper(".banner-swiper", {
      autoplay: {
        delay: 5000,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    })

    new Swiper(".pro-swiper", {
      slidesPerView: 4,
      spaceBetween: 10,
      loop: true,
      loopFillGroupWithBlank: true,
      navigation: {
        nextEl: ".swiper-btn-next",
        prevEl: ".swiper-btn-prev",
      },
      breakpoints: {
        992: {
          slidesPerView: 5,
          spaceBetween: 10,
        }
      },
    })

    $('#speed_nav').click(function() {
      $('.speed__side').toggle();
    })

    $('.has-submenu').click(function(e) {
      e.preventDefault()   
      const hasClass = $(this).hasClass('sub-menu')
      $('.has-submenu').removeClass('sub-menu')
      if (!hasClass) {
        $(this).addClass('sub-menu')
      }
    })

    $('.nav__submenu .nav__subitem a').click(function(e) {
      location.href = $(this).attr('href')
    })
  </script>

</body>
</html>