// three-effects.js - Advanced 3D visual effects for the website
class ThreeEffects {
  constructor() {
    this.scene = null;
    this.camera = null;
    this.renderer = null;
    this.objects = [];
    this.mouse = new THREE.Vector2();
    this.raycaster = new THREE.Raycaster();
    this.intersectedObjects = [];
    this.clock = new THREE.Clock();
    this.init();
  }

  init() {
    // Check if we're on a mobile device
    this.isMobile =
      /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
        navigator.userAgent
      );

    // Only initialize on desktop for performance
    if (!this.isMobile) {
      this.setupScene();
      this.setupCamera();
      this.setupRenderer();
      this.setupLights();
      this.createFloatingObjects();
      this.setupEventListeners();
      this.animate();
    }
  }

  setupScene() {
    this.scene = new THREE.Scene();
    this.scene.background = null; // Transparent background to show HTML
    this.scene.fog = new THREE.Fog(0x0a0a0a, 10, 20);
  }

  setupCamera() {
    this.camera = new THREE.PerspectiveCamera(
      75,
      window.innerWidth / window.innerHeight,
      0.1,
      1000
    );
    this.camera.position.z = 5;
  }

  setupRenderer() {
    this.renderer = new THREE.WebGLRenderer({
      antialias: true,
      alpha: true, // Transparent background
    });
    this.renderer.setSize(window.innerWidth, window.innerHeight);
    this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    this.renderer.shadowMap.enabled = true;
    this.renderer.shadowMap.type = THREE.PCFSoftShadowMap;

    // Add the renderer to the page
    const canvasContainer = document.createElement("div");
    canvasContainer.id = "three-canvas-container";
    canvasContainer.style.position = "fixed";
    canvasContainer.style.top = "0";
    canvasContainer.style.left = "0";
    canvasContainer.style.pointerEvents = "none"; // So it doesn't block HTML interactions
    canvasContainer.style.zIndex = "-1"; // Behind all HTML content
    canvasContainer.appendChild(this.renderer.domElement);
    document.body.appendChild(canvasContainer);
  }

  setupLights() {
    // Ambient light
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
    this.scene.add(ambientLight);

    // Directional light
    const directionalLight = new THREE.DirectionalLight(0x0066ff, 1);
    directionalLight.position.set(5, 5, 5);
    directionalLight.castShadow = true;
    this.scene.add(directionalLight);

    // Point light with warm color
    const pointLight = new THREE.PointLight(0xff6600, 1, 100);
    pointLight.position.set(-5, -5, 5);
    pointLight.castShadow = true;
    this.scene.add(pointLight);

    // Add lights to objects for a glowing effect
    this.pointLights = [];
    for (let i = 0; i < 3; i++) {
      const light = new THREE.PointLight(0x00d4aa, 0.5, 10);
      light.position.set(
        (Math.random() - 0.5) * 10,
        (Math.random() - 0.5) * 10,
        (Math.random() - 0.5) * 10
      );
      this.scene.add(light);
      this.pointLights.push({
        light: light,
        speed: Math.random() * 0.5 + 0.1,
        offset: Math.random() * Math.PI * 2,
      });
    }
  }

  createFloatingObjects() {
    // Create several floating geometric objects
    const geometries = [
      new THREE.IcosahedronGeometry(0.5, 0),
      new THREE.TorusKnotGeometry(0.4, 0.1, 100, 16),
      new THREE.OctahedronGeometry(0.5),
      new THREE.ConeGeometry(0.4, 1, 8),
      new THREE.DodecahedronGeometry(0.4),
    ];

    const colors = [
      0x0066ff, // Blue
      0x00d4aa, // Teal
      0xff6600, // Orange
      0x6600ff, // Purple
      0xff0066, // Pink
    ];

    for (let i = 0; i < 15; i++) {
      const geometry =
        geometries[Math.floor(Math.random() * geometries.length)];
      const material = new THREE.MeshStandardMaterial({
        color: colors[Math.floor(Math.random() * colors.length)],
        metalness: 0.7,
        roughness: 0.3,
        transparent: true,
        opacity: 0.8,
        emissive: colors[Math.floor(Math.random() * colors.length)],
        emissiveIntensity: 0.2,
      });

      const mesh = new THREE.Mesh(geometry, material);

      // Position objects in a 3D space
      mesh.position.x = (Math.random() - 0.5) * 20;
      mesh.position.y = (Math.random() - 0.5) * 20;
      mesh.position.z = (Math.random() - 0.5) * 20;

      // Store initial positions for animation
      mesh.userData = {
        initialPosition: mesh.position.clone(),
        speed: Math.random() * 0.5 + 0.1,
        rotationSpeed: {
          x: (Math.random() - 0.5) * 0.02,
          y: (Math.random() - 0.5) * 0.02,
          z: (Math.random() - 0.5) * 0.02,
        },
        floatOffset: Math.random() * Math.PI * 2,
      };

      mesh.castShadow = true;
      mesh.receiveShadow = true;

      this.scene.add(mesh);
      this.objects.push(mesh);
    }
  }

  setupEventListeners() {
    // Mouse move for parallax effect
    window.addEventListener("mousemove", (event) => {
      this.mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
      this.mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;
    });

    // Window resize
    window.addEventListener("resize", () => {
      this.camera.aspect = window.innerWidth / window.innerHeight;
      this.camera.updateProjectionMatrix();
      this.renderer.setSize(window.innerWidth, window.innerHeight);
      this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    });

    // Scroll for parallax effect
    window.addEventListener("scroll", () => {
      const scrollY = window.scrollY;
      if (this.camera) {
        this.camera.position.y = -scrollY * 0.001;
      }
    });
  }

  animate() {
    requestAnimationFrame(() => this.animate());

    const delta = this.clock.getDelta();
    const elapsedTime = this.clock.getElapsedTime();

    // Animate floating objects with physics-inspired motion
    this.objects.forEach((object, index) => {
      // Float up and down with different speeds
      const floatSpeed = object.userData.speed;
      const floatOffset = object.userData.floatOffset;

      object.position.y =
        object.userData.initialPosition.y +
        Math.sin(elapsedTime * floatSpeed + floatOffset) * 0.5;

      // Gentle rotation
      object.rotation.x += object.userData.rotationSpeed.x;
      object.rotation.y += object.userData.rotationSpeed.y;
      object.rotation.z += object.userData.rotationSpeed.z;

      // Subtle position movement for dynamic effect
      object.position.x =
        object.userData.initialPosition.x +
        Math.sin(elapsedTime * floatSpeed * 0.7 + floatOffset) * 0.2;
      object.position.z =
        object.userData.initialPosition.z +
        Math.cos(elapsedTime * floatSpeed * 0.5 + floatOffset) * 0.3;
    });

    // Animate lights
    this.pointLights.forEach((lightData, index) => {
      const time = elapsedTime * lightData.speed + lightData.offset;
      lightData.light.position.x = Math.sin(time) * 5;
      lightData.light.position.y = Math.cos(time * 0.7) * 3;
      lightData.light.position.z = Math.cos(time * 0.5) * 4;

      // Pulsing effect
      lightData.light.intensity = 0.3 + Math.sin(time * 2) * 0.2;
    });

    // Camera parallax effect based on mouse position
    if (this.camera) {
      this.camera.position.x = this.mouse.x * 0.5;
      this.camera.position.y = -this.mouse.y * 0.5;
      this.camera.lookAt(this.scene.position);
    }

    // Render the scene
    if (this.renderer && this.scene && this.camera) {
      this.renderer.render(this.scene, this.camera);
    }
  }

  // Method to dispose of the Three.js scene to free memory
  dispose() {
    if (this.renderer) {
      this.renderer.dispose();
    }

    // Remove event listeners
    window.removeEventListener("mousemove", this.onMouseMove);
    window.removeEventListener("resize", this.onWindowResize);
    window.removeEventListener("scroll", this.onScroll);

    // Remove canvas container
    const container = document.getElementById("three-canvas-container");
    if (container && container.parentNode) {
      container.parentNode.removeChild(container);
    }
  }
}

// Initialize Three.js effects when the page loads
document.addEventListener("DOMContentLoaded", () => {
  // Only initialize on desktop for performance
  const isMobile =
    /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
      navigator.userAgent
    );

  if (!isMobile) {
    window.threeEffects = new ThreeEffects();
  }
});
