const menu = document.querySelector('.menu.container');
const principal = document.querySelector('.principal');
const optionTexto = document.querySelectorAll('.menu-grid-text');

document.querySelector('#open-menu').addEventListener('click', e => {
    e.target.clicked = !e.target.clicked;
    const openCloseSizes = !e.target.clicked ? 55 : 288;
    menu.style.width = principal.style.marginLeft = `${openCloseSizes}px`;
    principal.style.width = `calc(100% - ${openCloseSizes}px)`;
    // principal.style.marginLeft = `${openCloseSizes(e)}px`;
    for (option of optionTexto) {
        option.style.display = e.target.clicked ? 'flex' : 'none';
    }
});