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
            <div class="form">
              <div class="form__title">選擇購買商品</div>
              <div class="form__group">
                <span class="label">1. 產品類型</span>
                <div class="input">
                  <select>
                    <option>請選擇產品類別</option>
                  </select>
                </div>
              </div>
              <div class="form__group">
                <span class="label">2. 產品品牌</span>
                <div class="input">
                  <select>
                    <option>請選擇產品品牌</option>
                  </select>
                </div>
              </div>
              <div class="form__group">
                <span class="label">3. 產品期數</span>
                <div class="input">
                  <select>
                    <option>請選擇期數</option>
                  </select>
                </div>
              </div>
              <div class="form__group">
                <span class="label">4. 商品</span>
                <div class="input">
                  <select>
                    <option>請選擇商品</option>
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
                    <input type="text">
                  </div>
                </div>
                <div class="form__group">
                  <span class="label">聯絡電話 <span class="text-red">*</span></span>
                  <div class="input">
                    <input type="tel">
                  </div>
                </div>
              </div>
              <div class="form__group form__inline">
                <div class="form__group">
                  <span class="label">居住縣市 <span class="text-red">*</span></span>
                  <div class="input">
                    <select>
                      <option>居住縣市</option>
                    </select>
                  </div>
                </div>
                <div class="form__group">
                  <span class="label">台北市</span>
                  <!-- 跟著左邊選項 -->
                  <div class="input">
                    <select>
                      <option>居住縣市</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form__group form__inline">
                <div class="form__group">
                  <span class="label">職業 <span class="text-red">*</span></span>
                  <div class="radio__group">
                    <label for="work1">
                      <input type="radio" name="work" id="work1">
                      <span>學生</span>
                    </label>
                    <label for="work2">
                      <input type="radio" name="work" id="work2">
                      <span>上班族、社會人士</span>
                    </label>
                    <label for="work3">
                      <input type="radio" name="work" id="work3">
                      <span>職業軍人、公家機關人員</span>
                    </label>
                    <label for="work4">
                      <input type="radio" name="work" id="work4">
                      <span>自營商</span>
                    </label>
                  </div>
                </div>
                <div class="form__group">
                  <span class="label">年紀 <span class="text-red">*</span></span>
                  <div class="radio__group">
                    <label for="year1">
                      <input type="radio" name="year" id="year1">
                      <span>18-19歲 需法定代理人同意</span>
                    </label>
                    <label for="year2">
                      <input type="radio" name="year" id="year2">
                      <span>20-30歲</span>
                    </label>
                    <label for="year3">
                      <input type="radio" name="year" id="year3">
                      <span>30-40歲</span>
                    </label>
                    <label for="year4">
                      <input type="radio" name="year" id="year4">
                      <span>40歲-50歲 50以上無法申辦</span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form__group">
                <br>
                <p class="text-blue"><b>確認送出訂單後<br>
                  請等候約5秒，謝謝<br>
                  並且主動與我們LINE客服聯絡</b></p>
                <br>
                <hr>
              </div>
              <div class="form__group">
                <button class="form__btn">確認送出</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection