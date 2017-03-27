
<div class="col s10 ticket-container">
      <!-- <div class="row">
       <h6 style="
		    margin-top: 20px;
		    margin-bottom: 0px;
		    margin-left: 0px;
		">Dashboard</h6>
      </div> -->
    <div class="row ticket-row">
    	<div class="row">
        <!-- <div class="col s12 m3">
            <div class="card horizontal">
                <div class="card-image">
                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <p class="hello pull-right" style="display: block">4</p>
                    </div>
                    <div class="card-action">
                      <p>Tickets</p>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="col s12 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text cardone">
             <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                 <div class="dash-num">
                     <p class="ticketNum pull-right" id="AllTicket"></p>
                    <p class="ticketName pull-right">Tickets</p>
                </div>
            </div>
          </div>
        </div> -->
        <div class="col s12 m3">
            <div class="card horizontal cardone">
              <div class="card-image">
                <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p class="ticketnumber" id="AllTicket" style="margin-top: -35px; margin-left: 20px"></p>
                </div>
                <div class="card-action" style="margin-top: -50px; margin-left: 25px; border-top: none">
                  Tickets
                </div>
              </div>
            </div>
        </div>

        <div class="col s12 m3">
            <div class="card horizontal cardtwo">
              <div class="card-image">
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p class="ticketnumber" id="HighTicket" style="margin-top: -35px; margin-left: 20px"></p>
                </div>
                <div class="card-action" style="margin-top: -50px; margin-left: 25px; border-top: none">
                  Urgent
                </div>
              </div>
            </div>
        </div>

        <div class="col s12 m3">
            <div class="card horizontal cardthree" style="padding: 20px">
              <div class="card-image">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
              </div>
              <div class="card-stacked">
                    <div class="card-content">
                      <p class="ticketnumber" id="ClosedTicket" style="margin-top: -35px; margin-left: 20px"></p>
                    </div>
                    <div class="card-action" style="margin-top: -50px; margin-left: 15px; border-top: none">
                      Completed
                    </div>
              </div>
            </div>
        </div>

        <div class="col s12 m3">
            <div class="card horizontal cardfour" style="padding: 20px">
              <div class="card-image">
                <i class="fa fa-users" aria-hidden="true"></i>
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p class="ticketnumber" id="Online" style="margin-top: -35px; margin-left: 20px; border-top: none"></p>
                </div>
                <div class="card-action" style="margin-top: -50px; margin-left: 15px; border-top: none">
                  Online
                </div>
              </div>
            </div>
        </div>
    </div>



        <!-- <div class="col s12 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text cardtwo">
              <i class="fa fa-envelope-o" aria-hidden="true"></i>
              <div class="dash-num">
             <p class="urgentNum pull-right" id="HighTicket"></p>
             <p class="urgentName pull-right">Urgent</p>
             </div>
            </div>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text cardthree">
              <i class="fa fa-list-alt" aria-hidden="true"></i>
              <div class="dash-num">
              <p class="comNum pull-right" id="ClosedTicket"></p>
              <p class="comName pull-right">Completed</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text cardfour">
              <i class="fa fa-users" aria-hidden="true"></i>
              <div class="dash-num">
              <p class="onlineNum pull-right" style="font-size: 45px; margin-right: 20px; margin-top: -12px">2</p>
              <p class="onlineName pull-right" style="font-size: 14px; margin-right: 10px; margin-top: -5px">Online</p>
              </div>
          </div>
        </div>
    </div> -->



   <div class="row">

        <div class="col s5">
          <div class="row performance-row">
              <p class="txtperf">Performance</p>
                <div class="filter-month pull-right">
                    <div class="col s3 per-month">Days</div>
                    <div class="col s3 per-month">Week</div>
                    <div class="col s3 per-month">Month</div>
                </div>
            </div>
            <!-- <div class="col s4" style="padding-left: 0px; box-shadow: 0px 0px 0px solid black">
            
              </div> -->

            <div class="col s12" id="chart-container" style="margin: 0px;padding-right: 0px; margin-top: 20px">
            <!-- <div ></div> -->
            </div>
        </div>

        <div class="col s7">
            <table class="tbl-dash">
                <thead class="thead-dash">
                <tr>
                <th class="th-dash" data-field="id"><center>Name</th>
                <th class="th-dash" data-field="name"><center>Status</th>
                <th class="th-dash" data-field="price"><center>Assignee</th>
                <th class="th-dash" data-field="price"><center>Priority</th>
                </tr>
                </thead>

                <tbody id='dashboardTickets'>

                </tbody>
            </table>
        </div>

    </div>
  </div>
</div>

<script src="assets/js/dashboard.js"></script>
