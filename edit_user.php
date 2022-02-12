<?php
include "User_class.php";
$user = new User();
$user->UpdateUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php $user->editUser();?>

<script>

$enterNewPassword = document.querySelector('.enter_new_password');
$passField = document.querySelector('.password');

$enterNewPassword.addEventListener('click', e => {
    $passField.classList.remove('hidden');
    $enterNewPassword.classList.add('hidden');
});

</script>

</body>
</html>
