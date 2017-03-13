$(document).ready(function(){
$('.modal').modal();
$('select').material_select();
showSubAdmin();

$(document).on('click', '.subAdminView', function(){
	showSubAdminInfo($(this).parent('tr').attr('data-Id3'));
	$('#ticketTable').hide();
	$('.123').show();
});

$(document).on('submit', '#addSubAdmin', function(e){
	e.preventDefault();
	base_url = $('#base1').val();
	$.ajax({
		type: "POST",
		url: base_url + 'SubAdmin_control/addSubAdmin',
		contentType: false,
		cache: false,
		processData: false,
		data: new FormData(this),
			success: function(data){
				showSubAdmin();
				$('#modalClose').trigger('click');
			},
			error: function(){
				alert();
			},
	});
});

$(document).on('click', '#editSAform', function(e){
	e.preventDefault();
	base_url = $('#base1').val();
	var id 	  = $('#subadminId').val();
	var fname =	$('#fname').val();
	var lname =	$('#lname').val();
	var team  = $('#SATeam').val();
	var user  = $('#user').val();
	var pass  =	$('#pass').val();
	$.ajax({
		type: "POST",
		url: base_url + 'SubAdmin_control/editSubAdmin',
		data: {'id': id,
			'SAfname': fname,
			'SAlname': lname,
			 'Team' : team,
			 'SAusername' : user,
			 'SApassword' : pass
	},
		// contentType: false,
		// cache: false,
		// processData: false,
		// data: new FormData(this),
		success: function(){
			showSubAdmin();
			$('#modalClose2').trigger('click');
		},
	});
});

$(document).on('click', '#subadminbtn', function(){
	var id = $(this).data('id');
	$('#subadminId').val(id);
})

function showSubAdmin(){
	var $Acc_type = $('#account').val();
		$.ajax({
			type:'ajax',
			url: 'SubAdmin_control/showSubAdmin',
			dataType:'json',
			success: function(data)
			{
				var body='';
				var i;

				for(i=0;i<data.length;i++)
				{
				var test = data[i].ticketId;
				if($Acc_type != 'user'){
					body+=	'<tr>'+
					//'<td style="width: 50px; padding-left: 20px;" data-id2="28"><input height="15px" width="15px" type="checkbox" class="filled-in fill-box" id="28" data-stat="Resolved" data-prio="Low" data-ass="3"><label for="28" style="margin-top: 15px;"></label></td>'+
	                '<td><center>'+data[i].userId+'</td>'+
	                '<td><center>'+data[i].fname+''+data[i].lname+'</center></td>'+
	                '<td><center>'+data[i].team+'</center></td>'+
	                '<td><center><a onclick="showSubAdminInfo('+data[i].userId+')" id="subadminbtn" data-id="'+data[i].userId+'" class="waves-effect waves-light btn modal-trigger" href="#modal2">Info</a></center></td>'+
	                '</tr>';
					}
				}
				$('#showSubAdmin').html(body);
			},
			error: function()
			{
				alert('dito pumapasok');
			},
		});
	}
 });

function showSubAdminInfo(id){
	$.ajax({
			url : 'SubAdmin_control/getSubAdmin',
			type :'POST',
			data : {
				'id' : id
			},
			dataType: 'JSON',
			success: function(data){
				var SAfname='';
				var SAlname='';
				var SATeam='';
				var SAuser='';
				var SApass='';

					SAfname += '<input type="text" class="validate" id="fname" value="'+data.fname+'" required>'+
                  '<label class="active" for="fname">First Name</label>';

					SAlname += '<input type="text" class="validate" id="lname" value="'+data.lname+'" required>'+
                  '<label class="active" for="lname">Last Name</label>';

					SATeam += '<option value="'+data.team+'" selected required>'+data.team+'</option>'+
                  '<option value="Data">Data Team</option>'+
                  '<option value="Technical">Technical Team</option>';

					SAuser += '<input type="text" class="validate" id="user" value="'+data.username+'" required>'+
                  '<label class="active" for="user">Username</label>';

					SApass += '<input type="password" class="validate" id="pass" value="'+data.password+'" required>'+
                  '<label class="active" for="pass">Password</label>';


				$('#SAfname').html(SAfname);
				$('#SAlname').html(SAlname);
				$('#SATeam').html(SATeam);
				$('#SATeam').material_select();
				$('#SAuser').html(SAuser);
				$('#SApass').html(SApass);
			},
			error: function(){
				alert('error');
			},
		});
}
