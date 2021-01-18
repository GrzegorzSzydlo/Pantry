const plusButton = document.querySelectorAll(".fa-plus");
const minusButton = document.querySelectorAll(".fa-minus");

function givePlus(){
    const plus = this;
    const container = plus.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");


    const amountDiv = container.querySelector(".amount-item");

    fetch(`/plus/${id}`).then(function (){
        amountDiv.innerHTML = parseInt(amountDiv.innerHTML) +1;
    })
}

function giveMinus(){
    const minus = this;
    const container = minus.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");

    const amountDiv = container.querySelector(".amount-item");

    fetch(`/minus/${id}`).then(function (){
        amountDiv.innerHTML = parseInt(amountDiv.innerHTML) -1;
    })
}



plusButton.forEach(button=>button.addEventListener("click",givePlus));
minusButton.forEach(button=>button.addEventListener("click", giveMinus));