<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Contact Us</title>
    <link type="text/css" href="styles/style.css" rel="stylesheet" />
    <!--script src="js/jquery-1.7.1.js"></script>
	
	<!-- JAVASCRIPT-->
	<script type="text/javascript">
			$(document).ready(function(){

		/* === Black Function === */
		
		function black(){
				if($("#black").is(":visible")){
					$("#black").fadeOut(700);
				}else{
					$("#black").fadeIn(700);
				}
		}
	
		/* === Ajax Loader === */
		
		$('.loader').ajaxStart(function() {
			$(this).fadeIn(300);
		});
				
		$('.loader').ajaxStop(function() {
			$(this).fadeOut(300);
		});
		
		/* === Show The Reset Password Popup Screen === */
		
		$("#forgot").live("click",function(){
			$(".popupScreen").show();
			black();
		});
		
		/* === Close The Reset Password Popup Screen === */
		
		$(".popupScreen img").live("click",function(){
			$(".popupScreen").hide();
			black();
		});	
		
		/* === Show The Change Password Popup Screen === */
		
		$("#changePassword").live("click",function(){
			$(".popupScreen2").show();
			black();
		});
		
		/* === Close The Change Password Popup Screen === */
		
		$(".popupScreen2 img").live("click",function(){
			$(".popupScreen2").hide();
			black();
		});	
		
		
		function getSessionId()
		{
			var getsessionid = "getsessionid";
			$.ajax({
					type : "post",
					url  : "php_ajax/request.php",
					data : "getsessionid=" + getsessionid,
					success : function(n){
						try
						{
							var value = n;
							$("input[name=valid]").val(n);
						}
						catch(e)
						{
							alert("Error : " + ex);
						}
					}
				});
		}
		
		getSessionId();
	
		/* === Login Form Submit === */
		
		$("#formLogin").live("submit",function(){
			
				$.ajax({
					type : "post",
					url  : "php_ajax/login_ajax.php",
					data : $("#formLogin").serialize(),
					success : function(n){
						try{
							var value = n;
							value = value.trim();
								if(value == "no_value")
								{
									alert("Incorrect username or password. Please try again.");
								}
								else
								{	
									window.location = n;
								}
							$("#formLogin").each(function(){
								this.reset();
							});
							getSessionId();
						}catch(e){
							alert("Error Message : " + e);
						}
					}
				});
		});
		
		/* === Register Form Submit === */
		
		$("#formRegister").live("submit",function(){
			
			var password = $("input[name=registerPassword]").val();
			var repassword = $("input[name=registerRePassword]").val();

			if(password == repassword){
				$.ajax({
					type : "post",
					url  : "php_ajax/register_ajax.php",
					data : $("#formRegister").serialize(),
					success : function(n){
						try{
							alert(n);
							$("#formRegister").each(function(){
								this.reset();
							});
							getSessionId();
						}catch(e){
							alert("Error Message : " + e);
						}
					}
				});
			}else{
				alert("Entered password don't match with each other. Please try again");
			}
			
		});
		
		/* === Form Reset Password Submit === */
		
		$("#formReset").live("submit",function(){
			$.ajax({
					type : "post",
					url  : "php_ajax/reset_password_ajax.php",
					data : $("#formReset").serialize(),
					success : function(n){
						try{
							alert(n);
							$("#formReset").each(function(){
								this.reset();
							});
							$(".popupScreen").hide();
							black();
							getSessionId();
						}catch(e){
							alert("Error Message : " + e);
						}
					}
				});
		});
		
		/* === Form Change Password Submit === */
		
		$("#formChangePassword").live("submit",function(){
			
			var newPassword = $("input[name=newPassword]").val();
			var newRePassword = $("input[name=re-newPassword]").val();
			
			if(newPassword == newRePassword){
			
			$.ajax({
					type : "post",
					url  : "php_ajax/change_password_ajax.php",
					data : $("#formChangePassword").serialize(),
					success : function(n){
						try{
							alert(n);
							$("#formChangePassword").each(function(){
								this.reset();
							});
							$(".popupScreen2").hide();
							black();
							getSessionId();
						}catch(e){
							alert("Error Message : " + e);
						}
					}
				});
			}else{
				alert("Entered password don't match with each other. Please try again");
			}	
				
		});
		
		
	});


		</script>
	 <!--JAVASCRIPT -->
	
