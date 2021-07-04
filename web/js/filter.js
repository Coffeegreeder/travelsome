const filterCard = document.querySelectorAll('.card-place');

document.querySelector('ol').addEventListener('click', (event) => {
  if (event.target.tagName !== 'LI') return false

  let filterClass = event.target.dataset['f']

  filterCard.forEach(elem => {
    elem.classList.remove('hide')
    if (!elem.classList.contains(filterClass) && filterClass !== 'all') {
      elem.classList.add('hide')
    }
  })
})
