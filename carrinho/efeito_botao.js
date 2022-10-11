document.querySelectorAll("button").forEach(function (button) {

    button.addEventListener("click", function (event) {
        const el = event.target || event.srcElement;
        const id = el.id;
        const parent = el.closest('div');
        if (el.innerText === '-') {
            var atual = parent.querySelector('input').value;
            if (atual > 0) {
                var novo = atual - 1;
                parent.querySelector('input').value = novo;
            }
        }
        else if (el.innerText === '+') {
            var atual = parent.querySelector('input').value;
            var novo = atual - (-1);
            parent.querySelector('input').value = novo;
        }
    });

});