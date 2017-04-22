<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sessions Controller
 *
 * @property \App\Model\Table\SessionsTable $Sessions
 */
class SessionsController extends AppController
{

    private $paginator=array(
        'maxLimit' => 25
    );

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        
        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'edit', 'view', 'delete'])) {
            return true;
        }
        
        // All other actions require an id.
        if (!$this->request->getParam('pass.0')) {
            return false;
        }
        
        return parent::isAuthorized($user);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $sessions = $this->paginate($this->Sessions, $this->paginator);

        $this->set(compact('sessions'));
        $this->set('_serialize', ['sessions']);
    }

    /**
     * View method
     *
     * @param string|null $id Session id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $session = $this->Sessions->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('session', $session);
        $this->set('_serialize', ['session']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    /*public function add()
    {
        $session = $this->Sessions->newEntity();
        if ($this->request->is('post')) {
            $session = $this->Sessions->patchEntity($session, $this->request->getData());
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('The session has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The session could not be saved. Please, try again.'));
        }
        $users = $this->Sessions->Users->find('list', ['limit' => 200]);
        $this->set(compact('session', 'users'));
        $this->set('_serialize', ['session']);
    }*/

    /**
     * Edit method
     *
     * @param string|null $id Session id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->Sessions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $session = $this->Sessions->patchEntity($session, $this->request->getData());
            
            /* remove readonly fields from array */
            unset($session->device);
            unset($session->ip);
            unset($session->ap);
            unset($session->lastlog);
            unset($session->browser);
            unset($session->os);
            unset($session->user_id);
            /* end EMA code */
            
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('The session has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The session could not be saved. Please, try again.'));
        }
        $users = $this->Sessions->Users->find('list', ['limit' => 200]);
        $this->set(compact('session', 'users'));
        $this->set('_serialize', ['session']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Session id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $session = $this->Sessions->get($id);
        if ($this->Sessions->delete($session)) {
            $this->Flash->success(__('The session has been deleted.'));
        } else {
            $this->Flash->error(__('The session could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
