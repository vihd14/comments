<?php

namespace Vihd14\Comment;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;
use \Vihd14\Comment\HTMLForm\CreateForm;
use \Vihd14\Comment\HTMLForm\EditForm;
use \Vihd14\Comment\HTMLForm\DeleteForm;
use \Vihd14\Comment\HTMLForm\UpdateForm;

/**
 * A controller class.
 */
class CommentController implements
    ConfigureInterface,
    InjectionAwareInterface
{
    use ConfigureTrait,
        InjectionAwareTrait;

    /**
     * @var $data description
     */
    //private $data;



    /**
     * Show all items.
     *
     * @return void
     */
    public function getIndex()
    {
        $title      = "Comments - Viza's page";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $comment = new Comment();
        $comment->setDb($this->di->get("db"));

        $data = [
            "items" => $comment->findAll(),
        ];

        $view->add("comments/comments", $data);

        $pageRender->renderPage(["title" => $title]);
    }



    /**
     * Handler with form to create a new item.
     *
     * @return void
     */
    public function getPostCreateItem()
    {
        $title      = "Lägg till kommentar";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new CreateForm($this->di);

        $form->check();

        $data = [
            "form" => $form->getHTML(),
        ];

        $view->add("comments/create", $data);

        $pageRender->renderPage(["title" => $title]);
    }



    /**
     * Handler with form to delete an item.
     *
     * @return void
     */
    public function getPostDeleteItem($id)
    {
        $title      = "Ta bort kommentar";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new DeleteForm($this->di, $id);

        $form->check();

        $data = [
            "form" => $form->getHTML(),
        ];

        $view->add("comments/delete", $data);

        $pageRender->renderPage(["title" => $title]);
    }



    /**
     * Handler with form to update an item.
     *
     * @return void
     */
    public function getPostUpdateItem($id)
    {
        $title      = "Uppdatera kommentar";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new UpdateForm($this->di, $id);

        $form->check();

        $data = [
            "form" => $form->getHTML(),
        ];

        $view->add("comments/update", $data);

        $pageRender->renderPage(["title" => $title]);
    }
}
