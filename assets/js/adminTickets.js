$(document).ready(function(){
$('.modal').modal();
$('select').material_select();
showTickets();
notifCountForSideBar();
//filetTicket();
//notifMail();
//TimeTickets();
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
var Mails=null;
function TimeMail(){
	Mails = setTimeout(function(){
		TimeMail();
		Mail();
	}, 3000);
};

$('#AllPrio').click(function(){
	$('.dropdown-content li.active').removeClass('active');
	$('#AllPrio').addClass('active');
	$('.dropdown-button').dropdown('close');
	showTickets();
	return false;
});

$('#LowPrio').click(function(){
	$('.dropdown-content li.active').removeClass('active');
	$('#LowPrio').addClass('active');
	$('.dropdown-button').dropdown('close');
	showTickets();
	return false;
});

$('#HighPrio').click(function(){
	$('.dropdown-content li.active').removeClass('active');
	$('#HighPrio').addClass('active');
	$('.dropdown-button').dropdown('close');
	showTickets();
	return false;
});

$(document).on('click', '.fill-box', function(){
		var check = $('.fill-box:checked').length;
		var stat = $('.fill-box:checked').attr('data-stat');
		var prio = $('.fill-box:checked').attr('data-prio');
		var Ass = $('.fill-box:checked').attr('data-Ass');
		var parent = $(this);
		//$('.fill-box:not(:checked)').prop('disabled', true);
		if(check > 0){
			clearTimeout(Tickets);
			//TimeMail();
			showTicketInfo($(this).parent('td').attr('data-Id2'));
			//AssignedTo();
    		$('#sideBar').hide();
    		//$('#sideBar4').hide();
    		$('#hr').hide();
    		$('.sideBar2').show();
    		//$('#sideBar3').show();
    		$('#sideBar2Btn').show();
		}
		if(check == 0){
			clearTimeout(Mails);
			//TimeTickets();
			$('#sideBar').show();
			//$('#sideBar4').show();
			$('#hr').show();
        	$('.sideBar2').hide();
        	//$('#sideBar3').hide();
        	$('#sideBar2Btn').hide();
		}
		//alert(stat);
		if($('.fill-box[data-stat='+stat+']').is(':checked')
			&& $('.fill-box[data-prio='+prio+']').is(':checked')
			&& $('.fill-box[data-Ass='+Ass+']').is(':checked')){
  		$('.fill-box[data-stat!='+stat+']').not(parent).attr('disabled', true, parent.is(':checked'));
  		$('.fill-box[data-prio!='+prio+']').not(parent).attr('disabled', true, parent.is(':checked'));
  		$('.fill-box[data-Ass!='+Ass+']').not(parent).attr('disabled', true, parent.is(':checked'));
  		}
  		else{
  		showTickets();
  		$('.fill-box[data-stat='+stat+']').not(parent).attr('disabled', false, parent.is(':checked'));
  		$('.fill-box[data-prio='+prio+']').not(parent).attr('disabled', false, parent.is(':checked'));
  		$('.fill-box[data-Ass='+Ass+']').not(parent).attr('disabled', false, parent.is(':checked'));
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
	insNotifMail(ticketId);
	clearTimeout(Tickets);
	//TimeMail();
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
	clearTimeout(Mails);
	//TimeTickets();
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
			getCount();
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
	if(!$('#selectTeam').val()){
		alert('Please Select Issue');
	}
	if(!$('#textarea1').val()){
		alert('Please Put Some Description');
	}
	if($('#selectTeam').val() && $('#textarea1').val()){
		 $.ajax({
		    type: "POST",
		    url: base_url + 'Ticket_control/addTicket',
		    contentType: false,
		    cache: false,
			processData: false,
			data: new FormData(this),
				success: function(data){
					 $('#modalCloseTicket').trigger('click');
					 showTickets();
					 getCount();
					 $('#icon_prefix').val('');
					 //$('#selectTeam').val('');
					 tinyMCE.activeEditor.setContent('');
				},
				error: function(){
					alert();
				},
		 });
	}
});

$(document).on('submit', '#editTicket', function(e){
	e.preventDefault();
});

$(document).on('change', '#selectTeam', function(){
 AutoAssign();
 });

$(document).on('click', '.filt', function(){
showTickets();
notifCountForSideBar();
});

function showTickets(){
	var $Acc_type = $('#account').val();
	var Status  = $('#statFilt a.active').attr('data-stat');
	var Assign  = $('#statFilt a.active').attr('data-Ass');
	var Assign2 = $('#AssFilt a.active').attr('data-Ass2');
	var Prio    = $('.dropdown-content li.active').attr('data-value');
	var Search	= $('#SearchFilter').val();
		base_url 		= $('#base').val();
		$.ajax({
			type : 'POST',
			url: base_url + 'Ticket_control/showTickets',
			data: {
				 'stat' : Status, 'Ass' : Assign, 'Ass2' : Assign2, 'Prio' : Prio, 'Search' : Search
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
				var notonline = [];
				var b;
				var bb;
				var c;
				var count = 0;
				for(i=0;i<data.length;i++)
				{
					if(data[i].Online == 1){
						min.push(data[i].Tickets);
					}
					if(data[i].Online == 0){
						notonline.push(data[i].Tickets);
					}
				}
				var a = Math.min.apply(null, min);
				var aa = Math.min.apply(null, notonline);
				for(i=0;i<data.length;i++)
				{
						if(a == data[i].Tickets){
							b = data[i].userId;
						}
						if(aa == data[i].Tickets){
							bb = data[i].userId;
						}
						
				}
					if(typeof b == "undefined"){
						c = bb;
						//alert();
					}
					if(typeof b != "undefined"){
						c = b;
					}

				$('#auto').val(c);
				alert(c);
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
				var Description='';
				var message='';
				var sideBarS1='';
				var sideBarS2='';
				var sideBarS3='';
				var team = data.team;
				var Assign = data.AssignedTo;
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
		    		if(ID == data.User){
		    			float = 'right';
		    			flex = 'end';
		    		}
	    			Description += '<div class="collection-item avatar" style="border-bottom: none; padding-right: 0px; float: '+float+';">'+
	 							'<img src="assets/images/square.png" alt="" class="circle">'+
							'</div>'+
							'<div class="row">'+
								'<div class="flex-container" style="display: flex; justify-content: flex-'+flex+';  text-align: '+float+'; padding: 10px">'+
									'<div class="flex-item">'+
										'<div class="sender-wrap">'+
											'<div class="namedate">'+
												'<span class="title" style="font-size: 14px; color: #2d3e50; text-align: '+float+';"><b>'+data.fname1+'&nbsp;'+data.lname1+'</b></span>'+
												'<p style="font-size: 12px;	margin-top: -5px">'+data.DateFiled+'<br>'+
												'</p>'+
											'</div>'+
											'<div class="convo-msg">'+
											'<span style="color: black; font-size: 12px; border-radius: 7px; padding: 0px; box-shadow: 2px 2px 2px solid back">'+data.Description+'</span>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>';

				sideBarS1 +=
						'<option value="'+data.AssignedTo+'" selected>'+data.fname2+'&nbsp;'+data.lname2+'</option>';
				$.ajax({
					type: 'POST',
					url: base_url + 'Ticket_control/AssignedTo',
					dataType: 'json',
					success:function(data){
						var i;
						var sideBarS1='';
							for(i=0;i<data.length;i++){
								if(team == 'Data'){
								if(data[i].team == 'Data'){
								sideBarS1 += '<option value="'+data[i].userId+'">'+data[i].fname+'&nbsp;'+data[i].lname+'</option>';
								}
								}
								if(team == 'Technical'){
								if(data[i].team == 'Technical'){
								sideBarS1 += '<option value="'+data[i].userId+'">'+data[i].fname+'&nbsp;'+data[i].lname+'</option>';
								}
								}
						}
						$('#sidebarS1').append(sideBarS1);
						$('#sidebarS1').material_select();
					}
				})

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


				$('#sidebarS1').html(sideBarS1);
				$('#sidebarS1').material_select();
				$('#sidebarS2').html(sideBarS2);
				$('#sidebarS2').material_select();
				$('#sidebarS3').html(sideBarS3);
				$('#sidebarS3').material_select();

				$('#ticketHead').html(ticketHead);
				$('#Description').html(Description);
				Mail();
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

function insNotifMail(ticketId){
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
												'<span style="color: black; font-size: 12px; border-radius: 7px; padding: 0px; box-shadow: 2px 2px 2px solid black">'+data[i].Message+'</span>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>';
			}
			$('#messages').html(Mail);
		}
	});
};

$(document).on('submit', '#insMail', function(e){
	e.preventDefault();
	var TID = ticketId;
	var MSG = $.trim($('textarea#textarea2').val());
	base_url = $('#base').val();
	// if (!MSG.replace(/\s/g, '').length) {
	//     alert("string only contained spaces")
	// }
	if(!MSG){
		alert('Please Put Some Content');
	}
	if(MSG){
		$.ajax({
			type: "POST",
			url: base_url + 'Ticket_control/insMail',
			data: {'TID' : ticketId, 'msg' : MSG},
			success: function(){
				updNotifMail();
				showTicketInfo(TID);
				tinyMCE.activeEditor.setContent('');
			}
		});
	}
});

function notifCountForSideBar(){
	var Ass  = $('#statFilt a.active').attr('data-Ass');
	var Ass2 = $('#AssFilt a.active').attr('data-Ass2');
	$.ajax({
		type: 'POST',
		dataType: 'JSON',
		url: 'Ticket_control/notifCountForSideBar',
		data: { 
			'Ass' : Ass, 'Ass2' : Ass2 
		},
		success: function(data){
			var NewNC = data.NewT - data.NewO;
			var ProgNC = data.ProgT - data.ProgO;
			var HoldNC = data.HoldT - data.HoldO;
			var ResolvedNC = data.ResolvedT - data.ResolvedO;
			var ClosedNC = data.ClosedT - data.ClosedO;
			var AllNC = NewNC + ProgNC + HoldNC + ResolvedNC + ClosedNC;

			//alert(Ass);

			$('#AllNC').attr('data-badge-caption', AllNC);
			$('#NewNC').attr('data-badge-caption', NewNC);
			$('#ProgNC').attr('data-badge-caption', ProgNC);
			$('#HoldNC').attr('data-badge-caption', HoldNC);
			$('#ResolvedNC').attr('data-badge-caption', ResolvedNC);
			$('#ClosedNC').attr('data-badge-caption', ClosedNC);
		}
	});
}
