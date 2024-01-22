<style>
    #topUpContainer {
        width: 100%;
        text-align: center;
        color: var(--color-text);
    }

    #methodsContainer form .paymentMethods{
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 20px;
        justify-content: center;
        margin: 50px 0;
    }

    #methodsContainer form button {
        padding: 5px 45px;
        margin-left: 50%;
    }

    .paymentCard {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        cursor: pointer;
    }

    /* #paymentForm {
        display: none;
        margin-top: 20px;
    } */
</style>

<section id="topUpContainer">
    <!-- Errors returned if any -->
    <!-- <div class="hidden" id="paymentResponse"></div> -->

    <h2>Select Payment Method</h2>

    <div id="methodsContainer">
        <form action="assets/inc/checkout.php" method="POST">
            <div class="paymentMethods">
                <div class="paymentMethod">
                    <input class="d-none" type="radio" name="paymethod" id="creditCard" value="card"></input>
                    <label class="form-check-label" for="creditCard">
                        <div class="paymentCard">
                            Credit Card
                        </div>
                    </label>
                </div>
                <div class="paymentMethod">
                    <input class="d-none" type="radio" name="paymethod" id="payPal" value="paypal"></input>
                    <label class="form-check-label" for="payPal">
                        <div class="paymentCard">PayPal</div>
                    </label>
                </div>
                <div class="paymentMethod">
                    <input class="d-none" type="radio" name="paymethod" id="bitcoin" value="btc"></input>
                    <label class="form-check-label" for="bitcoin">
                        <div class="paymentCard">Bitcoin</div>
                    </label>
                </div>
                <div class="paymentMethod">
                    <input class="d-none" type="radio" name="paymethod" id="googlePay" value="gpay"></input>
                    <label class="form-check-label" for="googlePay">
                        <div class="paymentCard">Google Pay</div>
                    </label>
                </div>
                <div class="paymentMethod">
                    <input class="d-none" type="radio" name="paymethod" id="applePay" value="ipay"></input>
                    <label class="form-check-label" for="applePay">
                        <div class="paymentCard">Apple Pay</div>
                    </label>
                </div>
                <div class="paymentMethod">
                    <input class="d-none" type="radio" name="paymethod" id="uzcard" value="uzcard"></input>
                    <label class="form-check-label" for="uzcard">
                        <div class="paymentCard">Uzcard</div>
                    </label>
                </div>
                <div class="paymentMethod">
                    <input class="d-none" type="radio" name="paymethod" id="humo" value="humo"></input>
                    <label class="form-check-label" for="humo">
                        <div class="paymentCard">Humo</div>
                    </label>
                </div>
            </div>
            
            <button class="btn-static disabledBtn" type="submit" name="paySubmit" id="paySubmit">
                <!-- <div class="spinner hidden" id="spinner"></div> -->
                <span id="payText">Pay</span>
            </button>
        </form>
    </div>

    <h6 class="text-start m-5">Note: For now top-ups by 2$ only</h6>
</section>

<!-- <script src="https://js.stripe.com/v3/"></script> -->

<script>
    // const stripe = Stripe("pk_test_51OVRG8GvRicPy0MgyZAd7PmXAdAdTYrm4ztxdPrVYRgS9G1BnvkfBelcDdpZ2OymuWENDFAIoL6lRfFARj2JzdMG003vJs2FYJ");
    const checkers = document.querySelectorAll('.paymentMethod input');
    const payBtn = document.getElementById('paySubmit');

    checkers.forEach(checker => {
        checker.addEventListener('change', function() {
            checkers.forEach(otherChecker => {
                otherChecker.nextElementSibling.children[0].classList.remove('border', 'border-success');
            });

            if (this.checked) {
                const value = this.value;
                this.nextElementSibling.children[0].classList.add('border', 'border-success');
                payBtn.classList.remove('disabledBtn');
            } else {
                this.nextElementSibling.children[0].classList.remove('border', 'border-success');
            }
        });
    });

    // payBtn.addEventListener('click', function(evt) {
    //     setLoading(true);

    //     createCheckoutSession().then(function(data) {
    //         if (data.sessionId) {
    //             stripe.redirectToCheckout({
    //                 sessionId: data.sessionId,
    //             }).then(handleResult);
    //         } else {
    //             handleResult(data);
    //         }
    //     })
    // });

    // Create Checkout Session with Selected Product
    // const createCheckoutSession = function(stripe) {
    //     return fetch("checkout.php", {
    //         method: "POST",
    //         headers: {
    //             "Content-Type": "application/json",
    //         },
    //         body: JSON.stringify({
    //             createCheckoutSession: 1,
    //         }),
    //     }).then(function(result) {
    //         return result.json();
    //     });
    // };

    // Handle any errors returned from Checkout
    // const handleResult = function(result) {
    //     if (result.error) {
    //         showMessage(result.error.message);
    //     }
    //     setLoading(false);
    // };

    // Show a spinner on payment processing
    // function setLoading(isLoading) {
    //     if (isLoading) {
    //         payBtn.disabled = true;
    //         document.querySelector("#spinner").classList.remove("hidden");
    //         document.querySelector("#payText").classList.add("hidden");
    //     } else {
    //         payBtn.disabled = false;
    //         document.querySelector("#spinner").classList.add("hidden");
    //         document.querySelector("#payText").classList.remove("hidden");
    //     }
    // }

    // Display message
    // function showMessage(messageText) {
    //     const messageContainer = document.querySelector("#paymentResponse");
    //     messageContainer.classList.remove("hidden");
    //     messageContainer.textContent = messageText;

    //     setTimeout(function () {
    //         messageContainer.classList.add("hidden");
    //         messageText.textContent = "";
    //     }, 5000);
    // }




    // function showPaymentForm(method) {
    //     // const pLink = document.getElementById('pay');

    //     // Show the selected payment form
    //     if (method === 'card') {
    //         // Add logic to show credit card form fields
    //     } else if (method === 'paypal') {
    //         // Add logic to show PayPal form fields
    //     } else if (method === 'btc') {
    //         // Add logic to show Bitcoin form fields
    //     } else if (method === 'gpay') {
    //         // Add logic to show googlepay form fields
    //     } else if (method === 'ipay') {
    //         // Add logic to show applepay form fields
    //     } else if (method === 'uzcard') {
    //         // Add logic to show uzcard form fields
    //     } else if (method === 'humo') {
    //         // Add logic to show humo form fields
    //     }
    // }
</script>