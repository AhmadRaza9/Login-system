<?php
include "User_class.php";
include "includes/header.php";
?>

<h1>View All Users</h1>
<div class="user_section">

    <?php
$user = new User();
$user->ViewAllUsers();
$user->deleteUser();
?>
</div>
<?php include "includes/footer.php";?>
