document.addEventListener('DOMContentLoaded', function () {

    /* ================================
     * STICKY HEADER + LOGO SWITCH
     * ================================ */
    const header = document.querySelector('.wrap-gps-header');
    const logo   = document.querySelector('.gps-logo');
  
    if (header && logo) {
      const logoDefault = logo.getAttribute('src');
      const logoSticky  = logoDefault.replace('logo.png', 'logo3.png');
      const stickyOffset = header.offsetTop;
  
      window.addEventListener('scroll', function () {
        if (window.scrollY > stickyOffset) {
          header.classList.add('sticky-active');
          logo.setAttribute('src', logoSticky);
        } else {
          header.classList.remove('sticky-active');
          logo.setAttribute('src', logoDefault);
        }
      });
    }
});