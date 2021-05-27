window.onload = function () {
    document.getElementById("reg").value =
        "<?php echo isset($_POST['reg']) ? $_POST['reg'] : '' ?>";
    document.getElementById("org").value =
        "<?php echo isset($_POST['org']) ? $_POST['org'] : '' ?>";
    console.log("in javascript");
};
