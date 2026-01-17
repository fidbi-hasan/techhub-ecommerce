<?php
require_once 'models/User.php';

function handleProfileUpdate() {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id    = $_SESSION['user_id'];
        $name  = trim($_POST['name']);
        $email = trim($_POST['email']);

        if ($name === '' || $email === '') {
            die("All fields required");
        }

        $imageName = null;

        if (!empty($_FILES['profile_image']['name'])) {
            $imageName = time() . '_' . $_FILES['profile_image']['name'];
            move_uploaded_file(
                $_FILES['profile_image']['tmp_name'],
                'uploads/profiles/' . $imageName
            );
        }

        updateUserProfile($id, $name, $email, $imageName);

        // update session name for navbar/dashboard
        $_SESSION['name'] = $name;

        if ($imageName) {
          $_SESSION['profile_image'] = $imageName;
        }      

        header("Location: index.php?action=profile");
        exit;
    }
}
