function validLogin(){
      var valid;	
	valid = validateContact();
      if(valid){
          
          $.ajax({
      type: "POST",
      url: "server/checkdata.php",
      data:$('#form').serialize(),
      dataType:'json',
      cache: false,
      success: function(data){
               
               
               if(data.status=='correct'){
                     window.location='server/index.php';
               }else{
                    $("#errorMessage").html(data.status);
               }
      },
      error:function(e){
    console.log('error'+e);  
    }
      });
      }
      
}

function validateContact() {
	var valid = true;
	$("#form input[required=true]").each(function(){
		$(this).removeClass('invalid');
		$(this).attr('title','');
		if(!$(this).val()){ 
			$(this).addClass('invalid');
			$(this).attr('title','This field is required');
			valid = false;
		}
		if($(this).attr("type")=="email" && !$(this).val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)){
			$(this).addClass('invalid');
			$(this).attr('title','Enter valid email');
			valid = false;
		}  
                if($(this).attr("type")=="password" && !$(this).val().match(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/)){
			$(this).addClass('invalid');
			$(this).attr('title','Enter valid password');
			valid = false;
		}  
                
	}); 
	return valid;
}

  $(function() {
    $( document ).tooltip({
		position: {my: "left top", at: "right top"},
	  items: "input[required=true]",
      content: function() { return $(this).attr( "title" ); }
    });
  });

function trim(str){
     var str=str.replace(/^\s+|\s+$/,'');
     return str;
}
