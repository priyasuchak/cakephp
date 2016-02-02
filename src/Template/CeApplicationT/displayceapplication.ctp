<div class="actions columns large-2 medium-3">
    <h5><?= __('The CEP Institute') ?></h5>
    <ul class="side-nav">	        
        <li><?= $this->Html->link(__('Home'), ['controller'=>'AdministratorT','action' => 'menuboard']) ?></li>             
    </ul>
</div>
<div class="ceApplicationT view large-10 medium-9 columns">
      
    <div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Continuing Education Applications') ?></h4>    
     <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('CEP ID') ?></th>
            <th><?= __('Candidate ID') ?></th>
            <th><?= __('First Name') ?></th>
            <th><?= __('Last Name') ?></th>
            <th><?= __('Application ID') ?></th>
            <th><?= __('Application Date') ?></th>
            <th><?= __('Payment Type') ?></th>
            <th><?= __('Application Approved') ?></th>      
        </tr>
      <?php 
        foreach ($results as $result): 
        $enabled='';
        if(empty($result->Enabled)){
        $enabled='Unknown';
        }else{
        $enabled=$result->Enabled;
        }
        echo "<tr>               
            <td> <a href='/admin/updatecepdesignee'>$result->CEP_ID</a> </td>  
            <td></td>
            <td>".$result->ind['First_Name']."</td>
            <td>".$result->ind['Last_Name']."</td>
            <td>$result->Ce_Application_ID</td>
            <td>$result->Application_Date</td>
            <td>$result->Payment_Type</td>
            <td>$result->Approval_Flag</td>
        </tr>"
        ?>
        <?php endforeach; ?> 
     </table>
 <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
    </div>
</div>
    
</div>

