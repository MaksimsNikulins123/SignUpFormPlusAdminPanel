const table = document.getElementById('table');
const rows = table.getElementsByClassName('row');
const arrayOfData = Array.from(rows);
const body = document.getElementById('body');
const rows_on_page = 10;
const pagination_block = document.getElementById('pages');
// const buttonNext = document.getElementById("buttonNext");
// const buttonBack = document.getElementById("buttonBack");


let pages_list = [];

let counter = 0;

let actualRowsArray = [];

let sortedRowsByProviderName = [];



window.addEventListener("load", function() {
    start();
  });

function start()
{
    createActualRowsArray(arrayOfData)
    showFirstPage(actualRowsArray);
  
}

function createActualRowsArray(arrayOfrows)
{
    actualRowsArray = [];
    
    for (let index = 0; index < arrayOfrows.length; index++) {

        actualRowsArray.push(arrayOfrows[index]);

    }
    createPagesList(actualRowsArray.length);
}

function showFirstPage(actualRowsArray)
{
    cleanTableRows();
    
    counter = rows_on_page;

    for (let index = 0; index < actualRowsArray.length; index++) {
        if(index < rows_on_page){
            actualRowsArray[index].style.display='table-row';
        }
        else
        {
            actualRowsArray[index].style.display='none';
        }
        
    }

    pagination_block.firstElementChild.innerText = pages_list;
}

function createPagesList(numberOfrows)
{
    pages_list = [];

    let pages = Math.ceil(numberOfrows / rows_on_page)
    
    for (let index = 1; index <= pages; index++) {
        pages_list.push(index);
        }
}

function cleanTableRows()
{
    for (let index = 0; index < rows.length; index++) {
        rows[index].style.display = 'none';
        
    }
}

function sortByProvider(providerName)
{
    sortedRowsByProviderName = [];
   
    for (let index = 0; index < rows.length; index++) {

        if(rows[index].classList.contains(providerName))
        {
            sortedRowsByProviderName.push(rows[index]);
   
        }
    }

    createActualRowsArray(sortedRowsByProviderName);
   
    showFirstPage(actualRowsArray);

}




function deleteRow(id)
{

    fetch('delete', {
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
            },
       
        body: 'id=' + id
      })
      
        .then((response) => response.text())
      
        .then(() => {

          window.location.href=window.location.href;
        })
}

function exportToCsvFile()
{
    let checkedBoxes = table.querySelectorAll('input[name=mycheckboxes]:checked');
    let checkedBoxesArray = Array.from(checkedBoxes);
    let idArray = [];
    for (let i = 0; i < checkedBoxesArray.length; i++) {
       idArray.push(checkedBoxesArray[i].id);
        
    }
    
    fetch('export', {
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
            },
       
        body: 'array=' + JSON.stringify(idArray)
      })
}

function showPrevious10rows()
{
    if(counter != rows_on_page)
    {
        cleanTableRows()

        for (let index = (counter - (rows_on_page * 2)); index < actualRowsArray.length; index++) {
            if(index < (counter - rows_on_page)){
                actualRowsArray[index].style.display='table-row'
            }
       
        }
    
        counter = counter - rows_on_page ;
    }
}

function showNext10rows()
{
    if(counter < actualRowsArray.length)
    {
        cleanTableRows()
   
        if(counter < actualRowsArray.length)
            {
                for (let index = counter; index < actualRowsArray.length; index++) {
                    if(index < (counter + rows_on_page)){
                        actualRowsArray[index].style.display='table-row'
                    }
                        
                } 
                counter = counter + rows_on_page;
            }
    }
}