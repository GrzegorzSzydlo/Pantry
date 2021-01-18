<?php
session_start();
require_once 'Repository.php';
require_once __DIR__.'./../models/Items.php';

class ItemsRepository extends Repository{

    public function getItem(int $id): ?Items
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM public.items WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $item = $stmt->fetch(PDO::FETCH_ASSOC);
        if($item == false){
            return null;
        }

        return new Items(
            $item['name_product'],
            $item['image']
        );
    }

    public function addItem(Items $item):void
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO items (name_product,amount, image, id_assigned_by) 
        VALUES(?,?,?,?)');

        $assignedById = $this->getIdUser();

        $stmt->execute([
            $item->getNameProduct(),
            $item->getAmount(),
            $item->getImage(),
            $assignedById
        ]);
    }

    public function getItems(): array
    {
        $result =[];
        $id = $this->getIdUser();
        $stmt = $this->database->connect()->prepare('SELECT * FROM items WHERE id_assigned_by = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($items as $item){
            $result[] = new Items(
                $item['name_product'],
                $item['image'],
                $item['amount'],
                $item['id']
            );
        }
        return $result;
    }

    public function plus(int $id){
        $stmt = $this->database->connect()->prepare('
            UPDATE items SET amount = amount + 1 WHERE id = :id
         ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function minus(int $id){
        $stmt = $this->database->connect()->prepare('
            UPDATE items SET "amount" = "amount" - 1 WHERE id = :id
         ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function addItemWithSelect(int $amount, string $nameProduct){
        $stmt = $this->database->connect()->prepare('
            UPDATE items SET amount = amount + :amount WHERE (id_assigned_by = :id) and (name_product = :nameProduct )
         ');
        $id = $this->getIdUser();
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
        $stmt->bindParam(':nameProduct', $nameProduct, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getIdUser(){
        $stmt = $this->database->connect()->prepare('
            SELECT id as id_user FROM users WHERE email=:email
        ');

        $email=unserialize($_SESSION['user'])->getEmail();

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $id=$stmt->fetch(PDO::FETCH_ASSOC);
        return $id['id_user'];
    }


}