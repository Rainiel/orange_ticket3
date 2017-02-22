 <div class="row">
    <!-- <form class="col s6 offset-s4" style="margin-top: 250px;"> -->
    <?php echo form_open("Login/login_validation") ?>
      <div class="row">
        <div class="input-field col s6">
          <input id="username" type="text" class="validate" name="username">
          <label for="username">Username</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="password" type="password" class="validate" name="password">
          <label for="password">Password</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="action">Add
        <i class="material-icons right">send</i>
      </button>
      <?php echo form_close(); ?>
    <!-- </form> -->
  </div>