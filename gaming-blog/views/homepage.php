<?php
require_once 'include/classes/DB.php';
?>
<div class="header">
    <h1>Welcome, friend!</h1>
</div>
<div class="main-container">
    <?php

    DB::getInstance()->showTables();

    ?>
</div>