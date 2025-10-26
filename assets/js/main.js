// main.js - Enhanced with Framer Motion-inspired animations
class CarteonApp {
  constructor() {
    this.init();
  }

  init() {
    this.setupTheme();
    this.setupMobileMenu();
    this.setupScrollAnimations();
    this.setupFAQs();
    this.setupSmoothScrolling();
    this.setupCardInteractions();
    this.setupParallaxEffects();
    this.setupMicroInteractions();
    this.setupAutoWritingEffects();
    this.setupScrollToTop();
  }

  // Theme Management
  setupTheme() {
    const themeToggle = document.getElementById("theme-toggle");
    const currentTheme = localStorage.getItem("theme") || "light";

    document.body.setAttribute("data-theme", currentTheme);

    themeToggle.addEventListener("click", () => {
      const newTheme =
        document.body.getAttribute("data-theme") === "light" ? "dark" : "light";
      document.body.setAttribute("data-theme", newTheme);
      localStorage.setItem("theme", newTheme);

      // Add theme transition class
      document.body.classList.add("theme-changing");
      setTimeout(() => {
        document.body.classList.remove("theme-changing");
      }, 300);
    });
  }

  // Mobile Menu
  setupMobileMenu() {
    const menuButton = document.getElementById("mobile-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");

    menuButton.addEventListener("click", () => {
      menuButton.classList.toggle("active");
      mobileMenu.classList.toggle("active");
      document.body.style.overflow = mobileMenu.classList.contains("active")
        ? "hidden"
        : "";
    });

    // Close menu when clicking on links
    mobileMenu.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", () => {
        menuButton.classList.remove("active");
        mobileMenu.classList.remove("active");
        document.body.style.overflow = "";
      });
    });
  }

  // Scroll Animations with Intersection Observer
  setupScrollAnimations() {
    const observerOptions = {
      threshold: 0.1,
      rootMargin: "0px 0px -100px 0px",
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");

          // Stagger children animations
          if (entry.target.dataset.stagger) {
            this.animateStaggerChildren(entry.target);
          }
        } else {
          // Remove visible class when element exits viewport
          entry.target.classList.remove("visible");

          // Reset stagger children animations
          if (entry.target.dataset.stagger) {
            this.resetStaggerChildren(entry.target);
          }
        }
      });
    }, observerOptions);

    // Observe all elements with data-scroll attribute
    document.querySelectorAll("[data-scroll]").forEach((el) => {
      observer.observe(el);
    });

    // Header scroll effect
    this.setupHeaderScroll();
  }

  animateStaggerChildren(parent) {
    const children = parent.querySelectorAll("[data-stagger-child]");
    children.forEach((child, index) => {
      child.style.transitionDelay = `${index * 0.1}s`;
      child.classList.add("visible");
    });
  }

  resetStaggerChildren(parent) {
    const children = parent.querySelectorAll("[data-stagger-child]");
    children.forEach((child) => {
      child.classList.remove("visible");
      child.style.transitionDelay = "";
    });
  }

  setupHeaderScroll() {
    const header = document.querySelector(".header");

    window.addEventListener("scroll", () => {
      const currentScroll = window.pageYOffset;

      if (currentScroll > 100) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    });
  }

  // FAQ Accordion
  setupFAQs() {
    const faqItems = document.querySelectorAll(".faq-item");

    faqItems.forEach((item) => {
      const question = item.querySelector(".faq-question");

      // Add click event for mobile/touch devices
      question.addEventListener("click", () => {
        const isActive = item.classList.contains("active");

        // Close all items
        faqItems.forEach((otherItem) => {
          otherItem.classList.remove("active");
        });

        // Open current if it wasn't active
        if (!isActive) {
          item.classList.add("active");
        }
      });

      // Add hover events for desktop
      item.addEventListener("mouseenter", () => {
        // Close all items
        faqItems.forEach((otherItem) => {
          otherItem.classList.remove("active");
        });

        // Open current item
        item.classList.add("active");
      });

      // Optional: Keep the FAQ open when hovering over the answer as well
      item.addEventListener("mouseleave", () => {
        // Close current item
        item.classList.remove("active");
      });
    });
  }

  // Smooth Scrolling
  setupSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", (e) => {
        e.preventDefault();
        const target = document.querySelector(anchor.getAttribute("href"));

        if (target) {
          const header = document.querySelector(".header");
          const headerHeight = header.offsetHeight;
          const headerTop = parseInt(window.getComputedStyle(header).top) || 0;
          const targetPosition =
            target.offsetTop - headerHeight - headerTop - 20;

          window.scrollTo({
            top: targetPosition,
            behavior: "smooth",
          });
        }
      });
    });
  }

  // Card Interactions
  setupCardInteractions() {
    const cards = document.querySelectorAll(".feature-card, .pricing-card");

    cards.forEach((card) => {
      card.addEventListener("mousemove", (e) => {
        this.handleCardTilt(e, card);

        // Coordinate with Three.js interactions
        if (window.threeEffects) {
          // Add subtle effect to 3D objects when hovering over cards
          window.threeEffects.objects.forEach((object, index) => {
            if (index % 3 === 0) {
              // Only affect every third object for performance
              object.userData.rotationSpeed.x += (Math.random() - 0.5) * 0.001;
              object.userData.rotationSpeed.y += (Math.random() - 0.5) * 0.001;
            }
          });
        }
      });

      card.addEventListener("mouseleave", () => {
        card.style.transform = "perspective(1000px) rotateX(0) rotateY(0)";
      });
    });
  }

  handleCardTilt(e, card) {
    const rect = card.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    const centerX = rect.width / 2;
    const centerY = rect.height / 2;

    const rotateY = (x - centerX) / 25;
    const rotateX = (centerY - y) / 25;

    card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
  }

  // Parallax Effects
  setupParallaxEffects() {
    const parallaxElements = document.querySelectorAll("[data-parallax]");

    window.addEventListener("scroll", () => {
      const scrolled = window.pageYOffset;

      parallaxElements.forEach((el) => {
        const speed = el.dataset.parallaxSpeed || 0.5;
        const yPos = -(scrolled * speed);
        el.style.transform = `translateY(${yPos}px)`;
      });

      // Coordinate with Three.js camera parallax
      if (window.threeEffects && window.threeEffects.camera) {
        const scrollIntensity = scrolled * 0.0005;
        window.threeEffects.camera.position.z = 5 + scrollIntensity;
      }
    });
  }

  // Micro-interactions
  setupMicroInteractions() {
    // Button hover effects
    const buttons = document.querySelectorAll(".cta-button, .btn");

    buttons.forEach((button) => {
      button.addEventListener("mousemove", (e) => {
        this.createRipple(e, button);
      });

      // Add water ripple effect on click
      button.addEventListener("click", (e) => {
        this.createWaterRipple(e, button);
      });
    });

    // Input focus effects
    const inputs = document.querySelectorAll("input, textarea");
    inputs.forEach((input) => {
      input.addEventListener("focus", () => {
        input.parentElement.classList.add("focused");
      });

      input.addEventListener("blur", () => {
        if (!input.value) {
          input.parentElement.classList.remove("focused");
        }
      });
    });

    // Enhanced mouse move effects that coordinate with Three.js
    document.addEventListener("mousemove", (e) => {
      // Coordinate with Three.js mouse interactions
      if (window.threeEffects) {
        window.threeEffects.mouse.x = (e.clientX / window.innerWidth) * 2 - 1;
        window.threeEffects.mouse.y = -(e.clientY / window.innerHeight) * 2 + 1;
      }
    });
  }

  createRipple(e, button) {
    const ripple = document.createElement("span");
    const rect = button.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = e.clientX - rect.left - size / 2;
    const y = e.clientY - rect.top - size / 2;

    // Coordinate ripple color with theme and Three.js effects
    const theme = document.body.getAttribute("data-theme");
    const rippleColor =
      theme === "dark" ? "rgba(255, 255, 255, 0.3)" : "rgba(0, 102, 255, 0.3)";

    ripple.style.cssText = `
            width: ${size}px;
            height: ${size}px;
            left: ${x}px;
            top: ${y}px;
            background: ${rippleColor};
            border-radius: 50%;
            position: absolute;
            animation: ripple 0.6s ease-out;
            pointer-events: none;
            box-shadow: 0 0 10px ${rippleColor};
        `;

    button.style.position = "relative";
    button.style.overflow = "hidden";
    button.appendChild(ripple);

    setTimeout(() => {
      ripple.remove();
    }, 600);
  }

  // Water ripple effect
  createWaterRipple(e, button) {
    const ripple = document.createElement("span");
    const rect = button.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height) * 2;
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    // Coordinate ripple color with theme and Three.js effects
    const theme = document.body.getAttribute("data-theme");
    const rippleColor =
      theme === "dark" ? "rgba(255, 255, 255, 0.4)" : "rgba(0, 102, 255, 0.4)";

    ripple.style.cssText = `
            width: 0;
            height: 0;
            left: ${x}px;
            top: ${y}px;
            background: ${rippleColor};
            border-radius: 50%;
            position: absolute;
            animation: waterRipple 0.8s ease-out;
            pointer-events: none;
            transform: translate(-50%, -50%);
        `;

    button.style.position = "relative";
    button.style.overflow = "hidden";
    button.appendChild(ripple);

    setTimeout(() => {
      ripple.remove();
    }, 800);
  }

  // Scroll to Top Button
  setupScrollToTop() {
    const scrollToTopButton = document.getElementById("scrollToTop");

    // Show/hide button based on scroll position
    window.addEventListener("scroll", () => {
      if (window.pageYOffset > 300) {
        scrollToTopButton.classList.add("visible");
      } else {
        scrollToTopButton.classList.remove("visible");
      }
    });

    // Scroll to top when button is clicked
    scrollToTopButton.addEventListener("click", () => {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    });
  }

  // Auto-writing effect
  setupAutoWritingEffects() {
    const typewriterElements = document.querySelectorAll(".typewriter");

    typewriterElements.forEach((element) => {
      const text = element.textContent;
      element.textContent = "";
      element.classList.add("typewriter-active");

      let i = 0;
      const typeWriter = () => {
        if (i < text.length) {
          element.textContent += text.charAt(i);
          i++;
          setTimeout(typeWriter, 50);
        }
      };

      // Start typing after a short delay
      setTimeout(typeWriter, 1000);
    });
  }
}

// Initialize the app when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  new CarteonApp();
});

// Add ripple animation to CSS
const style = document.createElement("style");
style.textContent = `
    @keyframes ripple {
        from {
            transform: scale(0);
            opacity: 1;
        }
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    @keyframes waterRipple {
        from {
            width: 0;
            height: 0;
            opacity: 0.5;
        }
        to {
            width: 300px;
            height: 300px;
            opacity: 0;
        }
    }
    
    .theme-changing {
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    
    /* Auto-writing effect */
    @keyframes typing {
        from { width: 0 }
        to { width: 100% }
    }
    
    @keyframes blink-caret {
        from, to { border-color: transparent }
        50% { border-color: var(--primary-color); }
    }
`;
document.head.appendChild(style);
