$(document).ready(function() {
ticketGraph();

function ticketGraph(){
		$.ajax({
			url : 'Ticket_control/ticketGraph',
			type :'ajax',
			dataType: 'JSON',
			success: function(data){
				$("#new").append(data.New);
				$("#prog").append(data.Prog);
				$("#onhold").append(data.Hold);
				$("#resolved").append(data.Resolved);
				// $("#closed").append(data.Closed);

			},
			error: function(){
			alert();
			},
			});
		};
  });

