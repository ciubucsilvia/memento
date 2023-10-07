<?php if($recordsOnPage): ?>
	<div class="dataTables_length" id="example1_length">
	  <label>
	    <?php echo Form::select('records', $records, $record, ['onchange' => "changeRecordsOnTable('" . $page . "')", 'id' => 'recordsOnTable']); ?>

	  </label>
	</div> 
<?php endif; ?>