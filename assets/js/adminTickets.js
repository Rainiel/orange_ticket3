$(document).ready(function(){
$('.modal').modal();
$('select').material_select();
showTickets();
//filetTicket();
//notifMail();
TimeTickets();
 });
// setTimeout(function(){
// 	notifMail();
// }, 3000);
var Tickets=null;
function TimeTickets(){
Tickets = setTimeout(function(){
	TimeTickets();
	showTickets();
	}, 3000);
};
// var Mails=null;
// function TimeMail(){
// 	Mails = setTimeout(function(){
// 		TimeMail();
// 		Mail();
// 	}, 3000);
// };
$(document).on('click', '.fill-box', function(){
		var check = $('.fill-box:checked').length;
		if(check > 0){
			clearTimeout(Tickets);
			showTicketInfo($(this).parent('td').attr('data-Id2'));
    		$('#sideBar').hide();
    		//$('#sideBar4').hide();
    		$('#hr').hide();
    		$('.sideBar2').show();
    		//$('#sideBar3').show();
    		$('#sideBar2Btn').show();

		}
		if(check == 0){
			TimeTickets();
			$('#sideBar').show();
			//$('#sideBar4').show();
			$('#hr').show();
        	$('.sideBar2').hide();
        	//$('#sideBar3').hide();
        	$('#sideBar2Btn').hide();
		}
    });

$(document).on('click', '#filled-in-box', function(){

	if($(this).is(":checked")){
		$('.fill-box').prop("checked", true);
	}
    else{
    	$('.fill-box').prop("checked", false);
    }
    var check = $('.fill-box:checked').length;
	if(check > 0){
		// showTicketInfo();
		$('#sideBar').hide();
		//$('#sideBar4').hide();
		$('#hr').hide();
		$('.sideBar2').show();
		$('#sideBar2Btn').show();

	}
	if(check == 0){
		$('#sideBar').show();
		//$('#sideBar4').show();
		$('#hr').show();
    	$('.sideBar2').hide();
    	$('#sideBar2Btn').hide();
	}
    });

$(document).on('click', '.ticketView', function(){
	var ticketId = $(this).parent('tr').attr('data-Id');
	showTicketInfo(ticketId);
	clearTimeout(Tickets);
	// TimeMail();
	$('#allTable').hide();
	$('.123').show();
	$('#sideBar').hide();
	//$('#sideBar4').hide();
	$('#hr').hide();
	$('.sideBar2').show();
	//$('#sideBar3').show();
	$('#sideBar2Btn').show();
});

$(document).on('click', '#backT', function(){
	// clearTimeout(Mail);
	TimeTickets();
	$('#allTable').show();
	$('.123').hide();
	$('#sideBar').show();
	//$('#sideBar4').show();
	$('#hr').show();
	$('.sideBar2').hide();
	//$('#sideBar3').hide();
	$('#sideBar2Btn').hide();
	showTickets();
	//notifMail();
});

$(document).on('click', '#sideBar2Btn', function(){
	var getTicket = [];
	$(':checkbox:checked').each(function(){
		getTicket.push($(this).attr('id'));
	})

	var uAssign 	= $.trim($('#sidebarS1').val());
	var uStatus 	= $.trim($('#sidebarS2').val());
	var uPriority 	= $.trim($('#sidebarS3').val());

	base_url 		= $('#base').val();
	$.ajax({
		type: 'POST',
		url: base_url + 'Ticket_control/editTicket',
		data: {'uAssign' : uAssign, 'uStatus' : uStatus, 'uPriority' : uPriority, 'TID' : getTicket},
		success: function(data){
			showTickets();
			$('#filled-in-box').prop('checked',false);
			$('#sideBar').show();
			//$('#sideBar4').show();
			$('#hr').show();
	    	$('.sideBar2').hide();
	    	$('#sideBar2Btn').hide();
		},
		error: function(){
			alert('Error');
		},
	});
});

$(document).on('submit', '#addTicket', function(e){
	e.preventDefault();
	base_url = $('#base').val();
 $.ajax({
    type: "POST",
    url: base_url + 'Ticket_control/addTicket',
    // url: "<?php echo base_url(); ?>index.php/comment/create",
    contentType: false,
    cache: false,
	processData: false,
	data: new FormData(this),
		success: function(data){
			 $('#modelclose').trigger('click');
			 showTickets();
			 getCount();
			 $('#icon_prefix').val('');
			 //$('#selectTeam').prop('selectedIndex',0);
			 $('#textarea1').val('');
		},
		error: function(){
			alert();
		},
 });
});

