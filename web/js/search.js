/*
* Илья Шейман
* 2021
*
 */

document.querySelector('#search').oninput = function (){
    let res = this.value.trim(); //обрез пробелов
    let searchItems = document.querySelectorAll('.search .card-place') // поиск в блоке с классом "card-place
    if (res != ''){ // если строка не пустая
        searchItems.forEach(function (elem){
            if (elem.innerText.search(res) == -1){ // ... и если строка не совпадает с текстом блока
                elem.classList.add('hide'); // добавляется класс "hide" для скрытия элемента
            } else {
                elem.classList.remove('hide')
            }
        })
    } else { // если строка пустая, то у всех элементов удаляется класс "hide"
        searchItems.forEach(function (elem) {
            elem.classList.remove('hide')
        })
    }
}