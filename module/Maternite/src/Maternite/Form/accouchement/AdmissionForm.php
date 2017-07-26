<?php
namespace Maternite\Form\accouchement;

use Zend\Form\Form;
// use Personnel\Model\Service;
// use Personnel\Model\ServiceTable;

class AdmissionForm extends Form{

	//protected $serviceTable;
	public function __construct() {
		//$this->serviceTable = $serviceTable;
		parent::__construct ();

		$this->add ( array (
				'name' => 'id_patient',
				'type' => 'Hidden',
				'attributes' => array(
						'id' => 'id_patient'
				)
		) );
		$this->add ( array (
				'name' => 'id_admission',
				'type' => 'Hidden',
				'attributes' => array(
						'id' => 'id_admission'
				)
		) );
		
		
		$this->add ( array (
				'name' => 'id_grossesse',
				'type' => 'Hidden',
				'attributes' => array(
						'id' => 'id_grossesse'
				)
		) );
		
		
		$this->add ( array (
				'name' => 'service',
				'type' => 'Select',
				'options' => array (
						'label' => iconv('ISO-8859-1', 'UTF-8','Service'),
						'value_options' => array (
								'' => 'Maternite',
						)
				),
				'attributes' => array (
						'registerInArrrayValidator' => true,
						
						'id' =>'service',
						'required' => false,
				)
		) );
				
		
		$this->add ( array (
				'name' => 'motif_ad',
				'type' => 'Select',
				'options' => array (
						'label' => iconv('ISO-8859-1', 'UTF-8','Motif d\'admission'),
// 						'value_options' => array (
// 								'Normal' => 'Normal',
// 								'Evacuation' => 'Evacuation',
// 								'Reference' => 'Reference',
								
// 						)
				),
				'attributes' => array (
						'registerInArrrayValidator' => true,
						'onchange'=>'getMotif(this.value)',
						'id' =>'motif_ad',
						'required' => false,
				)
		) );

		
		
		
		/* Note evacuation */
		$this->add ( array (
				'name' => 'motif',
				'type' => 'Text',
				'options' => array (
						'label' => iconv ( 'ISO-8859-1', 'UTF-8', 'Motif d\'evacuation ' )
				),
				'attributes' => array (
						//'readonly' => 'readonly',
						'id' => 'motif'
				)
		) );
		
		$this->add ( array (
				'name' => 'motif_reference',
				'type' => 'Text',
				'options' => array (
						'label' => iconv ( 'ISO-8859-1', 'UTF-8', 'Motif  de reference' )
				),
				'attributes' => array (
						//'readonly' => 'readonly',
						'id' => 'motif_reference'
				)
		) );
		
		
		$this->add ( array (
				'name' => 'service_origine',
				'type' => 'Text',
				'options' => array (
						'label' => iconv ( 'ISO-8859-1', 'UTF-8', 'Service d\'origine' )
				),
				'attributes' => array (
						//'readonly' => 'readonly',
						'id' => 'service_origine'
				)
		) );
		
		$this->add ( array (
				'name' => 'service_origine_ref',
				'type' => 'Text',
				'options' => array (
						'label' => iconv ( 'ISO-8859-1', 'UTF-8', 'Service d\'origine' )
				),
				'attributes' => array (
						//'readonly' => 'readonly',
						'id' => 'service_origine_ref'
				)
		) );
	
		$this->add ( array (
				'name' => 'geste', 
				'type' => 'Text',
				'options' => array (
						'label' => iconv('ISO-8859-1', 'UTF-8','GESTE')
				),
				'attributes' => array (
						'id' => 'geste',
						'required' => true,
				)
		) );
		
		
		
		

		$this->add ( array (
				'name' => 'parite',
				'type' => 'Text',
				'options' => array (
						'label' => iconv('ISO-8859-1', 'UTF-8','PARITE')
				),
				'attributes' => array (
						'id' => 'parite',
						'required' => true,
				)
		) );
		
		
		$this->add ( array (
				'name' => 'enf_viv',
				'type' => 'Text',
				'options' => array (
						'label' => iconv('ISO-8859-1', 'UTF-8','ENF_VIV')
				),
				'attributes' => array (
						'id' => 'enf_viv',
						'required' => true,
				)
		) );
		
				
		$this->add(array(
				'name' => 'mort_ne',
				'type' => 'Zend\Form\Element\radio',
				'options' => array (
						'value_options' => array(
								0 => 'Non',
								1 => 'Oui' ,
						),
				),
				'attributes' => array(
						'id' => 'mort_ne',
						'required' => true,
				),
		));
		
		
		
		
		$this->add(array(
				'name' => 'cesar',
				'type' => 'Zend\Form\Element\radio',
				'options' => array (
						'value_options' => array(
								0 => 'Non',
								1 => 'Oui' ,
						),
				),
				'attributes' => array(
						'id' => 'cesar',
						'required' => true,
				),
		));
			

		$this->add(array(
				'name' => 'dystocie',
				'type' => 'Zend\Form\Element\radio',
				'options' => array (
						'value_options' => array(
								0 => 'Non',
								1 => 'Oui' ,
						),
				),
				'attributes' => array(
						'id' => 'dystocie',
						'required' => true,
				),
		));
		
		
		$this->add(array(
				'name' => 'eclampsie',
				'type' => 'Zend\Form\Element\radio',
				'options' => array (
						'value_options' => array(
								0 => 'Non',
								1 => 'Oui' ,
						),
				),
				'attributes' => array(
						'id' => 'eclampsie',
						'required' => true,
				),
		));
		
		
		$this->add ( array (
				'name' => 'ddr',
				'type' => 'Text',
				'options' => array (
						'label' => iconv('ISO-8859-1', 'UTF-8','DDR:')
				),
				'attributes' => array (
						'id' => 'ddr',
						'required' => true,
				)
		) );
		$this->add ( array (
				'name' => 'duree_grossesse',
				'type' => 'Text',
				'options' => array (
						'label' => iconv('ISO-8859-1', 'UTF-8','Duree Grossesse en semaine:')
				),
				'attributes' => array (
						'id' => 'duree_grossesse',
						
						'required' => true,
				)
		) );
		
			$this->add(array(
				'name' => 'bb_attendu',
				'type' => 'Select',
				'options' => array (
						'value_options' => array(
								
								'Simple' => iconv ( 'ISO-8859-1', 'UTF-8','Simple') ,
								'Gemellaire' => iconv ( 'ISO-8859-1', 'UTF-8','Gemellaire') ,
								'Multiple' => iconv ( 'ISO-8859-1', 'UTF-8','Multiple') ,
						),
				),
				'attributes' => array(
						'id' => 'bb_attendu',
						'registerInArrayValidator'=>true,
					   'onchange'=>'getBbAttendu(this.value)',
						'required' => true,
				),
		));
			
			$this->add ( array (
					'name' => 'nombre_bb',
					'type' => 'Text',
					'options' => array (
							'label' => iconv('ISO-8859-1', 'UTF-8','Nombre de bb:')
					),
					'attributes' => array (
							'id' => 'nombre_bb',
							//'required' => true,
					)
			) );
			

			$this->add ( array (
					'name' => 'vat_1',
					'type' => 'checkbox',
					'options' => array (
							'label' => iconv('ISO-8859-1', 'UTF-8','VAT 1:')
					),
					'attributes' => array (
							'id' => 'vat_1',
							'required' => false,
					)
			) );
			
			
			$this->add ( array (
					'name' => 'vat_2',
					'type' => 'checkbox',
					'options' => array (
							'label' => iconv('ISO-8859-1', 'UTF-8','VAT 2:')
					),
					'attributes' => array (
							'id' => 'vat_3',
							'required' => false,
					)
			) );
			$this->add ( array (
					'name' => 'vat_3',
					'type' => 'checkbox',
					'options' => array (
							'label' => iconv('ISO-8859-1', 'UTF-8','VAT 3:')
					),
					'attributes' => array (
							'id' => 'vat_3',
							'required' => false,
							
					)
			) );
			
			$this->add ( array (
					'name' => 'nb_cpn',
					'type' => 'Text',
					'options' => array (
							'label' => iconv('ISO-8859-1', 'UTF-8','Nombre CPN:')
					),
					'attributes' => array (
							'id' => 'nb_cpn',
							'required' => true,
					)
			) );

		$this->add ( array (
				'name' => 'liste_service',
				'type' => 'Select',
				'options' => array (
						'value_options' => array (
								''=>''
						)
				),
				'attributes' => array (
						'id' => 'liste_service',
				)
		) );
		
		
		
		
	
		
	}
}