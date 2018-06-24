<?php

namespace Vihd14\Comment\HTMLForm;

use \Anax\HTMLForm\FormModel;
use \Anax\DI\DIInterface;
use \Anax\Comment\Comment;

/**
 * Form to update an item.
 */
class UpdateForm extends FormModel
{
    /**
     * Constructor injects with DI container and the id to update.
     *
     * @param Anax\DI\DIInterface $di a service container
     * @param integer             $id to update
     */
    public function __construct(DIInterface $di, $id)
    {
        parent::__construct($di);
        $comment = $this->getItemDetails($id);
        $this->form->create(
            [
                "id" => __CLASS__,
                // "legend" => "Update details of the item",
            ],
            [
                "id" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                    "readonly" => true,
                    "value" => $comment->id,
                ],

                "email" => [
                    "type" => "text",
                    "label" => "E-mail:",
                    "validation" => ["not_empty"],
                    "value" => $comment->email,
                ],

                "text" => [
                    "type" => "textarea",
                    "label" => "Kommentar:",
                    "validation" => ["not_empty"],
                    "value" => $comment->text,
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Spara",
                    "callback" => [$this, "callbackSubmit"]
                ],

                "reset" => [
                    "type"      => "reset",
                    "value"     => "Återställ"
                ],
            ]
        );
    }



    /**
     * Get details on item to load form with.
     *
     * @param integer $id get details on item with id.
     *
     * @return Comment
     */
    public function getItemDetails($id)
    {
        $comment = new Comment();
        $comment->setDb($this->di->get("db"));
        $comment->find("id", $id);
        return $comment;
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
        $comment->find("id", $this->form->value("id"));
        $comment->email = $this->form->value("email");
        $comment->text = $this->form->value("text");
        $comment->save();
        $this->di->get("response")->redirect("comments");
    }
}
