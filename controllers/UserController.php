<?php

/**
 * Description of UserController
 *
 * @author rodnoy
 */
class UserController {    

    public function actionLogout() {

        unset($_SESSION['user_id']);
        header('Location: /');
    }
}