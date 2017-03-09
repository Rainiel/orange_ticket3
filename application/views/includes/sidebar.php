
<div class="col s2">
<div class="row">

  <div class="ui fluid vertical menu collapse"></div>
    <ul id="slide-out" class="side-nav fixed" style="margin-top: 95px;">
      <li <?php if ($this->session->userdata('Acc_type') != 'Admin'){?> style="display: none;" <?php } ?> ><a href="Dashboard" class="active" style="color: white;" >
      <i class="fa fa-home" aria-hidden="true"  style="color: white; font-size: 22px"></i>Home</a>
      </li>
      <li><a href="Tickets" style="color: white;"><i class="fa fa-ticket" aria-hidden="true" style="color: white; font-size: 22px"></i>Tickets</a></li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li <?php if ($this->session->userdata('Acc_type') == 'user'){?> style="display: none;" <?php } ?> >
            <a class="collapsible-header" style="color: white; padding-right: 32px; padding-left: 32px;">
                <i class="fa fa-cog" aria-hidden="true" style="color: white;"></i>Settings</a>
            <div class="collapsible-body" style="padding: 0px;">
              <ul>
                <li style="background-color: #2d3e50;"><a style="color: white;" href="ManageTickets">Manage Tickets</a></li>
                <li style="background-color: #2d3e50;"><a style="color: white;" href="SubAdminSA">Sub-Admin</a></li>
                <li style="background-color: #2d3e50;"><a style="color: white;" href="Users">Users</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
      <li><a href="<?php echo base_url('Login/logout')?>" style="color: white;"><i class="fa fa-sign-out" aria-hidden="true" style="color: white; font-size: 22px"></i>Logout</a></li>
    </ul>
</div>
</div>
    <!-- <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a> -->
