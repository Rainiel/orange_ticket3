$(document).ready(function(){
	$('.modal').modal();
	privatechat();

});
$(document).on('click', '#selectPersonbtn', function(e){
	var name = $('.fill-box:checked').attr('data-name');
	//var rId = $('.fill-box:checked').attr('data-rid');
	$('#labelperson').addClass('active');
	$('#person').val(name);
	//$('#rId').val(rId);
	e.preventDefault();
	base_url = $('#base').val();
	var UID1 = $('.fill-box:checked').attr('data-rid');
	$('#rId').val(UID1);
	//alert(UID1)
	$.ajax({
		type: 'POST',
		url: base_url + 'Messages_control/addChat',
		data: {
			'UID1' : UID1,
		},
		success: function(data){
			$('#selectClose').trigger('click');
		},
	});
});

$(document).on('click', '#selectPersonId', function(){
	selectPerson();
});

$(document).on('click', '.personChat', function(){
	var personChat = $(this).attr('data-id');
	//alert(personChat)
	getPrivateChat(personChat);
	personpm(personChat);
});


$(document).on('click', '#addChat', function(e){
	e.preventDefault();
	base_url = $('#base').val();
	var UID = $('#rId').val();

	$.ajax({
		type: 'POST',
		data: {'UID' : UID},
		url: base_url + 'Messages_control/getAddChat',
		dataType: 'json',
		success: function(data){
			var CID = '';
			CID = data.CID;
			$('#sendClose').trigger('click');
			//alert(CID)
			$.ajax({
				type: 'POST',
				data: {'CHAT' : CHAT,
						'CID' : CID},
				url: base_url + 'Messages_control/addchatreply',
				dataType: 'json',
				success: function(data){
				},
			});
		},
	});
	var CHAT = $('#Message').val();

});

$("#MessageInBox").keypress(function(e){
    if (e.which == 13) {
        e.preventDefault();
    var CHAT = $('#MessageInBox').val();
    var CID = $('#MessageCID').val();
    base_url = $('#base').val();
    //alert(CID)
    //personpm(CID);
        $.ajax({
				type: 'POST',
				data: {'CHAT' : CHAT,
						'CID' : CID},
				url: base_url + 'Messages_control/addchatreply',
				//dataType: 'json',
				success: function(){
					personpm(CID);
				},
			});
        $('#MessageInBox').val('');
    }
});

function privatechat(){

	$.ajax({
		type: 'ajax',
		url: 'Messages_control/privatechat',
		dataType: 'json',
		success: function(data){
			var i;
			var personChat='';
				for(i=0;i<data.length;i++){
					var Log = 'Online';
					if(data[i].Online == 0){
						Log = data[i].TimeLog;
					}
					personChat+= '<div class="row personChat" style="margin-bottom: 2px;" data-id="'+data[i].CID+'">'+
			                        '<div class="col s6" style="width: 70px"><p><img src="./assets/images/square.png" style="width: 50px; height: 50px"></p></div>'+
			                        '<div class="col s6" style="color: white; font-size: 16px"><p>'+data[i].fname+'&nbsp;'+data[i].lname+'</p></div><small style="float:right; padding: 20px; color:white;">'+Log+'</small>'+
			                        '<div class="col s6 m9" style="color: #CECECE; margin-top: -25px; font-size: 12px"><p>'+data[i].LastR+'</p></div>'+
			                      '</div>'+
			                 '</div>'+
			                 '<div class="divider"></div>';
				}
				$('#personChat').html(personChat);
		},
	});
};

function getPrivateChat(CID){
	$('#MessageCID').val(CID);
	$.ajax({
		type: 'POST',
		url: 'Messages_control/getPrivateChat',
		data: {'CID':CID},
		dataType: 'json',
		success:function(data){
			var personpm='';

				personpm+= '<center>'+data.fname+'&nbsp;'+data.lname+'<br>';
					//'<p style="margin-top: -3px; font-size: 12px">'+data.Online+'</p>';
			$('#personpm').html(personpm);
		},
	});
};

function personpm(CID){
	var UID = $('#UID').val();
	$.ajax({
		type: 'POST',
		url: 'Messages_control/getChatReply',
		data:{'CID' : CID},
		dataType: 'JSON',
		success: function(data){
			var i;
			var chatreply='';
			for(i=0;i<data.length;i++){


				if(data[i].UID == UID){
					chatreply += '<div class="flex-container pull-right">'+
                    '<div class="flex-item pull-right" style="display: flex; justify-content: flex-end; float: right">'+
                        '<div class="col s6 pull-right">'+
                            '<div class="talk-bubble tri-right left-in" style="background-color: white;  border-radius: 15px; text-align: right; width: 100px">'+
                              '<div class="talktext" style="color: black; padding: 5px; font-size: 12px; margin-top: 10px">'+
                                '<p class="pChat" style="margin: 2px">'+data[i].CHAT+'</p>'+
                              '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col s2 pull-right" style="padding: 0px; margin-left: 0px; width: 70px"><p><img src="./assets/images/square.png" style="width: 50px; height: 50px"></p></div>'+
                    '</div>'+
                '</div>';
				}
				if(data[i].UID != UID){
				chatreply += '<div class="flex-container">'+
                    '<div class="flex-item">'+
                        '<div class="col s2" style="width: 70px;"><p><img src="./assets/images/square.png" style="width: 50px; height: 50px"></p></div>'+
                        '<div class="col s6" style="color: white; font-size: 16px">'+
                            '<div class="talk-bubble tri-right left-in" style="background-color: white;  border-radius: 15px">'+
                              '<div class="talktext" style="color: black; padding: 5px; font-size: 12px; margin-top: 10px; text-align: left">'+
                                '<p class="pChat" style="margin: 2px">'+data[i].CHAT+'</p>'+
                              '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
                }
			}
		$('#chatreply').html(chatreply);

		},

	})
}

function selectPerson(){
 	$.ajax({
		url: 'Messages_control/selectPerson',
		type: 'ajax',
		dataType: 'JSON',
		success: function(data){
			var selectPerson='';

			var i;
			for(i=0;i<data.length;i++){
			var test = data[i].userId;
				selectPerson+=  '<tr>'+
									'<td style="width: 50px; padding-left: 20px;">'+
		      							'<input height="15px" width="15px" type="radio" name="group1" class="with-gap fill-box" id="'+test+'" data-rid="'+data[i].userId+'" data-name="'+data[i].fname+''+data[i].lname+'" />'+
		      							'<label for="'+test+'" style="margin-top: 15px;" ></label>' +
					      			'</td>'+
						              '<td>'+
										'<img src="assets/images/square.png" style="height: 40px; width: 40px; float: left; margin-right: 10px;">'+
										'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 14px; font-weight: bold;">'+data[i].fname+'&nbsp;'+data[i].lname+
										'<p style="margin-top: 0px; margin-bottom: 0px; font-size: 12px; font-weight: 500;">'+data[i].team+'</p>'+
									  '</td>'+
						            '</tr>';
			}
			$('#selectPerson').html(selectPerson);
		},
		error: function(){

		},
 });
 };
