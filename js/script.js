 $(document).ready(function(){
			 	$(".btns").click(function(){
					  $(".input").toggleClass("active").focus();
					  $(this).toggleClass("animate");
					  $(".input").val("");
           		});
           });


