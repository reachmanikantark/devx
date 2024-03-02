<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 ">
                <div class="col-lg-12">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    Login
                </div>
                <div class="col-lg-12">
                    <div  class="alert alert-danger" id="loginMessage" style="display:none";>

                    </div>
                </div>


                <div class="col-lg-12 login-form">
                <?php echo $this->Flash->render('auth'); ?>
                    <div class="col-lg-12 login-form">
                    <?php echo $this->Form->create('User'); ?>
                            <div class="form-group">
                                <?php echo $this->Form->input('email',array(
    'label' => array('class' => 'form-control-label'),'class' => 'form-control'));?>
                            </div>
                            <div class="form-group">
                                
                               <?php echo $this->Form->input('password',array(
    'label' => array('class' => 'form-control-label'),'class' => 'form-control'));?>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    
                                    <?php echo $this->Form->end(array('label'=>_('Login'),'class'=>'btn btn-outline-primary')); ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>





