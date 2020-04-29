     $(document).ready(function() {
 
          $("#slider").slider({
              range: "min",
              animate: true,
              value:0,
              min: 0,
              max: 10,
              slide: function(event, ui) {
                update(1,ui.value); //changed
              },
              change: function(event, ui) {
            	var uiValue = (ui.value);
		         	var room = $('#selectRoom').find(":selected").val();
		         	if(room == "Not at all"){
		         		var total = uiValue * 1;
		         	}else if (room == "Somewhat") {
		         		
		         		var total = uiValue * 2;
		         	}else if (room == "Neutral") {
		         		
		         		var total = uiValue * 3;
		         	}else if (room == "Very") {
		         		
		         		var total = uiValue * 4;
		         	}else if (room == "Extremely") {
		         		
		         		var total = uiValue * 5;
		         	}

		         	$( "#totalAmount" ).text(total);
					
					   //ajax
             var totalAmount1 = $( "#totalAmount" ).text();
             var amountLabel1 = $( "#amount-label" ).text();
             var room1 = $('#selectRoom').find(":selected").val();
			 $('#form').submit(function(e){
			  e.preventDefault();
			  var formData = new FormData($(this)[0]);
			  $.ajax({
				url:'dataPost.php?totalAmount='+totalAmount1+'&amountLabel='+amountLabel1+'&room='+room1,
				type:'GET',
				cache: false,
				contentType: 'application/json',
				 success: function(result){
				 console.log(result);
				 }
			  });
			 });
        	}
        	
          });
 
          function update(slider,val) {
        //changed. Now, directly take value from ui.value. if not set (initial, will use current value.)
        var $amount = slider == 1?val:$("#amount").val();
               
         $( "#amount" ).val($amount);
         $( "#amount-label" ).text($amount);

         $('#slider a').html('<label>'+$amount+'</label>');

         $('#selectRoom').change(function() {
         	var room = $('#selectRoom').find(":selected").val();
         	if(room == "Not at all"){
         		var total1 = $amount * 1;
         	}else if (room == "Somewhat") {
         		
         		var total1 = $amount * 2;
         	}else if (room == "Neutral") {
         		
         		var total1 = $amount * 3;
         	}else if (room == "Very") {
         		
         		var total1 = $amount * 4;
         	}else if (room == "Extremely") {
         		
         		var total1 = $amount * 5;
         	}
         	$( "#totalAmount" ).text(total1);
			     //ajax
           var totalAmount = $( "#totalAmount" ).text();
           var amountLabel = $( "#amount-label" ).text();
           var room = $('#selectRoom').find(":selected").val();
			$('#form').submit(function(e){
			  e.preventDefault();
			  var formData = new FormData($(this)[0]);
			  $.ajax({
				url:'dataPost.php?totalAmount='+totalAmount+'&amountLabel='+amountLabel+'&room='+room,
				type:'GET',
				cache: false,
				contentType: 'application/json',
				 success: function(result){
				 console.log(result);
				 }
			  });
			 });
		});

	}
});