<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Http\Response;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return void Renders view
     */
    public function index(): void
    {
        $this->Authorization->authorize($this->Users);
        $users = $this->paginate($this->Users, ['maxLimit' => 9, 'order' => ['Users.id' => 'asc']]);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param int|null $id User id.
     *
     * @return void Renders view
     */
    public function view(int $id = null): void
    {
        $user = $this->Users->get($id, [
            'contain' => 'Groups',
        ]);
        $this->Authorization->authorize($user);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        $this->Authorization->authorize($user);

        if ($this->request->is('post')) {
            $userData = $this->request->getData();
            $query = $this->Users->findByEmail($userData['email']);
            if ($query->count() !== 0) {
                $this->Flash->error(__('Пользователь с такой почтой уже существует'));
                return $this->redirect(['action' => 'add']);
            }

            $user = $this->Users->patchEntity($user, $userData);

            $defaultGroup = $this->Users->Groups->findByName('user')->firstOrFail();
            $user->groups = [$defaultGroup];

            if ($this->Users->save($user)) {
                $this->Flash->success(__('Пользователь создан'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Произошла ошибка при сохранении. Попробуйте позже'));
        }

        $groups = $this->Users->Groups->find('list')->all();
        $this->set(compact('user', 'groups'));
    }

    /**
     *
     * method
     *
     * @param int|null $id User id.
     *
     * @return Response|null|void Redirects on successful edit, renders view otherwise.
     */
    public function edit(int $id = null)
    {
        $user = $this->Users->get($id, ['contain' => 'Groups']);
        $this->Authorization->authorize($user);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Пользователь обновлён'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Произошла ошибка при обновлении. Попробуйте позже'));
        }

        $groups = $this->Users->Groups->find('list')->all();
        $this->set(compact('user', 'groups'));
    }

    /**
     * Delete method
     *
     * @param int|null $id User id.
     *
     * @return Response|null|void Redirects to index.
     */
    public function delete(int $id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $this->Authorization->authorize($user);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Пользователь удалён'));
        } else {
            $this->Flash->error(__('Пользователь не может быть удалён. Попробуйте позже'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
