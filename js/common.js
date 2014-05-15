function increment(action, theId){
			

			$.post("includes/miscFunctions.php", {action: action,
										theId: theId
		   								},
						  function(data){

						if (data){
							alert(data);
						  }else{
						  	window.location.reload();
						  }
						  })	;
			return false;
		
		}
		

function postComment(){
			
			var myCommentTitle = document.getElementById('commentTitle').value;
			var myCommentBody = document.getElementById('commentBody').value;
			var myName = document.getElementById('name').value;
			
			if (document.getElementById('commentTitle').value == ""){
				
				$('#loginError').html("You must create a comment title!");
				
				return false;
				
			}
			
			if (document.getElementById('commentBody').value == ""){
				
				$('#loginError').html("You can not comment without commenting! <br /> Yes, that's sarcasm!");
				
				return false;
				
			}
			
			$.post("includes/miscFunctions.php", {action: "postComment",
										commentTitle: myCommentTitle,
										commentBody: myCommentBody,
										name: myName,
										rantId: rantId,
										theId: myId
										
		   								},
                function () {
                    window.location.reload();
						
						  })	;
			return false;
		
		}
		
function initLogin(){

    var myEmail, myPassword;

			myEmail = document.getElementById('theEmail').value;
			myPassword = document.getElementById('thePassword').value;
			
			
	
			$.post("includes/loginScript.php", {myEmail: myEmail,
										myPassword: myPassword,
										logMeIn: '1',
										redirect: redirect
		   								},
						  function(data){

						  $('#loginError').html(data);
						
						
						  })	;
			return false;
		
		}

