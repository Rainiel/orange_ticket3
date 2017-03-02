$(document).ready(function(){
$('.modal').modal();
$('select').material_select();
Show_tickets();

$(document).on('click', '.fill-box', function(){
		var check = $('.fill-box:checked').length;
		if(check > 0){
			showTicketInfo($(this).parent('td').attr('data-Id2'));
    		$('#sideBar').hide();
    		$('#sideBar4').hide();
    		$('#hr').hide();
    		$('.sideBar2').show();
    		//$('#sideBar3').show();
    		$('#sideBar2Btn').show();

		}
		if(check == 0){
			$('#sideBar').show();
			$('#sideBar4').show();
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
		$('#sideBar4').hide();
		$('#hr').hide();
		$('.sideBar2').show();
		$('#sideBar2Btn').show();

	}
	if(check == 0){
		$('#sideBar').show();
		$('#sideBar4').show();
		$('#hr').show();
    	$('.sideBar2').hide();
    	$('#sideBar2Btn').hide();
	}
    });

$(document).on('click', '.ticketView', function(){
	showTicketInfo($(this).parent('tr').attr('data-Id'));
	$('#allTable').hide();
	$('.123').show();
	$('#sideBar').hide();
	$('#sideBar4').hide();
	$('#hr').hide();
	$('.sideBar2').show();
	//$('#sideBar3').show();
	$('#sideBar2Btn').show();
});

$(document).on('click', '#backT', function(){
	$('#allTable').show();
	$('.123').hide();
	$('#sideBar').show();
	$('#sideBar4').show();
	$('#hr').show();
	$('.sideBar2').hide();
	//$('#sideBar3').hide();
	$('#sideBar2Btn').hide();
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
			Show_tickets();
			$('#filled-in-box').prop('checked',false);
			$('#sideBar').show();
			$('#sideBar4').show();
			$('#hr').show();
	    	$('.sideBar2').hide();
	    	$('#sideBar2Btn').hide();
		},
		error: function(){
			alert('123456789');
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
			 Show_tickets();
			 getCount();
			 $('#icon_prefix').val('');
			 //$('#selectTeam').prop('selectedIndex',0);
			 $('#textarea1').val('');
		},
		error: function(){
			alert()
		},
 });
});

$(document).on('submit', '#editTicket', function(e){
	e.preventDefault();
});

$(document).on('change', '#selectTeam', function(){
 AutoAssign();
 });

$(document).on('click', '.filt', function(){
	var $Acc_type = $('#account').val();
	var Status = $('#statFilt a.active').attr('data-stat');
	var Assign = $('#assFilt a.active').attr('data-Ass');

		$.ajax({
			type : 'POST',
			url: 'Ticket_control/filterTicket',
			data: {
				 'stat' : Status, 'Ass' : Assign
			},
			dataType:'json',
			success: function(data)
			{
				var body='';
				var i;

				for(i=0;i<data.length;i++)
				{
				var test = data[i].ticketId;
				if($Acc_type != 'user'){
					body+=	'<tr data-Id="'+data[i].ticketId+'">'+

				 			'<td style="width: 50px; padding-left: 20px;" data-Id2="'+data[i].ticketId+'">'+
      							'<input height="15px" width="15px" type="checkbox" class="filled-in fill-box" id="'+test+'" data-stat="'+data[i].Status+'" data-prio="'+data[i].Priority+'" data-Ass="'+data[i].AssignedTo+'" />'+
      							'<label for="'+test+'" style="margin-top: 15px;" ></label>' +
			      			'</td>'+
							'<td class="ticketView">'+
							'<img src="assets/images/square.png" style="height: 40px; width: 40px; float: left; margin-right: 10px;">'+
							'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 14px; font-weight: bold;">'+data[i].fname1+'&nbsp;'+data[i].lname1+'</p>'+
							'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 12px; font-weight: 500;">Issue Type: '+data[i].Issue+'<small style="font-size: 12px; margin-left: 10px;">'+data[i].Subject+'</small></p>'+
							'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Status+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].fname2+data[i].lname2+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Priority+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Stamp+'</td>'+
						'</tr>';
				}
				else{
					body+=	'<tr data-Id="'+data[i].ticketId+'">'+

							'<td class="ticketView">'+
							'<img src="assets/images/square.png" style="height: 40px; width: 40px; float: left; margin-right: 10px;">'+
							'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 14px; font-weight: bold;">'+data[i].fname1+'&nbsp;'+data[i].lname1+'</p>'+
							'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 12px; font-weight: 500;">Issue Type: '+data[i].Issue+'<small style="font-size: 12px; margin-left: 10px;">'+data[i].Subject+'</small></p>'+
							'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Status+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].fname2+data[i].lname2+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Priority+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Stamp+'</td>'+
						'</tr>';
				}
				}
				$('#showTicket').html(body);
			},
			error: function()
			{
				alert('dito pumapasok');
			},
		});
 });

