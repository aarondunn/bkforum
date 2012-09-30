<?php
/**
 * BKForumModule
 *
 * @author f0t0n
 */
class ForumModule extends CWebModule {

    public $defaultController = 'forum';
    public $userModelClassName = 'User';
    
    protected $assetsUrl;

	public function init() {
		$this->setImport(array(
			'forum.components.*',
			'forum.models.*',
		));
        $assetsPath = Yii::getPathOfAlias('application.modules.forum.assets');
        $this->assetsUrl = Yii::app()->getAssetManager()->publish($assetsPath);
        Yii::app()->clientScript->scriptMap=array(
            'jquery.js'=>false,
        );
	}

    public function getAssetsUrl() {
        return $this->assetsUrl;
    }
}