<?php
/**
 * BKForumModule
 *
 * @author f0t0n
 */
class ForumModule extends CWebModule {

    public $defaultController = 'forum';
    protected $assetsUrl;

	public function init() {
		$this->setImport(array(
			'forum.components.*',
			'forum.models.*',
		));
        $assetsPath = Yii::getPathOfAlias('application.modules.forum.assets');
        $this->assetsUrl = Yii::app()->getAssetManager()->publish($assetsPath);
	}

    public function getAssetsUrl() {
        return $this->assetsUrl;
    }
}