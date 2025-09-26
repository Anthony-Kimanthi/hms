<header class="header">
    <span class="menu-toggle" id="menu-toggle"><i class="fa-solid fa-bars"></i></span>
    <img src="hmis/assets/img/UH.png" alt="InfiHealth Logo" class="logo">
    <h1>InfiHealth HMIS</h1>
</header>
----------------------
<?php
// Optional: you can pass $pageTitle from each module, fallback to "InfiHealth HMIS"
if (!isset($pageTitle)) {
    $pageTitle = "InfiHealth HMIS";
}
?>

<div class="header">
    <!-- Menu toggle for mobile -->
    <div class="menu-toggle" id="menu-toggle">
        <i class="fa fa-bars"></i>
    </div>

    <!-- Logo (if you have one in assets/img/) -->
    <img src="assets/img/logo.png" alt="InfiHealth Logo" class="logo">

    <!-- Page Title -->
    <h1><?= htmlspecialchars($pageTitle) ?></h1>
</div>
