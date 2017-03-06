
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
     						 padding-left: 15px;
     						 padding-right: 15px;
     						 padding-top: 20px;">
	<div class="row">
        <div class="col s12 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text" style="background: #61d7f1;">
             <i class="fa fa-paper-plane-o" aria-hidden="true" style="font-size: 65px"></i>
                 <p class="ticketNum pull-right" style="font-size: 40px; margin-top: -10px; margin-right: 20px">9</p>
                 <p class="ticketNum pull-right" style="font-size: 12px; margin-top: 40px; margin-right: -35px">Tickets</p>
            </div>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text" style="background: #ec7172;">
              <i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 65px"></i>
              <p class="urgentNum pull-right" style="font-size: 40px; margin-top: -10px; margin-right: 20px">10</p>
              <p class="urgentNum pull-right" style="font-size: 12px; margin-top: 40px; margin-right: -45px">Urgent</p>
            </div>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text" style="background: #6bd049;">
              <i class="fa fa-list-alt" aria-hidden="true" style="font-size: 65px"></i>
              <p class="comNum pull-right" style="font-size: 40px; margin-top: -10px; margin-right: 30px">4</p>
              <p class="comNum pull-right" style="font-size: 12px; margin-top: 40px; margin-right: -60px">Completed</p>
            </div>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text" style="background: #f0e94b;">
              <i class="fa fa-users" aria-hidden="true" style="font-size: 65px"></i>
              <p class="onlineNum pull-right" style="font-size: 40px; margin-top: -10px; margin-right: 20px">2</p>
              <p class="onlineNum pull-right" style="font-size: 12px; margin-top: 40px; margin-right: -35px">Online</p>
            </div>
          </div>
        </div>
    </div>



   <div class="row">

        <div class="col s5">
          <div class="row">
            <div style="
                margin-top: 0px;
                margin-bottom: 0px;
                margin-left: 0px;
                padding-top: 12px;
                padding-bottom: 12px;
                background: #2d3e50;
                color: white;
                font-size: 18px;
                font-weight: bold;
            ">
              <p style="margin-left: 15px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px;">Performance</p>
            </div>

            <div class="col s4" style="padding-left: 0px;">
              <ul class="pieID legend">
                  <li id="New">
                    <em>New</em>
                    <span id="new"></span>
                  </li>
                  <li id="Prog">
                    <em>On Progress</em>
                    <span id="prog">2</span>
                  </li>
                  <li id="Hold">
                    <em>On Hold</em>
                    <span id="onhold">1</span>
                  </li>
                  <li id="Resolved">
                    <em>Resolved</em>
                    <span id="resolved">1</span>
                  </li>
                  <li id="Closed">
                    <em>Closed</em>
                    <span id="closed">1</span>
                  </li>
                </ul>
              </div>

            <div class="col s8" style="margin: 0px;padding-right: 0px; margin-top: 20px">
            
            </div>

          </div>
        </div>

            <div class="col s7">
          <table style="box-shadow: 0px 1px 10px 0px #888888;">
          <thead style="background: #2d3e50;">
            <tr>
                <th data-field="id" style="color: white; border-radius: 0px">Name</th>
                <th data-field="name" style="color: white; border-radius: 0px;">Status</th>
                <th data-field="price" style="color: white; border-radius: 0px">Assignee</th>
                <th data-field="price" style="color: white; border-radius: 0px">Priority</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>Alvin</td>
              <td><label class="openbtn" style="font-size: 12px; background-color: #61d7f1; border-radius: 3px; padding: 5px; color: white">New</label></td>
              <td>General</td>
              <td><label class="minorbtn" style="font-size: 12px; background-color: #f0e94b; border-radius: 3px; padding: 5px; color: white">Minor</label></td>

            </tr>
            <tr>
              <td>Alan</td>
              <td><label class="openbtn" style="font-size: 12px; background-color: #61d7f1; border-radius: 3px; padding: 5px; color: white">In-Progress</label></td>
              <td>General</td>
              <td><label class="majorbtn" style="font-size: 12px; background-color: #ec7172; border-radius: 3px; padding: 5px; color: white">Major</label></td>

            </tr>
            <tr>
              <td>Jonathan</td>
              <td><label class="openbtn" style="font-size: 12px; background-color: #61d7f1; border-radius: 3px; padding: 5px; color: white">On-hold</label></td>
              <td>General</td>
              <td><label class="minorbtn" style="font-size: 12px; background-color: #f0e94b; border-radius: 3px; padding: 5px; color: white">Minor</label></td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td><label class="openbtn" style="font-size: 12px; background-color: #61d7f1; border-radius: 3px; padding: 5px; color: white">Resolved</label></td>
              <td>General</td>
              <td><label class="minorbtn" style="font-size: 12px; background-color: #f0e94b; border-radius: 3px; padding: 5px; color: white">Minor</label></td>
            </tr>
            <tr>
              <td>Jonathan</td>
              <td><label class="openbtn" style="font-size: 12px; background-color: #61d7f1; border-radius: 3px; padding: 5px; color: white">Closed</label></td>
              <td>General</td>
              <td><label class="minorbtn" style="font-size: 12px; background-color: #f0e94b; border-radius: 3px; padding: 5px; color: white">Minor</label></td>
            </tr>
          </tbody>
        </table>
        </div>

    </div>
  </div>
</div>

<script src="assets/js/dashboard.js"></script>
