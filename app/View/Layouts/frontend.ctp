<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->element('head') ?>
</head>

<body>
    <div class="container">

        <?= $this->element('header') ?>
        <!-- Page Content -->
        <div id="content" class="container">
            <?= $this->Flash->render() ?>
            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <div id="footer" style="padding-top:10px;">
        <?= $this->element('footer') ?>
    </div>
    </div>
</body>

</html>