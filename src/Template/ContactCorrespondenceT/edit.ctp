<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contactCorrespondenceT->Contact_Correspondence_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contactCorrespondenceT->Contact_Correspondence_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Contact Correspondence T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="contactCorrespondenceT form large-10 medium-9 columns">
    <?= $this->Form->create($contactCorrespondenceT); ?>
    <fieldset>
        <legend><?= __('Edit Contact Correspondence T') ?></legend>
        <?php
            echo $this->Form->input('Contact_ID');
            echo $this->Form->input('Correspondence_Type');
            echo $this->Form->input('Correspondence_Date', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Correspondence_Time');
            echo $this->Form->input('Subject');
            echo $this->Form->input('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
