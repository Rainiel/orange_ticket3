 <div class="row">
     <div class="row" style="padding-top: 7em;">
        <div class="col s12 m4 offset-m4  animated fadeIn">
            <div class="card horizontal">
                <div class="card-content">
                            <!-- <form class="col s6 offset-s4" style="margin-top: 250px;"> -->
                    <?php echo form_open("Login/login_validation") ?>
                        <div class="row" style="width: 380px">
                          <div class="input-field col s12" style="width:380px">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="username" type="text" class="validate" name="username">
                            <label for="username">Username</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12" style="width:380px">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="password" type="password" class="validate" name="password">
                            <label for="password">Password</label>
                          </div>
                        </div>
                      <button class="btn waves-effect waves-light" type="submit" name="action" style="background-color:#2d3e50; margin-left: 130px">SIGN IN
                        <i class="material-icons right">send</i>
                      </button>
                      <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- </form> -->
  </div>
