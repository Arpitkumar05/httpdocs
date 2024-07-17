document.addEventListener('scroll', function() {
    const sections = document.querySelectorAll('.section');
    const navLinks = document.querySelectorAll('.nav-link');
    
    let scrollPosition = window.scrollY || window.pageYOffset;
    
    sections.forEach((section, index) => {
        if (scrollPosition >= section.offsetTop - section.offsetHeight / 3 && scrollPosition < section.offsetTop + section.offsetHeight - section.offsetHeight / 3) {
            navLinks.forEach((link) => {
                link.classList.remove('active');
            });
            navLinks[index].classList.add('active');
        }
    });
});

document.querySelectorAll('.nav-link').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});


let scrollAmount = 0;

function scrollGallery(direction) {
    const gallery = document.querySelector('.gallery');
    const galleryWidth = gallery.scrollWidth;
    const containerWidth = gallery.parentElement.clientWidth;
    const scrollStep = containerWidth / 2;
    
    if (direction === -1 && scrollAmount > 0) {
        scrollAmount -= scrollStep;
    } else if (direction === 1 && scrollAmount < (galleryWidth - containerWidth)) {
        scrollAmount += scrollStep;
    }

    gallery.style.transform = `translateX(-${scrollAmount}px)`;
}
