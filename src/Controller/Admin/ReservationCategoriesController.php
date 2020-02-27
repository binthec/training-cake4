<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AdminAppController as BaseController;

class ReservationCategoriesController extends BaseController
{

    /**
     * initialize
     */
    public function initialize(): void
    {
        parent::initialize();
    }

    /**
     * index
     */
    public function index()
    {

        $categories = $this->ReservationCategories->find();
        $this->set(compact('categories'));

    }

    /**
     * 新規追加
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {

        $category = $this->ReservationCategories->newEmptyEntity();

        if ($this->request->is('post')) {

            $reservation = $this->ReservationCategories->patchEntity($category, $this->request->getData());

            if ($this->ReservationCategories->save($reservation)) {

                $this->Flash->success(__('{0}しました', __('登録')));
                return $this->redirect(['action' => 'index']);

            }

            $this->Flash->error(__('{0}出来ませんでした。時間を置いて、再度お試しください。', __('登録')));

        }

        $this->set(compact('category'));

    }

    /**
     * 編集
     *
     * @param $id
     * @return \Cake\Http\Response|null
     */
    public function edit($id)
    {

        $category = $this->ReservationCategories->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $category = $this->ReservationCategories->patchEntity($category, $this->request->getData());

            if ($this->ReservationCategories->save($category)) {

                $this->Flash->success(__('{0}しました', __('変更が完了')));
                return $this->redirect(['action' => 'index']);

            }

            $this->Flash->error(__('{0}出来ませんでした。時間を置いて、再度お試しください。', __('変更')));

        }

        $this->set(compact('category'));

    }


}
