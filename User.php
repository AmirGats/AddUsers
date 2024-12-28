<?php

require_once "DB.php";
class User
{
    public static function get_all(): array | null{
        

        try {
            $connect = DB::connect();
            $sql = 'SELECT * FROM `users`';
            $req = $connect->prepare($sql);
            $req->execute();
            $users = $req->fetchAll();
            return $users;
        } catch (\Throwable $th) {
            echo "Error!" . $th->getMessage();
            return null;
        }
        
    }

    public static function get_one(int $id): array | null{
        

        try {
            $connect = DB::connect();
            $sql = 'SELECT * FROM `users` WHERE `id` = :id';
            $req = $connect->prepare($sql);
            $req->execute(["id" => $id]);
            $users = $req->fetch();
            return $users;
        } catch (\Throwable $th) {
            echo "Error!" . $th->getMessage();
            return null;
        }
        
    }

    public static function add(array $data): int | null{
        try {
            $connect = DB::connect();
            $sql = 'INSERT INTO `users` (`name`, `tel`) VALUES (:name, :tel)';
            $req = $connect->prepare($sql);
            $req->execute(["name" => $data['name'], "tel" => $data['tel']]);
            $users = $req->rowCount();
            return $users;
        }   catch (\Throwable $th) {
            echo "Error!" . $th->getMessage();
            return null;
        }
    }

    public static function delete(int $id): int | null{
        try {
            $connect = DB::connect();
            $sql = 'DELETE FROm `users` WHERE `id` = :id';
            $req = $connect->prepare($sql);
            $req->execute(["id" => $id]);
            $users = $req->rowCount();
            return $users;
        }   catch (\Throwable $th) {
            echo "Error!" . $th->getMessage();
            return null;
        }
    }

}