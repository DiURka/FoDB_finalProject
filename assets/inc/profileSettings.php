<?php
    require "assets/classes/dbhClasses.php";
    include "assets/classes/profileInfoClasses.php";
    include "assets/classes/profileInfoViewClasses.php";
    $profileInfo = new ProfileInfoView();
?>
<section class="d-flex align-items-center">
    <div class="container">
        <h2 class="profile-title">PROFILE SETTINGS</h2>

        <form action="assets/inc/profileInfo.php" method="POST" class="profile-form">
            <h3 class="section-title">Change your bio here:</h3>
            <textarea name="about" class="text-input" rows="10" cols="30" placeholder="Bio..." maxlength ="100"><?=$profileInfo->fetchAbout($_SESSION["userId"]);?></textarea>

            <h3 class="section-title">Change your profile page intro here:</h3>
            <input name="introTitle" class="text-input" type="text" placeholder="Profile title..." value="<?=$profileInfo->fetchTitle($_SESSION["userId"]);?>">
            <textarea name="introText" class="text-input" rows="10" cols="30" placeholder="Profile introduction..." maxlength ="600"><?=$profileInfo->fetchText($_SESSION["userId"]);?></textarea>
            <button type="submit" name="submit" class="submit-button">SAVE</button>
        </form>
    </div>
</section>