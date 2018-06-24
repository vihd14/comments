<?php

namespace Anax\View;

use \Anax\User\UserLoginForm;
use \Anax\Session\Session;

/**
 * View to display all comments.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

//Start Session
$session = new Session();

// Gather incoming variables and use default values if not set
$items = isset($items) ? $items : null;

// Create urls for navigation
$urlToCreate = url("comments/create");
// $urlToDelete = url("comments/delete");

?><h1>Kommentarer</h1>

<p>
    <a href="<?= $urlToCreate ?>">Skriv ny kommentar</a>
</p>

<?php if (!$items) : ?>
    <p>Inga kommentarer att visa...</p>
<?php
    return;
endif;

foreach ($items as $item) : ?>
    <div class="posted-comment">
        <p class="comment-id"><?= $item->id ?>.</p>
        <p>E-mail: <?= $item->email ?></p>
        <p class="comment-text"><?= $item->text ?></p>
        <?php if ($session->has("user") && $session->get("email") == $item->email || $session->get("user") == "admin") : ?>
            <a href="<?= url("comments/update/{$item->id}"); ?>">Redigera</a> |
            <a href="<?= url("comments/delete/{$item->id}"); ?>">Ta bort</a>
        
        <?php endif; ?>
    </div>
<?php endforeach;
