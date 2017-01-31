<?php

/**
 * Description of SiteController
 *
 * @author rodnoy
 */
class SiteController {

    public function actionIndex($page = 1) {
                
        $advtList = Advt::getAdvtList($page);
        
        $total = Advt::getTotalAdvt();
        
        $pagination = new Pagination($total, $page, Advt::SHOW_BY_DEFAULT, 'page-');
        
        $logged = User::checkLogged();

        $username = '';
        $password = '';
        $errors = false;

        if (isset($_POST['check_log'])) {
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');



            //Валидация полей
            if (!User::checkUsername($username)) {
                $errors[] = "username должен быть не короче 2-х символов";
            }
            if (!User::checkPassword($password)) {
                $errors[] = "password не должен быть короче 6-ти символов";
            }

            if ($errors == false) {
                if (User::checkUserData($username, $password)) {
                    $userId = User::checkUserData($username, $password);
                    User::auth($userId);
                    header('Location: /');
                } elseif (!User::checkUsernameExists($username)) {
                    User::register($username, $password);
                    $userId = User::checkUserData($username, $password);
                    User::auth($userId);
                    header('Location: /');
                } else {
                    $errors[] = "Попробуйте еще";
                }
            }
        }

//        var_dump($username);
//        var_dump($password);
//        var_dump($logged);
//        var_dump($errors);
        

        require_once ROOT . '/views/site/index.php';
        return true;
    }

    public function actionEdit() {

        $logged = User::checkLogged();

        if ($logged) {
            require_once ROOT . '/views/site/edit.php';
            return true;
        } else {
            header('Location: /');
        }
    }

    public function actionLogout() {
        unset($_SESSION['user_id']);
        header('Location: /');
    }

}
