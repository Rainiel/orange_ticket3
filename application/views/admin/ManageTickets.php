
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

		<div class="row cols s12">
		<p style="margin-left: 5px; margin-top: 0px; padding-right: 10px;">SUB-ADMIN
		<a style="margin-left: 20px;" class="waves-effect waves-light btn">Technical</a>
		<a class="waves-effect waves-light btn active">Data</a>
		<a class="waves-effect waves-light btn modal-trigger" href="#modal1" style="background-color: #2d3e50; float: right; padding-left: 20px;
		<?php if ($this->session->userdata('Acc_type') != 'Admin'){?> display: none; <?php } ?> "
		<?php if ($this->session->userdata('Acc_type') != 'Admin'){?> disabled <?php } ?>
		><i class="fa fa-plus" aria-hidden="true" style="padding-right: 10px;"></i>Sub-Admin</a>
		</p>
		<input type="hidden" id='SAradio'>
		<input type="hidden" id="GTICK" value="<?php echo $uid; ?>">
		</div>

		 <div class="col s4">
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

        </div>

    	<div class="col s8" id="ticketTable">
          <table style="box-shadow: 0px 1px 10px 0px #888888;">
	        <thead style="background: #2d3e50;">
	          <tr>
	              <th data-field="id" style="color: white; border-radius: 0px;">Tickets</th>
	              <th data-field="id" style="color: white; text-align: center; border-radius: 0px;">Status</th>
	              <th data-field="name" style="color: white; text-align: center; border-radius: 0px;">Assignee</th>
	              <th data-field="name" style="color: white; text-align: center; border-radius: 0px;">Priority</th>
	          </tr>
	        </thead>

	        <tbody id="showTicket">
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

<script src="assets/materialize/js/adminSubAdmin.js"></script>
