let colors = document.querySelectorAll(".color-input-container");
for(color of colors){
    let mycolor = color;
    let colorClass = color.dataset.class;
    color.addEventListener('click', () => {
        mycolor.classList.toggle(colorClass);
        if(mycolor.childNodes[1].value == 0){
            mycolor.childNodes[1].value = 1;
        }else{
            mycolor.childNodes[1].value = 0;
        }
        
    });
}