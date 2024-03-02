<?php
App::uses('AppModel', 'Model');

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    const DELETED_YES = 1;
    const DELETED_NO = 0;
    public $deletedField="deleted";

    public $softDelete = true;

    public $validate = array(
        'firstname' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Please enter your first name'
            ),
            'onlyalphabet' => array(
                'rule' => 'isAlphabet',
                'message' => 'Please enter only alphabets in first name'
            )
        ),
        'lastname' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Please enter your first name'
            ),
        ),
        
        'email' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Please enter your email address'
            ),
            'unique' => array(
                'rule' => array('isUniqueEmail', 'email'),
                'message' => 'This email address is already registered'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A password is required'
            )
        ),
        'contactnumber' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Please enter your contact number'
            ),
        ),
        'address' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Please enter your address'
            ),
        ),
        'state' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Please enter your state'
            ),
        ),
    );

    public function isUniqueEmail($check, $emailField) {
        $conditions = array(
            $emailField => $this->data[$this->alias][$emailField],
            'id' => array('id' => $this->data[$this->alias]['id'] // Exclude the current user being edited
            )
        );
        return $this->isUnique($conditions);
    }

    public function isAlphabet($check){
        $value = array_values($check);
        $value = $value[0];
        return preg_match('|^[a-zA-Z]*$|', $value);
    }

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }

    public function afterFind($results, $primary = false) {
        if ($this->softDelete && !$primary) {
            foreach ($results as $key => $val) {
                if (isset($val[$this->alias][$this->deletedField]) && $val[$this->alias][$this->deletedField] == self::DELETED_YES) {
                    unset($results[$key]);
                }
            }
        }
        return $results;
    }
    public function softDelete($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid id'));
        }
        $this->id = $id;
        return $this->saveField($this->deletedField, self::DELETED_YES);

    }
}