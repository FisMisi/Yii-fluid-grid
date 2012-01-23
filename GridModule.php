<?
class GridModule extends CWebModule{
	protected $plugins = array();
	public function init(){
		self::publishGrid();
		$this->layout = '/layouts/default';
		parent::init();
	}

	public static function publishGrid(){
		/** @var CAssetManager $am */
		$am = Yii::app()->assetManager;
		$resourceRoot = $am->publish(Yii::getPathOfAlias('application.modules.grid').'/css/', true, 2, true);
		$package = array(
			'baseUrl'=>$resourceRoot,
			'basePath'=>'',
			'css'=>array('test.css','grid.css','grid-16.css'),
			'depends'=>array('jquery'),
		);
		/** @var $cs CClientScript */
		$cs = Yii::app()->clientScript;
		$cs->packages['grid'] = $package;
		$cs->registerPackage('grid');
	}
}