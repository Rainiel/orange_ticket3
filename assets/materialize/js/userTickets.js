$(document).ready(function() {
$('.modal').modal();
$('select').material_select();
Show_tickets();

$(document).on('change', '.fill-box', function(){
		var check = $('.fill-box:checked').length;
		if(check > 0){
			// showTicketInfo();
    		$('#sideBar').hide();
    		$('.sideBar2').show();
    		$('#sideBar2Btn').show();
			
		}
		if(check == 0){
			$('#sideBar').show();
        	$('.sideBar2').hide();
        	$('#sideBar2Btn').hide();
		}
    });
$(document).on('click', '#filled-in-box', function(){
	
    	if($(this).is(":checked"))
    	{
   			$('.fill-box').prop("checked", true);
    	}
        else
        {
        	$('.fill-box').prop("checked", false);
        }
        var check = $('.fill-box:checked').length;
		if(check > 0){
			// showTicketInfo();
    		$('#sideBar').hide();
    		$('.sideBar2').show();
    		$('#sideBar2Btn').show();
			
		}
		if(check == 0){
			$('#sideBar').show();
        	$('.sideBar2').hide();
        	$('#sideBar2Btn').hide();
		}
    });

$(document).on('click', '.ticketView', function(){
	showTicketInfo($(this).parent('tr').attr('data-Id'));
	$('#allTable').hide();
	$('.123').show();
});


function Show_tickets()
	{
		$.ajax(
		{
			type:'ajax',
			url: 'Ticket_control/userShowTickets',
			dataType:'json',
			success: function(data)
			{
				var body='';
				var i;

				for(i=0;i<data.length;i++)
				{
				var test = data[i].ticketId;
				body+=	'<tr data-Id="'+data[i].ticketId+'">'+
				 			'<td style="width: 50px; padding-left: 20px;">'+
      							'<input height="15px" width="15px" type="checkbox" class="filled-in fill-box" id="box-'+test+'"/>'+
      							'<label for="box-'+test+'" style="margin-top: 15px;"></label>' +
			      			'</td>'+
							'<td class="ticketView">'+
							'<img src="desktop/No photo.png" style="height: 40px; width: 40px; float: left; margin-right: 10px;">'+
							'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 14px; font-weight: bold;">Name: '+data[i].User+'</p>'+
							'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 12px; font-weight: 500;">Issue Type: '+data[i].Issue+'<small style="font-size: 12px; margin-left: 10px;">'+data[i].Subject+'</small></p>'+
							'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Status+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].AssignedTo+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Priority+'</td>'+
							'<td class="ticketView" style="font-size: 12px; text-align: center;">'+data[i].Stamp+'</td>'+
							 // '<td>'+
							 // 	 '<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].userid+'"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a>'+
							 // 	 '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].userid+'" style="margin-left:10px;"><span class="glyphicon glyphicon-remove"></span>&nbsp;Delete</a>'+
							 // 	'<a  class="btn btn-warning"   onclick="getData('+data[i].ticketid+');" style="margin-left:10px;"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;View</a>'+
							 // 	'<a  onclick="Show_ticket_info('+data[i].ticketid+');" class="btn btn-warning" style="margin-left:10px;"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;View</a>'+
							 // '</td>'+
						'</tr>';
				 	
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

function showTicketInfo(id){
		$('#ticket_id').val(id);
		$.ajax({
			url : 'Ticket_control/getTicket',
			type :'POST',
			data : {
				'id' : id
			},
			dataType: 'JSON',
			success: function(data){
				var headT='';
				
					headT += '<div style="font-size: 20px;">'+"Ticket Subject: "+data.Subject+'</div>'

				$('#headT').html(headT);
			},
			error: function(){
				alert('error');
			},
		});
}