$(document).on('submit', '#editTicket', function(e){
	e.preventDefault();
});

$(document).on('change', '#selectTeam', function(){
 AutoAssign();
 });

// function notifMail(){
// 	base_url 		= $('#base').val();
// 	 Time = setTimeout(function(){
// 	$.ajax({
// 		url: base_url + 'Ticket_control/notifMail',
// 		success: function(data)
// 		{
// 			filetTicket();
// 			if($('#filled-in-box').prop("checked") == true){
// 				clearTimeout(Time);
// 			}
// 			if($('#filled-in-box').prop("checked") == false){
// 				notifMail();
// 			}
// 		}
// 	})
// 	}, 3000);
// }

$(document).on('click', '.filt', function(){
showTickets();
});

function showTickets(){
	var $Acc_type = $('#account').val();
	var Status  = $('#statFilt a.active').attr('data-stat');
	var Assign  = $('#statFilt a.active').attr('data-Ass');
	var Assign2 = $('#AssFilt a.active').attr('data-Ass2');
	var Search = $('#SearchFilter').val();
		base_url 		= $('#base').val();
		$.ajax({
			type : 'POST',
			url: base_url + 'Ticket_control/showTickets',
			data: {
				 'stat' : Status, 'Ass' : Assign, 'Ass2' : Assign2, 'Search' : Search
			},
			dataType:'json',
			success: function(data)
			{
				var body='';
				var i;

				for(i=0;i<data.length;i++)
				{
				var test = data[i].ticketId;
				var bcolor = "#fff";
				if(data[i].notif == 0 || data[i].noticount == 0){
					bcolor = "#ddd";
				}
				var Log = 'Online';
				if(data[i].Online == 0){
					Log = data[i].TimeLog;
				}
					body+=	'<tr data-Id="'+data[i].ticketId+'" style="background-color: '+bcolor+'">';
							if($Acc_type != 'user'){
				 			body+= '<td style="width: 50px; padding-left: 20px;" data-Id2="'+data[i].ticketId+'">'+
      							'<input height="15px" width="15px" type="checkbox" class="filled-in fill-box" id="'+test+'" data-stat="'+data[i].Status+'" data-prio="'+data[i].Priority+'" data-Ass="'+data[i].AssignedTo+'" />'+
      							'<label for="'+test+'" style="margin-top: 15px;" ></label>' +
			      			'</td>';
			      			}
							body+= '<td class="ticketView">'+
							'<img src="assets/images/square.png" style="height: 40px; width: 40px; float: left; margin-right: 10px;">'+
							'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 14px; font-weight: bold;">'+data[i].fname1+'&nbsp;'+data[i].lname1+'<span style="float: right; font-weight: normal; font-size: 10px">'+Log+'</span>'+
							'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 12px; font-weight: 500;">Issue Type: '+data[i].Issue+'<small style="font-size: 11px; margin-left: 10px;">'+data[i].Subject+'</small></p>'+
							'</td>';
							if(data[i].Status == 'New'){
							body+='<td class="ticketView" style="text-align: center;"><label class="openbtn" style="font-size: 11px; background-color: #61d7f1; border-radius: 5px; padding: 4px; color: white">'+data[i].Status+'</label></td>';
							}
							if(data[i].Status == 'On-progress'){
							body+='<td class="ticketView" style="text-align: center;"><label class="openbtn" style="font-size: 11px; background-color: #C9FC07; border-radius: 5px; padding: 4px; color: white">'+data[i].Status+'</label></td>';
							}
							if(data[i].Status == 'On-hold'){
							body+='<td class="ticketView" style="text-align: center;"><label class="openbtn" style="font-size: 11px; background-color: #FF875A; border-radius: 5px; padding: 4px; color: white">'+data[i].Status+'</label></td>';
							}
							if(data[i].Status == 'Resolved'){
							body+='<td class="ticketView" style="text-align: center;"><label class="openbtn" style="font-size: 11px; background-color: #FCCF27; border-radius: 5px; padding: 4px; color: white">'+data[i].Status+'</label></td>';
							}
							if(data[i].Status == 'Closed'){
							body+='<td class="ticketView" style="text-align: center;"><label class="openbtn" style="font-size: 11px; background-color: #5995FF; border-radius: 5px; padding: 4px; color: white">'+data[i].Status+'</label></td>';
							}
							body+='<td class="ticketView" style="font-size: 11px; text-align: center;">'+data[i].fname2+data[i].lname2+'</td>';
							if(data[i].Priority == 'Low'){
							body+='<td class="ticketView" style="text-align: center;"><label class="minorbtn" style="font-size: 11px; background-color: #f0e94b; border-radius: 5px; padding: 4px; color: white">'+data[i].Priority+'</label></td>';
							}
							if(data[i].Priority == 'High'){
							body+='<td class="ticketView" style="text-align: center;"><label class="majorbtn" style="font-size: 11px; background-color: #ec7172; border-radius: 5px; padding: 4px; color: white">'+data[i].Priority+'</label></td>';
							}
							body+='<td class="ticketView" style="font-size: 11px; text-align: center;">'+data[i].Stamp+'</td>'+
							'<td class="ticketView" style="font-size: 11px; text-align: center;">'+data[i].DateFiled+'</td>'+
						'</tr>';
				}
				$('#showTicket').html(body);
				},
			error: function()
			{
				alert('dito pumapasok');
			},
		});
 };

