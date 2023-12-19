var filterSelection = type => {
    var current = document.querySelectorAll('.show');
    current.forEach(elm => elm.classList.remove('show'));
    if (type === 'all') type = 'column';
    var elmToShow = document.querySelectorAll(`.${type}`);
    elmToShow.forEach(elm => elm.classList.add('show'));
};


document.addEventListener('DOMContentLoaded', e => {
    var btnContainer = document.getElementById("myBtnContainer");
    var buttons = document.querySelectorAll('.btn');

    btnContainer.addEventListener('click', e => {
        if (e.target.nodeName == 'BUTTON') {
            buttons.forEach(elm => {elm.classList.remove('active')});
            e.target.classList.add('active');
            var type = e.target.name;
            filterSelection(type);
        }
    });

    filterSelection("all")
});