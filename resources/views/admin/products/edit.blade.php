@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/libs/bootstrap-datetimepicker/dist/css/bootstrap-datetimepicker.min.css">

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">
        產品{{ $word }}
      </h4>
      <div class="ml-auto text-right">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">首頁</a></li>
            <li class="breadcrumb-item"><a href="/admin/products/list">產品列表</a></li>
            <li class="breadcrumb-item active" aria-current="page">產品{{ $word }}</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<div id="app" class="container-fluid">
  <div class="row">
    <div class="col-12">
      <form id="form">
        <div class="card">
          <div class="card-body">
            <div class="form-group row">
              <label class="col-md-1 m-t-15">產品分類(第一層)<span class="text-danger">*</span></label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <select name="mainTypes" class="form-control" @change="changeMainTypes($event)">
                  <option value="">請選擇</option>
                  <option :value="type.id" v-for="type in mainTypes" :selected="mainTypesId == type.id">@{{ type.name }}</option>
                </select>
              </div>
            </div>
            <div class="form-group row" v-if="otherShowData.length">
              <label class="col-md-1 m-t-15">產品分類(第二層)<span class="text-danger">*</span></label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <select name="secTypes" class="form-control">
                  <option value="">請選擇</option>
                  <option :value="type.id" v-for="type in otherShowData" :selected="secTypesId == type.id">@{{ type.name }}</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">名稱<span class="text-danger">*</span></label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="text" name="name" class="form-control" value="{{ $name }}" placeholder="請輸入產品名稱">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">圖片<span class="text-danger">*</span></label>
              <div class="col-sm-12 col-md-10 col-lg-6">
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" data-input="thumbnail" data-preview="holder" class="btn btn-primary lfm">
                      <i class="fa fa-picture-o"></i> 選擇圖片
                    </button>
                  </span>
                  <input id="thumbnail" class="form-control" type="text" name="img_url" disabled value="{{ $imgUrl }}">
                </div>
                <div id="holder" style="margin:10px 0;max-height:200px;">
                  @if($imgUrl != '')
                    <img src="{{ $imgUrl }}" style="max-height: 200px;">
                  @endif
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">建議售價</label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="number" name="source_money" class="form-control" value="{{ $sourceMoney }}" placeholder="建議售價">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">月付(起)<span class="text-danger">*</span></label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="number" name="month_money" class="form-control" value="{{ $monthMoney }}" placeholder="月付(起)">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">分期(6期)</label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="number" name="month_money_6" class="form-control" value="{{ $staging_6 }}" placeholder="請輸入6期金額">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">分期(12期)</label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="number" name="month_money_12" class="form-control" value="{{ $staging_12 }}" placeholder="請輸入12期金額">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">分期(24期)</label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="number" name="month_money_24" class="form-control" value="{{ $staging_24 }}" placeholder="請輸入24期金額">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">分期(30期)</label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="number" name="month_money_30" class="form-control" value="{{ $staging_30 }}" placeholder="請輸入30期金額">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">標籤(請用,隔開)</label>
              <div class="col-sm-12 col-md-10 col-lg-4">
                <input type="text" name="tags" class="form-control" value="{{ $tags }}" placeholder="請輸入標籤 例如: 極速5G,新色系登場,無卡分期">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">規格介紹</label>
              <div class="col-sm-12 col-md-10">
              <textarea id="content_detail" name="content_detail" class="editor2" class="form-control" style="height: 300px">
              {{ $contentDetail }}
              </textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-1 m-t-15">詳情說明</label>
              <div class="col-sm-12 col-md-10">
              <textarea id="content" name="content" class="editor" class="form-control" style="height: 300px">
                {{ $content }}
              </textarea>
              </div>
            </div>
          </div>
          <div class="border-top">
            <div class="card-body">
              <button id="save" class="btn btn-primary">儲存</button>
            </div>
          </div>
          <input type="hidden" name="id" value="{{ $id }}">
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  new Vue({
    el: '#app',
    data: {
      mainTypes: [],
      otherTypes: [],
      otherShowData: [],
      mainTypesId: "{{ $mainTypes }}",
      secTypesId: "{{ $secTypes }}",
    },
    mounted() {
      this.init()
    },
    methods: {
      init() {
        const _this = this

        $.ajax({
          url: '/admin/types/list/data',
          success: function(res) {
            _this.mainTypes = res.mainTypes
            _this.otherTypes = res.otherTypes

            if (_this.secTypesId != '') {
              _this.computedOtherTypes(_this.mainTypesId)
            }
          }
        });
      },
      changeMainTypes(event) {
        this.computedOtherTypes(event.target.value)
      },
      computedOtherTypes(target) {
        const _this = this

        this.otherShowData = []
        this.otherTypes.forEach(function (item) {
          if (item.pid == target) {
            _this.otherShowData.push(item)
          }
        })
      }
    }
  })
  $(function() {
    $('#save').click(function(e) {
      e.preventDefault();
      const content = CKEDITOR.instances.content.getData()
      const content_detail = CKEDITOR.instances.content_detail.getData()

      const data = {
        name: $('input[name=name]').val(),
        img_url: $('input[name=img_url]').val(),
        id: $('input[name=id]').val(),
        mainTypes: $('select[name=mainTypes]').val(),
        secTypes: $('select[name=secTypes]').val(),
        month_money: $('input[name=month_money]').val(),
        source_money: $('input[name=source_money]').val(),
        month_money_6: $('input[name=month_money_6]').val(),
        month_money_6: $('input[name=month_money_6]').val(),
        month_money_12: $('input[name=month_money_12]').val(),
        month_money_24: $('input[name=month_money_24]').val(),
        month_money_30: $('input[name=month_money_30]').val(),
        tags: $('input[name=tags]').val(),
        content: content,
        content_detail: content_detail,
      }

      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/admin/products/doEdit',
        data: data,
        type: 'POST',
        success: function(res) {
          if (res.status == 'success') {
            alert('新增/編輯成功');
            location.reload();
          } else {
            toastr.warning(res.msg, '訊息');
          }
        }
      });
    });
  });
</script>
@endsection