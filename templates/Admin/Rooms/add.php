<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="users form content">
            <?= $this->Form->create($room) ?>
            <fieldset>
                <legend><?= __('Add Room') ?></legend>
                <?= $this->Form->control('name'); ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
