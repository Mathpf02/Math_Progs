function disabled(e) {
    e.preventDefault();

}
document.querySelectorAll('input').forEach((e) => {
    e.onblur = () => {
        let vazio = true;
        document.querySelectorAll('input').forEach((e) => {
            if (e.value == '') {
                vazio = false;
            }
        })
        if (vazio) {
            if (document.querySelector('.senha').value == document.querySelector('.senhac').value) {
                document.querySelector('.senha').style.border = ''; 
                document.querySelector('.senhac').style.border = '';
                document.querySelector('.button_area').classList.remove('disabled_error');
                document.querySelector('form').removeEventListener("submit", disabled, true);
            } else {
                document.querySelector('.senha').style.border = '0.5px solid #f00'; 
                document.querySelector('.senhac').style.border = '0.5px solid #f00';
                document.querySelector('.button_area').classList.add('disabled_error');
                document.querySelector('form').addEventListener("submit", disabled, true);
            }
        } else {
            document.querySelector('.button_area').classList.add('disabled_error');
            document.querySelector('form').addEventListener("submit", disabled, true);
        }
    }
});
