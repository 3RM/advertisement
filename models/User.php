<?php

/**
 * Модель для работы с пользователем
 */
class User extends Db{

    /**
     * Записываем пользователя в БД 
     * @param string $username
     * @param string $password
     * @return boolean
     */
    public static function register($username, $password) {

        $sql = 'INSERT INTO users (username, password) '
                . 'VALUES (:username, :password)';

        $result = self::getConnection()->prepare($sql);

        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);


        return $result->execute();
    }

    /**
     * Проверяет username: не меньше , чем 2 символа
     * @param string $username
     * @return boolean
     */
    public static function checkUsername($username) {
        if (mb_strlen($username) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет пароль: не меньше, чем 6 символов
     * @param string $password
     * @return boolean
     */
    public static function checkPassword($password) {
        if (mb_strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверят совпадение username
     * @param string $username
     * @return boolean
     */
    public static function checkUsernameExists($username) {

        $sql = "SELECT count(*) FROM users WHERE username = :username";

        $result = self::getConnection()->prepare($sql);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * Проверяем существует ли пользователь с заданными $username и $password
     * @param string $username
     * @param string $password
     * @return mixed: integer or boolean
     */
    public static function checkUserData($username, $password) {

        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";

        $result = self::getConnection()->prepare($sql);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }
        return false;
    }

    /**
     * Запоминаем пользователя
     * @param integer $userId
     */
    public static function auth($userId) {
        $_SESSION['user_id'] = $userId;

        return $userId;
    }

    /**
     * Проверяем залогинилася ли пользователь, если да,
     *  то возвращаем идентификатор
     * @return mixed: bollean or string
     */
    public static function checkLogged() {

        //Если сессия есть - вернем идентификатор поользователя
        if (isset($_SESSION['user_id'])) {
            return $_SESSION['user_id'];
        } else {
            //header('Location: /');
            return false;
        }
    }

    /**
     * Получаем id, name, password пользователя
     * @param int $id
     * @return array
     */
    public static function getUserById($id) {

        if ($id) {

            $sql = "SELECT id, username, password FROM users WHERE id = :id";

            $result = self::getConnection()->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

}
