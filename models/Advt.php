<?php

/**
 * Модель для работы с обьявлениями
 */
class Advt {
    
    //Колличество выводимых обьявлений по умолчанию
    const SHOW_BY_DEFAULT = 5;
    
    /**
     * Возвращает массив, в котором будет
     * заданое константой колличество обьявлений
     * для определенной страницы в входящем параметре
     * @param string $page
     * @return array
     */
    public static function getAdvtList($page = 1) {
        
        //Смещение в выборке из БД для определенной страницы
        $offset = ((int) $page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        $advtList = array();

        $result = $db->query('SELECT id, title, description, author_name, creation_date, user_id '
                . 'FROM advt '
                . 'ORDER BY id DESC '
                . "LIMIT " . self::SHOW_BY_DEFAULT
                . " OFFSET " . $offset);

        $i = 0;
        while ($row = $result->fetch()) {
            $advtList[$i]['id'] = $row['id'];
            $advtList[$i]['title'] = $row['title'];
            $advtList[$i]['description'] = $row['description'];
            $advtList[$i]['author_name'] = $row['author_name'];
            $advtList[$i]['creation_date'] = $row['creation_date'];
            $advtList[$i]['user_id'] = $row['user_id'];
            $i++;
        }

        return $advtList;
    }
    
    /**
     * Возвращает массив данных определенного обьявления
     * @param string $id
     * @return array
     */
    public static function getAdvtById($id) {

        $id = intval($id);

        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM advt "
                . "WHERE id=$id ");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
    }
    
    /**
     * Удаляет обьявление
     * @param string $id
     * @return boolean
     */
    public static function deleteAdvt($id) {

        $id = intval($id);

        $db = Db::getConnection();

        $sql = ("DELETE FROM advt WHERE id = :id");
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    
    /**
     * Создает новое обьявление в БД
     * @param string $title
     * @param string $description
     * @param string $author_name
     * @param string $user_id
     * @return boolean
     */
    public static function addAdvt($title, $description, $author_name, $user_id) {

        $db = Db::getConnection();

        $sql = 'INSERT INTO advt (title, description, author_name, user_id) '
                . 'VALUES (:title, :description, :author_name, :user_id)';

        $result = $db->prepare($sql);

        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        $result->bindParam(':author_name', $author_name, PDO::PARAM_STR);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);


        return $result->execute();
    }
    
    /**
     * Обновляет существующее обьявление
     * @param string $id
     * @param string $title
     * @param string $description
     * @return boolean
     */
    public static function editAdvt($id, $title, $description) {

        $db = Db::getConnection();

        $sql = 'UPDATE advt SET title = :title,'
                . ' description = :description '
                . ' WHERE id = :id';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':description', $description, PDO::PARAM_STR);

        return $result->execute();
    }

    /**
     * Возвращает id последнего записаного обьявления в БД
     * @return array
     */
    public static function getLastAdvt() {

        $db = Db::getConnection();

        $result = $db->query("SELECT id FROM advt ORDER BY id DESC LIMIT 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['id'];
    }
    
    /**
     * Возвращает общее колличество обьявлений в БД
     * @return array
     */
    public static function getTotalAdvt() {

        $db = Db::getConnection();

        $result = $db->query("SELECT count(id) AS count FROM advt ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

}
