<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="users form content">
            <?= $this->Form->create($reservation) ?>
            <fieldset>
                <legend><?= __('Edit Reservation') ?></legend>
                <?= $this->Form->control('room_id'); ?>
                <?= $this->Form->control('start', ['type' => 'text']); ?>
                <?= $this->Form->control('end', ['type' => 'text']); ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
