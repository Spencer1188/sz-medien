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
			alert("reset");
		 /* var usr=$("#usredit").val();
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
		 } */

		}
