<?php

/**
 * Description of AdvtController
 *
 * @author rodnoy
 */
class AdvtController {

    public function actionDelete($id) {        
                
        Advt::deleteAdvt($id);
        //require_once ROOT.'/views/site/delete.php';
        header('Location: /');
        return true;
    }

    public function actionAdd() {

        $logged = User::checkLogged();

        if ($logged) {
            if (isset($_POST['create'])) {
                $title = filter_input(INPUT_POST, 'title');
                $description = filter_input(INPUT_POST, 'description');
                $user_id = filter_input(INPUT_POST, 'user_id');

                Advt::addAdvt($title, $description, $user_id);
                $lastAdvt = Advt::getLastAdvt();
                header('Location: /'.$lastAdvt);
            } else {
                require_once ROOT . '/views/site/add.php';
                return true;
            }
        } else {
            header('Location: /');
        }
    }
    
    public function actionShow($id){
        
        $logged = User::checkLogged();
        
        $advt = Advt::getAdvtById($id);
        
        require_once ROOT.'/views/site/show.php';
        
        return true;
        
    }

}
