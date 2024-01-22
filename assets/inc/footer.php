        <footer class="footer d-flex flex-wrap" id="footer">
          <!-- <div class="w-100 d-flex">    
            <div class="footer__form">
                <h2>Direct communication</h2> -->
                <!-- onsubmit="return check(this) -->
                <!-- <form action="assets/inc/sendMessege.php" method="POST">
                    <input type="email" name="userEmail" placeholder="Email"><br>
                    <textarea name="userMessege" placeholder="Messege" maxlength ="500"></textarea>
                    <button type="submit">Send</button>
                </form>
            </div>
            <div class="inf">
                <div class="refs">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="?id=about">About Us</a></li>
                        <li><a href="/#posts">Colleges</a></li>
                    </ul>
                </div>
                <div class="contact__info">
                    <h3>Contacts</h3>
                    <ul>
                        <li><i class="far fa-envelope m-1"></i> E-mail: unitop@internet.ru</li>
                      	<li>
                      		<div class="brands w-100 d-flex justify-content-between">
        						<a href="#!"><i class="fab fa-facebook-f"></i></a>
        						<a href="#!"><i class="fab fa-instagram"></i></a>
        						<a href="#!"><i class="fab fa-telegram-plane"></i></a>
                              	<a href="https://www.linkedin.com/company/uni-top/about"><i class="fab fa-linkedin-in"></i></a>
    						</div>
                      	</li>
                    </ul>
                </div>
            </div>
          </div>
          	<div class="legal w-100 d-flex justify-content-center mt-5">
                <ul class="d-inline-flex flex-wrap justify-content-center">
                    <li><a href="?id=privacy" target="_blank">Privacy Policy</a></li>
                    <li><a href="?id=terms" target="_blank">Terms Of Use</a></li>
                    <li><a href="?id=disclaimer" target="_blank">Disclaimer</a></li>
                    <li><a href="?id=cookies" target="_blank">Cookie Policy</a></li>
                    <li>
                        <a href="#"
                            onclick="window.displayPreferenceModal();return false;"
                            id="termly-consent-preferences">Consent Preferences
                        </a>
                    </li>
                </ul>
            </div>
            <div class="com">
                <div class="design">Designed by Diyorbek S.</div>
                <div id="copyright">© 2022 - <?php echo date('Y'); ?> Unitop.uz</div>
            </div> -->
        </footer>

		<?if (is_numeric($id)) {?>
			<script src="assets/libs/jquery/code.jquery.com_jquery-3.7.0.min.js"></script>
            <script src="assets/libs/jquery/plugins/jquery.rateyo.min.js"></script>
            <script>
                $(function () {
                    $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
                        let rating = data.rating;
                        $(this).parent().find('.score').text('Score: '+ $(this).attr('data-rateyo-score'));
                        $(this).parent().find('.result').text('Rating: ' + rating);
                        $(this).parent().find('input[name=rate]').val(rating); //add rating value to input field
                    });
                });
            </script>
        <?}?>
		<script src="assets/libs/bs/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/main.js"></script>
        <!-- <script>

            // check form
            function check(form){
              if (form.message.value.trim() == ""){
                  return false;
              }
            }

        </script> -->
    </body>
</html>