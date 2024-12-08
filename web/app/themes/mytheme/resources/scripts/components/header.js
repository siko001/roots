import gsap from 'gsap';
export default function header() {
    
  const mobileMenu = document.getElementById('mobile-menu');
  const burgerMenu = document.getElementById('burger-menu');
  const closeBtn = document.getElementById('close-mobile-menu');
  const mobileMenuHeight = mobileMenu.offsetHeight + 100;

  if (mobileMenu && burgerMenu && closeBtn) {
    gsap.set(mobileMenu, {
      y: -mobileMenuHeight,
      onComplete: () => {
        mobileMenu.classList.remove('invisible');
      },
    });

    const toggleMenu = (isOpen) => {
      gsap.to(mobileMenu, {
        y: isOpen ? 0 : -mobileMenuHeight,
        duration: 0.5,
        ease: 'power2.out',
        onStart: () => {
          if (isOpen) {
            burgerMenu.classList.add('hidden');
            burgerMenu.classList.remove('flex');
            closeBtn.classList.add('flex');
            closeBtn.classList.remove('hidden');
          } else {
            closeBtn.classList.add('hidden');
            closeBtn.classList.remove('flex');
            burgerMenu.classList.add('flex');
            burgerMenu.classList.remove('hidden');
          }
        },
        onComplete: () => {
          mobileMenu.setAttribute('data-open', isOpen.toString());
        },
      });
    };

    burgerMenu.addEventListener('click', toggleMenu(true));
    closeBtn.addEventListener('click', toggleMenu(false));
  }
}