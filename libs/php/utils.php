<?php
class Utils{

    public function PopUp($header, $message, $footer, $color){?>
        <script type="text/javascript">
            var head = <?php echo json_encode(header)?>;

            swal(head, 'This item has been added to <b style="color:green;">Cart!</b>', 'success');
        </script>
    <?php
    }
}
