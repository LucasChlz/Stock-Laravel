const MenuBtn = document.getElementById('menuBtn');
const containerContent = document.getElementById('content');
const closeBtn = document.getElementById('closeBtn');
const sideMenuCont = document.getElementById('sideMenu');

closeBtn.style.display = 'none';
closeBtn.style.opacity = '0';

let open = false;

const OpenMenu = () => {
    sideMenuCont.classList.add('animationSide');
    MenuBtn.style.display = 'none';
    closeBtn.style.display = 'block';
    closeBtn.style.transition = '2s';
    closeBtn.style.opacity = '100';
    containerContent.style.marginLeft = '30%'

}

const CloseMenu = () => {
    sideMenuCont.classList.remove('animationSide');
    MenuBtn.style.display = 'block';
    closeBtn.style.display = 'none';
    closeBtn.style.transition = '2s';
    closeBtn.style.opacity = '0';   
    containerContent.style.marginLeft = '0'
}

MenuBtn.addEventListener('click', OpenMenu);
closeBtn.addEventListener('click', CloseMenu);
