<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
                <i class="fa fa-key" aria-hidden="true"></i>
            </div>

            <div class="row">
                <div class="col-lg-8 login-title" style="text-align:left">
                    <legend><?php echo __('Edit User'); ?></legend>

                </div>
                <div class="col-lg-3" style="text-align:right;margin-top:15px;">
                    <?php echo $this->Html->link(__('Back'), $this->request->referer()) ?>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="alert alert-danger" id="loginMessage" style="display:none" ;>

                </div>
            </div>

            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <?php echo $this->Form->create('User');
                    echo $this->Form->input('id', array('type' => 'hidden'));
                    ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('firstname', array(
                            'label' => array('class' => 'form-control-label'), 'class' => 'form-control'
                        )); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('lastname', array(
                            'label' => array('class' => 'form-control-label'), 'class' => 'form-control'
                        )); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('email', array(
                            'label' => array('class' => 'form-control-label'), 'class' => 'form-control'
                        )); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('contactnumber', array(
                            'label' => array('class' => 'form-control-label'), 'class' => 'form-control'
                        )); ?>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">Address</label>
                        <?php
                        echo $this->Form->textarea(
                            'address',
                            array('rows' => '5', 'cols' => '5', 'label' => array('class' => 'form-control-label'), 'class' => 'form-control')
                        );
                        ?>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">State</label>
                        <?php
                        $options = array('AP' => 'Andhra Pradesh', 'TS' => 'Telangana');
                        echo $this->Form->select('state', $statesArray, array('class' => 'form-control'));
                        ?>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">Is Admin?</label>
                        <?php
                        echo $this->Form->checkbox('is_admin');
                        ?>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Error Message -->
                            <?php echo $this->Form->end(array('label' => _('Submit'), 'class' => 'btn btn-outline-primary')); ?>
                        </div>
                        <div class="col-lg-6" style="text-align:right;">
                            <?php echo $this->Html->link(__('Back'), $this->request->referer(),array('class' => 'btn btn-outline-primary')); ?>

                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>