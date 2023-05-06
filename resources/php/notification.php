<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var successMessage = document.getElementById("success-message");
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.display = "none";
            }, 5000);
        }
    });
</script>
