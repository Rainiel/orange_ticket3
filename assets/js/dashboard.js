$(document).ready(function(){
ticketGraph();
dashboardTick();
dashboardCounts();

});

function ticketGraph(){
	var New
	var Prog
	var Hold
	var Resolved
	var Closed
	$.ajax({
			url : 'Ticket_control/ticketGraph',
			type :'ajax',
			dataType: 'JSON',
			success: function(data){
				New = data.New;
				Prog = data.Prog;
				Hold = data.Hold;
				Resolved = data.Resolved;
				Closed = data.Closed;
				// $("#new").append(data.New);
				// $("#prog").append(data.Prog);
				// $("#onhold").append(data.Hold);
				// $("#resolved").append(data.Resolved);
				// $("#closed").append(data.Closed);
			    var revenueChart = new FusionCharts({
			        type: 'doughnut2d',
			        renderAt: 'chart-container',
			        width: '100%',
			        height: '100%',
			        dataFormat: 'json',
			        dataSource: {
			            "chart": {
			            	"enableSmartLabels": "0",
			            	"showValues": "0",
			            	"showPercentValues": "0",               
			                "startingAngle": "310",
			                "decimals": "0",
			               
			                "theme": "fint"                
			            },
			            "data": [{
			                "value": New
			            }, {
			                "value": Prog
			            }, {
			                "value": Hold
			            }, {
			                "value": Resolved
			            }, {
			                "value": Closed
			            }]
			        }
			    }).render();
			},
			error: function(){
			alert();
			},
	});
		};

 function dashboardTick(){
 	$.ajax({
		url: 'Ticket_control/dashboardTicks',
		type: 'ajax',
		dataType: 'JSON',
		success: function(data){
			var dashboardTickets='';
			var i;
			for(i=0;i<data.length;i++){
				dashboardTickets+=  '<tr>'+
						              '<td>'+
										'<img src="assets/images/square.png" style="height: 40px; width: 40px; float: left; margin-right: 10px;">'+
										'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 14px; font-weight: bold;">'+data[i].fname1+'&nbsp;'+data[i].lname1+
										'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 12px; font-weight: 500;">Issue Type: '+data[i].Issue+'<small style="font-size: 12px; margin-left: 10px;">'+data[i].Subject+'</small></p>'+
									  '</td>'+
						              '<td><center><label class="openbtn" style="font-size: 11px; background-color: #61d7f1; border-radius: 5px; padding: 4px; color: white">'+data[i].Status+'</label></td>'+
						              '<td><center>'+data[i].fname2+data[i].lname2+'</td>'+
						              '<td><center><label class="minorbtn" style="font-size: 12px; background-color: #f0e94b; border-radius: 5px; padding: 4px; color: white">'+data[i].Priority+'</label></td>'+
						            '</tr>';
			}
			$('#dashboardTickets').html(dashboardTickets);
		},
		error: function(){

		},
 });
 };


function dashboardCounts(){
	$.ajax({
		url: 'Ticket_control/dashboardCounts',
		type: 'ajax',
		dataType: 'JSON',
		success: function(data){
			var AllTicket='';
			var HighTicket='';
			var ClosedTicket='';
			var Online='';
			AllTicket+= data.AllTicket;
			HighTicket+= data.HighTicket;
			ClosedTicket+= data.ClosedTicket;
			Online+= data.Online;
			$('#AllTicket').append(AllTicket);
			$('#HighTicket').append(HighTicket);
			$('#ClosedTicket').append(ClosedTicket);
			$('#Online').append(Online);
		},
	});
};

function Chart(){

	alert(New)


};






