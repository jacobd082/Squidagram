<?php
    file_put_contents('../data/sys/allow-uploads', $_GET['set']);
    echo "Set to: ".file_get_contents('../data/sys/allow-uploads');
?>