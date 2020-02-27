<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReservationCategory $category
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="users form content">
            <?= $this->Form->create($category) ?>
            <fieldset>
                <legend><?= __('Add Reservation Category') ?></legend>
                <?= $this->Form->control('name'); ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
