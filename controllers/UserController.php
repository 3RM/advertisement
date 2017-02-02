<?php

/**
 * Контроллер для работы с пользователем
 */
class UserController {    
    /**
     * Удаление идентификатора сессии
     */
    public function actionLogout() {
        unset($_SESSION['user_id']);
        header('Location: /');
    }
}