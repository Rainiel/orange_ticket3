
<div class="col s10" style="padding: 10px;">
  <div class="row" style="box-shadow: 0px 1px 10px 0px #888888;
     						 margin-left: 0px;
     						 padding-left: 15px;
     						 padding-right: 15px;
     						 padding-top: 20px;">
<input type="hidden" value="<?php echo base_url(); ?>" id="base1">
    <div class="row">

		<div class="row cols s12">
		<p style="margin-left: 5px; margin-top: 0px; padding-right: 10px; margin-left: 15px">Users
            <a class="waves-effect waves-light btn modal-trigger pull-right" href="#modal2" style="background-color: #53D530; float: right; padding-left: 20px; margin-left: 15px">
            <i class="fa fa-plus" aria-hidden="true" style="padding-right: 10px;"></i>User</a>
		<a class="waves-effect waves-light btn active pull-right" style="background-color: #DF3D3D"><i class="fa fa-trash-o" aria-hidden="true"></i>  Trash</a>
		<input type="hidden" id='SAradio'>
		<input type="hidden" id="GTICK" value="<?php echo $uid; ?>">
		</div>

        <form id="addUser">
            <div id="modal2" class="modal" style="width: 500px">
              <div class="modal-content" style="padding: 0;">
                <h4 class="modal-header" style="background-color: #2d3e50; padding: 10px; color: white">Create User</h4>
                      <div class="row" style="margin-left: 50px">
                            <div class="input-field col s5">
                                <input type="text" class="validate" name="Ufname" required>
              		            <label>First Name</label>
                            </div>
                            <div class="input-field col s5">
                                <input type="text" class="validate" name="Ulname" required>
              		            <label>Last Name</label>
                            </div>  
                            <div class="input-field col s10">
                                <input type="text" class="validate" name="Uusername" required>
              		            <label>Username</label>
                            </div>
                            <div class="input-field col s10">
                                <input type="password" class="validate" name="Upassword" required>
              		            <label>Password</label>
                            </div>
                        </div>
                        <input type="hidden" name="acc" value="user">
                        <input type="hidden" name="Team" value="N/A">
            </div>
                <button type="submit" class=" modal-action modal-close waves-effect waves-light btn pull-right" style="margin-right: 80px; margin-bottom: 13px; background-color: #2d3e50"><i class="material-icons right">done_all</i>DONE</button>
          </div>
        </form>

    	<div class="col s12" id="ticketTable">
          <table style="box-shadow: 0px 1px 10px 0px #888888;">
	        <thead style="background: #2d3e50;">
	          <tr>
                  <th data-field="id" style="width: 50px; padding-left: 20px; padding-top: 5px; border-radius: 0px">
                    <input type="checkbox" class="filled-in" id="filled-in-box">
      				<label for="filled-in-box" style="margin-top: 15px; border-color: white"></label></th>
                  <th data-field="id" style="color: white; border-radius: 0px;">User ID</th>
	              <th data-field="id" style="color: white; border-radius: 0px;"><center>Name</center></th>
	              <th data-field="id" style="color: white; text-align: center; border-radius: 0px;">User</th>
                  <th data-field="id" style="color: white; text-align: center; border-radius: 0px;">Action</th>
	          </tr>
	        </thead>

	        <tbody id="showUser">
	        </tbody>
	      </table>
      	</div>

		      <div class="col s8 123" id="SAT" style="display: none;">

			  </div>

    </div>
  </div>
</div>
<script src="assets/materialize/js/User.js"></script>
