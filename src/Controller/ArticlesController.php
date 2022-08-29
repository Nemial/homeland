<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();

        $articles = $this->paginate($this->Articles->find('all', ['contain' => 'Users']));

        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param int|null $id Article id.
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function view(int $id = null)
    {
        $this->Authorization->skipAuthorization();
        $article = $this->Articles->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('article'));
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['index', 'view']);
    }
}
