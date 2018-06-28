<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "htmlform" => [
            "shared" => true,
            "callback" => function () {
                $htmlform = new \Anax\HTMLForm\FormModel();
                $htmlform->setDI($this);
                return $htmlform;
            }
        ],
        "db" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Database\DatabaseQueryBuilder();
                $obj->configure("database.php");
                return $obj;
            }
        ],
        "commentController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Vihd14\Comment\CommentController();
                $obj->setDI($this);
                return $obj;
            }
        ],
    ],
];
