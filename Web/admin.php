
<?php

include_once "../Lib/helpers.php";
include_once "../Lib/helperslogin.php";
include_once "../View/Partials/head.php";
include_once "../View/Partials/navbar.php";
include_once "../View/Partials/menu.php";
echo "<div class='content-wrapper' id='container'>";

if (isset($_GET['modulo'])) {

  loadForms();
} else {
}
echo "</div>";

include_once "../View/Partials/footer.php";
?>
