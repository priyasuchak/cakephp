<div class="actions columns large-2 medium-3">
    <h5><?= __('The CEP Institute') ?></h5>
    <ul class="side-nav">	        
        <li><?= $this->Html->link(__('Home'), ['controller'=>'AdministratorT','action' => 'menuboard']) ?></li>             
    </ul>
</div>
<div class="ceApplicationT view large-10 medium-9 columns">
      
    <div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Update CEP Designee') ?></h4>    
     <?= $this->Form->create(); ?>
    <fieldset>
        
        <?php
          
            echo $this->Form->input('CEP  ID'); 
            echo $this->Form->input('Candidate  ID'); 
            echo $this->Form->input('First Name'); 
            echo $this->Form->input('Last Name');
            echo $this->Form->input('Display Name');
            echo $this->Form->input('Email id');
            echo $this->Form->input('Recertified');
           
            ?>          
          
    </fieldset>
    <?= $this->Form->end() ?>
 
    </div>
</div>
    
</div>