</head>
<body>
	<!-- FORM LOGIN OR REGISTER AND POPUP FORMS-->
	
	
	<!-- BEGIN THIS IS FOR BLACK BACKGROUND -->
	<div id="black">
	
	</div><!-- end div #black-->
	<!-- END THIS IS FOR BLACK BACKGROUND -->
	
	<!-- BEGIN LOGIN OR REGISTER FORM -->
		<div class="mainDiv">
			<div class="formDiv">
				<div class="loader"></div>
			<!-- BEGIN FORM TITLE -->
				<div class="formTitle" >
					Login or Register
				</div><!-- end div .formTitle -->
			<!-- END FORM TITLE -->
					
					<!-- BEGIN REGISTER FORM -->
					<form id="formRegister" method="post" action="javascript:void(0);">
						<div class="formArea">
							<table >
								<tr>
									<input type="hidden" name="valid" value="" />
									<td><input type="text" id="name"  class="input" name="name" value="" placeholder="Please enter your username" required /></td>
								</tr>
								<tr>
									<td><input type="email" id="mail"  class="input" name="mail" value="" placeholder="Please enter your e-mail" required /></td>
								</tr>
								<tr>
									<td><input type="password" id="password"  class="input" name="registerPassword" value="" placeholder="Please enter your password" required /></td>
								</tr>
								<tr>
									<td><input type="password" id="re-password"  class="input" name="registerRePassword" value="" placeholder="Please enter your re-password" required /></td>
								</tr>
								<tr>
									<td><input type="submit" id="btnRegister"  class="button" name="btnSubmit" value="" /></td>
								</tr>
							</table>
						</div><!-- end div .formArea -->
					</form>	<!-- end form .formRegister -->
					<!-- END REGISTER FORM -->
					
					<!-- BEGIN LOGIN FORM -->
					<form id="formLogin" method="post" action="javascript:void(0);">
						<div class="formArea" style="float:right;">
							<table >
								<tr>
									<td><a href = "redirect_facebook.php"><img src="Images/reg/fb.png" id="facebook"></a></td>
									<td><a href = "redirect_twitter.php"><img src="Images/reg/twt.png" id="twitter"></a></td>
								</tr>
								<tr>
									<td colspan="2"><div class="article">Or insert your account informations</div></td>
								</tr>
								
								<tr>
									<input type="hidden" name="valid" value="" />
									<td colspan="2"><input type="text" id="name"  class="input" name="username" value="" placeholder="Please enter your username" required /></td>
								</tr>
								<tr>
									<td colspan="2"><input type="password" id="password"  class="input" name="password" value="" placeholder="Please enter your password" required /></td>
								</tr>
								<tr>
									<td colspan="2"><input type="submit" id="btnLogin"  class="button" name="btnSubmit" value="" /></td>
								</tr>
							</table><!-- end div table -->
						</div><!-- end div .formArea -->
					</form> <!-- end form #formLogin -->
					<!-- END LOGIN FORM -->
			</div><!-- end div .formDiv -->
			
			<!-- BEGIN FOOTER -->
			<div class="footer">
				<div id="forgot" >
					Forgot your Password or Username ?
				</div> <!-- end div #forgot -->
				</br> 
				<div id="changePassword" >
					Change Your Password
				</div> <!-- end div #changePassword -->
			</div> <!-- end div .footer -->
			<!-- END FOOTER -->
			
		</div> <!-- end div .mainDiv -->
	<!-- END LOGIN OR REGISTER FORM -->
	
	
	<!-- BEGIN POPUP RESET PASSWORD FORM -->
	<form id="formReset" method="post" action="javascript:void(0);">
		<div class="popupScreen">
			<img src="Images/reg/close.png">
			<table>
				<tr>
					<td><div class="popupTitle">Reset Your Password</div></td>
				</tr>
				<tr>
					<input type="hidden" name="valid" value="" />
					<td><input type="email" id="mail"  class="input" name="mail" value="" placeholder="Please enter your e-mail" required /></td>
				</tr>
				<tr>
					<td><input type="submit" id="btnSend"  class="popupBtn" name="btnSubmit" value="Send" /></td>
				</tr>
			</table><!-- end table -->
		</div><!-- end div .popupScreen -->
	</form><!-- end form .formReset -->
	<!-- END POPUP RESET PASSWORD FORM -->
	
	<!-- BEGIN POPUP CHANGE PASSWORD FORM -->
	<form id="formChangePassword" method="post" action="javascript:void(0);">
		<div class="popupScreen2">
			<img src="Images/reg/close.png">
			<table>
				<tr>
					<td><div class="popupTitle">Change Your Password</div></td>
				</tr>
				<tr>
					<input type="hidden" name="valid" value="" />
					<td><input type="email" id="mail"  class="input" name="mail" value="" placeholder="Please enter your e-mail address" required /></td>
				</tr>
				<tr>
					<td><input type="password" id="oldpassword"  class="input" name="oldPassword" value="" placeholder="Please enter your current password" required /></td>
				</tr>
				<tr>
					<td><input type="password" id="password"  class="input" name="newPassword" value="" placeholder="Please enter your new password" required /></td>
				</tr>
				<tr>
					<td><input type="password" id="re-password"  class="input" name="re-newPassword" value="" placeholder="Please enter your new re-password" required /></td>
				</tr>
				<tr>
					<td><input type="submit" id="btnSend"  class="popupBtn" name="btnSubmit" value="Change" /></td>
				</tr>
			</table><!-- end table -->
		</div><!-- end div .popupScreen2 -->
	</form>
</body>
</html>