<?php

namespace Anax\View;

use \Anax\User\UserLoginForm;
use \Anax\Session\Session;

/**
 * View to create a new comment.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

//Start Session
$session = new Session();

// Gather incoming variables and use default values if not set
$items = isset($items) ? $items : null;

// Create urls for navigation
$urlToLogin = url("user/login");
$urlToViewItems = url("comments");

?><h1>Skriv en kommentar</h1>

<?php if ($session->has("user")) : ?>
    <?= $form ?>
<?php else : ?>
    <p>Du måste <a href="<?= $urlToLogin ?>">logga in</a> för att kunna kommentera.</p>
<?php
    return;
endif; ?>
