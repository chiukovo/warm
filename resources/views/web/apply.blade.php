@extends('web.layouts.app')

@section('content')
@php
  $setting = getSetting();
@endphp
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
              <div class="p">快速審核<br>30分鐘左右</div>
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
                  <span class="label">產品類型</span>
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
                  <span class="label">商品</span>
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
                      <input type="text" name="name" placeholder="請輸入申辦人姓名">
                    </div>
                  </div>
                  <div class="form__group">
                    <span class="label">身分證字號 <span class="text-red">*</span></span>
                    <div class="input">
                      <input type="text" name="id_number" placeholder="請輸入身分證字號">
                    </div>
                  </div>
                  <div class="form__group">
                    <span class="label">出生年月日 <span class="text-red">*</span></span>
                    <div class="input">
                      <input type="text" name="age" placeholder="範例: 民國72年7月7日出生, 請輸入720707">
                    </div>
                  </div>
                </div>
                <div class="form__group form__inline">
                  <div class="form__group">
                    <span class="label">戶籍地址 <span class="text-red">*</span></span>
                    <div class="input">
                      <div class="res_address"></div>
                      <input type="text" name="res_address_dt" placeholder="">
                    </div>
                  </div>
                  <div class="form__group">
                    <span class="label">現居地址 <span class="text-red">*</span></span>
                    <div class="input">
                      <div class="current_address"></div>
                      <input type="text" name="current_address_dt" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="form__group form__inline">
                  <div class="form__group">
                    <span class="label">行動電話 <span class="text-red">*</span></span>
                    <div class="input">
                      <input type="text" name="phone" placeholder="請輸入行動電話">
                    </div>
                  </div>
                  <div class="form__group">
                    <span class="label">身分別 <span class="text-red">*</span></span>
                    <div class="radio__group">
                      <label for="work1">
                        <input type="radio" name="identity" id="work1" value="1">
                        <span>學生</span>
                      </label>
                      <label for="work2">
                        <input type="radio" name="identity" id="work2" value="2">
                        <span>上班族、社會人士</span>
                      </label>
                      <label for="work3">
                        <input type="radio" name="identity" id="work3" value="3">
                        <span>職業軍人、公家機關人員</span>
                      </label>
                      <label for="work4">
                        <input type="radio" name="identity" id="work4" value="4">
                        <span>自營商</span>
                      </label>
                      <label for="work5">
                        <input type="radio" name="identity" id="work5" value="5">
                        <span>其他</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form__group">
                  <span class="label">申請人LINE ID</span>
                  <div class="input">
                    <input type="text" name="line_id" placeholder="請輸入申請人LINE ID">
                  </div>
                </div>
                <div class="form__group">
                  <span class="label"></span>
                  <div class="input">
                    <img id="captcha_img" src="{{ captcha_src() }}" onclick="refreshCaptcha()">
                    <input type="captcha" name="captcha" placeholder="請輸入驗證碼">
                  </div>
                </div>
                <div class="form__group">
                  <br>
                  <p class="text-blue"><b>溫馨提醒<br>
                    資料送出後, 務必加入本公司LINE <a class="text-red" href="{{ $setting->line_link }}" target="_blank">{{ $setting->line_link }}</a><br>
                    加入後告知<span class="text-red">申辦人姓名</span>或<span class="text-red">身分證字號</span> 才能加速審核 </b></p>
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

<script src="/assets/web/js/jquery-3.6.0.min.js"></script>
<script src="https://code.essoduke.org/js/twzipcode/twzipcode.js"></script>
<script>
$(function() {
  const res_address = new TWzipcode(".res_address");
  const current_address =new TWzipcode(".current_address");
  
  $('#apply').click(function(e) {
      e.preventDefault();

      const current_address_dt = $('input[name=current_address_dt]').val()
      const res_address_dt = $('input[name=res_address_dt]').val()
      const get_res_address = res_address.get()[0]
      const get_current_address = current_address.get()[0]

      if (
        get_res_address.county == '' ||
        get_res_address.district == '' ||
        get_current_address.county == '' ||
        get_current_address.district == '' ||
        current_address_dt == '' ||
        res_address_dt == ''
      ) {
        alert('必填項目: 請填寫地址')
        return
      }


      const data = {
        type: $('select[name=type]').val(),
        product: $('select[name=product]').val(),
        name: $('input[name=name]').val(),
        id_number: $('input[name=id_number]').val(),
        age: $('input[name=age]').val(),
        res_address: get_res_address.zipcode + get_res_address.county + get_res_address.district + res_address_dt,
        current_address: get_current_address.zipcode + get_current_address.county + get_current_address.district + current_address_dt,
        phone: $('input[name=phone]').val(),
        identity: $('input[name=identity]').val(),
        line_id: $('input[name=line_id]').val(),
        captcha: $('input[name=captcha]').val(),
      }

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

function refreshCaptcha() {
  const captcha = $('#captcha_img');

  $.ajax({
      url: '/refreshCaptcha',
      success: function(src) {
        captcha.attr('src', src)
      }
  });
}
</script>