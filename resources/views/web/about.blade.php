@extends('web.layouts.app')

@section('content')
<main class="main">
  <section class="pro">
    <div class="container">
      <div class="content">
        <div class="content-header">
          <div class="title">{{ $about->name }}</div>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">首頁</a></li>
            <li class="breadcrumb-item">關於我們</li>
            <li class="breadcrumb-item active">{{ $about->name }}</li>
          </ol>
        </div>
        <div class="body">
          <div class="page">
            {!! $about->content !!}
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection