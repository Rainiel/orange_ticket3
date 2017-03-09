
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
                 <div class="dash-num" style="border: 1px solid #7C7C7C; border-top: none; border-bottom: none; border-right: none; height: 70px;
                 margin-left: 110px; margin-top: -65px">
                <p class="ticketNum pull-right" style="font-size: 45px; margin-right: 20px; margin-top: -12px" >9</p>
                <p class="ticketNum pull-right" style="font-size: 14px; margin-right: 10px; margin-top: -5px" >Tickets</p>
                </div>
            </div>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text" style="background: #ec7172;">
              <i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 65px"></i>
              <div class="dash-num" style="border: 1px solid #7C7C7C; border-top: none; border-bottom: none; border-right: none; height: 70px;
              margin-left: 110px; margin-top: -65px">
             <p class="urgentNum pull-right" style="font-size: 45px; margin-right: 20px; margin-top: -12px">10</p>
             <p class="urgentNum pull-right" style="font-size: 14px; margin-right: 20px; margin-top: -5px">Urgent</p>
             </div>
            </div>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text" style="background: #6bd049;">
              <i class="fa fa-list-alt" aria-hidden="true" style="font-size: 65px"></i>
              <div class="dash-num" style="border: 1px solid #7C7C7C; border-top: none; border-bottom: none; border-right: none; height: 70px;
              margin-left: 110px; margin-top: -65px">
              <p class="comNum pull-right" style="font-size: 45px; margin-right: 20px; margin-top: -12px">4</p>
              <p class="comNum pull-right" style="font-size: 14px; margin-right: 2px; margin-top: -5px">Completed</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text" style="background: #f0e94b;">
              <i class="fa fa-users" aria-hidden="true" style="font-size: 65px"></i>
              <div class="dash-num" style="border: 1px solid #7C7C7C; border-top: none; border-bottom: none; border-right: none; height: 70px;
              margin-left: 110px; margin-top: -65px">
              <p class="comNum pull-right" style="font-size: 45px; margin-right: 20px; margin-top: -12px">2</p>
              <p class="comNum pull-right" style="font-size: 14px; margin-right: 10px; margin-top: -5px">Online</p>
              </div>
          </div>
        </div>
    </div>



   <div class="row">

        <div class="col s5">
          <div class="row" style="
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
                <div class="filter-month">
                    <div class="row pull-right" style="margin-top: -25px; margin-right: 2px">
                      <div class="col s1" style="background-color: #1F2A37; width: 70px; margin-right: 5px; font-weight: normal; font-size: 18px">Days</div>
                      <div class="col s1" style="background-color: #1F2A37; width: 70px; margin-right: 5px; font-weight: normal">Week</div>
                      <div class="col s1" style="background-color: #1F2A37; width: 70px; margin-right: 5px; font-weight: normal">Month</div>
                    </div>
                </div>

        </div>

            <div class="col s4" style="padding-left: 0px;">
             <div id="chartContainer" style="height: 300px; width: 100%;"></div>
              </div>

            <div class="col s8" style="margin: 0px;padding-right: 0px; margin-top: 20px">

            </div>

          </div>
        </div>

            <div class="col s7">
          <table style="box-shadow: 0px 1px 1px 0px #888888;">
          <thead style="background: #2d3e50;">
            <tr>
                <th data-field="id" style="color: white; border-radius: 0px"><center>Name</th>
                <th data-field="name" style="color: white; border-radius: 0px;"><center>Status</th>
                <th data-field="price" style="color: white; border-radius: 0px"><center>Assignee</th>
                <th data-field="price" style="color: white; border-radius: 0px"><center>Priority</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td><center>Alvin</td>
              <td><center><label class="openbtn" style="font-size: 11px; background-color: #61d7f1; border-radius: 5px; padding: 4px; color: white">New</label></td>
              <td><center>General</td>
              <td><center><label class="minorbtn" style="font-size: 12px; background-color: #f0e94b; border-radius: 5px; padding: 4px; color: white">Minor</label></td>

            </tr>
            <tr>
              <td><center>Alan</td>
              <td><center><label class="openbtn" style="font-size: 11px; background-color: #C9FC07; border-radius: 5px; padding: 4px; color: white">In-Progress</label></td>
              <td><center>General</td>
              <td><center><label class="majorbtn" style="font-size: 12px; background-color: #ec7172; border-radius: 5px; padding: 4px; color: white">Major</label></td>

            </tr>
            <tr>
              <td><center>Jonathan</td>
              <td><center><label class="openbtn" style="font-size: 11px; background-color: #FF875A; border-radius: 5px; padding: 4px; color: white">On-hold</label></td>
              <td><center>General</td>
              <td><center><label class="minorbtn" style="font-size: 12px; background-color: #f0e94b; border-radius: 5px; padding: 4px; color: white">Minor</label></td>
            </tr>
            <tr>
              <td><center>Jonathan</td>
              <td><center><label class="openbtn" style="font-size: 11px; background-color: #FCCF27; border-radius: 5px; padding: 4px; color: white">Resolved</label></td>
              <td><center>General</td>
              <td><center><label class="minorbtn" style="font-size: 12px; background-color: #f0e94b; border-radius: 5px; padding: 4px; color: white">Minor</label></td>
            </tr>
            <tr>
              <td><center>Jonathan</td>
              <td><center><label class="openbtn" style="font-size: 11px; background-color: #5995FF; border-radius: 5px; padding: 4px; color: white">Closed</label></td>
              <td><center>General</td>
              <td><center><label class="minorbtn" style="font-size: 12px; background-color: #f0e94b; border-radius: 5px; padding: 4px; color: white">Minor</label></td>
            </tr>
          </tbody>
        </table>
        </div>

    </div>
  </div>
</div>

<script src="assets/js/dashboard.js"></script>
