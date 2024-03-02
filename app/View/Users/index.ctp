<div class="container">
    <div class="row">
        <div class="col-lg-12" style="text-align:center">
            <?php
            echo $this->Session->flash('flash');
            ?>
        </div>
    </div>
    <div class="row" style="margin-top:15px">
        <div class="col-lg-12">
            <h1>Users List</h1>
            <table class="table">
                <tr class="thead-light">
                    <th>First Name </th>
                    <th>Last Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Address</th>
                    <th>State</th>
                    <?php
                    if ($isadmin == 1) { ?>
                        <th>Action</th>
                    <?php } ?>
                </tr>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['User']['firstname']; ?></td>
                        <td><?php echo $user['User']['lastname']; ?></td>
                        <td><?php echo $user['User']['contactnumber']; ?></td>
                        <td><?php echo $user['User']['email']; ?></td>
                        <td><?php echo $user['User']['is_admin'] == 1 ? "Admin" : "User"; ?></td>
                        <td><?php echo nl2br($user['User']['address']); ?></td>
                        <td><?php echo isset($statesArray[$user['User']['state']]) ? $statesArray[$user['User']['state']] : $user['User']['state']; ?></td>
                        <?php
                        if ($isadmin == 1) { ?><td><?php

                                                    echo $this->Html->link(
                                                        "Edit",
                                                        array('controller' => 'users', 'action' => 'edit', $user['User']['id'])
                                                    );
                                                    //echo " | ". $this->Html->link("Delete",
                                                    //array('controller' => 'users', 'action' => 'delete', $user['User']['id']));
                                                    if ($loginId == $user["User"]["id"]) {
                                                        echo "";
                                                    } else {
                                                        echo " | " . $this->Form->postLink(
                                                            'Delete',
                                                            array(
                                                                'controller' => 'users',
                                                                'action' => 'delete',
                                                                $user['User']['id'],

                                                            ),
                                                            array(
                                                                'confirm' => 'Are you sure you want to delete this user?',
                                                                'class' => 'delete-link '
                                                            )
                                                        );
                                                    }


                                                    ?></td><?php  } ?>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?php echo $this->Paginator->prev(__('« Previous')); ?>
                    <?php echo $this->Paginator->numbers(); ?>
                    <?php echo $this->Paginator->next(__('Next »')); ?>
                </ul>
            </div>
        </div>
    </div>
</div>