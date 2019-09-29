<?php
include_once "../services/simpleServices/SimpleOrderServices.php";

$services = new SimpleOrderServices();

$ordersList = $services->ReadAllOrders();
?>
<table class="table table-striped table-responsive-md btn-table">
<thead>
    <tr>
        <th>#</th>
        <th>Order Id</th>
        <th>User Id</th>
        <th>Status</th>
        <th>Date</th>
        <th>Read</th>
        <th>Delete</th>
    </tr>
</thead>

<tbody>
<?php
$row_count = 0;
foreach ($ordersList as $order){
    ++$row_count;

    ?>

    <tr>
        <td><span><?= $row_count ?></span></td>
        <td><span><?= $order->id ?></span></td>
        <td><span><?= $order->user_id ?></span></td>
        <td><span><?= $order->status ?></span></td>
        <td><span><?= $order->created_at ?></span></td>
        <td>
            <a href="../admin/one_order.php?id=<?= $order->id ?>" type="button" class="btn btn-info btn-sm m-0">Read</a>
        <td>
            <a href='' class='btn btn-danger btn-sm m-0'>Delete</a>
        </td>

    </tr>
<?php
}
?>
</tbody>

</table>