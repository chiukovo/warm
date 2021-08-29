@extends('web.layouts.app')

@section('content')
<main class="main">
  <section class="slider">
    <div class="container">
      <div class="slider__inner">
        <div class="nav__side">
          @foreach(getHeaderData()['nav'] as $nav)
          <div class="nav__list">
            @foreach($nav as $data)
            <a href="#" class="nav__link">{{ $data->name }}</a>
            @endforeach
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="swiper-container slider-swiper banner-swiper">
      <div class="swiper-wrapper">
        @foreach($banners as $banner)
        <div class="swiper-slide">
          <a href="{{ $banner->href }}">
            <img src="{{ $banner->img_url }}" alt="{{ $banner->title }}">
          </a>
        </div>
        @endforeach
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>
  @foreach(getHeaderData()['headers'] as $key => $header)
  <section class="{{ getIndexProClass($key) }}">
    <div class="container">
      <div class="banner">
      <a href="/product/{{ $header->name }}">
        <img src="{{ $header->img_url }}">
      </a>
      </div>
      @if(!empty($header->products))
      <div class="pro">
        <div class="pro__list">
          <div class="swiper-container pro-swiper">
            <div class="swiper-wrapper">
              @foreach($header->products as $product)
              <div class="swiper-slide">
                <div class="pro__item">
                  <div class="pro__img">
                    <a href="/product/{{ $header->name }}"><img src="{{ $product->img_url }}"></a>
                  </div>
                  <div class="pro__info">
                    <ul class="tag__list">
                      @foreach($product->tags_array as $tag)
                      <li class="tag">{{ $tag }}</li>
                      @endforeach
                    </ul>
                    <div class="price">建議售價 NT $ {{ $product->source_money }}</div>
                    <div class="title">{{ $product->name }}</div>
                    <div class="stage">月付 NT $ {{ $product->month_money }}元起</div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="swiper-btn-next swiper-btn-next"><i class="fas fa-chevron-left"></i></div>
          <div class="swiper-btn-prev swiper-btn-prev"><i class="fas fa-chevron-right"></i></div>
        </div>
      </div>
      @endif
    </div>
  </section>
  @endforeach
</main>
@endsection