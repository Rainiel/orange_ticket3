
	<div class="col s10" style="padding: 10px;">
	      <!-- <div class="row">
	       <h6 style="
			    margin-top: 20px;
			    margin-bottom: 0px;
			    margin-left: 0px;
			">Dashboard</h6>
	      </div> -->
	  <div class="row" style="box-shadow: 0px 1px 10px 0px #888888;
	     						 margin-left: 0px;
	     						 padding-left: 10px;
	     						 padding-right: 10px;
	     						 padding-top: 10px;">

	    <div class="row">
	        <div class="col s2" style="padding-left: 0px;">
	        	<!-- Modal Trigger -->
	  	<a class="waves-effect waves-light btn modal-trigger" href="#modal1" style="background-color: #2d3e50;padding-left: 20px;"><i class="fa fa-plus" aria-hidden="true" style="padding-right: 10px;"></i>Ticket</a>
	  				<hr>
					  <!-- Modal Structure -->
					  <?php echo form_open('Ticket_control/addTicket') ?>
					  <div id="modal1" class="modal" style="width: 30%;">
					    <div class="modal-content" style="background-color: #2d3e50; padding: 15px;" >
					      <h5 style="margin: 0px; color: white;">Ticket</h5>
					      <div class="col s12"><p style="padding-top: 20px;">Start Creating Ticket</p></div>
					      <div class="input-field col s12">
					          <input id="icon_prefix" type="text" class="validate" name="Subj" required>
					          <label>Subject</label>
					      </div>
					      <div class="input-field col s12">
						    <select name="Iss" required>
						      <option value="" disabled selected required>Choose Issue Type</option>
						      <option value="Data">Data Issue</option>
						      <option value="Technical">Technical Issue</option>
						    </select>
						    <label>Issue Type</label>
						  </div>
						  <div class="input-field col s12">
					         <textarea id="textarea1" class="materialize-textarea" name="Desc"></textarea>
					         <label for="textarea1">Description</label>
					      </div>
					    </div>

					    <div class="modal-footer">
					      <button class="btn waves-effect waves-light" type="submit" name="action">Add
						    <i class="material-icons right">send</i>
						  </button>
					    </div>
					    <input type="text" style="display: none;" name="Stat" value="New">
					    <input type="text" style="display: none;" name="Prio" value="Low">
					    <input type="text" style="display: none;" name="Ass" value="">
					  </div>
					  <?php echo form_close() ?>
					  <!-- END MODAL -->
	          <div class="tabs-vertical" id="sideBar">
			        <ul class="tabs">
			           <li class="tab">
			              <a class="waves-effect" href="#appsDir">New</a>
			           </li>
			           <li class="tab">
			             <a class="waves-effect" href="#emailDir">in-progress</a>
			           </li>
			           <li class="tab">
			             <a class="waves-effect" href="#codeDir">on-hold</a>
			           </li>
			           <li class="tab">
			             <a class="waves-effect" href="#codeDir">Resolved</a>
			           </li>
			           <li class="tab">
			             <a class="waves-effect" href="#codeDir">Suspended</a>
			           </li>
			        </ul>    
	     	  </div>
	     	  <div class="input-field col s12 sideBar2" style="display: none;">
			    <select>
			      <option value="" disabled selected>No Changes</option>
			      <option value="1">Option 1</option>
			      <option value="2">Option 2</option>
			      <option value="3">Option 3</option>
			    </select>
			    <label>Assigne To</label>
			  </div>
			  <div class="input-field col s12 sideBar2" style="display: none;">
			    <select>
			      <option value="" disabled selected>No Changes</option>
			      <option value="1" style="border-left: 3px solid black">in-progress</option>
			      <option value="2">on-hold</option>
			      <option value="3">Resolved</option>
			      <option value="3">Closed</option>
			    </select>
			    <label>Status</label>
			  </div>

			  <div class="input-field col s12 sideBar2" style="display: none;">
			    <select>
			      <option value="" disabled selected>No Changes</option>
			      <option value="1">Low</option>
			      <option value="2">High</option>
			    </select>
			    <label>Priority</label>
			  </div>
			  <button style="display: none;" id="sideBar2Btn" class="btn waves-effect waves-light" type="submit" name="action">Update
			    <i class="material-icons right">send</i>
			  </button>
	      	</div>

	       	<div class="col s10" style="padding-right: 0px; border-left: 1px solid #e1e1e1">
	          <table class="highlight" id="allTable">
		        <thead>
		          <tr>
		          	  <th data-field="id" style="width: 50px; padding-left: 20px; padding-top: 5px;">
		          	    <input type="checkbox" class="filled-in" id="filled-in-box" />
	      				<label for="filled-in-box" style="margin-top: 15px;"></label>
	      			  </th>
		              <th style="padding-top: 5px; padding-bottom: 10px; width: 300px;">Subject</th>
		              <th style="padding-top: 5px; padding-bottom: 10px; text-align: center;">Status</th>
		              <th style="padding-top: 5px; padding-bottom: 10px; text-align: center;">Assignee</th>
		              <th style="padding-top: 5px; padding-bottom: 10px; text-align: center;">Priority</th>            
		              <th style="padding-top: 5px; padding-bottom: 10px; text-align: center; color: #2bbbad">Date Filed</th>
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
		      <input type="hidden" id="ticket_id">

		      <div class="col s12 123" id="headT" style="display: none;"></div>
		      <hr class="123" style="display: none;">
		      <div class="col s12 123" style="display: none;">This div is 12-columns wide</div>
	        </div>
	    </div>	
	  </div> 
	</div> 
	<script src="assets/materialize/js/userTickets.js"></script>
