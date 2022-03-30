const table = document.querySelector('#Member_Country_Table');
const searchElement = table.querySelector('.imgSearch');
const searchbar =searchElement.parentElement;
const text = searchbar.innerText;
const input = document.createElement("input");
input.type = "text";
input.className = "inputSearch";



function sortTable(index,typeS, asc ,el){
    const directionSort = asc ? 1 : -1;
    const tBody = table.querySelector('tbody');
    const rows = Array.from(tBody.querySelectorAll("tr"));

    const sortedRows = rows.sort((randA, randB) => {
        let elA;
        let elB
        if (index === 3)
        {
            elA = randA.cells[index].querySelector('i').innerHTML;
            elB = randB.cells[index].querySelector('i').innerHTML;
        }
        else {
            elA = randA.cells[index].innerHTML;
            elB = randB.cells[index].innerHTML;
        }
        if(typeS === 'number asc' || typeS === 'number desc' || typeS === 'number') {
            return (elA - elB) > 0 ? (1*directionSort) : (-1 * directionSort);
        }
        else
            return elA > elB ? (1*directionSort) : (-1 * directionSort);
    })

    table.removeChild(tBody);

    for (let i = 0; i < sortedRows.length; i++){
        tBody.appendChild(sortedRows[i]);
    }

    table.appendChild(tBody);

    table.querySelectorAll('th').forEach(th => th.classList.remove("asc", "desc"));
    el.classList.toggle("asc", asc);
    el.classList.toggle("desc", !asc);

}


table.addEventListener('click', (e) =>{
    const el = e.target;
    if (el.nodeName !== 'TH') return;
    const typeSort = el.classList.contains("asc");
    const index = (el.cellIndex);
    const typeS = el.className;
    if (typeS === 'non-sortable') return;

    sortTable(index,typeS,!typeSort, el);


});


searchElement.addEventListener('click', (e) =>{

    searchbar.classList.toggle("find", !e.target.classList.contains("find"));
    searchbar.removeChild(searchElement);
    searchbar.innerText = "";
    searchbar.appendChild(input);
    window.addEventListener('click' ,(e) =>{
        if (e.target.nodeName === 'TH')
        {
            if (e.target.classList.contains("find")){
                searchbar.removeChild(input);
                searchbar.innerText = text;
                searchbar.appendChild(searchElement);
                e.target.classList.remove("find");
            }
        }
    })
})

