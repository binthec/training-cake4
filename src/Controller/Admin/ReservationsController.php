<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AdminAppController as BaseController;
use Cake\I18n\Date;

class ReservationsController extends BaseController
{

    /**
     * initialize
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadModel('Rooms');

    }

    /**
     * index
     */
    public function index()
    {

        $rooms = $this->Rooms
            ->find()
            ->contain('Reservations');
        $this->set(compact('rooms'));

    }

    /**
     * 新規追加
     *
     * @param null $roomId
     * @return \Cake\Http\Response|null
     */
    public function add($roomId = null)
    {

        $reservation = $this->Reservations->newEmptyEntity();

        //roomIDの指定がある場合は、先に room_id をセット
        if ($roomId)
            $reservation->room_id = $roomId;

        //部屋セレクトボックス用
        $rooms = $this->Rooms->getList();

        if ($this->request->is('post')) {

            $data = $this->request->getData();
            $reservation = $this->Reservations->patchEntity($reservation, $data);

            //予約するユーザーはログインユーザーにする
            $reservation->user_id = $this->Authentication->getIdentity()->get('id');

            if ($this->Reservations->save($reservation)) {

                $this->Flash->success(__('{0}しました', __('予約完了')));
                return $this->redirect(['action' => 'index']);

            }

            $this->Flash->error(__('{0}出来ませんでした。時間を置いて、再度お試しください。', __('予約')));

        }

        $this->set(compact('reservation', 'rooms', 'room'));

    }

    /**
     * 編集
     *
     * @param $id
     * @return \Cake\Http\Response|null
     */
    public function edit($id)
    {

        $reservation = $this->Reservations->get($id);

        //部屋セレクトボックス用
        $rooms = $this->Rooms->getList();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());

            if ($this->Reservations->save($reservation)) {

                $this->Flash->success(__('{0}しました', __('予約の変更が完了')));
                return $this->redirect(['action' => 'index']);

            }

            $this->Flash->error(__('{0}出来ませんでした。時間を置いて、再度お試しください。', __('予約の変更が')));

        }

        $this->set(compact('reservation', 'rooms'));

    }


}
