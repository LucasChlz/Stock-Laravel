const MenuBtn = document.getElementById('menuBtn');
const sideMenuCont = document.getElementById('sideMenu');

let open = false;

const SideMenu = () => {
    if (!open) {
        sideMenuCont.classList.add('animationSide');
        open = true;
    } else if (open) {
        sideMenuCont.classList.remove('animationSide');
        open = false;
    }
}

MenuBtn.addEventListener('click', SideMenu);
