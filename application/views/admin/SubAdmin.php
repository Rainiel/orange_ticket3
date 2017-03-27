
<div class="col s10" style="padding: 10px;">
    <!--   <div class="row">
       <h6 style="
		    margin-top: 20px;
		    margin-bottom: 0px;
		    margin-left: 0px;
		">Dashboard</h6>
      </div> -->
      <div class="row" style="margin-left: 0px; padding-right: 15px;padding-top: 20px;">
          <div class=" col s6" style="box-shadow: 0px 0px 0px black; margin-left: 2px">
              <nav>
              <div class="nav-wrapper wrap-bc" style="box-shadow: 0px 0px 0px black">
                <div class="col s12 nav-breadcrumb">
                  <a href="#!" class="breadcrumb first-bc">Dashboard</a>
                  <a href="#!" class="breadcrumb second-bc">SETTINGS</a>
                  <a href="#!" class="breadcrumb third-bc">SUB-ADMIN</a>
                </div>
              </div>
            </nav>
          </div>
      </div>
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
            <div id="modal1" class="modal" style="width: 500px; max-height: 500%; height: 570px">
              <div class="modal-content" style="padding: 0;">
                <h4 class="modal-header" style="background-color: #2d3e50; padding: 10px; color: white">Create Sub-Admin<a class="modal-close" id="modalClose" type="button"><i class="fa fa-times pull-right" aria-hidden="true" style="color: #232F3D; font-size: 30px"></i></a></h4>
                      <div class="row" style="margin-left: 50px">
                            <div class="input-field col s5">
                                <input type="text" class="validate" id="addSAfname" required>
              		            <label>First Name</label>
                            </div>
                            <div class="input-field col s5">
                                <input type="text" class="validate" id="addSAlname" required>
              		            <label>Last Name</label>
                            </div>
                            <div class="input-field col s10">
                              <select id="addTeam" required>
                    			      <option value="" disabled selected required>Choose Team</option>
                    			      <option value="Data">Data Team</option>
                    			      <option value="Technical">Technical Team</option>
                    			    </select>
                			    <label>Team</label>
                            </div>
                            <div class="input-field col s10">
                                <input type="text" class="validate" id="addSAusername" required>
              		            <label>Username</label>
                            </div>
                            <div class="input-field col s10">
                                <input type="password" class="validate" id="addSApassword" required>
              		            <label>Password</label>
                            </div>
                            <div class="input-field col s10">
                                <input type="password" class="validate" id="addSACpassword" required>
                              <label>Confirm Password</label>
                            </div>
                        </div>
            </div>
            <input type="hidden" id="addSub" value="Sub-Admin">
            <div class="modal-footer">

                <button type="submit" class="waves-effect waves-light btn" style="margin-right: 80px; margin-bottom: 13px; background-color: #2d3e50"><i class="material-icons right">done_all</i>DONE</button>
            </div>
          </div>
        </form>

		<div class="row cols s12">

            <a class="waves-effect waves-light btn modal-trigger pull-right" href="#modal1" style="background-color: #53D530; float: right; padding-left: 20px; margin-right: 10px;">
    	    <i class="fa fa-plus" aria-hidden="true" style="padding-right: 10px;"></i>Sub-Admin</a>
	<!-- 	<a class="waves-effect waves-light btn active pull-right" style="background-color: #DF3D3D"><i class="fa fa-trash-o" aria-hidden="true"></i>  Trash</a> -->


		<input type="hidden" id='SAradio'>
		<input type="hidden" id="GTICK" value="<?php echo $uid; ?>">
		</div>
    <form id="editSA">
    <div id="modal2" class="modal" style="width: 40%; max-height: 500%; height: 500px">
        <div class="modal-content" style="background-color: #2d3e50; padding: 15px;">
          <h5 style="margin: 0px; color: white;">Sub-Admin<a class="modal-close" id="modalClose" type="button"><i class="fa fa-times pull-right" aria-hidden="true" style="color: #232F3D; font-size: 30px"></i></a></h5>
        </div>
          <div class="row" style="margin-left: 50px; padding: 15px">
              <div class="input-field col s5" id="SAfname">
                  <!-- <input type="text" class="validate" name="SAfname" required>
                  <label>First Name</label> -->
              </div>
              <div class="input-field col s5" id="SAlname">
                  <!-- <input type="text" class="validate" name="SAlname" required>
                  <label>Last Name</label> -->
              </div>
              <div class="input-field col s10">
                <select required id="SATeam">
                  <!-- <option value="" disabled selected required>Choose Team</option>
                  <option value="Data">Data Team</option>
                  <option value="Technical">Technical Team</option> -->
                </select>
                <label>Team</label>
              </div>
              <div class="input-field col s10" id="SAuser">
                  <!-- <input type="text" class="validate" name="SAusername" required>
                  <label>Username</label> -->
              </div>
              <div class="input-field col s10" id="SApass">
                  <!-- <input type="password" class="validate" name="SApassword" required>
                  <label>Password</label> -->
              </div>
          </div>

        <div class="modal-footer">
          <button id="editSAform" class="waves-effect waves-green btn-flat" style="margin-right: 20px; margin-bottom: 10px; background-color: #2d3e50; color: white;" type="submit"
          <?php if($this->session->userdata('Acc_type') != 'Admin') { ?> Disabled <?php } ?> >
          <i class="material-icons right">done_all</i>Update
        </button>
        </div>
        <input type="hidden" id="subadminId">
    </div>
    </form>
        <!-- <form id="addsub">
            <div id="modal" class="modal" style="width: 500px">
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
                <button type="submit" class="waves-effect waves-light btn pull-right" style="margin-right: 80px; margin-bottom: 13px; background-color: #2d3e50"><i class="material-icons right">done_all</i>DONE</button>
          </div>
        </form> -->

    	<div class="col s12" id="ticketTable">
          <table style="box-shadow: 0px 1px 10px 0px #888888;">
	        <thead style="background: #2d3e50;">
	          <tr>
                <th data-field="id" style="color: white; border-radius: 0px;"><center>User ID</th>
	              <th data-field="id" style="color: white; border-radius: 0px;"><center>Name</center></th>
	              <th data-field="id" style="color: white; text-align: center; border-radius: 0px;">Team</th>
	              <th data-field="name" style="color: white; text-align: center; border-radius: 0px;">Action</th>
	          </tr>
	        </thead>

	        <tbody id="showSubAdmin">
	        </tbody>
	      </table>
      	</div>
      	<input type="hidden" id="subadmin_id">

		      <div class="col s8 123" id="SAT" style="display: none;">

			  </div>

    </div>
  </div>
</div>
<script src="assets/js/SubAdmin.js"></script>
