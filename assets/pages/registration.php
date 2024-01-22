<?if ($_SESSION['emptyInput'] == true) {?>
    <div class="prompt text-bg-danger">
        <span>Please fill out the<code> blanks </code> to proceed.</span>
    </div>
<?}
else if ($_SESSION['incorrectName'] == true) {?>
    <div class="prompt text-bg-danger">
        <span>Please enter a valid <code> username</code>.</span>
    </div>
<?} 
else if ($_SESSION['incorrectEmail'] == true) {?>
    <div class="prompt text-bg-danger">
        <span>Please enter a valid <code> email</code>.</span>
    </div>
<?}
else if ($_SESSION['invalidPwd'] == true) {?>
    <div class="prompt text-bg-danger">
    <span>The password must be at least <code>8 characters</code> long and include <code>at least one letter and one number</code>. Please try again.</span>
    </div>
<?}
else if ($_SESSION['incorrectRePass'] == true) {?>
    <div class="prompt text-bg-danger">
        <span><code>Passwords </code> do not match. Please try again.</span>
    </div>
<?}
else if ($_SESSION['nameTaken'] == true) {?>
    <div class="prompt text-bg-danger">
        <span>The <code> username </code> is already taken. Please try again.</span>
    </div>
<?}?>

<?
$_SESSION['emptyInput'] = false;
$_SESSION['incorrectName'] = false;
$_SESSION['incorrectEmail'] = false;
$_SESSION['invalidPwd'] = false;
$_SESSION['incorrectRePass'] = false;
$_SESSION['nameTaken'] = false;
?>
        
