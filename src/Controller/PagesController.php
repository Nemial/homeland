<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class PagesController extends AppController
{
    public function main()
    {
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['main']);
    }
}
