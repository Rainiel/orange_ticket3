$(document).ready(function(){
$('.modal').modal();
$('select').material_select();
//Show_SubAdmin();
//how_tickets();
TickCountAndSA();

$(document).on('click', '.subAdminView', function(){
	showSubAdminInfo($(this).parent('tr').attr('data-Id3'));
	$('#ticketTable').hide();
	$('.123').show();
});

// $(document).on('click', '#getTick', function(){
// 	var getTicket = [];
// 	$(':checkbox:checked').each(function(){
// 	getTicket.push($(this).attr('id'));

// 	var uAssign 	= $('#GTICK').val();

// 	base_url 		= $('#base').val();
// 	$.ajax({
// 		type: 'POST',
// 		url: 'Ticket_control/getEditTicket',
// 		data: {'uAssign' : uAssign, 'TID' : getTicket},
// 		success: function(data){
// 			Show_tickets();
// 		},
// 		error: function(){
// 			alert('123456789');
// 		},
// 	});
// });
// });

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
				Show_SubAdmin();
			},
			error: function(){
				alert();
			},
	});
});

function TickCountAndSA(){
		$.ajax({
			type:'ajax',
			url: 'Ticket_control/TickCountAndSA',
			dataType:'json',
			success: function(data)
			{
				var body='';
				var i;

				for(i=0;i<data.length;i++)
				{
					body+=	'<tr data-Id3="'+data[i].userId+'">'+
								'<td class="subAdminView">'+
								'<img src="assets/images/square.png" style="height: 40px; width: 40px; float: left; margin-right: 10px;">'+
							'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 14px; font-weight: bold;">'+data[i].fname+'&nbsp;'+data[i].lname+'</p>'+
							'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 12px; font-weight: 500;">'+data[i].team+
								'</td>'+
								'<td class="subAdminView" style="font-size: 12px; text-align: center;">'+data[i].Tickets+'</td>'+
							'</tr>';
				}
				$('#SubTables').html(body);
			},
			error: function()
			{
				//alert('dito pumapasok');
			},
		});
	}

function Show_tickets(){
	var $Acc_type = $('#account').val();
		$.ajax({
			type:'ajax',
			url: 'Ticket_control/showTicketsSA',
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

				 			// '<td style="width: 50px; padding-left: 20px;" data-Id2="'+data[i].ticketId+'">'+
      		// 					'<input height="15px" width="15px" type="checkbox" class="filled-in fill-box" id="'+test+'" data-stat="'+data[i].Status+'" data-prio="'+data[i].Priority+'" data-Ass="'+data[i].AssignedTo+'" />'+
      		// 					'<label for="'+test+'" style="margin-top: 15px;" ></label>' +
			     //  			'</td>'+
							'<td class="ticketView">'+
							'<img src="assets/images/square.png" style="height: 40px; width: 40px; float: left; margin-right: 10px;">'+
							'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 14px; font-weight: bold;">'+data[i].fname1+'&nbsp;'+data[i].lname1+'</p>'+
							'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 12px; font-weight: 500;">Issue Type: '+data[i].Issue+'<small style="font-size: 12px; margin-left: 10px;">'+data[i].Subject+'</small></p>'+
							'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Status+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].fname2+data[i].lname2+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Priority+'</td>'+
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
				var SAT='';

					SAT += '<ul class="collection">'+
					// '<li class="collection-item">'+
					// 	'<span class="title" style="color: #2d3e50"  style="margin-right: 20px"><b>Issue type: Welcome!</b></span> <span class="title-second" style="font-size: 14px; margin-left: 15px">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span><i class="fa fa-pencil" aria-hidden="true" style="margin-left: 6px;"></i><i class="fa fa-trash" aria-hidden="true"  style="margin-left: 6px;"></i>'+
					// 	'<p style="font-size: 12px; margin-top: -5px">Created: February 18 2017, 9:00 AM <br></p>'+
					// '</li>'+
					'<ul class="collection" style="border-top:none; border-left: none; border-right: none; border-bottom: none;">'+
					  '<li class="collection-item avatar" style="border-bottom: none">'+
						'<img src="assets/images/square.png" alt="" class="circle">'+
						'<span class="title" style="font-size: 14px; color: #2d3e50"><b>Rainiel</b></span>'+
						'<p style="font-size: 12px;	margin-top: -5px;">February 18<br>'+
						'</p>'+
						'<span class="title" style="color: #2d3e50; font-size: 12px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>'+
							'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br>'+
							'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br>'+
							'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, <br>'+
							'sunt in culpa qui officia deserunt mollit anim id est laborum.<br>'+
							'<br>'+
							'<br>'+
							'Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>'+
							'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br>'+
							'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br>'+
							'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, <br>'+
							'sunt in culpa qui officia deserunt mollit anim id est laborum.<br>'+
						'</span>'+
						//'<a href="#!" class="secondary-content"><i class="fa fa-share" aria-hidden="true" style="margin-right: 8px; color: black"></i><i class="fa fa-quote-right" aria-hidden="true" style="color: black"></i></a>'+
					  '</li>'+
						// '<ul class="collection with-header" style="width: 600px; height: 200px; margin-left: 20px">'+
		  		// 	  		'<li class="collection-header" style="padding: 0px; height: 20px">'+
						// 		'<p style="margin-left: 20px; margin-bottom: 20px; font-size: 12px">'+
						// 			'<i class="fa fa-inbox" aria-hidden="true"></i>rainiel@orangeapps.com'+
						// 		'</p>'+
						// 	'</li>'+
						// 	'<li class="collection-item" style="border-bottom: none"><input type="text" name="fname" placeholder="Enter your reply here" style="border-bottom: none"></li>'+
						// 	'<a class="waves-effect waves-light btn pull-right" style="margin-top: 35px; margin-right: 10px">SAVE</a>'+
					 //  	'</ul>'+
				'</ul>';

				$('#SAT').html(SAT);
			},
			error: function(){
				alert('error');
			},
		});
}
