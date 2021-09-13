<aside class="left-sidebar" data-sidebarbg="skin5">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a href="/admin" class="sidebar-link waves-dark"><i class="mdi mdi-account-star"></i><span class="hide-menu">後台帳號</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="/admin/index/banner/list" class="sidebar-link waves-dark"><i class="mdi mdi-file-image"></i><span class="hide-menu">首頁輪播圖</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="/admin/about/list" class="sidebar-link waves-dark"><i class="mdi mdi-account"></i><span class="hide-menu">關於我們</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="/admin/qa/edit" class="sidebar-link waves-dark"><i class="mdi mdi-account"></i><span class="hide-menu">快速辦理QA</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="/admin/types/list" class="sidebar-link waves-dark"><i class="mdi mdi-format-list-bulleted-type"></i><span class="hide-menu">產品分類</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="/admin/products/list" class="sidebar-link waves-dark"><i class="mdi mdi-codepen"></i><span class="hide-menu">產品列表</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="/admin/apply/list" class="sidebar-link waves-dark"><i class="mdi mdi-codepen"></i><span class="hide-menu">申請列表</span>
                    <span class="numberCircle"><span>{{ getApplyStatus0() }}</span></span>
                </a>
                </li>
                <li class="sidebar-item">
                    <a href="/admin/filemanager-page" class="sidebar-link waves-dark"><i class="mdi mdi-file-image"></i><span class="hide-menu">圖片管理</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="/admin/system/setting" class="sidebar-link waves-dark"><i class="mdi mdi-settings"></i><span class="hide-menu">系統設置</span></a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<style>
.numberCircle {
  display: inline-block;
  line-height: 0px;
  border-radius: 50%;
  border: 0;
  font-size: 12px;
  background: #e02828;
  position: absolute;
  right: 30px;
}

.numberCircle span {
  display: inline-block;
  padding-top: 50%;
  padding-bottom: 50%;
  margin-left: 6px;
  margin-right: 6px;
}
</style>