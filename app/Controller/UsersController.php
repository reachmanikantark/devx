<?php
App::uses('AppController', 'Controller');

use App\Model\Entity\User;

class UsersController extends AppController
{
    public $layout = "frontend";
    public $loginId='';
    public $components = array('Session', 'Paginator');
    public $paginate = array(
        'limit' => 4,
        'conditions' => array('User.deleted' => '0'),
        'order' => array(
            'User.id' => 'asc',
        ),
    );

    //States Array
    public $statesArray = array(
        'AN' => 'Andaman and Nicobar Islands',
        'AP' => 'Andhra Pradesh',
        'AR' => 'Arunachal Pradesh',
        'AS' => 'Assam',
        'BR' => 'Bihar',
        'CH' => 'Chandigarh',
        'CT' => 'Chhattisgarh',
        'DN' => 'Dadra and Nagar Haveli',
        'DD' => 'Daman and Diu',
        'DL' => 'Delhi',
        'GA' => 'Goa',
        'GJ' => 'Gujarat',
        'HR' => 'Haryana',
        'HP' => 'Himachal Pradesh',
        'JK' => 'Jammu and Kashmir',
        'JH' => 'Jharkhand',
        'KA' => 'Karnataka',
        'KL' => 'Kerala',
        'LD' => 'Ladakh',
        'LA' => 'Lakshadweep',
        'MP' => 'Madhya Pradesh',
        'MH' => 'Maharashtra',
        'MN' => 'Manipur',
        'ML' => 'Meghalaya',
        'MZ' => 'Mizoram',
        'NL' => 'Nagaland',
        'OR' => 'Odisha',
        'PY' => 'Puducherry',
        'PB' => 'Punjab',
        'RJ' => 'Rajasthan',
        'SK' => 'Sikkim',
        'TN' => 'Tamil Nadu',
        'TS' => 'Telangana',
        'TR' => 'Tripura',
        'UP' => 'Uttar Pradesh',
        'UK' => 'Uttarakhand',
        'WB' => 'West Bengal',
    );

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('signup', 'login');
    }
    public function beforeRender()
    {
        parent::beforeRender();
        $sessionValue = $this->Session->read('Auth.User.id');
        $this->set('loginId', $sessionValue ? $sessionValue : '');
    }
    // To dispaly the Users List
    public function index()
    {
        if (!$this->Session->check('Auth.User')) {
            return $this->redirect(['controller' => 'Users', 'action' =>  'login']);
        }

        $this->Paginator->settings = $this->paginate;

        $data = $this->Paginator->paginate('User');
        $this->set('users', $data);
        $this->set('statesArray', $this->statesArray);
        $this->set('isadmin', $this->Session->read('Auth.User.is_admin'));
       // $this->set('loginId',$this->Session->read('Auth.User.id'));
    }

    public function signup()
    {

        if ($this->Session->check('Auth.User')) {
            return $this->redirect(['controller' => 'Users', 'action' =>  'index']);
        }

        /*  
        //Direct Submission with out using Ajax
        
        if ($this->request->is('post')) {
        $this->User->create();
        if ($this->User->save($this->request->data)) {
        $this->Flash->success(__('The user has been saved'));
        return $this->redirect(array('action' => 'login'));
        }
        $this->Flash->error(
        __('The user could not be saved. Please, try again.')
        );
        }*/

        //Ajax Submission 
        $this->set('statesArray', $this->statesArray);
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if ($this->checkEmail()) {
                echo json_encode(array('status' => 'error', 'message' => 'This email address is already registered'));
            } else {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Flash->success(__('User Created Successfully'));
                    $this->login(); // Login automatically
                } else {
                    echo json_encode(array('status' => 'error', 'message' => 'The user could not be saved. Please, try again.'));
                }
            }
        }
    }

    // Edit User Method
    public function edit($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if ($this->checkEmail()) {
                echo json_encode(array('status' => 'error', 'message' => 'This email address is already registered'));
            } else {

                if ($this->User->save($this->request->data)) {
                    $this->Flash->success(__('User Updated Successfully'));
                    echo json_encode(array('status' => 'success', 'redirect' => $this->webroot . 'users/index'));
                } else {
                    echo json_encode(array('status' => 'error', 'message' => 'The user could not be saved. Please, try again.'));
                }
            }
        } else {
            $this->set('statesArray', $this->statesArray);
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }

        /*
                // Direct Edit update code
            if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
            $this->Flash->success(__('The user has been saved'));
            return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
            __('The user could not be saved. Please, try again.')
            );
            } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
            }*/
    }

    public function login()
    {
        /* if ($this->request->is('post')) {
        if ($this->Auth->login()) {
        return $this->redirect($this->Auth->redirectUrl());
        } else {
        $this->Flash->error(__('Invalid username or password'));

        }
        }*/

        if ($this->Session->check('Auth.User')) {
            return $this->redirect(['controller' => 'Users', 'action' =>  'index']);
        }

        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            //  print_r($this->request->data);
            $username = $this->request->data['User']['email'];
            $password = $this->request->data['User']['password'];
            if ($this->Auth->login()) {
                echo json_encode(array('status' => 'success', 'redirect' => $this->webroot . 'users/index')); // Redirect URL after successful login
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Invalid username or password.'));
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function delete($id = null)
    {
        if ($this->request->is('post')) {
            $this->User->id = $id;
            if (!$this->User->exists()) {
                $this->Flash->error(__('User not exist'));
                return $this->redirect(array('action' => 'index'));
            } else {
                if ($this->User->softDelete($id)) {
                    $this->Flash->success(__('User Delete Successfully'));
                    // $this->Session->setFlash('User Delete Successfully', 'success');
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Flash->error(__('User was not deleted'));
                // $this->Session->setFlash('User was not deleted', 'error');
                return $this->redirect(array('action' => 'index'));
            }
        }  else {
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function checkEmail()
    {
        // Email validation 
        $this->autoRender = false;
        $this->layout = 'ajax';
        if ($this->request->is('ajax')) {
            $email = $this->request->data['User']['email'];

            // Check if the email already exists in the database
            $userExists = $this->User->find('first', array(
                'conditions' => array('User.email' => $email, 'User.id !=' => $this->data['User']['id']),
            ));

            if ($userExists) {
                return true;
            } else {
                return false;
            }
        }
    }
}
