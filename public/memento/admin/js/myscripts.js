
// pagination
function changeRecordsOnTable(url) {
	var records = $('#recordsOnTable').val();
	
    console.log(url + '/get-' + url);

	$.ajax({
	  type: "GET",
	  url: url + '/get-' + url,
	  data: {'records': records},
	}).done(function( data ) {
		 $('.box').html("<div class='box'>" + data + "</div>");
	  });
}

$('#search').click(function() {
	alert('111');
});

// Add image preview --- START
$('.image_sticks :input[name=image]').change(function(){
    readURL(this);
});

function readURL(input) {

    if (input.files && input.files[0]) {
		var reader = new FileReader();   

		$('.image_sticks div img').remove();
		$('.old_image').remove();

        reader.onload = function (e) {

        	var img = $('<img width="15%">');
				img.attr('src', e.target.result);
				img.appendTo('.image_sticks div');
        }

        reader.readAsDataURL(input.files[0]);
    }
}
// Add image preview --- END

// Sortable rows on the table
$(".table-sorting tbody").sortable({
	
	update: function( event, ui ) {
	    $(this).children().each(function(index) {
			$(this).find('td').first().html(index + 1);
	    });
	},

	stop: function(){
        var sorting = [];
        var _token = $('meta[name="_token"]').attr('content');
        var items =window.location.toString();
            items = items.split('/');
        var table = items[items.length-1];


		 $.map($(this).find('tr'), function(el) {
                var id = el.id;
                sorting[$(el).index()] = id;                 
          });       

         $.ajax({
                url: '/admin/order',
                type: 'GET',
                data: {
                    'table' : table,
                    sorting: sorting,
                    '_token' : '{{ csrf_token() }}'
                },
                success:function(data){
                  $("#msg").html(data.msg);
               },
               error: function(data){
                    
               }
        });
	}	
});





// CKEDITOR
CKEDITOR.replace('editor');
CKEDITOR.replace('editor2');