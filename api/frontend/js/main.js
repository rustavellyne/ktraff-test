let root = document.querySelector('.root');
let task1 = document.querySelector('.task1');
let task2 = document.querySelector('.task2');

const products = 'http://ktraff.local/products';
const orders = 'http://ktraff.local/orders';

task1.addEventListener('click', (e)=>{
    classActive(e);
    getDataFromUri(products)
});
task2.addEventListener('click', (e)=>{
    classActive(e);
    getDataFromUri(orders);
});


window.onload = function () {
    getDataFromUri(products)
};


/**
 *
 * @param data
 */
function getDataFromUri(data){
    getResponseFromAPI(data).then(handleResponse)
        .then(data=>{renderTableProducts(data,root)})
        .catch(error=>console.log('----this is error = ',error));
}

/**
 *
 * @param url
 * @returns {Promise<Response>}
 */
function getResponseFromAPI(url){
    return fetch (`${url}`,
        {
            method: 'GET',
        }
    )
}


/**
 * handle of responsing
 * if ok or Error
 * @param {object} response - response from API
 *
 */
function handleResponse(response) {
    return response.json()
        .then(json => {
            if (response.ok) {
                return json
            } else {
                let error = Object.assign({}, json, {
                    status: response.status,
                    statusText: response.statusText
                });
                return Promise.reject(error)
            }
        })
}

/**
 *
 * @param array
 * @param locate
 */
function renderTableProducts(array,locate){
    locate.innerHTML = '';
    let table = document.createElement('table');
    table.className = 'table table-striped table-bordered table-hover';
    table.setAttribute("id", "data-table");
    let thead = document.createElement('thead');
    thead.className = 'thead-light';

    let tr = document.createElement('tr');

    for(let key in array[0]) {
        let th = document.createElement('th');
        th.append(document.createTextNode(key));
        th.scope = 'col';
        tr.appendChild(th);
    }
    thead.appendChild(tr);
    table.appendChild(thead);

    let tbody = document.createElement('tbody');

    for(let i = 0; i < array.length; i++) {
        let obj = array[i];
        createRows(obj, tbody);
    }

    table.appendChild(tbody);
    locate.appendChild(table);

}

/**
 *
 * @param obj
 * @param locate
 */
function createRows(obj,locate){
    let tr = document.createElement('tr');
    let th = document.createElement('th');

    for(let key in obj) {
        let data = obj[key];

        let td = document.createElement('td');
        td.append(document.createTextNode(data));
        tr.appendChild(td);
    }
    locate.appendChild(tr);
}

function classActive(e) {
    let elems = document.querySelector(".active");
    if(elems !==null){
        elems.classList.remove("active");
    }
    e.target.className += " active";
}







