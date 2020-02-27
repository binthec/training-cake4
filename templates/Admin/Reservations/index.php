<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation[]|\Cake\Collection\CollectionInterface $reservations
 * @var \App\Model\Entity\Room[]|\Cake\Collection\CollectionInterface $rooms
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New Reservation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Reservations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('Room') ?></th>
                <th><?= __('Todays Reservations') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rooms as $room): ?>
                <tr>
                    <td><?= h($room->name) ?></td>
                    <td>
                        <?php if ($room->reservations): ?>
                            <?php foreach ($room->reservations as $reservation): ?>
                                <p>
                                    <a href="<?= $this->Url->build(['action' => 'edit', $reservation->id]) ?>">
                                        <?= $reservation->startTime ?>〜<?= $reservation->endTime ?>
                                    </a>
                                </p>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('add'), ['action' => 'add', $room->id]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
