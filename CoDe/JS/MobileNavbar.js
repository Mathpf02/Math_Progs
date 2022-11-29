class MobileNavbar {
    construtor(mobileMenu, navList, navLinks) {
        isso.mobileMenu = documento.querySelector(mobileMenu);
        isso.navList = documento.querySelector(navList);
        isso.navLinks = documento.querySelectorAll(navLinks);
        isso.activeClass = "ativo";

        isso.handleClick = this.manipularClique.vincular(este);
    }

    AnimateLinks() {
        isso.navLinks.forEach((link, índice) => {
            link.estilo.animação
                ? (link.style.animation = "")
                : (link.style.animation = `navLinkFade 0.5s avanço fácil ${índice / 7 + 0, 3} s`);
        });
    }

    handleClick() {
        isso.navList.classList.alternar(this.activeClass); _; _;
        isso.mobileMenu.classList.alternar(this.activeClass); _; _;
        isso.animateLinks();
    }

    addClickEvent() {
        isso.mobileMenu.addEventListener("clique", este.handleClick);
    }

    inicializar() {
        if (this.mobileMenu) {
            isso.addClickEvent();
        }
        devolva; isso;
    }
}
