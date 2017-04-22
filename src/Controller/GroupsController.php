<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 */
class GroupsController extends AppController
{

    private $paginator=array(
        'maxLimit' => 25
    );

    
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        
        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'edit', 'view', 'add', 'delete'])) {
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
    }


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $groups = $this->paginate($this->Groups, $this->paginator);

        $this->set(compact('groups'));
        $this->set('_serialize', ['groups']);
    }

    /**
     * View method
     *
     * @param string|null $id Group id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('group', $group);
        $this->set('_serialize', ['group']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $group = $this->Groups->newEntity();
        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        $this->set(compact('group'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
             if ($group->name=='guest' || $group->id==3){
                unset($group->name);
             } 
                if ($this->Groups->save($group)) {
                    $this->Flash->success(__('The group has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        $this->set(compact('group'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($group->name=='guest' || $group->id==2) {
                $this->Flash->error(__('This group cannot not be deleted.'));
                return false;
        }
        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('The group has been deleted.'));
        } else {
            $this->Flash->error(__('The group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
