<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Volunteer Interest T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="volunteerInterestT form large-10 medium-9 columns">
    <?= $this->Form->create($volunteerInterestT); ?>
    <fieldset>
        <legend><?= __('Add Volunteer Interest T') ?></legend>
        <?php
            echo $this->Form->input('Volunteer_ID');
            echo $this->Form->input('Interest_Type');
            echo $this->Form->input('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
