<?php

require_once 'AppController.php';

require_once __DIR__.'/../models/Recipe.php';
require_once __DIR__.'/../repository/RecipeRepository.php';
class RecipeController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $recipeRepository;
    private $message=[];

    public function __construct()
    {
        parent::__construct();
        $this->recipeRepository = new RecipeRepository();
    }

    public function recipe(){
        $recipes = $this->recipeRepository->getRecipes();
        $this->render('recipe', ['recipes' =>$recipes]);

    }
    public function add_recipe(){
        $this->render('add_recipe');
    }

    public function addRecipe()
    {
        if($this->isPost() && is_uploaded_file($_FILES['img-recipe']['tmp_name']) && $this->validate($_FILES['img-recipe']))
        {
            move_uploaded_file($_FILES['img-recipe']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY . $_FILES['img-recipe']['name']);

            $id_assigned_by = $this->recipeRepository->getIdUser();
            $recipe = new Recipe($_POST['title'], $_POST['description'], $_FILES['img-recipe']['name'] ,$id_assigned_by);
            $this->recipeRepository->addRecipe($recipe);

            return $this->render('recipe', ['recipes'=>$this->recipeRepository->getRecipes()]);
        }
        return $this->render('recipe');
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) :'';

        if($contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content,true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->recipeRepository->getRecipeByTitle($decoded['search']));
        }
    }

    public function chooseRecipe(int $id){
        http_response_code(200);
        echo json_encode($this->recipeRepository->chooseRecipe($id));

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