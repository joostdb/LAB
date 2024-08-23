<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaussian Splat Tour</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden; /* Verberg de horizontale scrollbar */
            margin: 0;
            padding: 0;
        }
        canvas {
            display: block;
            position: fixed; /* Start met een gefixeerde positie */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: opacity 0.5s ease; /* Overgang voor opaciteit */
        }

        .content {
            padding: 20px;
            min-height: 200vh; /* Minimale hoogte van het scherm */
            overflow-y: auto; /* Scrollbaarheid toevoegen aan .content */
            position: relative; /* Relatieve positie voor juiste overlapping */
            z-index: 1; /* Z-index om boven de canvas te blijven */
        }
        .transparent {
            opacity: 0; /* Maak de canvas transparant */
            pointer-events: none; /* Schakel pointer events uit */
        }

        .hand-icon {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 2;
            background-color: rgba(255, 255, 255, 0.8);
            border: none;
            padding: 10px;
            border-radius: 100%;
            cursor: pointer;
            width: 50px;
            height: 50px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        #coords {
            position: fixed;
            bottom: 20px;
            left: 80px;
            z-index: 3;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 5px;
            display: inline; /* Start hidden */
        }

        #copyright-banner {
            width: 100%;
            background-color: rgba(49, 66, 99, 0.81);
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Gaussian Splat Tour</a>
    </div>
</nav>

