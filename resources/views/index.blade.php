<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>warm</title>
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
            <a href="#" class="nav__logo"><img src="/assets/web/image/logo.png" alt="互暖網"></a>
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
              <li class="nav__item has-submenu">
                <a href="#" class="nav__link" @click="navSubMenu = 1">APPLE館</a>
                <ul class="nav__submenu">
                  <li class="nav__subitem">
                    <a href="#" class="nav__link">iPhone 12無卡分期</a>
                  </li>
                  <li class="nav__subitem">
                    <a href="#" class="nav__link">Apple無卡分期</a>
                  </li>
                  <li class="nav__subitem">
                    <a href="#" class="nav__link">iPhone無卡分期</a>
                  </li>
                </ul>
              </li>
              <li class="nav__item">
                <a href="#" class="nav__link">手機館</a>
              </li>
              <li class="nav__item">
                <a href="#" class="nav__link">相機館</a>
              </li>
              <li class="nav__item has-submenu">
                <a href="#" class="nav__link" @click="navSubMenu = 2">電玩館</a>
                <ul class="nav__submenu">
                  <li class="nav__subitem">
                    <a href="#" class="nav__link">Switch無卡分期</a>
                  </li>
                  <li class="nav__subitem">
                    <a href="#" class="nav__link">PS5無卡分期</a>
                  </li>
                </ul>
              </li>
              <li class="nav__item">
                <a href="#" class="nav__link">筆電館</a>
              </li>
              <li class="nav__item">
                <a href="#" class="nav__link">自組電腦</a>
              </li>
              <li class="nav__item has-submenu">
                <a href="#" class="nav__link" @click="navMenu = 3">家電館</a>
                <ul class="nav__submenu">
                  <li class="nav__subitem">
                    <a href="#" class="nav__link">家電無卡分期</a>
                  </li>
                  <li class="nav__subitem">
                    <a href="#" class="nav__link">DYSON無卡分期</a>
                  </li>
                </ul>
              </li>
              <li class="nav__item">
                <a href="#" class="nav__link">精品館</a>
              </li>
              <li class="nav__item has-submenu">
                <a href="#" class="nav__link" @click="navMenu = 4">關於我們</a>
                <ul class="nav__submenu">
                  <li class="nav__subitem">
                    <a href="#" class="nav__link">介紹互暖網</a>
                  </li>
                  <li class="nav__subitem">
                    <a href="#" class="nav__link">介紹免卡/無卡分期</a>
                  </li>
                </ul>
              </li>
              <li class="nav__item has-submenu">
                <a href="#" class="nav__link">開箱趣</a>
                <ul class="nav__submenu">
                  <li class="nav__subitem">
                    <a href="#" class="nav__link">互暖網開箱趣</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <main class="main">
      <section class="slider">
        <div class="container">
          <div class="slider__inner">
            <div class="nav__side">
            <div class="nav__list">
              <a href="#" class="nav__link">iPhone 12無卡分期</a>
              <a href="#" class="nav__link">Apple無卡分期</a>
              <a href="#" class="nav__link">iPhone無卡分期</a>
            </div>
            <div class="nav__list">
              <a href="#" class="nav__link">iPhone 12無卡分期</a>
              <a href="#" class="nav__link">Apple無卡分期</a>
              <a href="#" class="nav__link">iPhone無卡分期</a>
            </div>
            <div class="nav__list">
              <a href="#" class="nav__link">iPhone 12無卡分期</a>
              <a href="#" class="nav__link">Apple無卡分期</a>
              <a href="#" class="nav__link">iPhone無卡分期</a>
            </div>
            <div class="nav__list">
              <a href="#" class="nav__link">iPhone 12無卡分期</a>
              <a href="#" class="nav__link">Apple無卡分期</a>
              <a href="#" class="nav__link">iPhone無卡分期</a>
              <a href="#" class="nav__link">iPhone 12無卡分期</a>
              <a href="#" class="nav__link">Apple無卡分期</a>
              <a href="#" class="nav__link">iPhone無卡分期</a>
            </div>
          </div>
          </div>
        </div>
        <div class="swiper-container slider-swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="/assets/web/image/not-use/slider.jpg">
            </div>
            <div class="swiper-slide">
              <img src="/assets/web/image/not-use/slider.jpg">
            </div>
            <div class="swiper-slide">
              <img src="/assets/web/image/not-use/slider.jpg">
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </section>
      <section class="section first">
        <div class="container">
          <div class="banner">
            <img src="/assets/web/image/banner_apple.jpg">
          </div>
          <div class="pro">
            <div class="pro__list">
              <div class="swiper-container" id="proList1">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="pro__item">
                      <div class="pro__img">
                        <img src="/assets/web/image/not-use/pro1.png">
                      </div>
                      <div class="pro__info">
                        <ul class="tag__list">
                          <li class="tag">極速5G</li>
                          <li class="tag">紫色最新登場</li>
                        </ul>
                        <div class="price">建議售價 NT $ 32,000</div>
                        <div class="title">IPhone 12</div>
                        <div class="stage">月付 NT $ 1200元起</div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="pro__item">
                      <div class="pro__img">
                        <img src="/assets/web/image/not-use/pro2.png">
                      </div>
                      <div class="pro__info">
                        <ul class="tag__list">
                          <li class="tag">極速5G</li>
                          <li class="tag">紫色最新登場</li>
                        </ul>
                        <div class="price">建議售價 NT $ 32,000</div>
                        <div class="title">IPhone 12</div>
                        <div class="stage">月付 NT $ 1200元起</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-btn-next swiper-btn-next1"><i class="fas fa-chevron-left"></i></div>
              <div class="swiper-btn-prev swiper-btn-prev1"><i class="fas fa-chevron-right"></i></div>
            </div>
          </div>
        </div>
      </section>
      <section class="section second">
        <div class="container">
          <div class="banner">
            <img src="/assets/web/image/banner_phone.jpg">
          </div>
          <div class="pro">
            <div class="pro__list">
              <div class="swiper-container" id="proList2">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="pro__item">
                      <div class="pro__img">
                        <img src="/assets/web/image/not-use/pro1.png">
                      </div>
                      <div class="pro__info">
                        <ul class="tag__list">
                          <li class="tag">極速5G</li>
                          <li class="tag">紫色最新登場</li>
                        </ul>
                        <div class="price">建議售價 NT $ 32,000</div>
                        <div class="title">IPhone 12</div>
                        <div class="stage">月付 NT $ 1200元起</div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="pro__item">
                      <div class="pro__img">
                        <img src="/assets/web/image/not-use/pro2.png">
                      </div>
                      <div class="pro__info">
                        <ul class="tag__list">
                          <li class="tag">極速5G</li>
                          <li class="tag">紫色最新登場</li>
                        </ul>
                        <div class="price">建議售價 NT $ 32,000</div>
                        <div class="title">IPhone 12</div>
                        <div class="stage">月付 NT $ 1200元起</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-btn-next swiper-btn-next2"><i class="fas fa-chevron-left"></i></div>
              <div class="swiper-btn-prev swiper-btn-prev2"><i class="fas fa-chevron-right"></i></div>
            </div>
          </div>
        </div>
      </section>
      <section class="section third">
        <div class="container">
          <div class="banner">
            <img src="/assets/web/image/banner_camera.jpg">
          </div>
          <div class="pro">
            <div class="pro__list">
              <div class="swiper-container" id="proList3">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="pro__item">
                      <div class="pro__img">
                        <img src="/assets/web/image/not-use/pro1.png">
                      </div>
                      <div class="pro__info">
                        <ul class="tag__list">
                          <li class="tag">極速5G</li>
                          <li class="tag">紫色最新登場</li>
                        </ul>
                        <div class="price">建議售價 NT $ 32,000</div>
                        <div class="title">IPhone 12</div>
                        <div class="stage">月付 NT $ 1200元起</div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="pro__item">
                      <div class="pro__img">
                        <img src="/assets/web/image/not-use/pro2.png">
                      </div>
                      <div class="pro__info">
                        <ul class="tag__list">
                          <li class="tag">極速5G</li>
                          <li class="tag">紫色最新登場</li>
                        </ul>
                        <div class="price">建議售價 NT $ 32,000</div>
                        <div class="title">IPhone 12</div>
                        <div class="stage">月付 NT $ 1200元起</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-btn-next swiper-btn-next3"><i class="fas fa-chevron-left"></i></div>
              <div class="swiper-btn-prev swiper-btn-prev3"><i class="fas fa-chevron-right"></i></div>
            </div>
          </div>
        </div>
      </section>
      <!-- <section class="section fourth">section</section> -->
    </main>
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
    var swiper = new Swiper(".slider-swiper", {
      pagination: {
        el: ".swiper-pagination",
      },
    })
    var swiper = new Swiper("#proList1", {
        slidesPerView: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: ".swiper-pagination1",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-btn-next1",
          prevEl: ".swiper-btn-prev1",
        },
        breakpoints: {
          640: {
            slidesPerView: 3,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
          1024: {
            slidesPerView: 4,
            spaceBetween: 40,
          },
          1200: {
            slidesPerView: 5,
            spaceBetween: 50,
          },
        },
      })
      var swiper = new Swiper("#proList2", {
        slidesPerView: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: ".swiper-pagination2",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-btn-next2",
          prevEl: ".swiper-btn-prev2",
        },
        breakpoints: {
          640: {
            slidesPerView: 3,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
          1024: {
            slidesPerView: 4,
            spaceBetween: 40,
          },
          1200: {
            slidesPerView: 5,
            spaceBetween: 50,
          },
        },
      })
      var swiper = new Swiper("#proList3", {
        slidesPerView: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: ".swiper-pagination3",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-btn-next3",
          prevEl: ".swiper-btn-prev3",
        },
        breakpoints: {
          640: {
            slidesPerView: 3,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
          1024: {
            slidesPerView: 4,
            spaceBetween: 40,
          },
          1200: {
            slidesPerView: 5,
            spaceBetween: 50,
          },
        },
      })
  </script>

</body>
</html>