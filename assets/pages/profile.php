<?php
    require "assets/classes/dbhClasses.php";
    include "assets/classes/profileInfoClasses.php";
    include "assets/classes/profileInfoViewClasses.php";
    $profileInfo = new ProfileInfoView();

    $dateOfBirth = $_SESSION["userAge"];
    $birthDate = new DateTime($dateOfBirth);
    $currentDate = new DateTime();
    $age = $currentDate->diff($birthDate);
    $years = $age->y;
?>

<section>
    <div class="container">
        <div class="user__info">
            <div class="user__profile about">
                <div class="user__avatar d-flex justify-content-between align-items-baseline" style="background: url('<?=$profileInfo->fetchImage($_SESSION["userId"]) . "?" . mt_rand();?>') no-repeat center center / contain;">
                    <h3><?=$_SESSION["userName"];?></h3>
                    <div class="d-inline-block">
                        <i id="image-icon" class="fa-duotone fa-image pe-3"></i>
                        <form class="d-none" action="assets/inc/upload.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="imageFile" id="image-input"></input>
                            <button type="submit" name="imageSubmit" id="image-upload">UPLOAD</button>
                        </form>
                    </div>
                </div>
                <div class="user__details p-3">
                    <p><?=$profileInfo->fetchAbout($_SESSION["userId"]);?></p>
                    <ul>
                        <!-- <li>Subscription type: </li> -->
                        <li>Name:&nbsp;&nbsp;&nbsp;&nbsp;<?=$_SESSION["userFirstName"];?> <?=$_SESSION["userLastName"];?></li>
                        <li>Age:&nbsp;&nbsp;&nbsp;&nbsp;<?=$years?></span></li>
                        <li>Gender:&nbsp;&nbsp;&nbsp;&nbsp;<?=$_SESSION["userSex"];?></li>
                        <li>Citizenship:&nbsp;&nbsp;&nbsp;&nbsp;<?=$_SESSION["userCitizenship"];?></li>
                        <li>Registered since:&nbsp;&nbsp;&nbsp;&nbsp;<?=$_SESSION["userLoyalty"];?></li>
                    </ul>
                    <a href="?id=settings">
                        <button class="btn-static p-2">Profile settings</button>
                    </a>
                </div>
            </div>
            <div class="user__profile intro p-3">
                <h3><?=$profileInfo->fetchTitle($_SESSION["userId"]);?></h3>
                <p><?=$profileInfo->fetchText($_SESSION["userId"]);?></p>
            </div>
            <div class="user__profile activities p-3">
                <nav>
                    <div class="activity__tabs">
                        <button type="button" class="tab saves">Saves</button>
                        <button type="button" class="tab appeals">Appeals</button>
                        <button type="button" class="tab reviews">Reviews</button>
                    </div>
                </nav>
                <div class="activity mt-5">
                    Coming soon.
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // image-icon form trigger
    const imageIcon = document.getElementById('image-icon');
    const imageInput = document.getElementById('image-input');
    const imageUpload = document.getElementById('image-upload');
    
    imageIcon.addEventListener('click', function() {
      imageInput.click();
    });
    imageInput.addEventListener('change', function() {
      imageUpload.click();
    });
</script>