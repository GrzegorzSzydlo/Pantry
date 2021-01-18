<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Items.php';
require_once __DIR__.'/../repository/ItemsRepository.php';
class ItemController extends AppController {

    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $itemRepository;

    public function __construct()
    {
        parent::__construct();
        $this->itemRepository = new ItemsRepository();
    }

    public function main(){
        $items = $this->itemRepository->getItems();
        $this->render('main',['items' => $items]);
    }

    public function add_item(){
        $this->render('add_item');
    }

    public function addItem()
    {
        if($this->isPost() && is_uploaded_file($_FILES['image']['tmp_name']) && $this->validate($_FILES['image']))
        {
            move_uploaded_file($_FILES['image']['tmp_name'],
            dirname(__DIR__).self::UPLOAD_DIRECTORY . $_FILES['image']['name']);

            $item = new Items($_POST['nameProduct'], $_FILES['image']['name'], $_POST['amount']);
            $this->itemRepository->addItem($item);

            return $this->render('main',
                ['messages'=>['add items'],
                'items'=>$this->itemRepository->getItems()]);
        }
        return $this->render('main',['messages'=> ['Error']]);

    }
    public function addItemWithSelect(){
        if($this->isPost())
        {
            $amount = intval($_POST['amount-select']);
            $nameItem = $_POST['item'];
            $this->itemRepository->addItemWithSelect($amount,$nameItem);
        }

        $items = $this->itemRepository->getItems();
        return $this->render('main',['items' => $items]);

    }

    public function plus(int $id){
        $this->itemRepository->plus($id);
        http_response_code(200);
    }

    public function minus(int $id){
        $this->itemRepository->minus($id);
        http_response_code(200);
    }




    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}
