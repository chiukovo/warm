@extends('web.layouts.app')

@section('content')
@php
  $productData = getHeaderData();
  $setting = getSetting();
@endphp
<main class="main">
  <section class="pro">
    <div class="container">
      @if(isset($productData['nav'][$type->id]))
      <aside class="aside">
        <nav>
          @foreach($productData['nav'][$type->id] as $data)
            <a href="#{{ $data->name }}">{{ $data->name }}</a>
          @endforeach
        </nav>
      </aside>
      @endif
      <div class="content">
        <div class="content-header">
          <div class="title">{{ $type->name }}</div>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">首頁</a></li>
            <li class="breadcrumb-item active">{{ $type->name }}</li>
          </ol>
        </div>
        <div class="body">
          {!! $type->content !!}
          <div class="pro-wrap">
            @foreach($result as $list)
            <div class="pro-group">
              <div class="pro-group__header">
                <div  id="{{ $list['name'] }}" class="pro-group__title">{{ $list['name'] }}</div>
                <div class="pro-group__card">
                  <a href="#" style="background-color: #15a725;">方式一：線上客服協助申請</a>
                  <a href="#" style="background-color: #3353D5;">方式二：24小時線上申請</a>
                </div>
              </div>
              <div class="pro-group__list">
                <ul>
                  @foreach($list['data'] as $key => $detail)
                  @php
                    $staging = json_decode($detail->staging);
                  @endphp
                  <li>
                    <div class="top">
                      @if($key == 0)
                      <div class="title">
                        <div class="block">圖片</div>
                        <div class="block">名稱</div>
                        <div class="block">
                        @if($setting->show_staging) 6期 @endif
                        </div>
                        <div class="block">
                        @if($setting->show_staging) 12期 @endif
                        </div>
                        <div class="block">
                        @if($setting->show_staging) 24期 @endif
                        </div>
                        <div class="block">
                        @if($setting->show_staging) 30期 @endif
                        </div>
                      </div>
                      @endif
                      <div class="info">
                        <div class="block">
                        <img src="{{ $detail->img_url }}">
                        </div>
                        <div class="block">
                        <a href="/product/aaa/detail/{{ $detail->id }}">{{ $detail->name }}</a>
                        </div>
                        @if($setting->show_staging)
                        <div class="block">
                          <span class="text-red">{{ $staging->staging_6 == '' ? '-' : '$' . $staging->staging_6 }}</span>
                        </div>
                        <div class="block">
                          <span class="text-red">{{ $staging->staging_12 == '' ? '-' : '$' . $staging->staging_12 }}</span>
                        </div>
                        <div class="block">
                          <span class="text-red">{{ $staging->staging_24 == '' ? '-' : '$' . $staging->staging_24 }}</span>
                        </div>
                        <div class="block">
                          <span class="text-red">{{ $staging->staging_30 == '' ? '-' : '$' . $staging->staging_30 }}</span>
                        </div>
                        @endif
                      </div>
                    </div>
                    <div class="bottom">
                      <div class="block">
                        {!! $detail->content_detail !!}
                      </div>
                      <div class="block">
                        <a href="/apply/{{ $type->name }}/{{ $detail->name }}" class="btn-shopping">
                          <div class="icon"><img src="/assets/web/image/icon_shopping.svg"></div>
                          <div class="title">線上申請</div>
                        </a>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection