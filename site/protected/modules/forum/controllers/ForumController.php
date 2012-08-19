<?php

/**
 * ForumController
 *
 * @author f0t0n
 */
class ForumController extends BaseForumController {

    public function actionIndex() {
        $this->render('index');
	}
}