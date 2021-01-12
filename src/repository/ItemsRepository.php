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
            $item['amount']
        );
    }

    public function addItem(Items $item):void
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO items (name_product, amount) 
        VALUES(?,?)');


        $stmt->execute([
            $item->getNameProduct(),
            $item->getAmount()
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
                $item['amount']
            );
        }
        return $result;
    }
}