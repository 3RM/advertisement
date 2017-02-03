<?php

/**
 * Контроллер отвечает за генерирование главной страницы
 */
class SiteController {

    private $isLogged;

    /**
     * Свойству isLogged присваивается идентификатор пользователя,
     * если сессия существует
     */
    public function __construct() {
        $this->isLogged = User::checkLogged();
    }

    /**
     * Генерирует главную страницу с обьявлениями.
     * Вывод списка записей, форму авторизации.
     * @param string $page
     * @return boolean
     */
    public function actionIndex($page = 1) {

        //Получает массив записей из БД,
        //в зависимости от выбранной страницы пагинации
        $advtList = Advt::getAdvtList($page);

        //Общее колличество записей в БД
        $total = Advt::getTotalAdvt();

        //Пагинатор. В него необходимо передать общее колличество записей в БД,
        //текущую страницу, колличество выводимых на странцицу записей, ключ для URL
        $pagination = new Pagination($total, $page, Advt::SHOW_BY_DEFAULT, 'page-');

        $user = User::getUserById($this->isLogged);

        $username = '';
        $password = '';
        $errors = false;
        //Если данные переданы на сервер
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
            //Если поля прошли валидацию
            if ($errors == false) {
                //Если в БД будет найден пользователь с таким логином
                //и паролем, то авторизуем гостя
                if (User::checkUserData($username, $password)) {
                    $userId = User::checkUserData($username, $password);
                    User::auth($userId);
                    header('Location: /');

                    //Если введеный логин не найдет совпадение в БД,
                    //регестрируем гостя, после авторизуем 
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
        require_once ROOT . '/views/site/index.php';
        return true;
    }

}
