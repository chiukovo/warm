@extends('web.layouts.app')

@section('content')
<main class="main">
  <section class="pro">
    <div class="container">
      <div class="content">
        <div class="content-header">
          <div class="title">QA快速初審</div>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">首頁</a></li>
            <li class="breadcrumb-item active">QA快速初審</li>
          </ol>
        </div>
        <div class="body">
          <div class="page">
            {!! $qa->content !!}
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection