
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
  <a class="navbar-brand" href="#">Devx Staffing</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
    <ul class="navbar-nav mr-auto">
        <?php if($this->Session->read('Auth.User.id')){ 
        ?>
         <li class="nav-item active">
            <?php echo $this->Html->link("Users List", 
    array('controller' => 'users', 'action' => 'index'),array("class"=>'nav-link'));?>
           
          <li class="nav-item">
          <?php echo $this->Html->link("Logout", 
    array('controller' => 'users', 'action' => 'logout'),array("class"=>'nav-link'));?>
          </li>
        <?php
        } else {
            ?>
            <li class="nav-item active">
            <?php echo $this->Html->link("Login", array('controller' => 'users', 'action' => 'login'),array("class"=>'nav-link'));?>
           
          <li class="nav-item">
          <?php echo $this->Html->link("Sign Up", 
    array('controller' => 'users', 'action' => 'signup'),array("class"=>'nav-link'));?>
          </li>
        <?php }
        ?>
     
  </div>
</nav>
