<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ env('APP_NAME') }} </title>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" href="/assets/web/css/style.css">
</head>
<body>
  <div id="app">
    <header class="header">
      <div class="nav">
        <div class="nav__top container">
          <div class="nav__left">
            <a href="index.html" class="nav__logo"><img src="/assets/web/image/logo.png" alt="互暖網"></a>
            <ul class="nav__infor">
              <li><i class="fas fa-headset"></i>0926-828-957</li>
              <li><i class="far fa-clock"></i>營業時間 10:00-22:00</li>
            </ul>
          </div>
          <div class="nav__right">
            <ul class="nav__contact">
              <li><a href="#"><img src="/assets/web/image/conatct_line.jpg"></a></li>
              <li><a href="#"><img src="/assets/web/image/conatct_fb.jpg"></a></li>
              <li><a href="#"><img src="/assets/web/image/conatct_ig.jpg"></a></li>
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
            <div class="nav__title">快速導覽</div>
            <ul class="nav__list">
              @foreach(getHeaderData()['headers'] as $header)
              <li class="nav__item has-submenu">
                <a href="proList.html" class="nav__link">{{ $header->name }}</a>
                <ul class="nav__submenu">
                  @foreach($header->subMenu as $data)
                  <li class="nav__subitem">
                    <a href="#" class="nav__link">{{ $data->name }}</a>
                  </li>
                  @endforeach
                </ul>
              </li>
              @endforeach
              <li class="nav__item has-submenu">
                <a href="#" class="nav__link">關於我們</a>
                <ul class="nav__submenu">
                  <li class="nav__subitem">
                    <a href="#" class="nav__link">介紹互暖網</a>
                  </li>
                  <li class="nav__subitem">
                    <a href="#" class="nav__link">介紹免卡/無卡分期</a>
                  </li>
                </ul>
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
            <li><i class="fas fa-headset"></i>0926-828-957</li>
            <li><i class="far fa-clock"></i>營業時間 10:00-22:00</li>
          </ul>
        </div>
        <div class="footer__group">
          <ul class="footer__list">
            <li class="title"><a href="#" class="footer__link footer__link-title">蘋果館</a></li>
            <li><a href="#" class="footer__link">iPhone 12無卡分期</a></li>
            <li><a href="#" class="footer__link">Apple全系列分期價格表</a></li>
            <li>
              <a href="#" class="footer__link">iPhone 介紹</a>
              <a href="#" class="footer__link">iPad 介紹</a>
            </li>
            <li><a href="#" class="footer__link">AppleWatch 介紹</a></li>
            <li><a href="#" class="footer__link">MacBook 介紹</a></li>
            <li><a href="#" class="footer__link">Mac桌機 介紹</a></li>
            <li><a href="#" class="footer__link">Apple 週邊配件</a></li>
          </ul>
          <ul class="footer__list">
            <li class="title"><a href="#" class="footer__link footer__link-title">手機館</a></li>
            <li class="title"><a href="#" class="footer__link footer__link-title">相機館</a></li>
            <li class="title"><a href="#" class="footer__link footer__link-title">自組電腦</a></li>
            <li class="title"><a href="#" class="footer__link footer__link-title">精品館</a></li>
            <li class="title"><a href="#" class="footer__link footer__link-title">電玩館</a></li>
            <li><a href="#" class="footer__link">電玩專區</a></li>
            <li><a href="#" class="footer__link">點數卡分期</a></li>
          </ul>
          <ul class="footer__list">
            <li class="title"><a href="#" class="footer__link footer__link-title">家電館</a></li>
            <li><a href="#" class="footer__link">家電分期</a></li>
            <li><a href="#" class="footer__link">電視專區</a></li>
            <li><a href="#" class="footer__link">冷氣專區</a></li>
            <li><a href="#" class="footer__link">洗衣機專區</a></li>
            <li><a href="#" class="footer__link">冰箱專區</a></li>
          </ul>
          <ul class="footer__list">
            <li class="title"><a href="#" class="footer__link footer__link-title">關於我們</a></li>
            <li><a href="#" class="footer__link">介紹互暖網</a></li>
            <li><a href="#" class="footer__link">介紹免卡/無卡分期</a></li>
            <li class="title"><a href="#" class="footer__link footer__link-title">開箱趣</a></li>
            <li><a href="#" class="footer__link">互暖網開箱趣</a></li>
            <li class="title"><a href="#" class="footer__link footer__link-title">線上申請</a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        navMenu: false,
        navSubMenu: '0'
      }
    })
    new Swiper(".banner-swiper", {
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
  </script>

</body>
</html>