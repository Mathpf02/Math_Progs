let show = false;
function show_modal(button, nome) {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        nome.querySelectorAll('.exit_').forEach(e => {
            e.onclick = (ele) => {
                ele.preventDefault();
                nome.querySelector('.modal_alter').style.opacity = '0';
                setTimeout(() => {
                    nome.querySelector('.modal_alter').style.display = 'none';
                }, 260)
            }
        });
        nome.querySelector('.modal_alter').style.display = '';
        nome.querySelector('.modal_alter').style.opacity = '';
    }, true)
}
show_modal(document.querySelector('.telefone_button'), document.querySelector('.tel'));
show_modal(document.querySelector('.email_button'), document.querySelector('.email'));
show_modal(document.querySelector('.nome_button'), document.querySelector('.nome'));
show_modal(document.querySelector('.area_button_senha'), document.querySelector('.modal_senha'));
show_modal(document.querySelector('.button_perfil_info a'), document.querySelector('.area_modal_img'));

document.querySelector(".remove").addEventListener('click', (e)=>{
    e.preventDefault();
    if(confirm("Deseja mesmo deletar sua conta.")) {
        window.location.href = '../assets/script/php/delete.php';
    } 
}, true);