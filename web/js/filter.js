/*
* Илья Шейман
* 2021
*
 */

const filterCard = document.querySelectorAll('.card-place'); //выборка блоков с классом "card-place"

document.querySelector('ol').addEventListener('click', (event) => { // скрипт на нажатие строки в сайдбаре
  if (event.target.tagName !== 'LI') return false // если тэг не совпадает, то ничего не происходит

  let filterClass = event.target.dataset['f'] // переменная хранящая текст из "data-f"

  filterCard.forEach(elem => { // перебор всех карточек
    elem.classList.remove('hide')  // очистка карточек от класса "hide"
    if (!elem.classList.contains(filterClass) && filterClass !== 'all') {  // Если название класса не совпадает с текстом из "data-f" и класс не "all"
      elem.classList.add('hide') // добавление класса "hide"
    }
  })
})
