function UpdateFormFileds() {
    document.getElementById("reg").value = "pippo";
    document.getElementById("org").value =
        "<?php echo isset($_POST['org']) ? $_POST['org'] : '' ?>";
}
