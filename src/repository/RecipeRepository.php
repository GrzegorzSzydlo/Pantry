<?php
session_start();
require_once 'Repository.php';
require_once __DIR__.'./../models/Recipe.php';

class RecipeRepository extends Repository
{
    public function addRecipe(Recipe $recipe):void
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO recipes(title, description, image, id_assigned_by)
        VALUES (?,?,?,?) ');

        $stmt->execute([
            $recipe->getTitle(),
            $recipe->getDescription(),
            $recipe->getImage(),
            $recipe->getIdAssignedBy()
        ]);
    }

    public function getRecipe(int $id) :?Recipe
    {
        $stmt = $this->database->connect()->prepare('
                SELECT * FROM recipes WHERE id=:id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);
        if($recipe == false){
            return null;
        }

        return new Recipe(
            $recipe['title'],
            $recipe['description'],
            $recipe['image'],
            $recipe['id_assigned_by']
        );
    }

    public function getRecipes() :array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('SELECT * FROM recipes');
        $stmt->execute();

        $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recipes as $recipe){
            $result[] = new Recipe(
                $recipe['title'],
                $recipe['description'],
                $recipe['image'],
                $recipe['id_assigned_by'],
                $recipe['id']
            );
        }
        return $result;
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

    public function getRecipeByTitle(string $searchString)
    {
        $searchString = '%'.strtolower($searchString).'%';
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM recipes WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function chooseRecipe(int $id){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM recipes WHERE id= :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}