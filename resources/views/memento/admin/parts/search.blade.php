@if($recordsOnPage)
	<div class="box-tools">
	  <div class="input-group">
	    <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="{{ $buttons['search'] }}"/>
	    <div class="input-group-btn">
	      <button class="btn btn-sm btn-default" id="search"><i class="fa fa-search"></i></button>
	    </div>
	  </div>
	</div>
@endif