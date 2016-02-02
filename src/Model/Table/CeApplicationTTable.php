<?php
namespace App\Model\Table;

use App\Model\Entity\CeApplicationT;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Database\Connection;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;
use Cake\Core\Exception\Exception;
use Cake\Error\Debugger;
use Cake\I18n\Time;
use App\Model\Entity\CepT;
use App\Model\Entity\IndividualT;

/**
 * CeApplicationT Model
 */
class CeApplicationTTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
   
    public function initialize(array $config)
    {
        $this->table('ce_application_t');
        $this->displayField('Ce_Application_ID');
        $this->primaryKey('Ce_Application_ID');
        $this->hasMany('CepT', [
                'foreignKey' => 'Cep_ID',
                //'dependent' => true,
                'className' => 'CepT',
                'propertyName' => 'cepInfo',
                'strategy' => 'subquery'
                
        ]);
        $this->hasMany('IndividualT', [
                'foreignKey' => 'Student_ID',
                //'dependent' => true,
                'className' => 'IndividualT',
                'propertyName' => 'invidualInfo',
                'strategy' => 'subquery'
            ]);
    }
    
      private function getCEReference(){
    	return TableRegistry::get('CeApplicationT');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('Ce_Application_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Ce_Application_ID', 'create');
            
        $validator
            ->add('Cep_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Cep_ID', 'create')
            ->notEmpty('Cep_ID');
            
        $validator
            ->add('Application_Date', 'valid', ['rule' => 'date'])
            ->allowEmpty('Application_Date');
            
        $validator
            ->allowEmpty('Payment_Type');
            
        $validator
            ->allowEmpty('Payer_Name');
            
        $validator
            ->allowEmpty('Check_Number');
            
        $validator
            ->add('Check_Date', 'valid', ['rule' => 'date'])
            ->allowEmpty('Check_Date');
            
        $validator
            ->allowEmpty('Check_Name');
            
        $validator
            ->allowEmpty('Verisign_Transaction_Number');
            
        $validator
            ->allowEmpty('Verisign_Address_Line1');
            
        $validator
            ->allowEmpty('Verisign_Address_Line2');
            
        $validator
            ->add('Payment_Execution_Date_Time', 'valid', ['rule' => 'date'])
            ->allowEmpty('Payment_Execution_Date_Time');
            
        $validator
            ->add('Amount_Charged', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('Amount_Charged');
            
        $validator
            ->add('Amount_Paid', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('Amount_Paid');
            
        $validator
            ->allowEmpty('Approval_Flag');
            
        $validator
            ->add('Approval_Date', 'valid', ['rule' => 'date'])
            ->allowEmpty('Approval_Date');
            
        $validator
            ->add('New_Due_Date', 'valid', ['rule' => 'date'])
            ->requirePresence('New_Due_Date', 'create')
            ->notEmpty('New_Due_Date');
            
        $validator
            ->allowEmpty('Extension');
            
        $validator
            ->add('Date_Recertified', 'valid', ['rule' => 'date'])
            ->allowEmpty('Date_Recertified');
            
        $validator
            ->allowEmpty('Application_Already_Submitted');
            
        $validator
            ->add('Times_Submitted', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Times_Submitted', 'create')
            ->notEmpty('Times_Submitted');
            
        $validator
            ->requirePresence('Resubmission_Flag', 'create')
            ->notEmpty('Resubmission_Flag');
            
        $validator
            ->allowEmpty('Note');

        return $validator;
    }
    public function displayceapplication()
    {
        $ceapp = $this->getCEReference();
      //  $query = $ceapp->find();
       // $result = $query->select(['Ce_Application_ID','CEP_ID','Application_Date','Payment_Type','Approval_Flag'])->order(['CEP_ID' =>'ASC'])->where (['Approval_Flag' => 'No']);
       $val =array('Pending',' ');
          $result=$ceapp->find('all',[             
                'join'=>([
                    'ce' =>    [
                                    'table'=>'Cep_T',
                                    //'alias'=>'ce',
                                    'type'=>'INNER',
                                    'conditions'=>['ce.Cep_ID=CeApplicationT.Cep_ID' 
                                     ,  'Approval_Flag' => 'Pending']
                                                                         
                                    ],
                    'ind' => [
                                    'table'=>'Individual_T',
                                    //'alias'=>'ind',
                                    'type'=>'INNER',
                                    'conditions'=>'ce.Student_ID=ind.Individual_ID'
                                  //  , 'Approval_Flag' => ' ']
                                    ]
                        ]),
               
                'order' =>['ce.CEP_ID' =>'ASC'],
                'fields'=>[
                        'Ce_Application_ID', 
                        'CEP_ID',
                       'Application_Date',
                       'Payment_Type',
                       'Approval_Flag',
                       'ind.First_Name',
                       'ind.Last_Name']  ,
             'where' =>(['Approval_Flag' => 'Pending']),
             
        ]);
         
        return $result;
    }
    
}
