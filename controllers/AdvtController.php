<?php

/**
 * Контроллер Advt (Advertisement) отвечает за работу с обьявлениями.
 * Содержит конструктор, методы: удаление, создание, редактирование обьявлений.
 * Методы генерируют вид страниц.
 */
class AdvtController {

    private $isLogged;

    /**
     * Свойству isLogged присваивается идентификатор пользователя,
     * если сессия существует
     */
    public function __construct() {
        $this->isLogged = User::checkLogged();
    }

    /**
     * Удаление существующей записи.
     * В метод передается id записи, если сессия существует - удаляем
     * @param string $id
     * @return boolean
     */
    public function actionDelete($id) {
        if ($this->isLogged) {
            Advt::deleteAdvt($id);
            header('Location: /');
        }
        return true;
    }

    /**
     * Метод генерирует вид добавления или редактирования обьявления
     * При определенных условиях, метод может создавать новое обьявление
     * или редактировать уже существующее.
     * Если в метод будет передан $id обьявления,
     * то сгенерируется вид редактирования и при нажатии кнопки Edit, обьявление
     * будет перезаписано с новыми введеными параметрами.
     * Если в метод не передан $id обьявления,
     * то сгенерируется вид создания нового обьявления и при нажатии кнопки Create,
     * будет создано новое обьявление. 
     * В любом из случаев, после нажатия кнопки, пользователь будет перенаправлен
     * на страницу просмотра отредактированого или созданого обьявления
     * @param string $id
     * @return boolean
     */
    public function actionAdd($id = false) {

        if ($this->isLogged) {
            //Получаем данные пользователя
            // с помощью идентификатора пользователя в сессии
            $user = User::getUserById($this->isLogged);
            //Если передан id обьявления, метод будет работать
            //с редактированием обьявления
            if ($id) {
                //Получаем данные обьявления
                $advt = Advt::getAdvtById($id);
                //Если данные были отправлены,
                //то обновляем обьявление в БД
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
            //Если id не передан,
            // то работа метода будет на создание нового обьявления
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
        } else {
            header('Location: /');
        }
    }

    /**
     * Генерирует вид определенного обьявления,
     * информацию о пользователе и обьявлении
     * @param string $id
     * @return boolean
     */
    public function actionShow($id) {

        $user = User::getUserById($this->isLogged);
        $advt = Advt::getAdvtById($id);

        require_once ROOT . '/views/site/show.php';

        return true;
    }

}
