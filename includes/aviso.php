<?php

session_start();
if(isset($_SESSION['mensagem'])) { ?>
    <script>
    window.onload = function() {
        M.toast({html: '<?php echo $_SESSION['mensagem']?>', classes: 'rounded <?php echo $_SESSION['tipo']?>'});
    };
    </script>
<?php
}
session_unset();


?>