function sendPass(){

    var myEmail, aValidEmail;

    myEmail = document.getElementById('theEmail').value;
	
	aValidEmail  = new RegExp(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
			
			
			if (!aValidEmail.test(myEmail)) {
				document.getElementById('loginError').innerHTML = "Please Enter A Valid Email Address";
				return false;
			}
			
	$.post("includes/miscFunctions.php", {action: "sendUserPass"	,
											myEmail: myEmail
		   								},
						  function(data){

						  $('#loginError').html(data);
						
						
						  })	;
			return false;




}
		
function edit(){
			
			
			$.post("includes/miscFunctions.php", {action: "getUserEdit"	,
												theId: myId
				   								},
						  function(data){

						  $('#profileContainer').html(data);
						   
						  })	;
			return false;
		
		}
		
		
		function update(){

            var myfName, mylName, myPenName, myEmail, myUpdates;

			myfName = document.getElementById('fName').value;

			mylName = document.getElementById('lName').value;

			myPenName = document.getElementById('penName').value;

			myEmail = document.getElementById('email').value;

			
			if (document.getElementById('updates').checked == true){
			myUpdates = "yes";
			}else{
			myUpdates = "no";
			}

			
			$.post("includes/miscFunctions.php", {action: "checkDuplicatePenName",
												theId: myId,
												penName: myPenName
				   								},
						  function(data){
						 	if (data || data != ""){
						 	
						 	$('#loginError').html(data);

						 	}else{

						        $.post("includes/miscFunctions.php", {action: "updateUser"	,
												theId: myId,
												fName: myfName,
												lName: mylName,
												penName: myPenName,
												email: myEmail,
												updates: myUpdates
				   								},
						  function(data){
						    window.location.reload();
						  });
						 	
						 	}
						  });
			
			
			return false;
		
		}
		
		
		function changePass(){
			
			
			$.post("includes/miscFunctions.php", {action: "getChangePass"	,
												theId: myId
				   								},
						  function(data){
						    $('#profileContainer').html(data);
						   
						  })	;
			return false;
		
		}
		
		function updatePass(){
			var myPassword, myNewPassword1, myNewPassword2;

			myPassword = document.getElementById('password').value;
			myNewPassword1 = document.getElementById('newPassword1').value;
			myNewPassword2 = document.getElementById('newPassword2').value;
			
			if (myNewPassword1 != myNewPassword2){
				document.getElementById('changePassTitle').style.color = "#ff0000";
				document.getElementById('changePassTitle').innerHTML = "Passwords Must Match";
				return false;
			}
			
			
			
			$.post("includes/miscFunctions.php", {action: "changePass",
												theId: myId,
												password: myPassword,
												newPassword: myNewPassword1
				   								},
						  function(data){

						  $('#changePassTitle').html(data);
						   
						  })	;
			return false;
		
		}
		
function postRant(){

    var myRantTitle, myRantType, myRantCategory, myRantBody, myName;

			myRantTitle = document.getElementById('rantTitle').value;
			myRantType = document.getElementById('rantType').value;
			myRantCategory = document.getElementById('rantCategory').value;
			myRantBody = document.getElementById('rantBody').value;
			myName = document.getElementById('name').value;
			
			if (document.getElementById('rantTitle').value == ""){
				
				$('#loginError').html("You must create a rant title!");
				
				return false;
				
			}
			
			if (document.getElementById('rantType').value == "none"){
				
				$('#loginError').html("You must choose a rant type!");
				
				return false;
				
			}
			
			if (document.getElementById('rantCategory').value == "none"){
				
				$('#loginError').html("You must choose a rant category!");
				
				return false;
			}

			
			
			$.post("includes/miscFunctions.php", {action: "postRant",
										rantTitle: myRantTitle,
										rantType: myRantType,
										rantCategory: myRantCategory,
										rantBody: myRantBody,
										name: myName,
										theId: myId
										
		   								},
						  function(data){

						window.location = "index.php";

						
						  })	;
			return false;
		
		}

function updateRant(){
    var myRantId, myRantTitle, myRantType, myRantCategory, myRantBody, myName;

			myRantId = document.getElementById('rantId').value;
			
			
			myRantTitle = document.getElementById('rantTitle').value;
			
			myRantType = document.getElementById('rantType').value;
			
			myRantCategory = document.getElementById('rantCategory').value;
			
			myRantBody = document.getElementById('rantBody').value;
			
			myName = document.getElementById('name').value;
			
			

			if (document.getElementById('rantTitle').value == ""){
				
				$('#loginError').html("You must create a rant title!");
				
				
				
			}
			
			if (document.getElementById('rantType').value == "none"){
				
				$('#loginError').html("You must choose a rant type!");
				
				return false;
				
			}
			
			if (document.getElementById('rantCategory').value == "none"){
				
				$('#loginError').html("You must choose a rant category!");
				
				return false;
			}

			
			
			$.post("includes/miscFunctions.php", {action: "updateRant",
										rantId: myRantId,
										rantTitle: myRantTitle,
										rantType: myRantType,
										rantCategory: myRantCategory,
										rantBody: myRantBody,
										name: myName,
										theId: myId
										
		   								},
						  function(data){

						window.location = "fullRant.php?rantId=" + myRantId;
						
						  })	;
			return false;
		
		}
			
function register(){

    var myfName, mylName, myPenName, myEmail, myPassword, confirmPassword, myUpdates, myStatus, aValidEmail;

			myfName = document.getElementById('fName').value;
			mylName = document.getElementById('lName').value;
			myPenName = document.getElementById('penName').value;
			myEmail = document.getElementById('email').value;
			myPassword = document.getElementById('password').value;
			confirmPassword = document.getElementById('password2').value;
			
			if (document.getElementById('updates').checked == true){
			myUpdates = "yes";
			}else{
			myUpdates = "no";
			}
			myStatus = "active";
						
			if (myfName == ""){
			
			document.getElementById('registerError').innerHTML = "First Name Required";
				return false;
			}
			
			if (mylName == ""){
			
			document.getElementById('registerError').innerHTML = "Last Name Required";
				return false;
			}
			
			if (myPenName == ""){
			
			document.getElementById('registerError').innerHTML = "Pen Name Required";
				return false;
			}
			
			aValidEmail  = new RegExp(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
			
			
			if (!aValidEmail.test(myEmail)) {
				document.getElementById('registerError').innerHTML = "Valid Email Address Required";
				return false;
			}
			
			if ((myPassword != confirmPassword) || myPassword == ""){
			
				document.getElementById('registerError').innerHTML = "Passwords Must Match";
				return false;
			}

			
			$.post("includes/miscFunctions.php", {action: "checkDuplicatePenName",
												theId: '*',
												penName: myPenName
				   								},
						  function(data){
						 	if (data || data != ""){
						 	
						 	$('#registerError').html(data);
						 	

						 	}else{
			
			$.post("includes/registerScript.php", {fName: myfName,
										lName: mylName,
										penName: myPenName,
										email: myEmail,
										password: myPassword,
										updates: myUpdates,
										status: myStatus
		   								},
						  function(data){

						  $('#registerError').html(data);
						
						
						  })	;
						  }
						  })	;
			return false;
		
		}
	
function invite(){

    var myName, myEmail, myFriend1, myFriend2, myFriend3, myFriend4, myFriend5, aValidEmail;

			myName = document.getElementById('name').value;
			myEmail = document.getElementById('email').value;
			myFriend1 = document.getElementById('friend1').value;
			myFriend2 = document.getElementById('friend2').value;
			myFriend3 = document.getElementById('friend3').value;
			myFriend4 = document.getElementById('friend4').value;
			myFriend5 = document.getElementById('friend5').value;
			
			
			aValidEmail  = new RegExp(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
			
			
			if (!aValidEmail.test(myEmail)) {
				document.getElementById('registerError').innerHTML = "Valid Email Address Required";
				return false;
			}
			
			aValidEmail  = new RegExp(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
			
			
			if (!aValidEmail.test(myFriend1) && myFriend1 != "") {
				document.getElementById('registerError').innerHTML = "Friend 1 Email Is Not Valid";
				return false;
			}
			
			if (!aValidEmail.test(myFriend2) && myFriend2 != "") {
				document.getElementById('registerError').innerHTML = "Friend 2 Email Is Not Valid";
				return false;
			}
			
			if (!aValidEmail.test(myFriend3) && myFriend3 != "") {
				document.getElementById('registerError').innerHTML = "Friend 3 Email Is Not Valid";
				return false;
			}
			
			if (!aValidEmail.test(myFriend4) && myFriend4 != "") {
				document.getElementById('registerError').innerHTML = "Friend 4 Email Is Not Valid";
				return false;
			}
			
			if (!aValidEmail.test(myFriend5) && myFriend5 != "") {
				document.getElementById('registerError').innerHTML = "Friend 5 Email Is Not Valid";
				return false;
			}
			
			$.post("includes/miscFunctions.php", {action: "inviteFriends",
										myName: myName,
										myEmail: myEmail,
										myFriend1: myFriend1,
										myFriend2: myFriend2,
										myFriend3: myFriend3,
										myFriend4: myFriend4,
										myFriend5: myFriend5
										
		   								},
						  function(data){

						  $('#registrationContainer').html(data);

						
						  })	;
			
	return false;
}


function sendFeedback(){

    var myName, myEmail, myComments, aValidEmail;

			myName = document.getElementById('name').value;
			myEmail = document.getElementById('email').value;
			myComments = document.getElementById('comments').value;

			
			aValidEmail  = new RegExp(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
			
			if (myName == ""){
			
			    document.getElementById('registerError').innerHTML = "Name Required";
			    document.getElementById('name').focus();
				return false;
			}
			
			if (!aValidEmail.test(myEmail)) {
				document.getElementById('registerError').innerHTML = "Valid Email Address Required";
				document.getElementById('email').focus();
				return false;
			}
			
			if (myComments == ""){
			
			    document.getElementById('registerError').innerHTML = "You have not entered any feedback";
			    document.getElementById('comments').focus();
				return false;
			}
			
			$.post("includes/miscFunctions.php", {action: "sendFeedback",
										myName: myName,
										myEmail: myEmail,
										myComments: myComments
										
		   								},
						  function(data){
						  $('#feedBackContainer').html(data);

						
						  })	;
			
	return false;
}



function ToggleMenu(){
	if (document.getElementById('menu').style.display == "none"){
		document.getElementById('menu').style.display = "block";
		document.getElementById('menuButtonText').innerHTML = "HIDE MENU";
			
	
	}else{
		document.getElementById('menu').style.display = "none";
		document.getElementById('menuButtonText').innerHTML = "SHOW MENU";
	}
return false;
}	

function ToggleSubMenu(){
	if (document.getElementById('subMenu').style.display == "none"){
		document.getElementById('subMenu').style.display = "block";
		
	}else{
		document.getElementById('subMenu').style.display = "none";
		
	}
return false;
}	

function toggleSearch(){
	if (document.getElementById('searchBox').style.display == "none"){
		document.getElementById('searchBox').style.display = "block";
	}else{
		document.getElementById('searchBox').style.display = "none";
		
	}
return false;
}	
