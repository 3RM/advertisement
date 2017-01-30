<?php

/**
 * Description of Product
 *
 * @author rodnoy
 */
class Advt {

    const SHOW_BY_DEFAULT = 5;

    public static function getAdvtList($page = 1) {

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

    public static function getAdvtById($id) {

        $id = intval($id);

        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM advt "
                . "WHERE id=$id ");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
    }

    public static function deleteAdvt($id) {

        $id = intval($id);

        $db = Db::getConnection();

        $sql = ("DELETE FROM advt WHERE id = :id");
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function addAdvt($title, $description, $user_id) {

        $db = Db::getConnection();

        $sql = 'INSERT INTO advt (title, description, user_id) '
                . 'VALUES (:title, :description, :user_id)';

        $result = $db->prepare($sql);

        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);


        return $result->execute();
    }

    public static function getLastAdvt() {

        $db = Db::getConnection();

        $result = $db->query("SELECT id FROM advt ORDER BY id DESC LIMIT 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['id'];
    }

    public static function getTotalAdvt() {

        $db = Db::getConnection();

        $result = $db->query("SELECT count(id) AS count FROM advt ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

}
