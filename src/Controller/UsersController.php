<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
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
     * @return \Cake\Http\Response|void|null
     */
    public function register()
    {
        $this->Authorization->skipAuthorization();

        $result = $this->Authentication->getResult();
        /** @var \App\Model\Entity\User $authUser */
        $authUser = $result->getData();
        if ($result->isValid() && $authUser->is_admin) {
            return $this->redirect('/');
        }

        $user = $this->Users->newEmptyEntity();
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
        $this->set(compact('user'));
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

    public function logout(): ?Response
    {
        $this->Authorization->skipAuthorization();

        $this->Authentication->logout();
        return $this->redirect(['action' => 'login']);
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['login', 'register']);
    }
}
