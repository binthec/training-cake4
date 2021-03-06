<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Routing\Router;
use Cake\Validation\Validator;

class ReservationsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');

        /**
         * アソシエーション
         */
        $this->belongsTo('ReservationCategories');
        $this->belongsTo('Rooms');
        $this->belongsTo('Users');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        return $validator;
    }

    /**
     * beforeSave
     *
     * @param $event
     * @param $entity
     * @param $options
     * @throws \Exception
     */
    public function beforeSave($event, $entity, $options)
    {

        $request = Router::getRequest();
        $data = $request->getData();

        //オブジェクトにしてあげないと良きに計らってくれないようなので
        $entity->start = new \DateTime($data['start']);
        $entity->end = new \DateTime($data['end']);

        $userId = $request->getSession()->read('Auth.id');

        //予約するユーザーはログインユーザーにする
        $entity->user_id = $userId;

    }
}
