let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-slide');
const totalSlides = slides.length;


function showSlide(index) {
    slides.forEach((slide) => {
        slide.style.display = 'none';
    });

    slides[index].style.display = 'block';
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    showSlide(currentSlide);
}


function autoSlide() {
    nextSlide();
}


//  première diapositive
showSlide(currentSlide);


//3s
const intervalId = setInterval(autoSlide, 3000);