<?
class DefaultController extends Controller{

	public function actionIndex(){
		$this->render('index', array('menuConfig'=>$this->menuConfig));
	}

	public function actionTest(){
		Yii::app()->assetManager->publish($this->getModule()->getBasePath().'/css/', true, 2, true);
		$this->render('test');
	}

	public function actionDownload(){
		$this->render('download');
	}

	public function getMenuConfig(){
		return array(
			'items'=>array(
				array('url'=>array('default/test'), 'label'=>'Тестирование сетки'),
				array('url'=>array('default/download'), 'label'=>'Скачать CSS'),
			)
		);
	}
}