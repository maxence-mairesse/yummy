Commentary = {
    init: function (){
        const btn = document.querySelector("#btn");
        const btnText = document.querySelector("#btnText");
btn.addEventListener('click',Commentary.handleClick)

    },

    handleClick:function (event){
        event.preventDefault();
        const btn = document.querySelector("#btn");
        const btnText = document.querySelector("#btnText");
        const CommentValue = document.querySelector(".commentaire textarea")
        const allComment = document.querySelector(".allComment")
        btnText.innerHTML = "Merci !";
        btn.classList.add("active");
        const ul = document.createElement('ul')
        allComment.appendChild(ul)
        const li = document.createElement('li')
        li.innerText =CommentValue.value

        ul.appendChild(li)


    }
}