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


	function do_insert_cam()
		{
			
		 var ivnr = $("#inr").val();
		 var name = $("#name").val();
		 var marke = $("#marke").val();
		 var bes = $("#beschreibung").val();
		 var typ = $("#typ").val();
		 var afl = $("#afl").val();
		 var akl = $("#akl").val();
		 var spmed = $("#spmed").val();
		 var vsz = $("#vsz").val();
		 var iso = $("#iso").val();
		 var gewicht = $("#gewicht").val();
		 var dim = $("#dim").val();
			
		if(ivnr!="" && name!="")
		 {
			  $.ajax
			  ({
			  type:'post',
			  url:'php/cam_insert.php',
			  data:{
				  ivnr: ivnr,
				  name: name,
				  marke: marke,
				  bes: bes,
				  typ:typ,
				  afl: afl,
				  akl: akl,
				  spmed: spmed,
				  vsz:vsz,
				  iso:iso,
				  gw:gewicht,
				  dim: dim
			  },
			  success:function(data) {
				  if(data == "ok"){
				 	$("#pre-loader").load('php/get_pic_ins.php');
					  }else{
						  alert(data);
					  }
			  },			
			  error:function() {
				  M.toast({html: 'Cam erstellen fehlgeschlagen!'})
			  }
			  });
		 } else {
		  alert("Please Fill All The Details");
			 $("#pre-loader").load('php/get_cam_ins.php');
		 } 

		}


