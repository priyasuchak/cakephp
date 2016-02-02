<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Volunteer Activity Type T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="volunteerActivityTypeT form large-10 medium-9 columns">
    <?= $this->Form->create($volunteerActivityTypeT); ?>
    <fieldset>
        <legend><?= __('Add Volunteer Activity Type T') ?></legend>
        <?php
            echo $this->Form->input('Volunteer_ID');
            echo $this->Form->input('Volunteer_Application_ID');
            echo $this->Form->input('Activity_Type');
            echo $this->Form->input('Start_Particitpation_Date', array('empty' => true, 'default' => ''));
            echo $this->Form->input('End_Participation_Date', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