function Show_tickets(){
	var $Acc_type = $('#account').val();
		$.ajax({
			type:'ajax',
			url: 'Ticket_control/showTickets',
			dataType:'json',
			success: function(data)
			{
				var body='';
				var i;

				for(i=0;i<data.length;i++)
				{
				var test = data[i].ticketId;
				if($Acc_type != 'user'){
					body+=	'<tr data-Id="'+data[i].ticketId+'">'+

				 			'<td style="width: 50px; padding-left: 20px;" data-Id2="'+data[i].ticketId+'">'+
      							'<input height="15px" width="15px" type="checkbox" class="filled-in fill-box" id="'+test+'" data-stat="'+data[i].Status+'" data-prio="'+data[i].Priority+'" data-Ass="'+data[i].AssignedTo+'" />'+
      							'<label for="'+test+'" style="margin-top: 15px;" ></label>' +
			      			'</td>'+
							'<td class="ticketView">'+
							'<img src="assets/images/square.png" style="height: 40px; width: 40px; float: left; margin-right: 10px;">'+
							'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 14px; font-weight: bold;">'+data[i].fname1+'&nbsp;'+data[i].lname1+'</p>'+
							'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 12px; font-weight: 500;">Issue Type: '+data[i].Issue+'<small style="font-size: 12px; margin-left: 10px;">'+data[i].Subject+'</small></p>'+
							'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Status+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].fname2+data[i].lname2+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Priority+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Stamp+'</td>'+
						'</tr>';
				}
				else{
					body+=	'<tr data-Id="'+data[i].ticketId+'">'+

							'<td class="ticketView">'+
							'<img src="assets/images/square.png" style="height: 40px; width: 40px; float: left; margin-right: 10px;">'+
							'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 14px; font-weight: bold;">'+data[i].fname1+'&nbsp;'+data[i].lname1+'</p>'+
							'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 12px; font-weight: 500;">Issue Type: '+data[i].Issue+'<small style="font-size: 12px; margin-left: 10px;">'+data[i].Subject+'</small></p>'+
							'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Status+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].fname2+data[i].lname2+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Priority+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Stamp+'</td>'+
						'</tr>';
				}
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
	alert(team);
		$.ajax({
			type: 'POST',
			//method: 'POST',
			url: 'Ticket_control/AutoAssign',
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
	//alert(team);
		$.ajax({
			type: 'POST',
			//method: 'POST',
			url:'Ticket_control/TickCount',
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
 });


function showTicketInfo(id){
		$.ajax({
			url : 'Ticket_control/getTicket',
			type :'POST',
			data : {
				'id' : id
			},
			dataType: 'JSON',
			success: function(data){
				var headT='';
				var chatTicket='';
				//var sideBarS1='';
				var sideBarS2='';
				var sideBarS3='';

					headT += '<div style="font-size: 20px;">'+"Ticket Subject: "+data.Subject+'<i class="fa fa-arrow-left" id="backT" aria-hidden="true" style="float:right"></i>'+

		  			'</button></div>';
		  			chatTicket += '<ul class="collection">'+
					'<li class="collection-item">'+
						'<span class="title" style="color: #2d3e50"  style="margin-right: 20px"><b>Issue type: '+data.Issue+'</b></span> <span class="title-second" style="font-size: 14px; margin-left: 15px">'+data.Subject+'</span><i class="fa fa-pencil" aria-hidden="true" style="margin-left: 6px;"></i><i class="fa fa-trash" aria-hidden="true"  style="margin-left: 6px;"></i>'+
						'<p style="font-size: 12px; margin-top: -5px">Created: February 18 2017, 9:00 AM <br></p>'+
					'</li>'+
					'<ul class="collection" style="border-top:none; border-left: none; border-right: none; border-bottom: none;">'+
					  '<li class="collection-item avatar" style="border-bottom: none">'+
						'<img src="assets/images/square.png" alt="" class="circle">'+
						'<span class="title" style="font-size: 14px; color: #2d3e50"><b>Rainiel</b></span>'+
						'<p style="font-size: 12px;	margin-top: -5px;">February 18<br>'+
						'</p>'+
						'<span class="title" style="color: #2d3e50; font-size: 12px;">'+
							
						'</span>'+
						'<a href="#!" class="secondary-content"><i class="fa fa-share" aria-hidden="true" style="margin-right: 8px; color: black"></i><i class="fa fa-quote-right" aria-hidden="true" style="color: black"></i></a>'+
					  '</li>'+
						'<ul class="collection with-header" style="width: 600px; height: 200px; margin-left: 20px">'+
		  			  		'<li class="collection-header" style="padding: 0px; height: 20px">'+
								'<p style="margin-left: 20px; margin-bottom: 20px; font-size: 12px">'+
									'<i class="fa fa-inbox" aria-hidden="true"></i>rainiel@orangeapps.com'+
								'</p>'+
							'</li>'+
							'<li class="collection-item" style="border-bottom: none"><input type="text" name="fname" placeholder="Enter your reply here" style="border-bottom: none"></li>'+
							'<a class="waves-effect waves-light btn pull-right" style="margin-top: 35px; margin-right: 10px">SAVE</a>'+
					  	'</ul>'+
					'</ul>'+
					'</ul>';

					// sideBarS1 +=
					// '<option value="'+data.AssignedTo+'" selected>'+data.AssignedTo+'</option>'+
					// '<option value="Data">Data Team</option>'+
					// '<option value="Technical">Technical Team</option>';
					sideBarS2 +=
					'<option value="'+data.Status+'"  selected>'+data.Status+'</option>'+
					'<option value="In-progress">In-progress</option>'+
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

				$('#chatTicket').html(chatTicket);

				$('#headT').html(headT);
			},
			error: function(){
				alert('error');
			},
		});
};
