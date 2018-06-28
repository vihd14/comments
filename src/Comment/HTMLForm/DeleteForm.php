<?php

namespace Vihd14\Comment\HTMLForm;

use \Anax\HTMLForm\FormModel;
use \Anax\DI\DIInterface;
use \Vihd14\Comment\Comment;

/**
 * Form to delete an item.
 */
class DeleteForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Anax\DI\DIInterface $di a service container
     */
    public function __construct(DIInterface $di, $id)
    {
        parent::__construct($di);
        $this->form->create(
            [
                "id" => __CLASS__,
                // "legend" => "Delete an item",
            ],
            [
                "select" => [
                    "type"        => "select",
                    "label"       => "",
                    "options"     => $this->getItem($id),
                ],

                "submit" => [
                    "type" => "submit",
                    "options"     => $this->getItem($id),
                    "value" => "Ta bort",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }



    /**
     * Get all items as array suitable for display in select option dropdown.
     *
     * @return array with key value of all items.
     */
    protected function getItem($id)
    {
        $comment = new Comment();
        $comment->setDb($this->di->get("db"));

        $comments = ["-1" => "Välj ett objekt..."];

        $obj = $comment->find("id", $id);
        $comments[$obj->id] = "{$obj->email} ({$obj->id})";

        // foreach ($comment->find("id", $id) as $obj) {
        //     $comments[$obj->id] = "{$obj->email} ({$obj->id})";
        // }

        return $comments;
    }



    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return boolean true if okey, false if something went wrong.
     */
    public function callbackSubmit()
    {
        $comment = new Comment();
        $comment->setDb($this->di->get("db"));
        $comment->find("id", $this->form->value("select"));
        $comment->delete();
        $this->di->get("response")->redirect("comments");
    }
}
