<?php

require_once 'AppController.php';

require_once __DIR__.'/../models/Recipe.php';
require_once __DIR__.'/../repository/RecipeRepository.php';
class RecipeController extends AppController
{
    public function add_recipe(){
        $this->render('add_recipe');
    }


}