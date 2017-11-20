<?php
/**
 * アラート
 */
?>

<?php if (!empty($alert)): ?>
<?= $this->Element(sprintf('alert.%s'), $alert)?>
<?php endif; ?>
