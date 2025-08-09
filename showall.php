<?php
// Redirect to new unified showall system
$type = 'a'; // Default type for original showall.php
header("Location: showall_unified.php?type=" . $type);
exit;
?>