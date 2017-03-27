<nav>
  <div class="nav-wrapper ticketing-header">
    <a href="#!" class="brand-logo ticketing-logo">Ticketing System</a>
    <ul class="right hide-on-med-and-down">
    <?php if($this->session->userdata('Acc_type') != 'user'){ ?>
      <li class="dash-icon">
      <a href="Messages">
      <i class="fa fa-weixin" aria-hidden="true"></i>
      </a>
    <?php } ?>
      </li>
      <li class="dash-icon">
      <a href="#!">
	      <i class="material-icons right">perm_identity</i>
	      <?php echo $this->session->userdata('Acc_type'); ?>
      </a>
      </li>
    </ul>
  </div>
</nav>
