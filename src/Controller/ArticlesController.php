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

        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     *
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $article = $this->Articles->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('article'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEmptyEntity();
        $this->Authorization->authorize($article);

        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            /** @var \Authorization\Identity $authUser */
            $authUser = $this->request->getAttribute('identity');
            $article->user_id = $authUser->getIdentifier();

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Статья создана'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Не удалось создать статью. Попробуйте позже'));
        }
        $this->set(compact('article'));
    }

    /**
     * Edit method
     *
     * @param int|null $id Article id.
     *
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     */
    public function edit(int $id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($article);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity(
                $article,
                $this->request->getData(),
                ['accessibleFields' => ['user_id' => false]]
            );
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Статья обновлена'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Не удалось обновить статью. Попробуйте позже'));
        }
        $this->set(compact('article'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     *
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated([
            'index',
            'view',
        ]);
    }
}
