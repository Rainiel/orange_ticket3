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
			},
			error: function(){
				alert();
			},
	});
});

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
					// '<td style="width: 50px; padding-left: 20px;" data-id2="28"><input height="15px" width="15px" type="checkbox" class="filled-in fill-box" id="28" data-stat="Resolved" data-prio="Low" data-ass="3"><label for="28" style="margin-top: 15px;"></label></td>'+
	                '<td>'+data[i].userId+'</td>'+
	                '<td><center>'+data[i].fname+''+data[i].lname+'</center></td>'+
	                '<td><center>'+data[i].team+'</center></td>'+
	                '<td><center><a class="waves-effect waves-light btn">Info</a></center></td>'+
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
				var SAT='';

					SAT += '<ul class="collection">'+
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
