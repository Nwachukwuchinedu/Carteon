// three-effects.js - 3D Starfield with connectivity lines and physics interactions

class StarField {
  constructor() {
    this.stars = [];
    this.connections = [];
    this.starfield = null;
    this.canvas = null;
    this.ctx = null;
    this.mouseX = 0;
    this.mouseY = 0;
    this.isMobile =
      /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
        navigator.userAgent
      );

    if (!this.isMobile) {
      this.init();
    }
  }

  init() {
    // Create starfield container
    this.starfield = document.createElement("div");
    this.starfield.id = "starfield";
    this.starfield.style.position = "fixed";
    this.starfield.style.top = "0";
    this.starfield.style.left = "0";
    this.starfield.style.width = "100%";
    this.starfield.style.height = "100%";
    this.starfield.style.pointerEvents = "none";
    this.starfield.style.zIndex = "-1";
    this.starfield.style.overflow = "hidden";

    // Create canvas for connection lines
    this.canvas = document.createElement("canvas");
    this.canvas.style.position = "absolute";
    this.canvas.style.top = "0";
    this.canvas.style.left = "0";
    this.canvas.style.width = "100%";
    this.canvas.style.height = "100%";
    this.canvas.style.pointerEvents = "none";

    this.starfield.appendChild(this.canvas);
    document.body.appendChild(this.starfield);

    // Setup canvas context
    this.setupCanvas();

    // Create stars
    this.createStars();

    // Setup event listeners
    this.setupEventListeners();

    // Start animations
    this.animateStars();
  }

  setupCanvas() {
    this.canvas.width = window.innerWidth;
    this.canvas.height = window.innerHeight;
    this.ctx = this.canvas.getContext("2d");
  }

  createStars() {
    const starCount = 150;

    for (let i = 0; i < starCount; i++) {
      // Random 3D position
      const x = Math.random() * window.innerWidth;
      const y = Math.random() * window.innerHeight;
      const z = Math.random() * 1000; // Depth

      // Random size (1px to 3px)
      const size = 1 + Math.random() * 2;

      // Random opacity (0.4 to 1)
      const opacity = 0.4 + Math.random() * 0.6;

      // Random color (white to light blue/purple)
      const colorVariation = Math.random();
      let color;
      if (colorVariation < 0.3) {
        color = `rgba(100, 150, 255, ${opacity})`; // Blue
      } else if (colorVariation < 0.6) {
        color = `rgba(150, 100, 255, ${opacity})`; // Purple
      } else {
        color = `rgba(255, 255, 255, ${opacity})`; // White
      }

      // Create star element
      const star = document.createElement("div");
      star.className = "star";
      star.style.position = "absolute";
      star.style.width = `${size}px`;
      star.style.height = `${size}px`;
      star.style.backgroundColor = color;
      star.style.borderRadius = "50%";
      star.style.boxShadow = `0 0 ${size * 2}px ${size * 1.5}px ${color}`;
      star.style.willChange = "transform, opacity";
      star.style.zIndex = "1";

      // Position star
      star.style.left = `${x}px`;
      star.style.top = `${y}px`;

      this.starfield.appendChild(star);

      // Store star data
      const starData = {
        element: star,
        x: x,
        y: y,
        z: z,
        size: size,
        opacity: opacity,
        color: color,
        originalX: x,
        originalY: y,
        speedX: (Math.random() - 0.5) * 0.5,
        speedY: (Math.random() - 0.5) * 0.5,
        speedZ: (Math.random() - 0.5) * 0.2,
        pulseSpeed: 0.5 + Math.random() * 2,
        pulseOffset: Math.random() * Math.PI * 2,
      };

      this.stars.push(starData);
    }
  }

  setupEventListeners() {
    // Mouse move for parallax effect
    document.addEventListener("mousemove", (e) => {
      this.mouseX = (e.clientX / window.innerWidth) * 2 - 1;
      this.mouseY = -(e.clientY / window.innerHeight) * 2 + 1;
    });

    // Window resize
    window.addEventListener("resize", () => {
      this.canvas.width = window.innerWidth;
      this.canvas.height = window.innerHeight;

      // Reset star positions on resize
      this.stars.forEach((star) => {
        star.originalX = Math.random() * window.innerWidth;
        star.originalY = Math.random() * window.innerHeight;
        star.element.style.left = `${star.originalX}px`;
        star.element.style.top = `${star.originalY}px`;
      });
    });

    // Scroll for parallax effect
    window.addEventListener("scroll", () => {
      // Scroll effect can be added here if needed
    });
  }

  // Calculate distance between two stars
  getDistance(star1, star2) {
    const dx = star1.x - star2.x;
    const dy = star1.y - star2.y;
    const dz = star1.z - star2.z;
    return Math.sqrt(dx * dx + dy * dy + dz * dz);
  }

  // Draw connection lines between nearby stars
  drawConnections() {
    this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

    const maxDistance = 150;
    const connections = [];

    // Check connections between stars
    for (let i = 0; i < this.stars.length; i++) {
      for (let j = i + 1; j < this.stars.length; j++) {
        const star1 = this.stars[i];
        const star2 = this.stars[j];

        const distance = this.getDistance(star1, star2);

        if (distance < maxDistance) {
          // Calculate opacity based on distance
          const opacity = 1 - distance / maxDistance;

          // Store connection data
          connections.push({
            star1: star1,
            star2: star2,
            opacity: opacity,
            distance: distance,
          });
        }
      }
    }

    // Draw connections
    this.ctx.lineWidth = 0.5;
    connections.forEach((conn) => {
      this.ctx.beginPath();
      this.ctx.moveTo(conn.star1.x, conn.star1.y);
      this.ctx.lineTo(conn.star2.x, conn.star2.y);

      // Gradient line color based on star colors
      const gradient = this.ctx.createLinearGradient(
        conn.star1.x,
        conn.star1.y,
        conn.star2.x,
        conn.star2.y
      );

      gradient.addColorStop(
        0,
        conn.star1.color.replace(/\d\.\d+\)/, `${conn.opacity * 0.5})`)
      );
      gradient.addColorStop(
        1,
        conn.star2.color.replace(/\d\.\d+\)/, `${conn.opacity * 0.5})`)
      );

      this.ctx.strokeStyle = gradient;
      this.ctx.stroke();
    });

    this.connections = connections;
  }

  animateStars() {
    const animate = () => {
      const time = Date.now() * 0.001;

      // Update star positions with 3D physics
      this.stars.forEach((star, index) => {
        // Update position with velocity
        star.x += star.speedX;
        star.y += star.speedY;
        star.z += star.speedZ;

        // Apply boundary checks with wrapping
        if (star.x > window.innerWidth + 50) star.x = -50;
        if (star.x < -50) star.x = window.innerWidth + 50;
        if (star.y > window.innerHeight + 50) star.y = -50;
        if (star.y < -50) star.y = window.innerHeight + 50;

        // Apply depth-based scaling
        const scale = 0.5 + (star.z / 1000) * 0.5;

        // Apply mouse interaction
        const mouseInfluence = 50;
        const dx = star.x - this.mouseX * window.innerWidth;
        const dy = star.y - this.mouseY * window.innerHeight;
        const distance = Math.sqrt(dx * dx + dy * dy);

        if (distance < mouseInfluence * 5) {
          const force = (1 - distance / (mouseInfluence * 5)) * 2;
          star.x += (dx / distance) * force;
          star.y += (dy / distance) * force;
        }

        // Apply pulsing glow effect
        const pulse =
          0.7 + Math.sin(time * star.pulseSpeed + star.pulseOffset) * 0.3;
        const glowSize = star.size * scale * pulse * 2;

        // Update star element
        star.element.style.left = `${star.x}px`;
        star.element.style.top = `${star.y}px`;
        star.element.style.transform = `scale(${scale})`;
        star.element.style.opacity = star.opacity * pulse;
        star.element.style.boxShadow = `0 0 ${glowSize}px ${glowSize * 0.5}px ${
          star.color
        }`;
      });

      // Draw connections
      this.drawConnections();

      requestAnimationFrame(animate);
    };

    animate();
  }

  // Method to dispose of the starfield to free memory
  dispose() {
    if (this.starfield && this.starfield.parentNode) {
      this.starfield.parentNode.removeChild(this.starfield);
    }
  }
}

// Initialize starfield when the page loads
document.addEventListener("DOMContentLoaded", () => {
  // Only initialize on desktop for performance
  const isMobile =
    /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
      navigator.userAgent
    );

  if (!isMobile) {
    window.starField = new StarField();
  }
});
