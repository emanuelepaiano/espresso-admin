<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sessions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Session get($primaryKey, $options = [])
 * @method \App\Model\Entity\Session newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Session[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Session|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Session patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Session[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Session findOrCreate($search, callable $callback = null, $options = [])
 */
class SessionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('sessions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('device', 'create')
            ->notEmpty('device')
            ->add('device', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('ip', 'create')
            ->notEmpty('ip');

        $validator
            ->requirePresence('ap', 'create')
            ->notEmpty('ap');

        $validator
            ->dateTime('lastlog')
            ->requirePresence('lastlog', 'create')
            ->notEmpty('lastlog');

        $validator
            ->dateTime('expire')
            ->requirePresence('expire', 'create')
            ->notEmpty('expire');

        $validator
            ->dateTime('remove')
            ->requirePresence('remove', 'create')
            ->notEmpty('remove');

        $validator
            ->requirePresence('browser', 'create')
            ->notEmpty('browser');

        $validator
            ->requirePresence('os', 'create')
            ->notEmpty('os');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['device']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
