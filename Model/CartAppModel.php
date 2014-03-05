<?php
App::uses('AppModel', 'Model');
/**
 * Cart App Model
 *
 * @author Florian Krämer
 * @copyright 2012 - 2013 Florian Krämer
 * @license MIT
 */
class CartAppModel extends AppModel {

/**
 * Behaviors
 *
 * @var array
 */
	public $actsAs = array(
		'Containable'
	);

/**
 * Validation domain for translations
 *
 * @var string
 */
	public $validationDomain = 'cart';

/**
 * Constructor
 *
 * @param mixed $id Model ID
 * @param string $table Table name
 * @param string $ds Datasource
 * @access public
 */
	public function __construct($id = false, $table = null, $ds = null) {
		$this->_configureAssociations();
		parent::__construct($id, $table, $ds);
	}

/**
 * This is a workaround to let you define other models in the associations of
 * the cart plugin without touching it's model code.
 *
 * You could for example extend the Order model with AppOrder and then configure
 * the plugin to use that model by Configure::write('Cart.models.Order', 'AppOrder');
 *
 * @return void
 */
	protected function _configureAssociations() {
		$models = Configure::read('Cart.models');
		if (!empty($models)) {
			$types = array('belongsTo', 'hasMany', 'hasOne', 'hasAndBelongsToMany');
			foreach ($models as $model => $modelAssoc) {
				foreach ($types as $type) {
					if (isset($this->{$type}[$model])) {
						if (is_string($modelAssoc)) {
							$modelAssoc = array('className' => $modelAssoc);
						}
						$fields = array_keys($modelAssoc);
						foreach ($fields as $field) {
							$this->{$type}[$model][$field] = $modelAssoc[$field];
						}
					}
				}
			}
		}
	}

	public function serializeFields($fields = true) {
		foreach ($fields as $field) {
			if (isset($this->data[$this->alias][$field])) {
				$this->data[$this->alias][$field] = serialize($this->data[$this->alias][$field]);
			}
		}
	}

	public function unserializeFields($fields) {
		foreach ($fields as $field) {
			if (isset($this->data[$this->alias][$field])) {
				$this->data[$this->alias][$field] = unserialize($this->data[$this->alias][$field]);
			}
		}
	}

}