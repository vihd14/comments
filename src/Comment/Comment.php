<?php

namespace Anax\Comment;

use \Anax\Database\ActiveRecordModel;

/**
 * A database driven model.
 */
class Comment extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Comments";

    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $email;
    public $text;
}
