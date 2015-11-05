
</div>
<div class="clearfix"></div>
<?php
if (isset($jss)) {
    foreach ($jss as $js) {
        echo '<script type="text/javascript" src="' . $js . '"></script>
';
    }
}
?>
<script type="text/javascript">
    $(function () {
        $('.dropdown-toggle').dropdown();
        $('.help').popover();
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();
    });
</script>
</body>
</html>