function AutoAssign(){
	var team = $('#selectTeam').val();
	base_url 		= $('#base').val();
		$.ajax({
			type: 'POST',
			//method: 'POST',
			url: base_url + 'Ticket_control/AutoAssign',
			data: {'team' : team},
			dataType:'json',
			success: function(data)
			{
				var body='';
				var i;
				var min = [];
				var b;

				for(i=0;i<data.length;i++)
				{
				min.push(data[i].Tickets);
				}
				var a = Math.min.apply(null, min);
				for(i=0;i<data.length;i++)
				{
					if(a == data[i].Tickets){
						b = data[i].userId;
					}
				}
				$('#auto').val(b);
			},
			error: function()
			{
				alert('dito pumapasok');
			},
		});
	};

function getCount(){
	//var team = $('#selectTeam').val();
	base_url 		= $('#base').val();
		$.ajax({
			type: 'POST',
			//method: 'POST',
			url: base_url + 'Ticket_control/TickCountAndSA',
			//data: {'tick' : tickCount, 'user' : userCount},
			dataType:'json',
			success: function(data)
			{
				var body='';
				var i;
				var tickCount = '';
				var userCount = '';
				var b;
				//var a;

				for(i=0;i<data.length;i++)
				{
					tickCount = data[i].tick;
					userCount = data[i].userId;
				$.ajax({
					type: 'ajax',
					url: 'Ticket_control/updateCount',
					data: {'tick' : tickCount, 'user' : userCount},
					dataType: 'json',
					method: 'POST',

				});
				}

			},
			error: function()
			{
				alert('dito pumapasok');
			},
		});
	};