<!-- Content -->
<div class="container mt-5"> <canvas></canvas>
    <div class="row">
        <div class="col-lg-6">
            <div class="content" style="margin-top: 200vh">
                <div class="card">
                    <div class="card-body">
                        <h1>Onderliggende Content</h1>
                        <p>
                            Dit is de content onder de canvas die zichtbaar wordt na de volledige cirkelbeweging.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam purus eget nunc tincidunt,
                            sit amet tempor nisl auctor. Sed id felis aliquam, luctus libero a, tempor ex. Nulla vel est sed dui
                            rutrum maximus sed at mi. Aliquam dapibus efficitur dolor, ut auctor mauris auctor vel. Aliquam erat
                            volutpat. Sed laoreet odio nec nibh facilisis venenatis.
                        </p>
                        <p>
                            Duis consectetur, elit in malesuada pretium, risus eros auctor est, id dignissim nulla neque ac metus.
                            Integer sit amet nibh non mauris sagittis iaculis. Phasellus et magna id orci venenatis convallis non vel
                            metus. Aenean molestie ultricies purus, sit amet tristique ligula consectetur id. Quisque condimentum justo
                            vel augue feugiat ultrices. Duis vitae sapien nec ligula vestibulum lacinia nec et ligula. Morbi varius
                            purus at risus tempor egestas. Phasellus rhoncus vestibulum ex, id euismod ipsum luctus sed. Aenean
                            luctus aliquet ipsum sed fermentum. Phasellus ut fringilla ipsum.
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-6">
            <div class="content" style="margin-top: 100vh">
                <div class="card">
                    <div class="card-body">
                        <h1>Onderliggende Content</h1>
                        <p>
                            Dit is de content onder de canvas die zichtbaar wordt na de volledige cirkelbeweging.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam purus eget nunc tincidunt,
                            sit amet tempor nisl auctor. Sed id felis aliquam, luctus libero a, tempor ex. Nulla vel est sed dui
                            rutrum maximus sed at mi. Aliquam dapibus efficitur dolor, ut auctor mauris auctor vel. Aliquam erat
                            volutpat. Sed laoreet odio nec nibh facilisis venenatis.
                        </p>
                        <p>
                            Duis consectetur, elit in malesuada pretium, risus eros auctor est, id dignissim nulla neque ac metus.
                            Integer sit amet nibh non mauris sagittis iaculis. Phasellus et magna id orci venenatis convallis non vel
                            metus. Aenean molestie ultricies purus, sit amet tristique ligula consectetur id. Quisque condimentum justo
                            vel augue feugiat ultrices. Duis vitae sapien nec ligula vestibulum lacinia nec et ligula. Morbi varius
                            purus at risus tempor egestas. Phasellus rhoncus vestibulum ex, id euismod ipsum luctus sed. Aenean
                            luctus aliquet ipsum sed fermentum. Phasellus ut fringilla ipsum.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="content" style="margin-top: 200vh">
                <div class="card">
                    <div class="card-body">
                        <h1>Onderliggende Content</h1>
                        <p>
                            Dit is de content onder de canvas die zichtbaar wordt na de volledige cirkelbeweging.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam purus eget nunc tincidunt,
                            sit amet tempor nisl auctor. Sed id felis aliquam, luctus libero a, tempor ex. Nulla vel est sed dui
                            rutrum maximus sed at mi. Aliquam dapibus efficitur dolor, ut auctor mauris auctor vel. Aliquam erat
                            volutpat. Sed laoreet odio nec nibh facilisis venenatis.
                        </p>
                        <p>
                            Duis consectetur, elit in malesuada pretium, risus eros auctor est, id dignissim nulla neque ac metus.
                            Integer sit amet nibh non mauris sagittis iaculis. Phasellus et magna id orci venenatis convallis non vel
                            metus. Aenean molestie ultricies purus, sit amet tristique ligula consectetur id. Quisque condimentum justo
                            vel augue feugiat ultrices. Duis vitae sapien nec ligula vestibulum lacinia nec et ligula. Morbi varius
                            purus at risus tempor egestas. Phasellus rhoncus vestibulum ex, id euismod ipsum luctus sed. Aenean
                            luctus aliquet ipsum sed fermentum. Phasellus ut fringilla ipsum.
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-6">
            <div class="content" style="margin-top: 100vh">
                <div class="card">
                    <div class="card-body">
                        <h1>Onderliggende Content</h1>
                        <p>
                            Dit is de content onder de canvas die zichtbaar wordt na de volledige cirkelbeweging.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam purus eget nunc tincidunt,
                            sit amet tempor nisl auctor. Sed id felis aliquam, luctus libero a, tempor ex. Nulla vel est sed dui
                            rutrum maximus sed at mi. Aliquam dapibus efficitur dolor, ut auctor mauris auctor vel. Aliquam erat
                            volutpat. Sed laoreet odio nec nibh facilisis venenatis.
                        </p>
                        <p>
                            Duis consectetur, elit in malesuada pretium, risus eros auctor est, id dignissim nulla neque ac metus.
                            Integer sit amet nibh non mauris sagittis iaculis. Phasellus et magna id orci venenatis convallis non vel
                            metus. Aenean molestie ultricies purus, sit amet tristique ligula consectetur id. Quisque condimentum justo
                            vel augue feugiat ultrices. Duis vitae sapien nec ligula vestibulum lacinia nec et ligula. Morbi varius
                            purus at risus tempor egestas. Phasellus rhoncus vestibulum ex, id euismod ipsum luctus sed. Aenean
                            luctus aliquet ipsum sed fermentum. Phasellus ut fringilla ipsum.
                        </p>
                    </div>
                </div>

            </div>
        </div><div class="col-lg-6">
            <div class="content" style="margin-top: 100vh">
                <div class="card">
                    <div class="card-body">
                        <h1>Onderliggende Content</h1>
                        <p>
                            Dit is de content onder de canvas die zichtbaar wordt na de volledige cirkelbeweging.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam purus eget nunc tincidunt,
                            sit amet tempor nisl auctor. Sed id felis aliquam, luctus libero a, tempor ex. Nulla vel est sed dui
                            rutrum maximus sed at mi. Aliquam dapibus efficitur dolor, ut auctor mauris auctor vel. Aliquam erat
                            volutpat. Sed laoreet odio nec nibh facilisis venenatis.
                        </p>
                        <p>
                            Duis consectetur, elit in malesuada pretium, risus eros auctor est, id dignissim nulla neque ac metus.
                            Integer sit amet nibh non mauris sagittis iaculis. Phasellus et magna id orci venenatis convallis non vel
                            metus. Aenean molestie ultricies purus, sit amet tristique ligula consectetur id. Quisque condimentum justo
                            vel augue feugiat ultrices. Duis vitae sapien nec ligula vestibulum lacinia nec et ligula. Morbi varius
                            purus at risus tempor egestas. Phasellus rhoncus vestibulum ex, id euismod ipsum luctus sed. Aenean
                            luctus aliquet ipsum sed fermentum. Phasellus ut fringilla ipsum.
                        </p>
                    </div>
                </div>

            </div>
        </div><div class="col-lg-6">
            <div class="content" style="margin-top: 100vh">
                <div class="card">
                    <div class="card-body">
                        <h1>Onderliggende Content</h1>
                        <p>
                            Dit is de content onder de canvas die zichtbaar wordt na de volledige cirkelbeweging.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam purus eget nunc tincidunt,
                            sit amet tempor nisl auctor. Sed id felis aliquam, luctus libero a, tempor ex. Nulla vel est sed dui
                            rutrum maximus sed at mi. Aliquam dapibus efficitur dolor, ut auctor mauris auctor vel. Aliquam erat
                            volutpat. Sed laoreet odio nec nibh facilisis venenatis.
                        </p>
                        <p>
                            Duis consectetur, elit in malesuada pretium, risus eros auctor est, id dignissim nulla neque ac metus.
                            Integer sit amet nibh non mauris sagittis iaculis. Phasellus et magna id orci venenatis convallis non vel
                            metus. Aenean molestie ultricies purus, sit amet tristique ligula consectetur id. Quisque condimentum justo
                            vel augue feugiat ultrices. Duis vitae sapien nec ligula vestibulum lacinia nec et ligula. Morbi varius
                            purus at risus tempor egestas. Phasellus rhoncus vestibulum ex, id euismod ipsum luctus sed. Aenean
                            luctus aliquet ipsum sed fermentum. Phasellus ut fringilla ipsum.
                        </p>
                    </div>
                </div>

            </div>
        </div><div class="col-lg-6">
            <div class="content" style="margin-top: 100vh">
                <div class="card">
                    <div class="card-body">
                        <h1>Onderliggende Content</h1>
                        <p>
                            Dit is de content onder de canvas die zichtbaar wordt na de volledige cirkelbeweging.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam purus eget nunc tincidunt,
                            sit amet tempor nisl auctor. Sed id felis aliquam, luctus libero a, tempor ex. Nulla vel est sed dui
                            rutrum maximus sed at mi. Aliquam dapibus efficitur dolor, ut auctor mauris auctor vel. Aliquam erat
                            volutpat. Sed laoreet odio nec nibh facilisis venenatis.
                        </p>
                        <p>
                            Duis consectetur, elit in malesuada pretium, risus eros auctor est, id dignissim nulla neque ac metus.
                            Integer sit amet nibh non mauris sagittis iaculis. Phasellus et magna id orci venenatis convallis non vel
                            metus. Aenean molestie ultricies purus, sit amet tristique ligula consectetur id. Quisque condimentum justo
                            vel augue feugiat ultrices. Duis vitae sapien nec ligula vestibulum lacinia nec et ligula. Morbi varius
                            purus at risus tempor egestas. Phasellus rhoncus vestibulum ex, id euismod ipsum luctus sed. Aenean
                            luctus aliquet ipsum sed fermentum. Phasellus ut fringilla ipsum.
                        </p>
                    </div>
                </div>

            </div>
        </div><div class="col-lg-6">
            <div class="content" style="margin-top: 100vh">
                <div class="card">
                    <div class="card-body">
                        <h1>Onderliggende Content</h1>
                        <p>
                            Dit is de content onder de canvas die zichtbaar wordt na de volledige cirkelbeweging.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam purus eget nunc tincidunt,
                            sit amet tempor nisl auctor. Sed id felis aliquam, luctus libero a, tempor ex. Nulla vel est sed dui
                            rutrum maximus sed at mi. Aliquam dapibus efficitur dolor, ut auctor mauris auctor vel. Aliquam erat
                            volutpat. Sed laoreet odio nec nibh facilisis venenatis.
                        </p>
                        <p>
                            Duis consectetur, elit in malesuada pretium, risus eros auctor est, id dignissim nulla neque ac metus.
                            Integer sit amet nibh non mauris sagittis iaculis. Phasellus et magna id orci venenatis convallis non vel
                            metus. Aenean molestie ultricies purus, sit amet tristique ligula consectetur id. Quisque condimentum justo
                            vel augue feugiat ultrices. Duis vitae sapien nec ligula vestibulum lacinia nec et ligula. Morbi varius
                            purus at risus tempor egestas. Phasellus rhoncus vestibulum ex, id euismod ipsum luctus sed. Aenean
                            luctus aliquet ipsum sed fermentum. Phasellus ut fringilla ipsum.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Hand icon button -->
