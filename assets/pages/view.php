<style>
    /* Custom styles for the form */
    .custom-form {
        display: flex;
        flex-direction: column;
    }

    /* Custom styles for labels */
    .custom-label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    /* Custom styles for text inputs */
    .custom-input {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* Custom styles for file inputs */
    .custom-file-input {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Custom styles for the submit button */
    .custom-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .custom-button:hover {
        background-color: #45a049;
    }
</style>

<section class="container">
    <div class="university-view">
        <div class="uni__info-view">
            <div>
                <div class="rate__block-view d-flex flex-column align-items-center">
                    <img src="assets/images/<?=$id?>.jpg" alt="<?=$post['title']?>" class="unImg-view">
                    <div class="rate__it d-flex justify-content-between align-items-center mt-3">
                        <img src="assets/images/toppng.com-curved-arrow-pointing-down-211x323.png" alt="rateIt" class="rateIt" style="transform: scaleX(-1)">
                            <h3 class="text-center">RATE IT</h3>
                        <img src="assets/images/toppng.com-curved-arrow-pointing-down-211x323.png" alt="rateIt" class="rateIt">
                    </div>
                    <div name="userRating" class="list-inline rating-list">
                        <i class="rstar fa-star far" data-bs-toggle="modal" data-bs-target="#rstar"></i>
                        <i class="rstar fa-star far" data-bs-toggle="modal" data-bs-target="#rstar"></i>
                        <i class="rstar fa-star far" data-bs-toggle="modal" data-bs-target="#rstar"></i>
                        <i class="rstar fa-star far" data-bs-toggle="modal" data-bs-target="#rstar"></i>
                        <i class="rstar fa-star far" data-bs-toggle="modal" data-bs-target="#rstar"></i>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="rstar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="staticBackdropLabel">Review</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form name="rate" action="?id=<?=$id?>" method="POST" class="d-flex flex-column justify-center gap-1 mt-3" id="rateForm"> 
                                    <div class="modal-body d-flex flex-column text-center"> 
                                        <div class="d-flex flex-column align-items-center gap-2 mb-4">
                                            <div class="rateyo" id="rating"
                                            <?$userRate ? $stars = floatval($userRate['rating']) : $stars = 3;?>
                                            data-rateyo-rating="<?=$stars?>"
                                            data-rateyo-num-stars="5"
                                            data-rateyo-score="<?=$stars?>">
                                            </div>
                                            <span class='result'>SELECT RATING</span>
                                            <input type="hidden" name="rate">
                                        </div>
                                        <?$userRate ? $comment = $userRate['comment'] : $comment = '';?>
                                        <textarea name="userComment" placeholder="Comment" maxlength ="800"><?=$comment?></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <input name="add" type="submit" value="Rate" class="btn btn-primary w-25 align-self-center text-uppercase">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="apply-form">
                        <div class="appeal">
                            <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#apply">
                                Apply
                            </button>
                        </div>
                        <div class="modal fade" id="apply" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-3">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdropLabel">Application to <?=$post['title']?></h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- Inside the form in your modal content -->
                                    <form class="custom-form p-4" action="assets/inc/apply.php" method="post" enctype="multipart/form-data">
                                        <!-- General Personal Data -->
                                        <div class="mb-3">
                                            <label for="full_name" class="custom-label">Full Name</label>
                                            <input type="text" class="custom-input" id="full_name" name="full_name" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="custom-label">Email</label>
                                            <input type="email" class="custom-input" id="email" name="email" required>
                                        </div>

                                        <!-- Passport Image Upload -->
                                        <div class="mb-3">
                                            <label for="passport_image" class="custom-label">Passport Image</label>
                                            <input type="file" class="custom-file-input" id="passport_image" name="passport_image" accept="image/*" required>
                                        </div>

                                        <!-- Diploma Image Upload -->
                                        <div class="mb-3">
                                            <label for="diploma_image" class="custom-label">Diploma Image</label>
                                            <input type="file" class="custom-file-input" id="diploma_image" name="diploma_image" accept="image/*" required>
                                        </div>

                                        <!-- Optional Certificates Image Upload -->
                                        <div class="mb-3">
                                            <label for="certificates_image" class="custom-label">Certificates Image (Optional)</label>
                                            <input type="file" class="custom-file-input" id="certificates_image" name="certificates_image" accept="image/*">
                                        </div>

                                        <button class="custom-button align-self-end" type="submit" name="apply_submit">
                                            Apply
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?=$post['link']?>">
                    <h2 id="general-info">
                    	<?=$post['title']?>
                	</h2>
                </a>
                <p>
                    <?=$post['content']?>
                </p>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="map">
                <h2 id="location">
                    Location
                </h2>
                <iframe src=<?=$post['location']?> width="100%" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
            </div>
        </div>

      	<div class="col-12">
            <div class="fee">
                <h2 id="tuition-fee">
                    Tuition Fee
                </h2>
                <ul class=fs-5>
                    <li>For local students: <strong id='price'><?=$price_lFormatted?> <?=$currency_l?></strong> / academic year <?if ($currency_l=='UZS') {echo '(' .$priceFormatted. ' USD)';}?></li>
                    <br>
                    <li>For foreign students: <strong><?=$price_fFormatted?> <?=$currency_f?></strong> / academic year</li>
                </ul>
                <br><br>
                <p class="w-100 d-flex flex-column">
                    <span>* prices are exclusive of scholarships.</span>
                    <span>** due to announcements delay, costs might not be precise at the moment.</span>
                    <span>*** conversion is performed according to the version of the Central Bank of the Republic of Uzbekistan.</span>
                    <span>**** in case of tuition fee for foreigners is not specified, the same cost for both type of students is indicated.</span>
                    <span>***** in case of tuition fees varying, cost of the most expensive undergraduate educational program is chosen.</span>
                </p>
            </div>
        </div>
      
        <div class="col-12">
            <div class="faculties">
                <h2 id="majors">
                    Majors
                </h2>
                <div class="content">
                    <ul>
                        <?foreach($faculties as $faculty):?>
                            <li>
                                - <?=$faculty['faculties'];?>
                            </li>
                        <?endforeach?>
                    </ul>
                </div>
            </div>  
        </div>
      
      
        <div class="accordions" id="subjects-accordions">
          <div class="row">
            <div class="col-md-6">
                <div class="ex-subjects">
                    <div class="accordion accordion-flush" id="ex-subjects">
                        <h2 class="mb-3 text-center">Exam subjects</h2>
                        <div class="accordion-item">
                            <h3 class="accordion-top accordion-header p-3 text-white">Faculties</h3>
                        </div>
                        <?foreach($faculties as $faculty):?>
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ex-collapse<?=$faculty['id']?>">
                                    <span><?=$faculty['faculties']?></span> 
                                </button>
                              </h2>
                              <div id="ex-collapse<?=$faculty['id']?>" class="accordion-collapse collapse" data-bs-parent="#ex-subjects">
                                <div class="accordion-body">
                                  	<?if ($faculty['exam_subjects'] != NULL) {?>
                                    	<?=$faculty['exam_subjects']?>
                                  	<?} else {?>
                                  		<span> N/A </span>
                                  	<?}?>
                                </div>
                              </div>
                            </div>
                        <?endforeach?>
                    </div>
                </div>  
            </div>
          
            <div class="col-md-6">
                <div class="subjects">
                    <div class="accordion accordion-flush" id="subjects">
                        <h2 class="mb-3 text-center">Subjects taught</h2>
                        <div class="accordion-item">
                            <h3 class="accordion-top accordion-header p-3 text-white">Faculties</h3>
                        </div>
                        <?foreach($faculties as $faculty):?>
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sub-collapse<?=$faculty['id']?>">
                                    <span><?=$faculty['faculties']?></span> 
                                </button>
                              </h2>
                              <div id="sub-collapse<?=$faculty['id']?>" class="accordion-collapse collapse" data-bs-parent="#subjects">
                                <div class="accordion-body">
                                    <?if ($faculty['subjects'] != NULL) {?>
                                    	<?=$faculty['subjects']?>
                                  	<?} else {?>
                                  		<span> N/A </span>
                                  	<?}?>
                                </div>
                              </div>
                            </div>
                        <?endforeach?>
                    </div>
                  </div>  
                </div>
            </div>
        </div>
        
        <div class="col-12">
            <div class="requirements">
                <h2 id="admission-requirements">
                    Additional Requirements
                </h2>
                <div class="content">
                    <ul>
                    	<?$noRequirement = 0;
                    	foreach($faculties as $faculty) {
                        	if($faculty['requirements'] != NULL) {?>
                            	<?if ($faculty['requirements'] == '/n') {?>
                                	<br>
                            	<?} else {?>
                             	   <li><?=$faculty['requirements']?></li>
                         	   <?}
                   		    } else {
                      		      $noRequirement += 1;
                   		    }
                	  	 }
                   		 if ($noRequirement == $facultiesNumber) {?>
                 	       <li>No additional requirements.</li>
              		      <?}
       		             ?>
                    </ul>
                </div>
            </div>
        </div>

		<div class="col-12">
            <div class="contact-info">
                <h2 id="contact-info">
                    Contact Information
                </h2>
                <p><?=nl2br($post['contacts'])?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="comments w-100 d-flex flex-column">
                <h2 id="reviews">Reviews</h2>
                <?if (mysqli_num_rows($ratings) > 0) {?>
                    <? foreach($ratings as $r):?>
                        <div class="comment w-100 p-3 mt-4">
                   	    	<div class="userRate">
                                <div class="comment__user">
                                    <h3 class="mt-1">
                                        <?=$r['name_user']?>
                                    </h3>
                                    <div class="rateyo disabledBtn" id="rating"
                                    data-rateyo-rating="<?=$r['rating']?>"
                                    data-rateyo-num-stars="5"
                                    data-rateyo-score="<?=$r['rating']?>">  
                                   </div>
                                </div>
                                <?if ($r['name_user'] == $_SESSION["userName"]) {?>
                                    <div class="comment__edit">
                                        <i class="far fa-edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></button>
                                        <form name="commentDelete" action="assets/inc/deleteComment.php?rId=<?=$r['id']?>" method="POST">
                                            <button type="submit" class="d-none deleteBtn"></button> 
                                            <i class="far fa-trash-alt delete-button"></i>
                                        </form>
                                    </div>
                                <?}?>
                   	    	</div>
                   	    	<? if (trim($r['comment']) != '') {?>
                         		<p>
                             		<?=$r['comment']?>
                         		</p>
                   	    	<?}?>
                   	    	<br>
                   	    	<span>
                         		<?=$r['comment_date'];?>
                   	    	</span>
                	    </div>
                 	<?endforeach;?>
                <?} else {
                    echo "<p> No reviews yet... </p>";
                }?>
            </div>
        </div>
    </div>
</section>

<script>
    // delete button logic(s) 
    const delBtn = document.querySelector('.delete-button');
    const delTrigger = document.querySelector('.deleteBtn');
    if (delBtn) {
        delBtn.addEventListener('click', function() {
          delTrigger.click();
        });
    }
</script>