<?php

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

        $assignedById = 1;

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
        $stmt = $this->database->connect()->prepare('SELECT * FROM items;');
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
}