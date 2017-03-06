
<div class="col s10" style="padding: 10px;">
    <div class="row">
    <!-- <h6 style="
        margin-top: 20px;
        margin-bottom: 0px;
        margin-left: 0px;
    ">Dashboard</h6> -->
        <!-- <h6 style="margin-top: 20px; margin-bottom: 0px; margin-left: 0px; min-width: 40%; width: 40px">
        <nav>
            <div class="nav-wrapper" style="padding: 0; background-color: white; box-shadow: 0px 0px 0px #000">
              <div class="col s12">
                <a href="#!" class="breadcrumb" style="color: black">First</a>
                <a href="#!" class="breadcrumb" style="color: black">Second</a>
                <a href="#!" class="breadcrumb" style="color: black">Third</a>
              </div>
            </div>
        </nav>
        </h6> -->
        <!-- <div class="nav-wrapper pull-right" style="min-width: 20%; width: 20px; margin-top: -55px">
          <form>
            <div class="input-field">
              <input id="search" type="search" required>
              <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            </div>
          </form>
        </div> -->
    </div>
  <div class="row" style="box-shadow: 0px 1px 10px 0px #888888;
     						 margin-left: 0px;
     						 padding-left: 10px;
     						 padding-right: 10px;
     						 padding-top: 10px;">
 <input type="hidden" value="<?php echo base_url(); ?>" id="base">
    <div class="row">
        <div class="col s2" style="padding-left: 0px;">
        	<!-- Modal Trigger -->
  	<a class="waves-effect waves-light btn modal-trigger" href="#modal1" style="background-color: #2d3e50;padding-left: 20px;
		  	<?php if ($this->session->userdata('Acc_type') != 'user'){?> display: none; <?php } ?>"
		  	<?php if ($this->session->userdata('Acc_type') != 'user'){?> disabled <?php } ?>
		><i class="fa fa-plus" aria-hidden="true" style="padding-right: 10px;"></i>Ticket</a>
		  	<?php if ($this->session->userdata('Acc_type') == 'user'){?> <hr> <?php } ?>
				  <!-- Modal Structure -->

				  <form id="addTicket">
				  <div id="modal1" class="modal" style="width: 35%;">
				    <div class="modal-content" style="background-color: #2d3e50; padding: 15px;" >
				      <h5 style="margin: 0px; color: white;">Ticket</h5></div>
				      <div class="col s12"><p style="padding-top: 20px;">Start Creating Ticket</p></div>
				      <div class="input-field col s12">
				          <input id="icon_prefix" type="text" class="validate" name="Subj" required>
				          <label>Subject</label>
				      </div>
				      <div class="input-field col s12">
					    <select id="selectTeam" name="Iss" required>
					      <option value="" disabled selected>Choose Issue Type</option>
					      <option value="Data">Data Issue</option>
					      <option value="Technical">Technical Issue</option>
					    </select>
					    <label>Issue Type</label>
					    <input type="hidden" id="Team">
					  </div>
					  <div class="input-field col s12">
				         <textarea id="textarea1" class="materialize-textarea" name="Desc" required></textarea>
				         <label for="textarea1">Description</label>
				      </div>

				    <div class="modal-footer">
				      <button id="addForm" class="waves-effect waves-green btn-flat" type="submit">Add
					    <i class="material-icons right">Update</i>
					  </button>
				    </div>

				    <input type="text" style="display: none;" name="Stat" value="New">
				    <input type="text" style="display: none;" name="Prio" value="Low">
				    <input type="text" style="display: none;" name="Ass" value="1">
				    <input type="hidden" id="auto" name="Nauto">

				  </div>
				  </form>
				  <!-- END MODAL -->
            <div class="tabs-vertical" id="sideBar">
                <div class="header" style="background-color: #2d3e50; padding: 5px; border-radius: 3px; color: white"><center>My Conversations</center></div>
    		        <ul class="tabs" id="statFilt">
    		        	<li class="tab filt">
    		              <a class="waves-effect" data-stat="">All</a>
    		           </li>
    		           <li class="tab filt" >
    		              <a class="waves-effect" data-stat="New">New <span class="new badge" data-badge-caption="4" style="margin-top: 4px"></span></a>
    		           </li>
    		           <li class="tab filt">
    		             <a class="waves-effect" data-stat="On-progress">On-progress</a>
    		           </li>
    		           <li class="tab filt">
    		             <a class="waves-effect" data-stat="On-hold">On-hold</a>
    		           </li>
    		           <li class="tab filt">
    		             <a class="waves-effect" data-stat="Resolved">Resolved</a>
    		           </li>
    		           <li class="tab filt">
    		             <a class="waves-effect" data-stat="Closed">Closed</a>
    		           </li>
    		        <!-- </ul> -->
     	    <!-- </div> -->

		 <hr id="hr">
     	  <!-- <div class="tabs-vertical" id="sideBar4"> -->
                <div class="headertwo" style="background-color: #2d3e50; padding: 5px; border-radius: 3px; color: white"><center>Team Conversation</center></div>
    		        <?php if($tim == 'Data'){ ?>
    		           	<li class="tab filt">
    		              <a class="waves-effect" data-Ass="Data">Data</a>
    		           	</li>
    		        <?php } ?>
    		        <?php if($tim == 'Technical'){ ?>
    		           	<li class="tab filt">
    		             <a class="waves-effect" data-Ass="Technical">Technical</a>
    		           	</li>
    		        <?php } ?>
    		        </ul>
    		        <?php if($accts == 'Admin'){ ?>
    		        <ul class="tabs" id="AssFilt">
    		        	<li class="tab filt">
    		              <a class="waves-effect" data-Ass2="">All</a>
    		           	</li>
    		           	<li class="tab filt">
    		              <a class="waves-effect" data-Ass2="Data">Data</a>
    		           	</li>
    		           	<li class="tab filt">
    		             <a class="waves-effect" data-Ass2="Technical">Technical</a>
    		           	</li>
    		        </ul>
    		        <?php } ?>
     	  </div>
          <!-- <hr id="hrtwo">
          <a class="waves-effect waves-light btn" style="font-size: 12px; background-color: #2d3e50">manage tickets</a> -->
     	  <form id="editTicket">
     	  <div class="input-field col s12 sideBar2" style="display: none;">
		    <!-- <select name="uAssign" id="sidebarS1">
		    </select>
		    <label>Assign To</label> -->
		  </div>
		  <div class="input-field col s12 sideBar2" style="display: none;">
		    <select name="uStatus" id="sidebarS2">
		    </select>
		    <label>Status</label>
		  </div>
		  <div class="input-field col s12 sideBar2" style="display: none;">
		    <select name="uPriority" id="sidebarS3">
		    </select>
		    <label>Priority</label>
		  </div>
		  <button style="display: none; background-color: #2d3e50" id="sideBar2Btn" class="btn waves-effect waves-light" type="submit"
		    <i class="material-icons right">Update</i>
		  </button>
		<input type="hidden" id="tickCount" name="tickCount[]">
		<input type="hidden" id="tickCount" name="userCount[]">
		<?php if ($this->session->userdata('Acc_type') == 'user'){?>

		<input type="hidden" id="account" value="user"> <?php } ?>
		  </form>
      	</div>

       	<div class="col s10" style="padding-right: 0px; border-left: 1px solid #e1e1e1">
          <table class="highlight" id="allTable">
	        <thead>
	          <tr>
	          	  <th data-field="id" style="width: 50px; padding-left: 20px; padding-top: 5px;
	          	  <?php if ($this->session->userdata('Acc_type') == 'user'){?> display: none; <?php } ?>">
	          	    <input type="checkbox" class="filled-in" id="filled-in-box" />
      				<label for="filled-in-box" style="margin-top: 15px;"></label>
      			  </th>
	              <th style="padding-top: 5px; padding-bottom: 10px; width: 300px;">Tickets</th>
	              <th style="padding-top: 5px; padding-bottom: 10px; text-align: center;">Status</th>
	              <th style="padding-top: 5px; padding-bottom: 10px; text-align: center;">Assignee</th>
	              <th style="padding-top: 5px; padding-bottom: 10px; text-align: center;">Priority<i class="fa fa-chevron-down" aria-hidden="true" style="margin-left: 7px"></i></th>
	              <th style="padding-top: 5px; padding-bottom: 10px; text-align: center;">Latest Update</th>
	              <th style="padding-top: 5px; padding-bottom: 10px; text-align: center;">Date Filed</th>
	          </tr>
	        </thead>

	        <tbody id="showTicket">
	          <!-- <tr>
	          	<td style="width: 50px; padding-left: 20px;">
	          		<input type="checkbox" class="filled-in" id="filled-in-box1" />
      				<label for="filled-in-box1"></label>
      			</td>
	          </tr> -->
	        </tbody>
	      </table>



	      	<div class="col s12 123" id="headT" style="display: none;"></div>
		        <!-- <hr class="123" style="display: none;"> -->
		        <div class="col s12 123" id="chatTicket" style="display: none;">
              <div class="collection"  id="ticketHead" style="border-left: none; border-right: none">

              </div>

            <div class="collection" style="min-height: 100%; height: 400px; max-height: 1000px; overflow: scroll; overflow-x: hidden; border:none;">
                        <!-- <a href="#!" class="secondary-content pull-right" style="margin-top: 15px; margin-right: 20px"><i class="fa fa-share" aria-hidden="true" style="margin-right: 8px; color: black"></i><i class="fa fa-quote-right" aria-hidden="true" style="color: black"></i></a> -->
    					<div class="collection" id="messages" style="border-top:none; border-left: none; border-right: none; border-bottom: none">
    					  <!-- <div class="collection-item avatar" style="border-bottom: none;">
    						<img src="assets/images/square.png" alt="" class="circle">
    						<span class="title" style="font-size: 14px; color: #2d3e50"><b>Rainiel</b></span>
    						<p style="font-size: 12px;	margin-top: -5px;">February 18<br>
    						</p>
    						<span class="title" id="msg" style="color: #2d3e50; font-size: 12px;">
    						</span>
                </div> -->
              </div>
            </div>

              <form id="insChat">
                <div class="collection with-header" style="width: 600px; height: 200px; margin-left: 20px">
                    <div class="collection-header" style="padding: 0px; height: 20px">
                        <p style="margin-left: 20px; margin-bottom: 20px; font-size: 12px">
                            <i class="fa fa-inbox" aria-hidden="true"></i>Rainiel@orangeapps.com
                        </p>
                    </div>
                    <div class="collection-item" style="border-bottom: none">

                      <div class="input-field col s12" style="margin-top: 0px;">
                        <textarea id="textarea2" class="materialize-textarea"  style="margin-bottom: 0px;" required></textarea>
                        <label for="textarea2">Textarea</label>
                      </div>

                    </div>
                    <button type="submit" class="waves-effect waves-light btn pull-right" style="margin-top: 35px; margin-right: 10px">SEND
                    </button>
                </div>
              </form>
			</div>
        </div>
    </div>

	<!-- <input type="hidden" id="ticket_id" name="TID"> -->
  </div>
</div>
<script src="assets/js/adminTickets.js"></script>
