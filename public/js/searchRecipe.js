const search = document.querySelector('input[placeholder="search project"]');
const recipeContainer = document.querySelector('.recipe-title');

search.addEventListener("keyup", function(event){
    if(event.key === "Enter"){
        event.preventDefault();

        const data ={search:this.value};

        fetch("/search",{
            method: "POST",
            headers:{
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response){
            return response.json();
        }).then(function (recipe){
            recipeContainer.innerHTML="";
            loadRecipe(recipe);
        });

    }
});

function loadRecipe(recipes){
    recipes.forEach(recipe =>{
        createRecipe(recipe);
    });
}

function createRecipe(recipe){
    const template = document.querySelector("#recipe-template");

    const clone = template.content.cloneNode(true);
    const div = clone.querySelector("div");
    div.id = recipe.id;
    const title = clone.querySelector(".title-show");
    title.innerHTML = recipe.title;

    recipeContainer.appendChild(clone);
}