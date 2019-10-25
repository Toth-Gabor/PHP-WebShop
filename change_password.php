<?php
// core configuration
include_once "config/core.php";

$action = isset($_GET['action']) ? $_GET['action'] : "";

// set page title
$page_title = "Change Password";
// include page header HTML

include_once "layout_head.php";

// alert if passwords do not match
if($action == 'pw_not_match'){?>
    <script type="text/javascript">
        swal({title:'Warning', text:'Passwords do not match!', type:'warning', timer:1700});
    </script> <?php
}

$user_id = $_SESSION['user_id'];

?>
    <div class="form-horizontal list-border-background width-60-percent" role="form">
        <form action="update_password_in_db.php?id=<?= $user_id ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-md-3 control-label">New Password:</label>
                <div class="col-md-8">
                    <input type="password" name="new_pw" class="form-control" value="" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Confirm Password:</label>
                <div class="col-md-8">
                    <input type="password" name="confirm_pw" class="form-control" value="" required>
                </div>
            </div>
            <br><br>
            <div class="mdi-format-align-middle">
                <button type="submit" class="btn btn-info">
                    Save new password
                </button>
                <a href="profile.php?user_id=<?= $user_id ?>" class="btn btn-success">
                    Cancel
                </a>
            </div>
        </form>
    </div>

<?php
include_once "layout_foot.php";
