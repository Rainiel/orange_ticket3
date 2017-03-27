$(document).ready(function(){
$('.modal').modal();
$('select').material_select();
showUser();

$(document).on('click', '.UserView', function(){
	showUserInfo($(this).parent('tr').attr('data-Id3'));
	$('#ticketTable').hide();
	$('.123').show();
});

$(document).on('submit', '#addUser', function(e){
	e.preventDefault();
	base_url = $('#base1').val();
	var fname = $('#Ufname').val();
	var lname = $('#Ulname').val();
	var user = $('#Uusername').val();
	var pass = $('#Upassword').val();
	var cpass = $('#UCpassword').val();
	var acc = $('#Uacc').val();
	var uteam = $('#UTeam').val();
	$.ajax({
		type: "POST",
		url: base_url + 'User_control/addUser',
		data: {
			'fname': fname,
			'lname':lname,
			'user':user,
			'pass':pass,
			'cpass':cpass,
			'acc':acc,
			'uteam':uteam
		},
			success: function(data){
				if(pass == cpass){
				showUser();
				$('#modalClose').trigger('click');
				}
				else{alert("password not match");}
			},
			error: function(){
				alert();
			},
	});
});

$(document).on('click', '#editUserform', function(e){
	e.preventDefault();
	base_url = $('#base1').val();
	var id 	  = $('#UserId').val();
	var Ufname =	$('#Ufname').val();
	var Ulname =	$('#Ulname').val();
	var Uuser  = 	$('#Uusername').val();
	var Upass  =	$('#Upassword').val();
	$.ajax({
		type: "POST",
		url: base_url + 'User_control/editUser',
		data: {'id': id,
			'Ufname': Ufname,
			'Ulname': Ulname,
			 'Uuser' : Uuser,
			 'Upass' : Upass
			  },
		success: function(){
			showUser();
			$('#modalClose2').trigger('click');
		},
	});
});

$(document).on('click', '#userBtn', function(){
	var id = $(this).data('id');
	$('#UserId').val(id);
});

function showUser(){
	var $Acc_type = $('#account').val();
		$.ajax({
			type:'ajax',
			url: 'User_control/showUser',
			dataType:'json',
			success: function(data)
			{
				var body='';
				var i;

				for(i=0;i<data.length;i++)
				{
				if($Acc_type != 'user'){
					body+=	'<tr>'+
	                '<td><center>'+data[i].userId+'</center></td>'+
	                '<td><center>'+data[i].fname+'&nbsp;'+data[i].lname+'</center></td>'+
	                '<td><center>'+data[i].account_type+'</center></td>'+
	                '<td><center><a onclick="showUsernInfo('+data[i].userId+')" id="userBtn" data-id="'+data[i].userId+'" class="waves-effect waves-light btn" href="#modal2">Info</a></center></td>'+
	                '</tr>';
					}
				}
				$('#showUser').html(body);
			},
			error: function()
			{
				alert('dito pumapasok');
			},
		});
	}
 });

function showUsernInfo(id){
	$.ajax({
			url : 'User_control/getUser',
			type :'POST',
			data : {
				'id' : id
			},
			dataType: 'JSON',
			success: function(data){
				var Ufname='';
				var Ulname='';
				var Uusername='';
				var Upassword='';


					Ufname += '<input type="text" class="validate" id="Ufname" value="'+data.fname+'" required>'+
                  '<label class="active" for="Ufname">First Name</label>';

					Ulname += '<input type="text" class="validate" id="Ulname" value="'+data.lname+'" required>'+
                  '<label class="active" for="Ulname">Last Name</label>';

					Uusername += '<input type="text" class="validate" id="Uusername" value="'+data.username+'" required>'+
                	'<label class="active" for="Uusername">Username</label>';

					Upassword += '<input type="password" id="Upassword" value="'+data.password+'" required>'+
                  '<label class="active" for="Upassword">Password</label>';


				$('#Userfname').html(Ufname);
				$('#Userlname').html(Ulname);
				$('#Userusername').html(Uusername);
				$('#Userpassword').html(Upassword);
			},
			error: function(){
				alert('error');
			},
		});
}
