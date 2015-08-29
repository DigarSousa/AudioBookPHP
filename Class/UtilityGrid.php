<?php
include_once('../Config/Config.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

/**
 * Created by IntelliJ IDEA.
 * User: edgar
 * Date: 22/08/15
 * Time: 15:12
 */
class UtilityGrid
{

    public static function insertCategory($name, $image)
    {

        $query = "INSERT INTO CATEGORY (NAME_CATEGORY,IMAGE_64)
                  VALUES(:name_category, :image)";

        $conn = openCon();

        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->bindValue("name_category", $name);
            $stmt->bindValue("image", $image);
            $stmt->execute();
            $conn = null;
        }
    }

    public static function getCategories()
    {
        $query = " SELECT * FROM CATEGORY ";

        $conn = openCon();
        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    public static function insertIntoBook($name, $image)
    {
        $query = "INSERT INTO BOOK(NAME, IMAGE_64)
                VALUES (:name, :image)";

        $conn = openCon();

        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->bindValue("name", $name);
            $stmt->bindValue("image", $image);
            $stmt->execute();
            $conn = null;
        }
    }

    public static function getBookList($idCategory)
    {
        $query = "SELECT * FROM BOOK
                WHERE BOOK.ID_CATEGORY=:category";

        $conn = openCon();
        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->bindValue("category", $idCategory);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

}