<?php
require_once dirname(__FILE__).'/common/header.php';
?>
<div id="app">{{message}}</div>
<script type="text/javascript">
    var app = new Vue({
        el : "#app",
        data:{
            message: "Страница не существует"
        }
    });
</script>