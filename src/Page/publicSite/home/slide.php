<?php 
$picture = [
    'http://localhost/php/src/Page/Picture/home/avocado.png',
    'http://localhost/php/src/Page/Picture/home/beefchunk.png',
    'http://localhost/php/src/Page/Picture/home/beffdogjpg.png',
    'http://localhost/php/src/Page/Picture/home/Chex_Mix_Traditional_Snack.png',
    'http://localhost/php/src/Page/Picture/home/Chips_Spicy_Jalapeno.png',
    'http://localhost/php/src/Page/Picture/home/cookies_ota.png'
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <link href="http://localhost/php/dist/styles.css" rel="stylesheet"> <!-- Corrected path -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    
    <style>
        .dot {
            height: 12px;
            width: 12px;
            margin: 0 5px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .dot.active {
            background-color: #333;
        }
    </style>
</head>

<body class="bg-gray-100">

   <div class="w-full max-w-3xl  mx-auto">
    <div class="relative overflow-hidden">
        <!-- Slider images -->
        <div class="flex transition-transform ease-in-out duration-700 bg-primary-30 " id="slider">
            <!-- Dynamically add images from PHP array -->
            <?php foreach ($picture as $index => $img): ?>
                <img src="<?php echo $img; ?>" class="w-full h-[500px] object-fit" alt="Slider Image">
            <?php endforeach; ?>
        </div>

        <!-- Prev/Next buttons -->
        <button
            class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-primary-100 text-white px-4 py-2 rounded-full"
            onclick="prevSlide()">&#10094;</button>
        <button
            class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-primary-100 text-white px-4 py-2 rounded-full"
            onclick="nextSlide()">&#10095;</button>
    </div>

    <!-- Dots for slide navigation -->
    <div class="flex justify-center mt-4" id="dots">
        <!-- Dots will be dynamically generated here -->
    </div>
</div>

    <script>
    let slideIndex = 1;
    const slides = document.getElementById('slider');
    const totalSlides = slides.children.length;
    const dotsContainer = document.getElementById('dots');
    
    // Dynamically set the width of the slider based on the number of images
    slides.style.width = `${totalSlides * 100}%`;

    // Dynamically create dots
    for (let i = 0; i < totalSlides; i++) {
        const dot = document.createElement('span');
        dot.classList.add('dot');
        dot.setAttribute('data-index', i);
        dot.addEventListener('click', function () {
            slideIndex = i;
            showSlide(slideIndex);
        });
        dotsContainer.appendChild(dot);
    }

    const dots = document.querySelectorAll('.dot');

    function showSlide(index) {
        if (index >= totalSlides) {
            slideIndex = 0;
        } else if (index < 0) {
            slideIndex = totalSlides - 1;
        }
        
        const translateX = -(slideIndex * (100 / totalSlides)) + '%';
        slides.style.transform = `translateX(${translateX})`;

        // Update active dot
        dots.forEach(dot => dot.classList.remove('active'));
        dots[slideIndex].classList.add('active');
    }

    function nextSlide() {
        slideIndex = (slideIndex + 1) % totalSlides;
        showSlide(slideIndex);
    }

    function prevSlide() {
        slideIndex = (slideIndex - 1 + totalSlides) % totalSlides;
        showSlide(slideIndex);
    }

    // Optional: Auto slide (change every 3 seconds)
    setInterval(nextSlide, 3000);

    // Initial call to show the first slide
    showSlide(slideIndex);
    </script>

</body>

</html>
