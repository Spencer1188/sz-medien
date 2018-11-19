		// User js

		$(document).ready(function() { 
			$(".dropdown-trigger").dropdown();
		});
		
		 $(document).ready(function(){
			$('.modal').modal();
			$('select').formSelect();
		  });


	function do_insert()
		{
		 var usr=$("#usr").val();
		 var pass=$("#pw").val();
		 var group=$("#group").val();
		
		 if(usr!="" && group!="" && pass !="")
		 {
			  $.ajax
			  ({
			  type:'post',
			  url:'php/usr_insert.php',
			  data:{
			   usr:usr,
			   password:pass,
			   group: group
			  },
			  success:function() {
				  $("#user_show").load('php/get_user.php');
				  M.toast({html: 'Benutzer erstellt!'})
			  },			
			  error:function() {
				  M.toast({html: 'Benutzer erstellen fehlgeschlagen!'})
			  }
			  });
		 }else {
		  alert("Please Fill All The Details");
		 }

		}

	function do_delete(id)
		{

			  $.ajax
			  ({
			  type:'post',
			  url:'php/usr_delete.php',
			  data:{
			   val:id
			  },
			  success:function() {
				  $("#user_show").load('php/get_user.php');
				  M.toast({html: 'Benutzer gelöscht!'})
			  },			
			  error:function() {
				  M.toast({html: 'Benutzer löschen fehlgeschlagen!'})
			  }
			  });

		}
	function do_edit(id)
		{
			
		 var usr=$("#usredit").val();
		 var group=$("#grpedit").val();
			
		 if(usr!="" && group!="")
		 {
			  $.ajax
			  ({
			  type:'post',
			  url:'php/usr_edit.php',
			  data:{
			   usr:usr,
			   group: group,
			   id:id
			  },
			  success:function() {
				  $("#user_show").load('php/get_user.php');
				  M.toast({html: 'Gespeichert!'})
			  },			
			  error:function() {
				  M.toast({html: 'Bearbeiten fehlgeschlagen!'})
			  }
			  });
		 } else {
		  alert("Please Fill All The Details");
		 }

		}

	function do_reset(id)
		{
		 var id=$(".prrs").attr('id');
		 var newpw1=$("#pw2").val();
		 var newpw2=$("#pw3").val();
			
		 if(newpw1!="" && newpw2!="")
		 {
			  $.ajax
			  ({
			  type:'post',
			  url:'php/usr_reset_pw.php',
			  data:{
			   newpw1: newpw1,
			   newpw2: newpw2,
			   id: id
			  },
			  success:function(data) {
				  if(data == "ok"){
					 M.toast({html: 'Passwort geändert!'})
			  		}else if(data = "ng"){
					 M.toast({html: 'Passwort ändern fehlgeschlagen - Passwörter übereinstimmen nicht!'})
					}else{
				     M.toast({html: 'Passwort ändern fehlgeschlagen!'})
					}
			  },			
			  error:function() {
				  M.toast({html: 'Passwort ändern fehlgeschlagen!'})
			  }
			  });
		 } else {
		  alert("Please Fill All The Details");
		 } 

		}

		function do_login()
		{
		 var usr=$("#usrname").val();
		 var pass=$("#password").val();
		
		 if(usr!="" && pass!="" )
		 {
			  $.ajax
			  ({
			  type:'post',
			  url:'php/userlogin.php',
			  data:{
			   username:usr,
			   pw:pass
			  },
			  success:function(data) {
				  if(data == "error"){
					M.toast({html: 'Fehler beim Login!'})
				  }else{
					 window.location.href = "admin.php";
				  }
			  },			
			  error:function() {
				  M.toast({html: 'Fehler beim Login!'})
			  }
			  });
		 }else {
		  alert("Please Fill All The Details");
		 } 

		}


