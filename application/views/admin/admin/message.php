<?php if (!defined('BASEPATH')) { exit('No direct script access allowed'); } ?>

<?php if (isset($message)) { ?>
<div class="nNote nInformation hideit">
    <p><strong>INFORMATION: </strong><?php echo $message; ?></p>
</div>
<?php } ?>
