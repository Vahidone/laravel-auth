



<script>


    let alertMessage;

    function alertMessageTimeout() {
        setTimeout(() => {
            alertMessage = document.getElementById('alert-message');

            if (alertMessage) {
                alertMessage.classList.add("hide");
            }
        }, 3000);
    }


    alertMessageTimeout();
</script>