<section class="d-flex align-items-center">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="assets/images/signup.webp" class="img-fluid" alt="registration-image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 my-2">
        <form action="assets/inc/addUser.php" method="POST">
           <!-- Name -->
           <div class="form-outline my-4">
            <input type="name" name="firstName" id="firstname" class="form-control"/>
            <label class="form-label" for="firstname">First name</label>
          </div>
           <!-- Surrname -->
           <div class="form-outline my-4">
            <input type="name" name="surName" id="surname" class="form-control"/>
            <label class="form-label" for="surname">Last name</label>
          </div>
          <!-- Age -->
          <div class="form-outline my-4">
            <div class="w-100 d-inline-flex align-items-center">
              <input type="text" name="birthDay" id="airdatepicker" class="form-control" role="button" readonly/>
              <label class="form-label" for="airdatepicker">Date of birth</label>
              <i class="fad fa-calendar-alt"></i>
            </div>
          </div>
          <!-- Gender -->
          <div class="form-outline my-4">
            <div class="row">
              <label class="col-12 mb-2 header-label">Gender</label>
              <div class="col-2 form-check">
                <input class="form-check-input" type="radio" name="genDer" id="male" value="male">
                <label class="form-check-label" for="male">Male</label>
              </div>
              <div class="col-2 form-check">
                <input class="form-check-input" type="radio" name="genDer" id="female" value="female">
                <label class="form-check-label" for="female">Female</label>
              </div>
            </div>
          </div>
          <!-- Citizenship -->
          <div class="form-outline my-4">
            <div class="row">
              <div class="col-12 mb-2 header-label">
                <label for="citizenship">Citizenship</label>
              </div>
              <div class="w-100 d-inline-flex align-items-center">
                <select name="citizenShip" id="citizenship" class="form-control" role="button">
                  <option value="" disabled selected class="form-label">Select citizenship</option>
                  <option value="afghanistan">Afghanistan</option>
                  <option value="albania">Albania</option>
                  <option value="algeria">Algeria</option>
                  <option value="andorra">Andorra</option>
                  <option value="angola">Angola</option>
                  <option value="antigua and barbuda">Antigua and Barbuda</option>
                  <option value="argentina">Argentina</option>
                  <option value="armenia">Armenia</option>
                  <option value="australia">Australia</option>
                  <option value="austria">Austria</option>
                  <option value="azerbaijan">Azerbaijan</option>
                  <option value="bahamas">Bahamas</option>
                  <option value="bahrain">Bahrain</option>
                  <option value="bangladesh">Bangladesh</option>
                  <option value="barbados">Barbados</option>
                  <option value="belarus">Belarus</option>
                  <option value="belgium">Belgium</option>
                  <option value="belize">Belize</option>
                  <option value="benin">Benin</option>
                  <option value="bhutan">Bhutan</option>
                  <option value="bolivia">Bolivia</option>
                  <option value="bosnia and herzegovina">Bosnia and Herzegovina</option>
                  <option value="botswana">Botswana</option>
                  <option value="brazil">Brazil</option>
                  <option value="brunei">Brunei</option>
                  <option value="bulgaria">Bulgaria</option>
                  <option value="burkina faso">Burkina Faso</option>
                  <option value="burundi">Burundi</option>
                  <option value="cabo verde">Cabo Verde</option>
                  <option value="cambodia">Cambodia</option>
                  <option value="cameroon">Cameroon</option>
                  <option value="canada">Canada</option>
                  <option value="central african republic">Central African Republic</option>
                  <option value="chad">Chad</option>
                  <option value="chile">Chile</option>
                  <option value="china">China</option>
                  <option value="colombia">Colombia</option>
                  <option value="comoros">Comoros</option>
                  <option value="congo (brazzaville)">Congo (Brazzaville)</option>
                  <option value="congo (kinshasa)">Congo (Kinshasa)</option>
                  <option value="costa rica">Costa Rica</option>
                  <option value="cote d'ivoire">Cote d'Ivoire</option>
                  <option value="croatia">Croatia</option>
                  <option value="cuba">Cuba</option>
                  <option value="cyprus">Cyprus</option>
                  <option value="czechia">Czechia</option>
                  <option value="denmark">Denmark</option>
                  <option value="djibouti">Djibouti</option>
                  <option value="dominica">Dominica</option>
                  <option value="dominican republic">Dominican Republic</option>
                  <option value="east timor">East Timor</option>
                  <option value="ecuador">Ecuador</option>
                  <option value="egypt">Egypt</option>
                  <option value="el salvador">El Salvador</option>
                  <option value="equatorial guinea">Equatorial Guinea</option>
                  <option value="eritrea">Eritrea</option>
                  <option value="estonia">Estonia</option>
                  <option value="eswatini">Eswatini</option>
                  <option value="ethiopia">Ethiopia</option>
                  <option value="fiji">Fiji</option>
                  <option value="finland">Finland</option>
                  <option value="france">France</option>
                  <option value="gabon">Gabon</option>
                  <option value="gambia">Gambia</option>
                  <option value="georgia">Georgia</option>
                  <option value="germany">Germany</option>
                  <option value="ghana">Ghana</option>
                  <option value="greece">Greece</option>
                  <option value="grenada">Grenada</option>
                  <option value="guatemala">Guatemala</option>
                  <option value="guinea">Guinea</option>
                  <option value="guinea-bissau">Guinea-Bissau</option>
                  <option value="guyana">Guyana</option>
                  <option value="haiti">Haiti</option>
                  <option value="honduras">Honduras</option>
                  <option value="hungary">Hungary</option>
                  <option value="iceland">Iceland</option>
                  <option value="india">India</option>
                  <option value="indonesia">Indonesia</option>
                  <option value="iran">Iran</option>
                  <option value="iraq">Iraq</option>
                  <option value="ireland">Ireland</option>
                  <option value="israel">Israel</option>
                  <option value="italy">Italy</option>
                  <option value="jamaica">Jamaica</option>
                  <option value="japan">Japan</option>
                  <option value="jordan">Jordan</option>
                  <option value="kazakhstan">Kazakhstan</option>
                  <option value="kenya">Kenya</option>
                  <option value="kiribati">Kiribati</option>
                  <option value="korea, north">Korea, North</option>
                  <option value="korea, south">Korea, South</option>
                  <option value="kosovo">Kosovo</option>
                  <option value="kuwait">Kuwait</option>
                  <option value="kyrgyzstan">Kyrgyzstan</option>
                  <option value="laos">Laos</option>
                  <option value="latvia">Latvia</option>
                  <option value="lebanon">Lebanon</option>
                  <option value="lesotho">Lesotho</option>
                  <option value="liberia">Liberia</option>
                  <option value="libya">Libya</option>
                  <option value="liechtenstein">Liechtenstein</option>
                  <option value="lithuania">Lithuania</option>
                  <option value="luxembourg">Luxembourg</option>
                  <option value="madagascar">Madagascar</option>
                  <option value="malawi">Malawi</option>
                  <option value="malaysia">Malaysia</option>
                  <option value="maldives">Maldives</option>
                  <option value="mali">Mali</option>
                  <option value="malta">Malta</option>
                  <option value="marshall islands">Marshall Islands</option>
                  <option value="mauritania">Mauritania</option>
                  <option value="mauritius">Mauritius</option>
                  <option value="mexico">Mexico</option>
                  <option value="micronesia">Micronesia</option>
                  <option value="moldova">Moldova</option>
                  <option value="monaco">Monaco</option>
                  <option value="mongolia">Mongolia</option>
                  <option value="montenegro">Montenegro</option>
                  <option value="morocco">Morocco</option>
                  <option value="mozambique">Mozambique</option>
                  <option value="myanmar">Myanmar</option>
                  <option value="namibia">Namibia</option>
                  <option value="nauru">Nauru</option>
                  <option value="nepal">Nepal</option>
                  <option value="netherlands">Netherlands</option>
                  <option value="new zealand">New Zealand</option>
                  <option value="nicaragua">Nicaragua</option>
                  <option value="niger">Niger</option>
                  <option value="nigeria">Nigeria</option>
                  <option value="north macedonia">North Macedonia</option>
                  <option value="norway">Norway</option>
                  <option value="oman">Oman</option>
                  <option value="pakistan">Pakistan</option>
                  <option value="palau">Palau</option>
                  <option value="panama">Panama</option>
                  <option value="papua new guinea">Papua New Guinea</option>
                  <option value="paraguay">Paraguay</option>
                  <option value="peru">Peru</option>
                  <option value="philippines">Philippines</option>
                  <option value="poland">Poland</option>
                  <option value="portugal">Portugal</option>
                  <option value="qatar">Qatar</option>
                  <option value="romania">Romania</option>
                  <option value="russia">Russia</option>
                  <option value="rwanda">Rwanda</option>
                  <option value="saint kitts and nevis">Saint Kitts and Nevis</option>
                  <option value="saint lucia">Saint Lucia</option>
                  <option value="saint vincent and the grenadines">Saint Vincent and the Grenadines</option>
                  <option value="samoa">Samoa</option>
                  <option value="san marino">San Marino</option>
                  <option value="sao tome and principe">Sao Tome and Principe</option>
                  <option value="saudi arabia">Saudi Arabia</option>
                  <option value="senegal">Senegal</option>
                  <option value="serbia">Serbia</option>
                  <option value="seychelles">Seychelles</option>
                  <option value="sierra leone">Sierra Leone</option>
                  <option value="singapore">Singapore</option>
                  <option value="slovakia">Slovakia</option>
                  <option value="slovenia">Slovenia</option>
                  <option value="solomon islands">Solomon Islands</option>
                  <option value="somalia">Somalia</option>
                  <option value="south africa">South Africa</option>
                  <option value="south sudan">South Sudan</option>
                  <option value="spain">Spain</option>
                  <option value="sri lanka">Sri Lanka</option>
                  <option value="sudan">Sudan</option>
                  <option value="suriname">Suriname</option>
                  <option value="sweden">Sweden</option>
                  <option value="switzerland">Switzerland</option>
                  <option value="syria">Syria</option>
                  <option value="taiwan">Taiwan</option>
                  <option value="tajikistan">Tajikistan</option>
                  <option value="tanzania">Tanzania</option>
                  <option value="thailand">Thailand</option>
                  <option value="togo">Togo</option>
                  <option value="tonga">Tonga</option>
                  <option value="trinidad and tobago">Trinidad and Tobago</option>
                  <option value="tunisia">Tunisia</option>
                  <option value="turkey">Turkey</option>
                  <option value="turkmenistan">Turkmenistan</option>
                  <option value="tuvalu">Tuvalu</option>
                  <option value="uganda">Uganda</option>
                  <option value="ukraine">Ukraine</option>
                  <option value="united arab emirates">United Arab Emirates</option>
                  <option value="united kingdom">United Kingdom</option>
                  <option value="united states">United States</option>
                  <option value="uruguay">Uruguay</option>
                  <option value="uzbekistan">Uzbekistan</option>
                  <option value="vanuatu">Vanuatu</option>
                  <option value="vatican city">Vatican City</option>
                  <option value="venezuela">Venezuela</option>
                  <option value="vietnam">Vietnam</option>
                  <option value="yemen">Yemen</option>
                  <option value="zambia">Zambia</option>
                  <option value="zimbabwe">Zimbabwe</option>
                </select>
                <i class="fas fa-caret-down"></i>
              </div>
            </div>
          </div>
          <!-- Username -->
          <div class="form-outline my-4">
            <input type="name" name="userName" id="username" class="form-control" required/>
            <label class="form-label" for="username">Username<span class="required">*</span></label>
          </div>
          <!-- Email -->
          <div class="form-outline my-4">
            <input type="email" name="userEmail" id="useremail" class="form-control" required/>
            <label class="form-label" for="useremail">Email<span class="required">*</span></label>
          </div>
          <!-- Password -->
          <div class="form-outline my-4">
            <input type="password" name="userPass" id="userpass" class="form-control" required/>
            <label class="form-label" for="userpass">Password<span class="required">*</span></label>
          </div>
          <!-- Password:RE -->
          <div class="form-outline my-4">
            <input type="password" name="userPassRe" id="userpassre" class="form-control" required/>
            <label class="form-label" for="userpassre">Repeat password<span class="required">*</span></label>
          </div>
          <div class="w-100 text-center text-lg-start my-4 d-inline-flex justify-content-between align-items-end">
            <button type='submit' name='submit' class="submit-button btn-primary btn-lg px-4">Sign Up</button>
            <p class="small fw-bold">Already have an account? <a href="?id=login" class="link-danger">Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<script src="assets/libs/airdatepicker/air-datepicker.js"></script>
<script src="assets/js/modules/datePicker.js"></script>