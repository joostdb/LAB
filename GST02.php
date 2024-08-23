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
    <!-- Scrollama CSS -->
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
            display: none; /* Start hidden */
        }
        .step {
            opacity: 0.5;
            transition: opacity 0.3s ease;
            height: min-content;
        }
        .is-active {
            opacity: 1;
        }
        .push{
            margin-bottom: 50vh;
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
<div class="container mt-5">
    <canvas></canvas>
    <div id="tekstinhoud" class="row">
        <div class="col-lg-6">
            <div class="content">
                <div class="push"></div>
                <div class="step" data-step="0">
                    <div class="card">
                        <div class="card-body">
                            <h1>Onderliggende Content 1</h1>
                            <p>
                                Dit is de content onder de canvas die zichtbaar wordt na de volledige cirkelbeweging.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam purus eget nunc tincidunt,
                                sit amet tempor nisl auctor. Sed id felis aliquam, luctus libero a, tempor ex. Nulla vel est sed dui
                                rutrum maximus sed at mi. Aliquam dapibus efficitur dolor, ut auctor mauris auctor vel. Aliquam erat
                                volutpat. Sed laoreet odio nec nibh facilisis venenatis.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="push"></div>
                <div class="step" data-step="1">
                    <div class="card">
                        <div class="card-body">
                            <h1>Onderliggende Content 2</h1>
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
                <div class="push"></div>
                <div class="step" data-step="2">
                    <div class="card">
                        <div class="card-body">
                            <h1>Onderliggende Content 3</h1>
                            <p>
                                Dit is de content onder de canvas die zichtbaar wordt na de volledige cirkelbeweging.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam purus eget nunc tincidunt,
                                sit amet tempor nisl auctor. Sed id felis aliquam, luctus libero a, tempor ex. Nulla vel est sed dui
                                rutrum maximus sed at mi. Aliquam dapibus efficitur dolor, ut auctor mauris auctor vel. Aliquam erat
                                volutpat. Sed laoreet odio nec nibh facilisis venenatis.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="push"></div>
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
<script src="https://unpkg.com/scrollama"></script>
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
    import { WebGLRenderer, PerspectiveCamera, Scene, Vector3 } from 'three';
    import { OrbitControls } from 'three/addons/controls/OrbitControls.js';
    import { LumaSplatsThree } from '@lumaai/luma-web';

    let canvas = document.querySelector('canvas');
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
    camera.position.set(-1.87, 0.43, -0.44);

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
        {x: -1.87, y: 0.43, z: -0.44},
        {x: -1.19, y: -0.26, z: 1.55},
        {x: 1.83, y: 0.19, z: 0.72}
    ];

    // Transition parameters
    let transitionDuration = 1000; // Duration of the transition in milliseconds
    let transitionStart = 0;
    let transitionProgress = 0;
    let transitionActive = false;
    let targetCoord = new Vector3();
    let initialCoord = new Vector3();

    renderer.setAnimationLoop(() => {
        controls.update();
        renderer.render(scene, camera);

        // Update coordinates
        coordX.text(camera.position.x.toFixed(2));
        coordY.text(camera.position.y.toFixed(2));
        coordZ.text(camera.position.z.toFixed(2));

        // Handle camera transition
        if (transitionActive) {
            transitionProgress = (performance.now() - transitionStart) / transitionDuration;
            if (transitionProgress >= 1) {
                transitionProgress = 1;
                transitionActive = false;
            }
            camera.position.lerpVectors(initialCoord, targetCoord, transitionProgress);
            camera.lookAt(scene.position);
        }
    });

    let scroller = scrollama();

    scroller
        .setup({
            step: '.step',
            offset: 0.8,
            progress: false
        })
        .onStepEnter(response => {
            let stepIndex = response.index;
            let currentCoord = pathCoordinates[stepIndex];

            // Start smooth transition for both up and down scroll
            initialCoord.set(camera.position.x, camera.position.y, camera.position.z);
            targetCoord.set(currentCoord.x, currentCoord.y, currentCoord.z);
            transitionStart = performance.now();
            transitionActive = true;

            $('.step').removeClass('is-active');
            $(response.element).addClass('is-active');
        });

    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });

    handIcon.addEventListener('click', () => {
        $('#tekstinhoud').toggle();
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
        var copyrightText = '&copy; ' + year + ' ID/ photo agency';
        $('body').prepend('<div id="copyright-banner">' + copyrightText + '</div>');
    });
</script>
</body>
</html>
