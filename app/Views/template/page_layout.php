<?php include('header.php'); ?>

<div class="container">
    <?php include('sidebar.php'); ?>
    <div class="content" id="content">
        <?= $this->renderSection('content') ?>
    </div>
</div>

<?php include('footer.php'); ?>