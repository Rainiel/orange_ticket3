
<div class="col s10" style="padding: 10px;">
    <!--   <div class="row">
       <h6 style="
		    margin-top: 20px;
		    margin-bottom: 0px;
		    margin-left: 0px;
		">Dashboard</h6>
      </div> -->
  <div class="row" style="box-shadow: 0px 1px 10px 0px #888888;
     						 margin-left: 0px;
     						 padding-left: 15px;
     						 padding-right: 15px;
     						 padding-top: 20px;">
<input type="hidden" value="<?php echo base_url(); ?>" id="base1">
    <div class="row">
    <!-- Modal Trigger -->

    <!-- Modal Structure -->
		<form id="addSubAdmin">
            <div id="modal1" class="modal" style="width: 500px">
              <div class="modal-content" style="padding: 0;">
                <h4 class="modal-header" style="background-color: #2d3e50; padding: 10px; color: white">Create Sub-Admin</h4>
                      <div class="row" style="margin-left: 50px">
                            <div class="input-field col s5">
                                <input type="text" class="validate" name="SAfname" required>
              		            <label>First Name</label>
                            </div>
                            <div class="input-field col s5">
                                <input type="text" class="validate" name="SAlname" required>
              		            <label>Last Name</label>
                            </div>
                            <div class="input-field col s10">
                                <select name="Team" required>
                			      <option value="" disabled selected required>Choose Team</option>
                			      <option value="Data">Data Team</option>
                			      <option value="Technical">Technical Team</option>
                			    </select>
                			    <label>Team</label>
                            </div>
                            <div class="input-field col s10">
                                <input type="text" class="validate" name="SAusername" required>
              		            <label>Username</label>
                            </div>
                            <div class="input-field col s10">
                                <input type="password" class="validate" name="SApassword" required>
              		            <label>Password</label>
                            </div>
                        </div>
            </div>
                <a href="#!" class=" modal-action modal-close waves-effect waves-light btn pull-right" style="margin-right: 80px; margin-bottom: 13px; background-color: #2d3e50"><i class="material-icons right">done_all</i>DONE</a>
          </div>
        </form>
		  <!-- <div id="modal1" class="modal" style="width: 40%; min-height: 80%;">
		    <div class="modal-content" style="background-color: #2d3e50; padding: 15px;" >
		      <h5 style="margin: 0px; color: white;">Create Sub-Admin</h5></div>
		      <div class="col s12"><p style="padding-top: 20px;">Account Registration</p></div>
		      <div class="row">
		        <div class="input-field col s6">
		          <input type="text" class="validate" name="SAfname" required>
		          <label>First Name</label>
		        </div>
		        <div class="input-field col s6">
		          <input type="text" class="validate" name="SAlname" required>
		          <label>Last Name</label>
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          <input type="text" class="validate" name="SAusername" required>
		          <label>Username</label>
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          <input type="password" class="validate" name="SApassword" required>
		          <label>Password</label>
		        </div>
		      </div>
		      <div class="input-field col s12">
			    <select name="Team" required>
			      <option value="" disabled selected required>Choose Team</option>
			      <option value="Data">Data Team</option>
			      <option value="Technical">Technical Team</option>
			    </select>
			    <label>Issue Type</label>
			  </div>
		    <div class="modal-footer">
		      <button class="btn waves-effect waves-light" type="submit">Create
			    <i class="material-icons right">send</i> -->
			  <!-- </button>
		    </div>
			<input type="text" style="display: none;" name="Sub" value="Sub-Admin">
		  </div>
		  </form> -->
		  <!-- END MODAL -->

		<div class="row cols s12">
		<p style="margin-left: 5px; margin-top: 0px; padding-right: 10px; margin-left: 15px">Users
		<a style="margin-left: 20px; background-color: #189C1E" class="waves-effect waves-light btn pull-right">New</a>
		<a class="waves-effect waves-light btn active pull-right" style="background-color: #DF3D3D"><i class="fa fa-trash-o" aria-hidden="true"></i>  Trash</a>
		<input type="hidden" id='SAradio'>
		<input type="hidden" id="GTICK" value="<?php echo $uid; ?>">
		</div>

		 <!-- <div class="col s4">

          <table class="highlight" style="box-shadow: 0px 1px 10px 0px #888888;">
	        <thead style="background: #2d3e50;">
	          <tr>
	            <th data-field="name" style="color: white; text-align: center; border-radius: 0px;">Sub-Admins</th>
	            <th data-field="price" style="color: white; text-align: center; border-radius: 0px;">Team</th>
	          </tr>
	        </thead>

	        <tbody id="SubTable">
	        </tbody>
	      </table>
	      <table class="highlight" style="box-shadow: 0px 1px 10px 0px #888888;">
	        <thead style="background: #2d3e50;">
	          <tr>
	            <th data-field="name" style="color: white; text-align: center; border-radius: 0px;">Sub-Admins</th>
	            <th data-field="price" style="color: white; text-align: center; border-radius: 0px;">Tickets</th>
	          </tr>
	        </thead>

	        <tbody id="SubTables">
	        </tbody>
	      </table>

        </div> -->

    	<div class="col s12" id="ticketTable">
          <table style="box-shadow: 0px 1px 10px 0px #888888;">
	        <thead style="background: #2d3e50;">
	          <tr>
                  <th data-field="id" style="width: 50px; padding-left: 20px; padding-top: 5px; border-radius: 0px">
                    <input type="checkbox" class="filled-in" id="filled-in-box">
      				<label for="filled-in-box" style="margin-top: 15px; border-color: white"></label></th>
                  <th data-field="id" style="color: white; border-radius: 0px;">User ID</th>
	              <th data-field="id" style="color: white; border-radius: 0px;"><center>Name</center></th>
	              <th data-field="id" style="color: white; text-align: center; border-radius: 0px;">Team</th>
                  <th data-field="id" style="color: white; text-align: center; border-radius: 0px;">Action</th>
	          </tr>
	        </thead>

	        <tbody id="showTicket">
                <td style="width: 50px; padding-left: 20px;" data-id2="28"><input height="15px" width="15px" type="checkbox" class="filled-in fill-box" id="28" data-stat="Resolved" data-prio="Low" data-ass="3"><label for="28" style="margin-top: 15px;"></label></td>
                <td>98234792834</td>
                <td><center>Nerine Alijah Ignacio</center></td>
                <td><center>Technical</center></td>
                <td><center><a class="waves-effect waves-light btn">Edit</a></center></td>
	        </tbody>
	      </table>
      	</div>
      	<input type="hidden" id="subadmin_id">

      	<!-- <div class="col s8 123" id="SAT" style="display: none;"></div>
		      <hr class="123" style="display: none;"> -->
		      <div class="col s8 123" id="SAT" style="display: none;">

			  </div>

    </div>
  </div>
</div>
<!-- <script src="assets/materialize/js/adminSubAdmin.js"></script> -->
