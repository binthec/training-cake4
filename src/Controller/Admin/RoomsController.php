<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AdminAppController as BaseController;

class RoomsController extends BaseController
{


    /**
     * index
     */
    public function index()
    {

        $rooms = $this->Rooms->find();
        $this->set(compact('rooms'));

    }

    /**
     * 新規追加
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {

        $room = $this->Rooms->newEmptyEntity();

        if ($this->request->is('post')) {

            $room = $this->Rooms->patchEntity($room, $this->request->getData());

            if ($this->Rooms->save($room)) {

                $this->Flash->success(__('{0}しました', __('保存')));
                return $this->redirect(['action' => 'index']);

            }

            $this->Flash->error(__('{0}出来ませんでした。時間を置いて、再度お試しください。', __('保存')));

        }

        $this->set(compact('room'));

    }


}