<button class="hand-icon" id="handIcon">
    <i class="fas fa-hand-pointer"></i>
</button>

<!-- Coordinates display -->
<div id="coords">
    <p>{x: <span id="coordX"></span>, y: <span id="coordY"></span>, z: <span id="coordZ"></span>}</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Three.js en OrbitControls -->
<script type="importmap">
    {
        "imports": {
            "three": "https://unpkg.com/three@0.157.0/build/three.module.js",
            "three/addons/": "https://unpkg.com/three@0.157.0/examples/jsm/",
            "@lumaai/luma-web": "https://unpkg.com/@lumaai/luma-web@0.2.0/dist/library/luma-web.module.js"
        }
    }
</script>
<script type="module">
    import { WebGLRenderer, PerspectiveCamera, Scene } from 'three';
    import { OrbitControls } from 'three/addons/controls/OrbitControls.js';
    import { LumaSplatsThree } from '@lumaai/luma-web';

    let canvas = document.querySelector('canvas');
    let content = document.querySelector('.content');
    let handIcon = document.getElementById('handIcon');
    let coords = $('#coords');
    let coordX = $('#coordX');
    let coordY = $('#coordY');
    let coordZ = $('#coordZ');

    let renderer = new WebGLRenderer({
        canvas: canvas,
        antialias: false
    });

    renderer.setSize(window.innerWidth, window.innerHeight, false);

    let scene = new Scene();

    let camera = new PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    camera.position.set(-0.38, 1.93, 0.13);

    let controls = new OrbitControls(camera, canvas);
    controls.enableDamping = true;

    // Definieer de naam van de splat (zonder extensie en zonder pad)
    const splatName = 'Toren01';  // Pas dit aan naar de juiste naam

    // Maak de splat met alleen de basisnaam (geen extensie, geen pad)
    let splat = new LumaSplatsThree({
        source: splatName // Geef alleen de naam op zonder extensie en map
    });
    scene.add(splat);

    let isFreeMoveEnabled = false;

    // Array of coordinates
    let pathCoordinates = [
        {x: -0.38, y: 1.93, z: 0.13},
        {x: -0.55, y: 0.08, z: 0.35},
        {x: -4.91, y: 0.30, z: 0.81}
    ];

    renderer.setAnimationLoop(() => {
        controls.update();
        renderer.render(scene, camera);

        // Update coordinates
        coordX.text(camera.position.x.toFixed(2));
        coordY.text(camera.position.y.toFixed(2));
        coordZ.text(camera.position.z.toFixed(2));
    });

    window.addEventListener('scroll', () => {
        if (!isFreeMoveEnabled) {
            const scrollY = window.scrollY;
            const viewportHeight = window.innerHeight;
            const totalScrollHeight = document.body.scrollHeight - viewportHeight;
            const scrollFraction = scrollY / totalScrollHeight;
            const pathIndex = Math.floor(scrollFraction * (pathCoordinates.length - 1));
            const nextPathIndex = Math.min(pathIndex + 1, pathCoordinates.length - 1);
            const progress = (scrollFraction * (pathCoordinates.length - 1)) % 1;

            const currentCoord = pathCoordinates[pathIndex];
            const nextCoord = pathCoordinates[nextPathIndex];

            // Interpolate between currentCoord en nextCoord
            camera.position.x = currentCoord.x + (nextCoord.x - currentCoord.x) * progress;
            camera.position.y = currentCoord.y + (nextCoord.y - currentCoord.y) * progress;
            camera.position.z = currentCoord.z + (nextCoord.z - currentCoord.z) * progress;
            camera.lookAt(scene.position);

            if (scrollFraction < 1) {
                canvas.classList.remove('transparent'); // Zorg ervoor dat de canvas zichtbaar is
            } else {
                canvas.classList.add('transparent'); // Maak de canvas langzaam transparant
            }
        }
    });

    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });

    handIcon.addEventListener('click', () => {
        isFreeMoveEnabled = !isFreeMoveEnabled;
        controls.enableZoom = isFreeMoveEnabled;
        controls.enableRotate = isFreeMoveEnabled;
        controls.enablePan = isFreeMoveEnabled;

        if (isFreeMoveEnabled) {
            handIcon.style.backgroundColor = 'rgba(254,65,75,0.98)'; // Change background color when enabled
            canvas.style.pointerEvents = 'auto'; // Enable pointer events
        } else {
            handIcon.style.backgroundColor = 'rgba(255, 255, 255, 0.8)'; // Revert background color when disabled
            canvas.style.pointerEvents = 'none'; // Disable pointer events
        }
    });

    // Disable canvas scroll functionality
    canvas.addEventListener('wheel', (event) => {
        if (!isFreeMoveEnabled) {
            event.preventDefault();
        }
    });

    // Initialize controls to be disabled at start
    controls.enableZoom = false;
    controls.enableRotate = false;
    controls.enablePan = false;
    canvas.style.pointerEvents = 'none';

    // jQuery toggle for coordinates display
    $(document).keypress((e) => {
        if (e.key === 'c' || e.key === 'C') {
            coords.toggle();
        }
    });
</script>




<script>
    $(document).ready(function(){
        var year = new Date().getFullYear();
        $("#currentYear").text(year);
    });
</script>

<!-- Fixed copyright banner -->
<div id="copyright-banner">
    &copy; <span id="currentYear"></span>ID/ photo agency. All rights reserved.
</div>
</body>
</html>
