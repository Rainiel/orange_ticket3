
<div class="col s10 ticket-container">
      <!-- <div class="row">
       <h6 style="
		    margin-top: 20px;
		    margin-bottom: 0px;
		    margin-left: 0px;
		">Dashboard</h6>
      </div> -->
      <input type="hidden" value="<?php echo base_url(); ?>" id="base">
    <div class="row mess-row" style="padding: 0">
        <div class="row" style="padding: 0; margin-bottom: 0">
            <div class="col s8 push-s4" style="background-color: #EBEBEB; height: 500px" >
                <div class="row" style="padding: 0; margin-bottom: 0">
                    <div class="col s12 m4 l2" style="padding: 20px; color: #C6C6C6; font-weight: normal"></div>
                    <div class="col s12 m4 l8" style="padding: 15px; font-size: 20px; color: black; font-weight: normal" id="personpm"></div>
                    <div class="col s12 m2 l2"  style="padding: 20px; color: #C6C6C6; font-weight: normal"><i class="fa fa-bars pull-right" aria-hidden="true"></i></div>
                </div>
                <input type="hidden" id="UID" value="<?php echo $uid; ?>">
                <div class="divider" style="margin-bottom: 10px"></div>
                <div id="chatreply" style="display: flex; flex-direction: column; overflow-y: scroll; height: 360px;">
                <!-- <div class="flex-container">
                    <div class="flex-item">
                        <div class="col s2" style="width: 70px;"><p><img src="./assets/images/profile-circle.png" style="width: 50px; height: 50px"></p></div>
                        <div class="col s6" style="color: white; font-size: 16px">
                            <div class="talk-bubble tri-right left-in" style="background-color: white;  border-radius: 15px">
                              <div class="talktext" style="color: black; padding: 5px; font-size: 12px; margin-top: 10px; text-align: left">
                                <p>This talk-bubble uses .left-in class to show a triangle on the left slightly indented. Still a blocky square.</p>
                              </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                </div>
                <!-- <div class="flex-container pull-right">
                    <div class="flex-item pull-right" style="display: flex; justify-content: flex-end; float: right">
                        <div class="col s6 pull-right">
                            <div class="talk-bubble tri-right left-in" style="background-color: white;  border-radius: 15px; text-align: right;">
                              <div class="talktext" style="color: black; padding: 5px; font-size: 12px; margin-top: 10px">
                                <p>This talk-bubble uses .left-in class to show a triangle on the left slightly indented. Still a blocky square.</p>
                              </div>
                            </div>
                        </div>
                        <div class="col s2 pull-right" style="padding: 0px; margin-left: 0px; width: 70px"><p><img src="./assets/images/profile-circle.png" style="width: 50px; height: 50px"></p></div>
                    </div>
                </div> -->

                <div style="height: 200px;">
                <form class="col s12" id="formMessage">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">mode_edit</i>
                    <input id="MessageInBox" type="text" class="validate">
                    <label for="icon_prefix">Message</label>
                  </div>
                  <input type="hidden" id="MessageCID">
                  <input type="hidden">
                </form>
                </div>

            </div>
          
              
           
          <div class="col s4 pull-s8" style="background-color: #6B7580; height: 500px; overflow-y: auto;">
              <div class="row">
                <div class="col s12 m4 l2" style="padding: 20px; color: white; font-weight: normal"></div>
                <div class="col s12 m4 l8" style="padding: 15px; font-size: 20px; color: white; font-weight: normal"><center>Messages</div>
                <div class="col s12 m4 l2"  style="padding: 20px; color: white; font-weight: normal"><a href="#modal1"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 20px"></i></a></div>
              </div>
                 <div class="divider"></div>
                 <div class="section" style="padding: 5px;" id="personChat">
                     <!-- <div class="row" style="margin-bottom: 2px">
                        <div class="col s6" style="width: 70px"><p><img src="./assets/images/profile-circle.png" style="width: 50px; height: 50px"></p></div>
                        <div class="col s6" style="color: white; font-size: 16px"><p>Roland Salunga</p></div>
                        <div class="col s6 m9" style="color: #CECECE; margin-top: -25px; font-size: 12px"><p>Hello, I sent my attachments regarding..</p></div>
                      </div>
                 </div>
                 <div class="divider"></div> -->
                 <!-- <div class="section" style="padding: 5px">
                     <div class="row" style="margin-bottom: 2px">
                        <div class="col s6" style="width: 70px"><p><img src="./assets/images/profile-circle.png" style="width: 50px; height: 50px"></p></div>
                        <div class="col s6" style="color: white; font-size: 16px"><p>Roland Salunga</p></div>
                        <div class="col s6 m9" style="color: #CECECE; margin-top: -25px; font-size: 12px"><p>Hello, I sent my attachments regarding..</p></div>
                      </div>
                 </div>
                 <div class="divider"></div>
                 <div class="section"  style="padding: 5px">
                     <div class="row" style="margin-bottom: 2px">
                        <div class="col s6" style="width: 70px"><p><img src="./assets/images/profile-circle.png" style="width: 50px; height: 50px"></p></div>
                        <div class="col s6" style="color: white; font-size: 16px"><p>Roland Salunga</p></div>
                        <div class="col s6 m9" style="color: #CECECE; margin-top: -25px; font-size: 12px"><p>Hello, I sent my attachments regarding..</p></div>
                      </div>
                 </div>
                 <div class="divider"></div>
                 <div class="section"  style="padding: 5px">
                     <div class="row" style="margin-bottom: 2px">
                        <div class="col s6" style="width: 70px"><p><img src="./assets/images/profile-circle.png" style="width: 50px; height: 50px"></p></div>
                        <div class="col s6" style="color: white; font-size: 16px"><p>Roland Salunga</p></div>
                        <div class="col s6 m9" style="color: #CECECE; margin-top: -25px; font-size: 12px"><p>Hello, I sent my attachments regarding..</p></div>
                      </div>
                 </div> -->
          </div>
        </div>
        <div id="modal1" class="modal" style="width: 40%;">
            <div class="modal-content" style="background-color: #2d3e50; padding: 15px;" >
              <h5 style="margin: 0px; color: white;">Messages</h5></div>
              <div class="col s12"><p style="padding-top: 20px;">Create Message</p></div>

              <div class="input-field col s6">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="person" type="text" class="validate" required>
                  <label id="labelperson">Person</label>
                  <input type="hidden" id="rId">
              </div>

              <div class="input-field col s6">
                  <a class="btn" id="selectPersonId" href="#modal2">Select</a>
              </div>

              <div class="input-field col s12">
                      <i class="material-icons prefix">mode_edit</i>
                      <input id="Message" type="text" class="validate">
                      <label for="icon_prefix">Message</label>
              </div>

            <div class="modal-footer">
              <button id="addChat" class="waves-effect waves-green btn-flat" style="margin-right: 10px; margin-bottom: 13px; background-color: #2d3e50; color: white;" type="submit">
              <i class="material-icons right">done_all</i>Send
            </button>
            <button id="sendClose" class="modal-action modal-close waves-effect waves-green btn-flat">Close</button>
            </div>

          </div>
          <div id="modal2" class="modal" style="width: 40%;">
            <div class="modal-content" style="background-color: #2d3e50; padding: 15px;" >
              <h5 style="margin: 0px; color: white;">Person</h5></div>
              <div class="col s12"><p style="padding-top: 20px;">Select Person</p></div>

            <div class="input-field col s12">
            <table class="tbl-dash">
                <thead class="thead-dash">
                <tr>
                <th data-field="id" style="width: 50px; padding-left: 20px; padding-top: 5px;">
                 <!--  <input type="checkbox" class="filled-in" id="filled-in-box" /> -->
                <label for="filled-in-box" style="margin-top: 15px;"></label>
                </th>
                <th class="th-dash" data-field="id"><center>Name</th>
                </tr>
                </thead>

                <tbody id="selectPerson">
                </tbody>
            </table>
            </div>

            <div class="modal-footer">

              <button id="selectPersonbtn" class="waves-effect waves-green btn-flat" style="margin-right: 10px; margin-bottom: 13px; background-color: #2d3e50; color: white;" >
              <i class="material-icons right">done_all</i>Select
            </button>
            <button id="selectClose" class="modal-action modal-close waves-effect waves-green btn-flat">Close</button>
            </div>

          </div>
    </div>

<script src="assets/js/Messages.js"></script>
