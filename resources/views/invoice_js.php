<script>
document.addEventListener('DOMContentLoaded', async () => {
    const stripe = Stripe("<?= getenv('STRIPE_PUBLISHABLE_KEY'); ?>", {
        apiVersion: "<?= getenv('STRIPE_API_VERSION'); ?>",
    });
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const paymentForm = document.querySelector('#payment-form');
    paymentForm.addEventListener('submit', async (e) => {
        // Avoid a full page POST request.
        e.preventDefault();

        // Disable the form from submitting twice.
        paymentForm.querySelector('button').disabled = true;

        // Confirm the card payment that was created server side:
        const {error, paymentIntent} = await stripe.confirmCardPayment(
            '<?= $paymentIntent->client_secret; ?>', {
                payment_method: {
                    card: cardElement,
                },
            },
        );
        if(error) {
            addMessage(error.message);

            // Re-enable the form so the customer can resubmit.
            paymentForm.querySelector('button').disabled = false;
            return;
        }
        addMessage(`Payment (${paymentIntent.id}): ${paymentIntent.status}`);
    });
});
</script>