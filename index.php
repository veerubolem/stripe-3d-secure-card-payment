<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title data-tid="elements_examples.meta.title">Stripe Payment</title>
        <meta data-tid="elements_examples.meta.description" name="description" content="Build beautiful, smart checkout flows.">
        <meta name="robots" content="NOINDEX" />
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon/180x180.png">
        <link rel="icon" href="img/apple-touch-icon/180x180.png">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://js.stripe.com/v3/"></script>
        <script src="js/index.js" data-rel-js></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/stripe.css" data-rel-css="" />
        <link rel="stylesheet" type="text/css" href="css/stripe_form.css" data-rel-css="" />
    </head>
    <body>
        <div class="globalContent">
            <main>
                <section class="container-lg">
                    <!--Example 1-->
                    <div class="cell example stripe" id="example-1">
                        <form id="payment-form">
                            <fieldset>
                                <div class="row">
                                    <label for="stripe-name" data-tid="elements_examples.form.name_label">Name</label>
                                    <input id="stripe-name" data-tid="elements_examples.form.name_placeholder" type="text" placeholder="Jane Doe" required="" autocomplete="name">
                                </div>
                                <div class="row">
                                    <label for="stripe-email" data-tid="elements_examples.form.email_label">Email</label>
                                    <input id="stripe-email" name="customer_mail" data-tid="elements_examples.form.email_placeholder" type="email" placeholder="janedoe@gmail.com" required="" autocomplete="email">
                                </div>
                                <div class="row">
                                    <label for="stripe-phone" data-tid="elements_examples.form.phone_label">Phone</label>
                                    <input id="stripe-phone" data-tid="elements_examples.form.phone_placeholder" type="tel" placeholder="(941) 555-0123" required="" autocomplete="tel">
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div id="stripe-card"></div>
                                </div>
                            </fieldset>
                            <button type="submit" id="paybutton" data-tid="elements_examples.form.pay_button">Pay</button>
                            <div class="error" role="alert">
                                <span class="message"></span>
                            </div>
                        </form>
                        <div class="success">
                            <div class="icon">
                                <svg width="84px" height="84px" viewBox="0 0 84 84" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <circle class="border" cx="42" cy="42" r="40" stroke-linecap="round" stroke-width="4" stroke="#000" fill="none"></circle>
                                <path class="checkmark" stroke-linecap="round" stroke-linejoin="round" d="M23.375 42.5488281 36.8840688 56.0578969 64.891932 28.0500338" stroke-width="4" stroke="#000" fill="none"></path>
                                </svg>
                            </div>
                            <h3 class="title" data-tid="elements_examples.success.title">Payment successful</h3>
                            <p class="message"><span data-tid="elements_examples.success.message">Thanks for trying Stripe.</span><span class="token"></span></p>
                            <a class="reset" href="#">
                                <svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path fill="#000000" d="M15,7.05492878 C10.5000495,7.55237307 7,11.3674463 7,16 C7,20.9705627 11.0294373,25 16,25 C20.9705627,25 25,20.9705627 25,16 C25,15.3627484 24.4834055,14.8461538 23.8461538,14.8461538 C23.2089022,14.8461538 22.6923077,15.3627484 22.6923077,16 C22.6923077,19.6960595 19.6960595,22.6923077 16,22.6923077 C12.3039405,22.6923077 9.30769231,19.6960595 9.30769231,16 C9.30769231,12.3039405 12.3039405,9.30769231 16,9.30769231 L16,12.0841673 C16,12.1800431 16.0275652,12.2738974 16.0794108,12.354546 C16.2287368,12.5868311 16.5380938,12.6540826 16.7703788,12.5047565 L22.3457501,8.92058924 L22.3457501,8.92058924 C22.4060014,8.88185624 22.4572275,8.83063012 22.4959605,8.7703788 C22.6452866,8.53809377 22.5780351,8.22873685 22.3457501,8.07941076 L22.3457501,8.07941076 L16.7703788,4.49524351 C16.6897301,4.44339794 16.5958758,4.41583275 16.5,4.41583275 C16.2238576,4.41583275 16,4.63969037 16,4.91583275 L16,7 L15,7 L15,7.05492878 Z M16,32 C7.163444,32 0,24.836556 0,16 C0,7.163444 7.163444,0 16,0 C24.836556,0 32,7.163444 32,16 C32,24.836556 24.836556,32 16,32 Z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </section>
            </main>
        </div>
        <!-- Scripts for each example: -->
        <script src="js/stripe_form.js" data-rel-js></script>
    </body>
</html>
