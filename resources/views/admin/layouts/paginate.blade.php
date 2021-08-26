<div class="col-sm-12 col-md-7">
    <div class="dataTables_paginate paging_simple_numbers">
        <ul class="pagination">
            <li class="page-item previous">
            <a href="{{ getPaginteLink('prev', $page, $datas['last_page']) }}" class="page-link"><</a></li>
            @for($i = 1; $i <= $datas['last_page']; $i++)
            <li class="{{ $i == $page ? 'page-item active' : 'page-item'}}"><a href="{{ getPaginteLink('', $i, $datas['last_page']) }}"  class="page-link">{{ $i }}</a></li>
            @endfor
            <li class="page-item next"><a href="{{ getPaginteLink('next', $page, $datas['last_page']) }}"  class="page-link">></a></li>
        </ul>
    </div>
</div>