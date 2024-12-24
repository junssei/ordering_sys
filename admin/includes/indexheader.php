<?php
$id = $_SESSION['admidID'];
$sql = "SELECT * FROM admin WHERE admin_id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<div id="header">
    <div id="header_left">
        <img src="../source/images/icon/svg/menu.svg" alt="hamburger_icon">
    </div>
    <div id="header_right">
        <div id="notification">
            <img src="../source/images/icon/svg/notification.svg" alt="notification">
        </div>
        <div id="user_profile">
            <div id="userimg">
                <img src="../source/images/upload/profile/default.jpg" alt="avatar">
            </div>
            <div id="userpfp">
                <div id="userpfp_info">
                    <img src="../source/images/upload/profile/default.jpg" alt="avatar">
                    <div>
                        <p id="username"> <?php echo $row['username']; ?> </p>
                        <p id="userrole"> <?php echo $row['role']; ?> </p>
                    </div>
                </div>
                <div id="userpfp_actions">
                    <a href=""> Edit Profile </a>
                </div>
            </div>
        </div>
    </div>
</div>