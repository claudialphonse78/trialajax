/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function validLogin(){
      var valid;	
	valid = validateContact();
      if(valid){
          
          $.ajax({
      type: "POST",
      url: "server/formsuccess.php",
      data:$('#form').serialize(),
      cache: false,
      success: function(result){
               var result=trim(result);
               
               if(result=='correct'){
                     window.location='login_1.html';
               }else{
                    $("#errorMessage").html(result);
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
                
             }   ); 
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
