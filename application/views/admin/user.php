
<div class="col s10" style="padding: 10px;">
  <div class="row" style="box-shadow: 0px 1px 10px 0px #888888;
     						 margin-left: 0px;
     						 padding-left: 15px;
     						 padding-right: 15px;
     						 padding-top: 20px;">
<input type="hidden" value="<?php echo base_url(); ?>" id="base1">
    <div class="row">

		<div class="row cols s12">
            <!-- <div class=" col s6" style="box-shadow: 0px 0px 0px black">
                <nav>
            <div class="nav-wrapper wrap-bc" style="box-shadow: 0px 0px 0px black">
              <div class="col s12 nav-breadcrumb">
                <a href="#!" class="breadcrumb first-bc">Dashboard</a>
                <a href="#!" class="breadcrumb second-bc">SETTINGS</a>
                <a href="#!" class="breadcrumb third-bc">USERS</a>
              </div>
            </div>
          </nav>
            </div> -->
            <a class="waves-effect waves-light btn modal-trigger pull-right" href="#modal1" style="background-color: #53D530; float: right; padding-left: 20px; margin-left: 15px">
            <i class="fa fa-plus" aria-hidden="true" style="padding-right: 10px;"></i>User</a>
		<!-- <a class="waves-effect waves-light btn active pull-right" style="background-color: #DF3D3D"><i class="fa fa-trash-o" aria-hidden="true"></i>  Trash</a> -->
		<input type="hidden" id='SAradio'>
		<input type="hidden" id="GTICK" value="<?php echo $uid; ?>">
		</div>

        <form id="addUser">
            <div id="modal1" class="modal" style="width: 500px">
              <div class="modal-content" style="padding: 0;">
                <h4 class="modal-header" style="background-color: #2d3e50; padding: 10px; color: white">Create User</h4>
                      <div class="row" style="margin-left: 50px">
                            <div class="input-field col s5">
                                <input type="text" class="validate" id="Ufname" required>
              		            <label>First Name</label>
                            </div>
                            <div class="input-field col s5">
                                <input type="text" class="validate" id="Ulname" required>
              		            <label>Last Name</label>
                            </div>
                            <div class="input-field col s10">
                                <input type="text" class="validate" id="Uusername" required>
              		            <label>Username</label>
                            </div>
                            <div class="input-field col s10">
                                <input type="password" class="validate" id="Upassword" required>
              		            <label>Password</label>
                            </div>
                            <div class="input-field col s10">
                                <input type="password" class="validate" id="UCpassword" required>
                              <label>Confirm Password</label>
                            </div>
                        </div>
                        <input type="hidden" id="Uacc" value="user">
                        <input type="hidden" id="UTeam" value="N/A">
            </div>
                <button type="submit" class="waves-effect waves-light btn pull-right" style="margin-right: 80px; margin-bottom: 13px; background-color: #2d3e50"><i class="material-icons right">done_all</i>DONE</button>
                <a class="modal-action modal-close waves-effect waves-green btn" id="modalClose" style="margin-right: 40px;">Close</a>
          </div>
        </form>

        <form id="editUser">
    <div id="modal2" class="modal" style="width: 40%;">
        <div class="modal-content" style="background-color: #2d3e50; padding: 15px;">
          <h5 style="margin: 0px; color: white;">Sub-Admin</h5>
        </div>
          <div class="row" style="margin-left: 50px">
              <div class="input-field col s5" id="Userfname">
                <!-- <input type="text" class="validate" name="Ufname" required>
              <label>First Name</label> -->
              </div>
              <div class="input-field col s5" id="Userlname">
                  <!-- <input type="text" class="validate" name="Ulname" required>
                <label>Last Name</label> -->
              </div>
              <div class="input-field col s10" id="Userusername">
                  <!-- <input type="text" class="validate" name="Uusername" required>
                <label>Username</label> -->
              </div>
              <div class="input-field col s10" id="Userpassword">
                  <!-- <input type="password" class="validate" name="Upassword" required>
                <label>Password</label> -->
              </div>
          </div>

        <div class="modal-footer">
          <button id="editUserform" class="waves-effect waves-green btn-flat" style="margin-right: 10px; margin-bottom: 13px; background-color: #2d3e50; color: white;" type="submit" 
          <?php if($this->session->userdata('Acc_type') != 'Admin') { ?> Disabled <?php } ?> >
          <i class="material-icons right">done_all</i>Update
        </button>
        <a class="modal-action modal-close waves-effect waves-green btn" id="modalClose2" style="margin-right: 80px;">Close</a>
        </div>
        <input type="hidden" id="UserId">
    </div>
    </form>

    	<div class="col s12" id="ticketTable">
          <table style="box-shadow: 0px 1px 10px 0px #888888;">
	        <thead style="background: #2d3e50;">
	          <tr>
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

		      <!-- <div class="col s8 123" id="SAT" style="display: none;"> -->

			  </div>

    </div>
  </div>
</div>
<script src="assets/js/User.js"></script>
