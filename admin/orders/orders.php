<?php
$page_title="Orders";

include_once "../../config/core.php";

// must be logged in as admin!
$require_login = true;

include "../../logger/login_checker.php";

include_once "../admin_layout_head.php";

include_once "../../layout_foot.php";

$action = isset($_GET['action']) ? $_GET['action'] : "";

// alert if order was deleted
if($action=='deleted') {?>

    <script type="text/javascript">
        swal({title: 'Deleted', text: 'The selected order has been Deleted!', type: 'info', timer: 1800});
    </script> <?php
}

if ($action=='error') {?>

    <script type="text/javascript">
        swal({title: 'Error', text: 'The selected order has NOT been Deleted!', type: 'error', timer: 1800});
    </script> <?php
}

if($action=='processed') {?>

    <script type="text/javascript">
        swal({title: 'Processed', text: 'The selected order has been Processed!', type: 'info', timer: 1800});
    </script> <?php
}

echo "<div class='container'>";

include_once "all_orders_template.php";

echo "</div>";

