document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-carousel]').forEach(function (carousel) {
        var images = carousel.querySelectorAll('.proj-image');
        var dots = carousel.querySelectorAll('.dot');
        var prevBtn = carousel.querySelector('.prev');
        var nextBtn = carousel.querySelector('.next');
        var current = 0;

        function goTo(index) {
            images[current].classList.remove('active');
            if (dots.length) dots[current].classList.remove('active');
            current = (index + images.length) % images.length;
            images[current].classList.add('active');
            if (dots.length) dots[current].classList.add('active');
        }

        if (prevBtn) prevBtn.addEventListener('click', function () { goTo(current - 1); });
        if (nextBtn) nextBtn.addEventListener('click', function () { goTo(current + 1); });

        dots.forEach(function (dot, index) {
            dot.addEventListener('click', function () { goTo(index); });
        });
    });
});