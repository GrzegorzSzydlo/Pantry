<?php
session_start();
require_once 'AppController.php';
require_once __DIR__.'/../models/Items.php';
require_once __DIR__.'/../repository/ItemsRepository.php';
class ItemController extends AppController {
    private $itemRepository;

    public function __construct()
    {
        parent::__construct();
        $this->itemRepository = new ItemsRepository();
    }

    public function items(){
        $items = $this->itemRepository->getItems();
        $this->render('items',['items' => $items]);
    }

    public function addItem()
    {
        $item = new Items($_POST['nameProduct'], $_POST['amount']);
        $this->itemRepository->addItem($item);

        return $this->render('main', ['messages'=>['add items']]);
    }
}
