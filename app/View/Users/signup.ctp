<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
                <i class="fa fa-key" aria-hidden="true"></i>
            </div>
            <div class="col-lg-12 login-title">
                <legend><?php echo __('Add User'); ?></legend>
            </div>
            <div class="col-lg-12">
                <div class="alert alert-danger" id="loginMessage" style="display:none" ;>

                </div>
            </div>

            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <?php echo $this->Form->create('User');
                    echo $this->Form->input('id', array('type' => 'hidden')); ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('firstname', array(
                            'label' => array('class' => 'form-control-label'), 'class' => 'form-control required'
                        )); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('lastname', array(
                            'label' => array('class' => 'form-control-label'), 'class' => 'form-control required'
                        )); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('email', array(
                            'label' => array('class' => 'form-control-label'), 'class' => 'form-control required'
                        )); ?>
                    </div>
                    <div class="form-group">

                        <?php echo $this->Form->input('password', array(
                            'label' => array('class' => 'form-control-label'), 'class' => 'form-control required'
                        )); ?>
                    </div>
                    <div class="form-group">
                        <?php ///echo $this->Form->input('retypepassword',array(
                        //'label' => array('class' => 'form-control-label'),'class' => 'form-control required'));*/
                        ?>
                        <label for="" class="form-control-label">Retype Password</label>
                        <input type="password" class="form-control" id="retypepassword" name="retypepassword">
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('contactnumber', array(
                            'label' => array('class' => 'form-control-label'), 'class' => 'form-control required'
                        )); ?>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">Address</label>
                        <?php
                        echo $this->Form->textarea(
                            'address',
                            array('rows' => '5', 'cols' => '5', 'class' => 'form-control required')
                        );
                        ?>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">State</label>
                        <?php
                      //  $options = array('AP' => 'Andhra Pradesh', 'TS' => 'Telangana');
                        echo $this->Form->select('state', $statesArray, array('class' => 'form-control required'));
                        ?>
                    </div>





                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <!-- Error Message -->
                        </div>
                        <div class="col-lg-6">

                            <?php echo $this->Form->end(array('label' => _('Submit'), 'class' => 'btn btn-outline-primary')); ?>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>