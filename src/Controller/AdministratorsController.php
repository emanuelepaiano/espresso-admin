<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Administrators Controller
 *
 * @property \App\Model\Table\AdministratorsTable $Administrators
 */
class AdministratorsController extends AppController
{

    private $paginator=array(
        'maxLimit' => 25
    );

    
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        
        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'edit', 'add', 'view', 'delete'])) {
            return true;
        }
        
        // All other actions require an id.
        if (!$this->request->getParam('pass.0')) {
            return false;
        }
        
        return parent::isAuthorized($user);
    }
    
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->Auth->allow(['logout']);
    }
    
    
    public function login()
    {
        if ($this->request->is('post')) {
            $administrator = $this->Auth->identify();
        if ($administrator) {
            $this->Auth->setUser($administrator);
            return $this->redirect($this->Auth->redirectUrl());
        }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }
    
    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
    
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $administrators = $this->paginate($this->Administrators, $this->paginator);

        $this->set(compact('administrators'));
        $this->set('_serialize', ['administrators']);
    }

    /**
     * View method
     *
     * @param string|null $id Administrator id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $administrator = $this->Administrators->get($id, [
            'contain' => []
        ]);

        $administrators = $this->Administrators->find('all')->all();
        
        $this->set('administrator', $administrator);
        $this->set('_serialize', ['administrator']);
        $this->set('administrators', $administrators);
        $this->set('_serialize', ['administrators']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $administrator = $this->Administrators->newEntity();
        if ($this->request->is('post')) {
            $administrator = $this->Administrators->patchEntity($administrator, $this->request->getData());
            if ($this->Administrators->save($administrator)) {
                $this->Flash->success(__('The administrator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The administrator could not be saved. Please, try again.'));
        }
        $this->set(compact('administrator'));
        $this->set('_serialize', ['administrator']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Administrator id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $administrator = $this->Administrators->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $administrator = $this->Administrators->patchEntity($administrator, $this->request->getData());
            if ($this->Administrators->save($administrator)) {
                $this->Flash->success(__('The administrator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The administrator could not be saved. Please, try again.'));
        }
        
        $administrators = $this->Administrators->find('all')->all();
        
        $this->set(compact('administrator'));
        $this->set('_serialize', ['administrator']);
        $this->set(compact('administrators'));
        $this->set('_serialize', ['administrators']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Administrator id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $administrator = $this->Administrators->get($id);
        $administrators = $this->Administrators->find('all')->all();
        
        if (count($administrators)==1) $this->Flash->error(__('The administrator could not be deleted. Please, try again.'));
        
        if ($this->Administrators->delete($administrator)) {
            $this->Flash->success(__('The administrator has been deleted.'));
        } else {
            $this->Flash->error(__('The administrator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
}
