<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\User;
use App\Model\Table\UsersTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Event\EventInterface;
use Cake\Http\Response;

/**
 * Users Controller
 *
 * @property UsersTable $Users
 * @method User[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->authorize($this->Users);
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     *
     * @return Response|null|void Renders view
     * @throws RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
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
        $this->Authorization->skipAuthorization();

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $userData = $this->request->getData();
            $query = $this->Users->findByEmail($userData['email']);
            if ($query->count() !== 0) {
                $this->Flash->error(__('Пользователь с такой почтой уже существует'));
                return $this->redirect(['action' => 'add']);
            }

            $user = $this->Users->patchEntity($user, $userData);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Пользователь создан'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Произошла ошибка при сохранении. Попробуйте позже'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     *
     * @return Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        $this->Authorization->authorize($user);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     *
     * @return Response|null|void Redirects to index.
     * @throws RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $this->Authorization->authorize($user);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->Authorization->skipAuthorization();
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/';
            return $this->redirect($target);
        }
        if ($this->request->is('post')) {
            $this->Flash->error('Неправильные имя или пароль');
        }
    }

    public function logout()
    {
        $this->Authorization->skipAuthorization();

        $this->Authentication->logout();
        return $this->redirect(['action' => 'login']);
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['login', 'add']);
    }
}
