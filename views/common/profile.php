<?php
require_once 'controllers/auth_guard.php';
require_once 'models/User.php';
include 'views/common/header.php';

$user = getUserById($_SESSION['user_id']);
?>

<div class="container">
    <h2>My Profile</h2>

    <form method="POST" enctype="multipart/form-data" class="form-box">

        <?php if ($user['profile_image']): ?>
            <img src="uploads/profiles/<?php echo $user['profile_image']; ?>"
                 width="120" style="margin-bottom:15px;border-radius:50%;">
        <?php endif; ?>

        <label>Name</label>
        <input type="text" name="name"
               value="<?php echo htmlspecialchars($user['name']); ?>">

        <label>Email</label>
        <input type="email" name="email"
               value="<?php echo htmlspecialchars($user['email']); ?>">

        <label>Profile Image</label>
        <input type="file" name="profile_image">

        <button type="submit">Update Profile</button>
    </form>
</div>

<?php include 'views/common/footer.php'; ?>
