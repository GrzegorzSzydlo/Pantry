const chooseContainer = document.querySelector('.recipe-area');
const chooseButton = document.querySelectorAll('.title-show');

chooseButton.forEach(button=>button.addEventListener("click", selected));

function selected()
{
    const select = this;
    const container = select.parentElement;
    const id = container.getAttribute("id");

    fetch(`/chooseRecipe/${id}`).then(function (response){
        return response.json();
    }).then(function (recipe){
        chooseContainer.innerHTML = "";
        showRecipe(recipe);
    });
}

function showRecipe(recipes){
    recipes.forEach(recipe=>{
        createSelectedRecipe(recipe);
    });
}

function createSelectedRecipe(recipe){
    const template = document.querySelector('#chooseRecipe');

    const clone = template.content.cloneNode(true);
    const div = clone.querySelector('div');
    div.id = recipe.id;
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${recipe.image}`;
    const title = clone.querySelector(".title");
    title.innerHTML = recipe.title;
    const description = clone.querySelector(".description");
    description.innerHTML = recipe.description;
    chooseContainer.appendChild(clone);
}
