check_group_availlability();
check_username_availlability();
check_password_matching();

function check_username_availlability(){
	$(document).ready(function(){
			$('#name').blur(function(){
				$.ajax({
						url: '../models/ajax.php', 
						data: {'name' : $('#name').val()},
						success: success,
						//timeout: 1000,
						dataType: 'json'
				  		})
				.done(function(data){
	   						 // alert( "Returning " + data );
	   				 	if (data==0){
	   				 		$('#name_error').html("");//Aici setezi textul in div-ul de langa name
	   				 	}
	   					else{
	   						$('#name_error').html("<h4><spanred><spangre>"+$('#name').val()+ "</spangre> is already taken ! Please choose another one</spanred></h4>");
	   					}
	  			});
			});
			function success(){
				console.log("Ajax Success Called check_username_availlability");
			  				}
		});
}

function check_group_availlability(){
	$(document).ready(function(){
		$('#groupname').blur(function(){
			$.ajax({
				url: '../models/ajax.php',
				data: {'groupname' : $('#groupname').val()},
				success: success,
				dataType: 'json'
				})
			.done(function(data){
				if (data==0){
					$('#group_error').html("");//Aici setezi textul in div-ul de langa name
				}else{
					$('#group_error').html("<h4><spanred><spangre>"+$('#groupname').val()+"</spangre> group already exists!</spanred></h4>");
				}
			})
			});
		function success(){
				console.log("Ajax Success Called check_group_availlability");
			  				}
		});

}

function check_password_matching(){

	$(document).ready(function(){
		//Grab the input for password
		$('#pass_conf').blur(function(){
			password = $('#password').val();
			pass_conf = $('#pass_conf').val();
			if (password == pass_conf){
				//$('#password_error').html("Your password is ok!");//alert("passwords are the same!");	
			}else{
				$('#password_error').html("<h4><spanred>Can't you just type the same password twice !?!?</spanred></h4>");
			}
		});		
	});

}
