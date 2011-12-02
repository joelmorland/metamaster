<?php
	class MetaMaster extends DataObjectDecorator {
		public function extraStatics() {
			return array(
				'db' => array(
					'GlobalMetaDescription' => 'Text'
					,'GlobalMetaKeyWords' => 'Text'
				)
			);
		}

		public function updateCMSFields(FieldSet $fields) {
			$GlobalMetaDescription = new TextareaField('GlobalMetaDescription', 'Meta description');
			$GlobalMetaKeyWords = new TextareaField('GlobalMetaKeyWords', 'Meta keywords');
			$fields->addFieldsToTab('Root.Metadata', array($GlobalMetaDescription, $GlobalMetaKeyWords));

			return $fields;
		}
	}

?>
