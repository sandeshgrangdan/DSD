$(document).click(function (event) {            
    $.ajax({
						url:"include/basket.php",
						success:function(value){
							var data = value.split(',');
							$('#service').html(data[0]);
							$('#total_p').html(data[1]);
						}
		   });
});