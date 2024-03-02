<?php
if ($message) {
    $class = 'alert-' . $class;
    ?>
    <div class="alert <?php echo $class; ?>">
        <?php echo $message; ?>
    </div>
    <?php
}
?>