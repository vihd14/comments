<?php

namespace Anax\View;

/**
 * View to update a comment.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

// Gather incoming variables and use default values if not set
$item = isset($item) ? $item : null;

?><h1>Updatera kommentar</h1>

<?= $form ?>
