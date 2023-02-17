let tags = document.querySelectorAll(".tag-input-container");
for(tag of tags){
    let mytag = tag;
    tag.addEventListener('click', () => {
        mytag.classList.toggle('tag-active');
        if(mytag.childNodes[1].value == 0){
            mytag.childNodes[1].value = 1;
        }else{
            mytag.childNodes[1].value = 0;
        }
    });
}