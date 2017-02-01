<?php

/**
 * Description of AdvtController
 *
 * @author rodnoy
 */
class AdvtController {

    private $isLogged;

    public function __construct() {
        $this->isLogged = User::checkLogged();
    }

    public function actionDelete($id) {
        if ($this->isLogged) {
            Advt::deleteAdvt($id);
            //require_once ROOT.'/views/site/delete.php';
            header('Location: /');
        }
        return true;
    }

    public function actionAdd($id = false) {

        if ($this->isLogged) {
            
            $user = User::getUserById($this->isLogged);
            
            if ($id) {
                
                $advt = Advt::getAdvtById($id);                

                if (isset($_POST['edit'])) {

                    $id = filter_input(INPUT_POST, 'id');
                    $title = filter_input(INPUT_POST, 'title');
                    $description = filter_input(INPUT_POST, 'description');

                    Advt::editAdvt($id, $title, $description);
                    header('Location: /' . $id);
                }
                require_once ROOT . '/views/site/edit.php';

                return true;
            }


            if (isset($_POST['create'])) {
                $title = filter_input(INPUT_POST, 'title');
                $description = filter_input(INPUT_POST, 'description');
                $author_name = filter_input(INPUT_POST, 'author_name');
                $user_id = filter_input(INPUT_POST, 'user_id');

                Advt::addAdvt($title, $description, $author_name, $user_id);
                $lastAdvt = Advt::getLastAdvt();
                header('Location: /' . $lastAdvt);
            }

            require_once ROOT . '/views/site/add.php';

            return true;

//            if (isset($_POST['create'])) {
//                $title = filter_input(INPUT_POST, 'title');
//                $description = filter_input(INPUT_POST, 'description');
//                $user_id = filter_input(INPUT_POST, 'user_id');
//
//                Advt::addAdvt($title, $description, $user_id);
//                $lastAdvt = Advt::getLastAdvt();
//                header('Location: /' . $lastAdvt);
//                
//            } elseif (isset($_POST['edit'])) {
//                $id = filter_input(INPUT_POST, 'id');
//                $title = filter_input(INPUT_POST, 'title');
//                $description = filter_input(INPUT_POST, 'description');
//                var_dump($id);
//                Advt::editAdvt($id, $title, $description);
//                header('Location: /' . $id);
//            }
        } else {
            header('Location: /');
        }
    }

    public function actionShow($id) {

        $user = User::getUserById($this->isLogged);

        $advt = Advt::getAdvtById($id);

        require_once ROOT . '/views/site/show.php';

        return true;
    }

//    public function actionEdit($id){
//        
//        $advt = Advt::getAdvtById($id);
//
//        require_once ROOT . '/views/site/edit.php';
//
//        return true;
//    }
//    public function actionEdit($id = false) {
//
//        //$logged = User::checkLogged();
//
//        if ($this->isLogged) {
//            if ($id == false) {
//                require_once ROOT . '/views/site/add.php';
//                return true;
//            } else {
//                $advt = Advt::getAdvtById($id);
//
//                require_once ROOT . '/views/site/edit.php';
//
//                return true;
//            }
//        } else {
//            header('Location: /');
//        }
//    }
}
