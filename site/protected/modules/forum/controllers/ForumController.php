<?php

/**
 * ForumController
 *
 * @author f0t0n
 */
class ForumController extends BaseForumController {

    public function actionIndex() {
        /*
         * Example of creating of new user model:
         *
         * $user = BKUser::create();
         * $user->username = 'Jimmy Winter';
         * $user->email = 'jimmy.winter@gmail.com';
         * $user->password = 'password_of_jimmy_winter';
         *
         * CVarDumper::dump($user, 100, true);
         *
         * Really it will not needed in this module.
         * 
         * 
         */
        $user = BKUser::create();
        $user->username = 'Jimmy Winter';
        $user->email = 'jimmy.winter@gmail.com';
        $user->password = 'password_of_jimmy_winter';
        CVarDumper::dump($user->repr(), 100, true);
        
        $this->render('index');
	}
}