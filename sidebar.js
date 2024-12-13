document.getElementById('sidebar-icon').addEventListener('click', () => {
    document.getElementById('sidebar').classList.toggle('active');
});

const conteudos = document.querySelectorAll('.acordeao-conteudo');
document.querySelectorAll(".btn-acordeao").forEach((btn, index) => {
    btn.addEventListener("click", () => {
        conteudos[index].classList.toggle('invisivel');
    })
});