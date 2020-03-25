'use strict';

var stripe = Stripe('pk_test_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');

function registerElements(elements, exampleName) {

    var formClass = '.' + exampleName;
    var example = document.querySelector(formClass);

    var form = example.querySelector('form');
    var resetButton = example.querySelector('a.reset');
    var errors = form.querySelector('.error');
    var errorMessage = errors.querySelector('.message');

    function enableInputs() {
        Array.prototype.forEach.call(
                form.querySelectorAll(
                        "input[type='text'], input[type='email'], input[type='tel']"
                        ),
                function (input) {
                    input.removeAttribute('disabled');
                }
        );
    }

    function disableInputs() {
        Array.prototype.forEach.call(
                form.querySelectorAll(
                        "input[type='text'], input[type='email'], input[type='tel']"
                        ),
                function (input) {
                    input.setAttribute('disabled', 'true');
                }
        );
    }

    function triggerBrowserValidation() {
        // The only way to trigger HTML5 form validation UI is to fake a user submit
        // event.
        var submit = document.createElement('input');
        submit.type = 'submit';
        submit.style.display = 'none';
        form.appendChild(submit);
        submit.click();
        submit.remove();
    }

    // Listen for errors from each Element, and show error messages in the UI.
    var savedErrors = {};
    elements.forEach(function (element, idx) {
        element.on('change', function (event) {
            if (event.error) {
                errors.classList.add('visible');
                savedErrors[idx] = event.error.message;
                errorMessage.innerText = event.error.message;
            } else {
                savedErrors[idx] = null;

                // Loop over the saved errors and find the first one, if any.
                var nextError = Object.keys(savedErrors)
                        .sort()
                        .reduce(function (maybeFoundError, key) {
                            return maybeFoundError || savedErrors[key];
                        }, null);

                if (nextError) {
                    // Now that they've fixed the current error, show another one.
                    errorMessage.innerText = nextError;
                } else {
                    // The user fixed the last error; no more errors.
                    errors.classList.remove('visible');
                }
            }
        });
    });

    // Listen on the form's 'submit' handler...
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        // Trigger HTML5 validation UI on the form if any of the inputs fail
        // validation.
        var plainInputsValid = true;
        Array.prototype.forEach.call(form.querySelectorAll('input'), function (
                input
                ) {
            if (input.checkValidity && !input.checkValidity()) {
                plainInputsValid = false;
                return;
            }
        });
        if (!plainInputsValid) {
            triggerBrowserValidation();
            return;
        }
        // Show a loading screen...
        example.classList.add('submitting');
        // Disable all inputs.
        disableInputs();
        stripe.createPaymentMethod({
            type: 'card',
            card: elements[0],
        }).then(handlePaymentMethodResult);
    });

    resetButton.addEventListener('click', function (e) {
        e.preventDefault();
        // Resetting the form (instead of setting the value to `''` for each input)
        // helps us clear webkit autofill styles.
        form.reset();
        // Clear each Element.
        elements.forEach(function (element) {
            element.clear();
        });
        // Reset error state as well.
        errors.classList.remove('visible');
        // Resetting the form does not un-disable inputs, so we need to do it separately:
        enableInputs();
        example.classList.remove('submitted');
    });

    function handlePaymentMethodResult(result) {
        example.classList.remove('submitting');
        if (result.error) {
            // An error happened when collecting card details, show it in the payment form
            errors.classList.add('visible');
            errorMessage.innerText = "Error message: " + result.error.message;
        } else {
            // Otherwise send paymentMethod.id to your server (see Step 3)
            fetch('pay.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({payment_method_id: result.paymentMethod.id})
            }).then(function (result) {
                return result.json();
            }).then(handleServerResponse);
        }
    }

    function handleServerResponse(responseJson) {
        example.classList.remove('submitting');
        if (responseJson.error) {
            errors.classList.add('visible');
            errorMessage.innerText = "Error message: " + responseJson.error;
        } else if (responseJson.requiresAction) {
            // Use Stripe.js to handle required card action
            stripe.handleCardAction(
                    responseJson.clientSecret
                    ).then(function (result) {
                if (result.error) {
                    // Show `result.error.message` in payment form
                    errors.classList.add('visible');
                    errorMessage.innerText = "Error message: " + result.error.message;
                } else {
                    // The card action has been handled
                    // The PaymentIntent can be confirmed again on the server
                    fetch('pay.php', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify({payment_intent_id: result.paymentIntent.id})
                    }).then(function (confirmResult) {
                        return confirmResult.json();
                    }).then(handleServerResponse);
                }
            });
        } else {
            // Show a success message
            example.classList.add('submitted');
        }
    }
}
