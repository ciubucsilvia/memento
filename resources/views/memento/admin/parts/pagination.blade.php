<div class="box-body">
    <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">

    <div class="row">
      <div class="col-xs-6">
        <div id="example1_info" class="dataTables_info">{{ $paginate['entries'] }}</div>
      </div>
      <div class="col-xs-6">
        <div class="dataTables_paginate paging_bootstrap">
          {!! $pagination !!}
        </div>
      </div>
    </div>
  </div>
</div><!-- /.box-body -->