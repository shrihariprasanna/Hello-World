<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/jquery-1.7.1_min.js"></script>
<script>
   $(document).ready(function(){
		letters = /^[A-Za-z]+$/; 
		$('#form').submit(function() {
			if($('#name').val()== ""){
				alert('Please Enter your name.');
				$('#name').focus();
				return false;			
			}
			if(!($('#name').val().match(letters)))  {  
				alert('Name must have alphabet characters only');  
				$('#name').focus();  
				return false;  
			} 
			if($('#email').val()== ""){
				alert('Please Enter email address.');
				$('#email').focus();
				return false;			
			}
			if(!validateEmail($('#email').val())){
				alert('Please Enter valid email address.');
				$('#email').focus();
				return false;			
			}
			if($('#lang_1').val()== ""){
				alert('Please Enter language.');
				$('#lang_1').focus();
				return false;			
			}
		});
   });
   $(document).on('click', '.add_button', function() {
		var id = $(".input_fields:last input:first").attr("id").split('_')[1];
		var gen_id = parseInt(id)+1;
		var text = "<div class='input_fields authorlist'><input id=lang_"+gen_id+" type='text' class='languages' required><a href='javascript:void(0)' class='remove_author'><img src='images/remove-icon.png'></a><a href='javascript:void(0)' class='add_button'><img src='images/add-icon.png'></a></div>"
		var div  = $('div[class^="input_fields"]:last');
		var lang = div.clone();
		//alert(lang);
		//lang.find('a[class^="remove_author"]').show();
		//lang.find('input[id^="lang"]').prop({'value':''});
		div.after(text);
		return false;
	});
	
	$(document).on('click', '.remove_author', function(){
		if($('.authorlist').length > 1) {
			$(this).parents('.authorlist').remove();
		} else {
			alert("You can not remove language. Because minimum one language required.");
		}
		return false;
	});
function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}
</script>
<style>
input{
	margin:5px;
}
img{
	margin-right:5px;
}
</style>
</head>
<body>
	<div id="mainform">
	<form id="form" method="POST" action="form_submit.php">
		<?php if(isset($_REQUEST['mesg']) && $_REQUEST['mesg'] == 'success'){?>
			<p class="thanku-msg">Information Saved Successfully</p>
		<?php }?>
		<h3>Fill Your Information!</h3>
		<div>
			<label>Name:</label>
			<br/>
			<input type="text" id="name" placeholder="Your Name" name="name" required/><br/>
			<br/>
			<label>Email:</label>
			<br/>
			<input type="text" id="email" placeholder="Your Email" name="email" required/><br/>
			<label>Language</label>
			<div class="input_fields authorlist">
			<input type="text" placeholder="Your Language" name="mytext[]" id="lang_1" class="languages" required>
			<a href="javascript:void(0);" class="add_button" title="Add field"><img src="images/add-icon.png"/></a>
			</div>
			<br/>
			<input type="submit" name="submit" id="submit" value="Submit"/>
		</div>
	</form>
	</div>
</body>
</html>