var ticketId;
function showTicketInfo(id){
	var ID = $('#userId').val();
	base_url 		= $('#base').val();
		$.ajax({
			url : base_url + 'Ticket_control/getTicket',
			type :'POST',
			data : {
				'id' : id
			},
			dataType: 'JSON',
			success: function(data){

				var ticketHead='';
				var messages='';
				var message='';
				var sideBarS1='';
				var sideBarS2='';
				var sideBarS3='';
				ticketId = data.ticketId;

					ticketHead += '<div class="collection-item">'+
		    						  '<span class="title" style="color: #2d3e50"  style="margin-right: 20px"><b>Issue type: '+data.Issue+'</b></span>'+
		                            	'<span class="title-second" style="font-size: 14px; margin-left: 15px">'+data.Subject+'</span>'+
		                            	'<i class="fa fa-pencil" aria-hidden="true" style="margin-left: 6px;"></i>'+
		                            	'<a class="waves-effect waves-light btn pull-right" style="background-color: #2d3e50;" id="backT">Back</a>'+
		    						  '<p style="font-size: 12px; margin-top: -5px">Created: '+data.DateFiled+'</p>'+
		    						'</div>';
		    		var float = 'left';
		    		var flex = '';
		    		if(ID == data.userId){
		    			float = 'right';
		    			flex = 'end';
		    		}
	    			messages += '<div class="collection-item avatar" style="border-bottom: none; padding-right: 0px; float: '+float+';">'+
	 							'<img src="assets/images/square.png" alt="" class="circle">'+
							'</div>'+
							'<div class="row">'+
								'<div class="flex-container" style="display: flex; justify-content: flex-'+flex+';  text-align: '+float+'; padding: 10px">'+
									'<div class="flex-item">'+
										'<div class="sender-wrap">'+
											'<div class="namedate">'+
												'<span class="title" style="font-size: 14px; color: #2d3e50; text-align: '+float+';"><b>'+data.fname+'&nbsp;'+data.lname+'</b></span>'+
												'<p style="font-size: 12px;	margin-top: -5px">'+data.DateFiled+'<br>'+
												'</p>'+
											'</div>'+
											'<div class="convo-msg">'+
											'<span style="color: black; background-color: white; font-size: 12px; border-radius: 7px; padding: 10px">'+data.Description+'</span>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>';
							

					// sideBarS1 +=
					// '<option value="'+data.AssignedTo+'" selected>'+data.AssignedTo+'</option>'+
					// '<option value="Data">Data Team</option>'+
					// '<option value="Technical">Technical Team</option>';
					sideBarS2 +=
					'<option value="'+data.Status+'" selected>'+data.Status+'</option>'+
					'<option value="On-progress">On-progress</option>'+
					'<option value="On-hold">On-hold</option>'+
					'<option value="Resolved">Resolved</option>'+
					'<option value="Closed">Closed</option>';
					 sideBarS3 +=
					 '<option value="'+data.Priority+'" selected>'+data.Priority+'</option>'+
					 '<option value="Low">Low</option>'+
					 '<option value="High">High</option>';


				//$('#sidebarS1').html(sideBarS1);
				//$('#sidebarS1').material_select();
				$('#sidebarS2').html(sideBarS2);
				$('#sidebarS2').material_select();
				$('#sidebarS3').html(sideBarS3);
				$('#sidebarS3').material_select();

				$('#ticketHead').html(ticketHead);
				$('#messages').html(messages);
				Mail();
				insNotifMail();
			},
			error: function(){
				alert('error');
			},
		});
};

function updNotifMail(){
	$.ajax({
		type: 'POST',
		url: base_url + 'Ticket_control/updNotifMail',
		data: {'TID' : ticketId},
		success:function(){
			//notifMail();
		},
	});
};

function insNotifMail(){
		$.ajax({
		type: 'POST',
		url: base_url + 'Ticket_control/insNotifMail',
		data: {'TID' : ticketId},
		success:function(){
			//notifMail();
		},
	});
};



function Mail(){
	var TID = ticketId;
	var ID = $('#userId').val();
	base_url 		= $('#base').val();
	$.ajax({
		url: base_url + 'Ticket_control/Mail',
		type: 'POST',
		data: {'tick' : ticketId},
		dataType: 'JSON',
		success: function(data){
			var i;
			var Mail='';

			for(i=0;i<data.length;i++){
				var float = 'left';
				var flex = '';
				if(ID == data[i].UID){
					float = 'right';
					flex = 'end';
				}
					Mail += '<div class="collection-item avatar" style="border-bottom: none; padding-right: 0px; float: '+float+';">'+
		 						'<img src="assets/images/square.png" alt="" class="circle">'+
							'</div>'+
							'<div class="row">'+
								'<div class="flex-container" style="display: flex; justify-content: flex-'+flex+';  text-align: '+float+'; padding: 10px">'+
									'<div class="flex-item">'+
										'<div class="sender-wrap">'+
											'<div class="namedate">'+
												'<span class="title" style="font-size: 14px; color: #2d3e50; text-align: '+float+';"><b>'+data[i].fname+'&nbsp;'+data[i].lname+'</b></span>'+
												'<p style="font-size: 12px;	margin-top: -5px">'+data[i].Stamp+'<br>'+
												'</p>'+
											'</div>'+
											'<div class="convo-msg">'+
												'<span style="color: black; background-color: white; font-size: 12px; border-radius: 7px; padding: 10px">'+data[i].Message+'</span>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>';
			}
			$('#messages').append(Mail);
		}
	});
};

$(document).on('submit', '#insMail', function(e){
	e.preventDefault();
	var TID = ticketId;
	var MSG = $.trim($('textarea#textarea2').val());
	base_url = $('#base').val();
		$.ajax({
			type: "POST",
			url: base_url + 'Ticket_control/insMail',
			data: {'TID' : ticketId, 'msg' : MSG},
			success: function(){
				updNotifMail();
				showTicketInfo(TID);
				$('#textarea2').val('');
			}
		});
});
