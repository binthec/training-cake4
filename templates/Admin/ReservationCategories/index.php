<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReservationCategory[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Reservation Categories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($categories as $cate): ?>
                <tr>
                    <td><?= $this->Number->format($cate->id) ?></td>
                    <td><?= h($cate->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cate->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cate->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
