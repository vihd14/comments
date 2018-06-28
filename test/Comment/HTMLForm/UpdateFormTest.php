<?php

namespace Vihd14\Comment\HTMLForm;

use PHPUnit\Framework\TestCase;
use Vihd14\Comment\Comment;

class UpdateFormTest extends TestCase
{
    protected $di;
    protected $form;

    public function setUp()
    {
        $this->di = new \Anax\DI\DIFactoryConfig(__DIR__."/../../test_di.php");
        $this->form = new UpdateForm($this->di, 1);
    }

    public function testGetItemDetails(): void
    {
        $this->assertObjectHasAttribute('email', $this->form->getItemDetails(1));
    }
}
