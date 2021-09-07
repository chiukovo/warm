@extends('web.layouts.app')

@section('content')
<main class="main">
  <section class="pro">
    <div class="container">
      <div class="content">
        <div class="content-header">
          <div class="title">無卡分期線上申請</div>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">首頁</a></li>
            <li class="breadcrumb-item active">線上申請</li>
          </ol>
        </div>
        <div class="body">
          <ul class="step__list">
            <li>
              <div class="icon"><img src="/assets/web/image/undraw_Dev_focus_re_6iwt.svg"></div>
              <div class="title">STEP. 1</div>
              <div class="p">線上填單<br>選擇商品</div>
            </li>
            <li>
              <div class="icon"><img src="/assets/web/image/undraw_Mobile_re_q4nk.svg"></div>
              <div class="title">STEP. 2</div>
              <div class="p">聯絡客服<br>為你服務</div>
            </li>
            <li>
              <div class="icon"><img src="/assets/web/image/undraw_Real_time_sync_re_nky7.svg"></div>
              <div class="title">STEP. 3</div>
              <div class="p">快速審核<br>60分左右</div>
            </li>
            <li>
              <div class="icon"><img src="/assets/web/image/undraw_deliveries_131a.svg"></div>
              <div class="title">STEP. 4</div>
              <div class="p">到店取貨<br>業務送貨</div>
            </li>
          </ul>
          <div class="form-wrap">
            <div class="form__header">
              <div class="title">線上申請</div>
            </div>
            <form id="form">
              <div class="form">
                <div class="form__title">選擇購買商品</div>
                <div class="form__group">
                  <span class="label">1. 產品類型</span>
                  <div class="input">
                    <select name="type">
                      <option>請選擇產品類別</option>
                      @foreach($types as $type)
                      <option value="{{ $type->id }}" @if($type->name == $name) selected @endif>{{ $type->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form__group">
                  <span class="label">2. 商品</span>
                  <div class="input">
                    <select name="product">
                      <option value="">請選擇商品</option>
                      @foreach($products as $data)
                      <option value="{{ $data->id }}" @if($data->name == $product) selected @endif>{{ $data->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form__group">
                  <span class="label">3. 產品期數</span>
                  <div class="input">
                    <select name="periods">
                      <option value="">請選擇期數</option>
                      <option value="6">6期</option>
                      <option value="12">12期</option>
                      <option value="24">24期</option>
                      <option value="30">30期</option>
                    </select>
                  </div>
                </div>
                <div class="form__group">
                  <br>
                  <p class="text-blue"><b>請確認商品型號及規格</b></p>
                  <br>
                  <hr>
                </div>
              </div>
              <div class="form">
                <div class="form__group form__inline">
                  <div class="form__group">
                    <span class="label">申辦人姓名 <span class="text-red">*</span></span>
                    <div class="input">
                      <input type="text" name="name">
                    </div>
                  </div>
                  <div class="form__group">
                    <span class="label">聯絡電話 <span class="text-red">*</span></span>
                    <div class="input">
                      <input type="tel" name="phone">
                    </div>
                  </div>
                </div>
                <div class="form__group form__inline">
                  <div class="form__group">
                    <span class="label">職業 <span class="text-red">*</span></span>
                    <div class="radio__group">
                      <label for="work1">
                        <input type="radio" name="profession" id="work1" value="1">
                        <span>學生</span>
                      </label>
                      <label for="work2">
                        <input type="radio" name="profession" id="work2" value="2">
                        <span>上班族、社會人士</span>
                      </label>
                      <label for="work3">
                        <input type="radio" name="profession" id="work3" value="3">
                        <span>職業軍人、公家機關人員</span>
                      </label>
                      <label for="work4">
                        <input type="radio" name="profession" id="work4" value="4">
                        <span>自營商</span>
                      </label>
                      <label for="work5">
                        <input type="radio" name="profession" id="work5" value="5">
                        <span>其他</span>
                      </label>
                    </div>
                  </div>
                  <div class="form__group">
                    <span class="label">年紀 <span class="text-red">*</span></span>
                    <div class="radio__group">
                      <label for="year1">
                        <input type="radio" name="age" id="year1" value="1">
                        <span>18-19歲 需法定代理人同意</span>
                      </label>
                      <label for="year2">
                        <input type="radio" name="age" id="year2" value="2">
                        <span>20-30歲</span>
                      </label>
                      <label for="year3">
                        <input type="radio" name="age" id="year3" value="3">
                        <span>30-40歲</span>
                      </label>
                      <label for="year4">
                        <input type="radio" name="age" id="year4" value="4">
                        <span>40歲-50歲以上</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form__group">
                  <br>
                  <p class="text-blue"><b>確認送出訂單後<br>
                    我們將主動與您聯絡<br>
                    或與我們LINE客服聯絡</b></p>
                  <br>
                  <hr>
                </div>
                <div class="form__group">
                  <button id="apply" type="button" class="form__btn">確認送出</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function() {
  $('#apply').click(function(e) {
      e.preventDefault();
      const data = $('#form').serialize();
      $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: '/apply/create',
          data: data,
          type: 'POST',
          success: function(res) {
            if (res.status == 'success') {
              alert('申請成功!')
              location.reload()
            } else {
              alert(res.msg)
            }
          }
      });
  });
});
</script>