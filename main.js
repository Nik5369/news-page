let form = document.querySelector('.pages-container')
id = Math.ceil(id/5);
let container = 0;
for(let i = 1; i <= id; i++){
    let item = document.createElement('input');
    item.setAttribute('id', i);
    item.setAttribute('value', i);
    item.setAttribute('name', 'page');
    item.setAttribute('type', 'submit');
    form.append(item);
}
document.getElementById(activePage).style.backgroundColor = '#832b5b';
