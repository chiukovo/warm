@extends('web.layouts.app')

@section('content')
<main class="main">
  <section class="pro">
    <div class="container">
      <div class="content">
        <div class="content-header">
          <div class="title">{{ $product->name }}</div>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">首頁</a></li>
            <li class="breadcrumb-item">{{ $name }}</li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
          </ol>
        </div>
        <div class="body">
          <div class="page">
            {!! $product->content !!}
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection