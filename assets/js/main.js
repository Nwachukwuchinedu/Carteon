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

        // Coordinate with starfield interactions
        if (window.starField) {
          // Add subtle effect to stars when hovering over cards
          window.starField.stars.forEach((star, index) => {
            if (index % 5 === 0) {
              // Only affect every fifth star for performance
              star.element.style.transform = `scale(${
                1 + Math.random() * 0.5
              })`;
              setTimeout(() => {
                if (star.element) {
                  star.element.style.transform = "translate(0, 0)";
                }
              }, 300);
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

      // Coordinate with starfield parallax
      if (window.starField) {
        const scrollIntensity = scrolled * 0.0005;
        // Apply subtle scroll effect to stars
        window.starField.stars.forEach((star, index) => {
          if (index % 10 === 0) {
            // Only affect every 10th star for performance
            const yOffset = scrollIntensity * (index % 5);
            star.element.style.transform = `translateY(${yOffset}px)`;
          }
        });
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

    // Enhanced mouse move effects that coordinate with starfield
    document.addEventListener("mousemove", (e) => {
      // Coordinate with starfield mouse interactions
      if (window.starField) {
        window.starField.mouseX = (e.clientX / window.innerWidth) * 2 - 1;
        window.starField.mouseY = -(e.clientY / window.innerHeight) * 2 + 1;
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
        } else {
          // Remove the caret animation when typing is complete
          element.style.borderRight = "none";
        }
      };

      // Start typing after a short delay
      setTimeout(typeWriter, 1000);
    });
  }

  // Anime.js animations
  initializeAnimeAnimations() {
    // Animate "How It Works" section
    const howItWorksSection = document.querySelector(".how-it-works");
    if (howItWorksSection) {
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              // Animate steps with Anime.js
              const steps = document.querySelectorAll(".step");
              steps.forEach((step, index) => {
                anime({
                  targets: step,
                  translateY: [50, 0],
                  opacity: [0, 1],
                  scale: [0.8, 1],
                  duration: 800,
                  delay: index * 200,
                  easing: "easeOutQuart",
                });
              });

              // Animate step numbers with a bouncing effect
              const stepNumbers = document.querySelectorAll(".step-number");
              stepNumbers.forEach((number, index) => {
                anime({
                  targets: number,
                  scale: [0, 1],
                  rotate: [0, 360],
                  duration: 1000,
                  delay: index * 300,
                  elasticity: 600,
                  easing: "easeOutElastic",
                });
              });

              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.2 }
      );

      observer.observe(howItWorksSection);
    }

    // Animate "Tap to Connect" elements
    const tapElements = document.querySelectorAll(".step h3, .step p");
    tapElements.forEach((element, index) => {
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              anime({
                targets: element,
                translateX: [-30, 0],
                opacity: [0, 1],
                duration: 600,
                delay: index * 100,
                easing: "easeOutQuart",
              });

              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.5 }
      );

      observer.observe(element);
    });

    // Animate feature cards with staggered effect
    const featureCards = document.querySelectorAll(".feature-card");
    if (featureCards.length > 0) {
      const featureSection = document.querySelector(".features");
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              anime({
                targets: featureCards,
                translateY: [50, 0],
                opacity: [0, 1],
                duration: 800,
                delay: anime.stagger(150),
                easing: "easeOutQuart",
              });

              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.2 }
      );

      observer.observe(featureSection);
    }

    // Animate pricing cards with staggered effect
    const pricingCards = document.querySelectorAll(".pricing-card");
    if (pricingCards.length > 0) {
      const pricingSection = document.querySelector(".pricing");
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              anime({
                targets: pricingCards,
                translateY: [50, 0],
                opacity: [0, 1],
                duration: 800,
                delay: anime.stagger(200),
                easing: "easeOutQuart",
              });

              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.2 }
      );

      observer.observe(pricingSection);
    }
  }
}

// Initialize the app when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  const app = new CarteonApp();

  // Initialize Anime.js animations after the app is loaded
  setTimeout(() => {
    app.initializeAnimeAnimations();
  }, 100);
});

// Initialize Motion animations
document.addEventListener("DOMContentLoaded", () => {
  // Animate "Why Choose Us" section with Motion
  const featureCards = document.querySelectorAll(".feature-card");
  featureCards.forEach((card, index) => {
    // Split text animation for feature card titles
    const title = card.querySelector("h3");
    if (title) {
      // Wrap each character in a span for animation
      const text = title.textContent;
      title.innerHTML = text
        .split("")
        .map(
          (char) =>
            `<span class="char" style="display:inline-block">${char}</span>`
        )
        .join("");

      // Animate characters with staggered effect
      const chars = title.querySelectorAll(".char");
      motion.animate(
        chars,
        {
          opacity: [0, 1],
          y: [20, 0],
          scale: [0.8, 1],
        },
        {
          duration: 0.6,
          delay: motion.stagger(0.05),
          easing: "ease-out",
        }
      );
    }

    // Animate feature card content
    const description = card.querySelector("p");
    if (description) {
      motion.animate(
        description,
        {
          opacity: [0, 1],
          x: [-20, 0],
        },
        {
          duration: 0.8,
          delay: 0.3,
          easing: "ease-out",
        }
      );
    }

    // Animate feature icon
    const icon = card.querySelector(".feature-icon");
    if (icon) {
      motion.animate(
        icon,
        {
          scale: [0, 1],
          rotate: [0, 360],
        },
        {
          duration: 0.8,
          delay: 0.2,
          easing: "ease-out",
        }
      );
    }
  });

  // Animate "How It Works" section with Motion
  const steps = document.querySelectorAll(".step");
  steps.forEach((step, index) => {
    const stepNumber = step.querySelector(".step-number");
    const title = step.querySelector("h3");
    const description = step.querySelector("p");

    // Animate step number
    if (stepNumber) {
      motion.animate(
        stepNumber,
        {
          scale: [0, 1],
          opacity: [0, 1],
        },
        {
          duration: 0.6,
          delay: index * 0.2,
          easing: "ease-out",
        }
      );
    }

    // Animate step title with character split
    if (title) {
      const text = title.textContent;
      title.innerHTML = text
        .split("")
        .map(
          (char) =>
            `<span class="char" style="display:inline-block">${char}</span>`
        )
        .join("");

      const chars = title.querySelectorAll(".char");
      motion.animate(
        chars,
        {
          opacity: [0, 1],
          y: [20, 0],
        },
        {
          duration: 0.5,
          delay: motion.stagger(0.03, { start: index * 0.2 + 0.3 }),
          easing: "ease-out",
        }
      );
    }

    // Animate step description
    if (description) {
      motion.animate(
        description,
        {
          opacity: [0, 1],
          y: [20, 0],
        },
        {
          duration: 0.6,
          delay: index * 0.2 + 0.4,
          easing: "ease-out",
        }
      );
    }
  });

  // Animate FAQ section with Motion
  const faqItems = document.querySelectorAll(".faq-item");
  faqItems.forEach((item, index) => {
    const question = item.querySelector(".faq-question h3");
    const toggle = item.querySelector(".faq-toggle");

    if (question) {
      // Split text animation for FAQ questions
      const text = question.textContent;
      question.innerHTML = text
        .split("")
        .map(
          (char) =>
            `<span class="char" style="display:inline-block">${char}</span>`
        )
        .join("");

      const chars = question.querySelectorAll(".char");
      motion.animate(
        chars,
        {
          opacity: [0, 1],
          y: [15, 0],
        },
        {
          duration: 0.5,
          delay: motion.stagger(0.02, { start: index * 0.1 }),
          easing: "ease-out",
        }
      );
    }

    // Animate FAQ toggle icon
    if (toggle) {
      motion.animate(
        toggle,
        {
          scale: [0, 1],
          rotate: [0, 360],
        },
        {
          duration: 0.6,
          delay: index * 0.1 + 0.3,
          easing: "ease-out",
        }
      );
    }
  });

  // Animate CTA section with Motion
  const ctaSection = document.querySelector(".cta-section");
  if (ctaSection) {
    const ctaTitle = ctaSection.querySelector("h2");
    const ctaDescription = ctaSection.querySelector("p");
    const ctaButtons = ctaSection.querySelectorAll(".cta-button");

    if (ctaTitle) {
      // Split text animation for CTA title
      const text = ctaTitle.textContent;
      ctaTitle.innerHTML = text
        .split(" ")
        .map(
          (word) =>
            `<span class="word" style="display:inline-block">${word}</span>`
        )
        .join(" ");

      const words = ctaTitle.querySelectorAll(".word");
      motion.animate(
        words,
        {
          opacity: [0, 1],
          y: [20, 0],
          scale: [0.9, 1],
        },
        {
          duration: 0.7,
          delay: motion.stagger(0.1),
          easing: "ease-out",
        }
      );
    }

    if (ctaDescription) {
      motion.animate(
        ctaDescription,
        {
          opacity: [0, 1],
          y: [20, 0],
        },
        {
          duration: 0.8,
          delay: 0.5,
          easing: "ease-out",
        }
      );
    }

    if (ctaButtons.length > 0) {
      motion.animate(
        ctaButtons,
        {
          opacity: [0, 1],
          scale: [0.8, 1],
          y: [10, 0],
        },
        {
          duration: 0.6,
          delay: motion.stagger(0.2, { start: 0.7 }),
          easing: "ease-out",
        }
      );
    }
  }

  // Animate pricing cards with Motion
  const pricingCards = document.querySelectorAll(".pricing-card");
  pricingCards.forEach((card, index) => {
    const title = card.querySelector("h3");
    const price = card.querySelector(".price");
    const features = card.querySelectorAll(".features-list li");

    // Animate card title
    if (title) {
      motion.animate(
        title,
        {
          opacity: [0, 1],
          x: [-30, 0],
        },
        {
          duration: 0.6,
          delay: index * 0.1,
          easing: "ease-out",
        }
      );
    }

    // Animate price
    if (price) {
      motion.animate(
        price,
        {
          opacity: [0, 1],
          scale: [0.5, 1],
        },
        {
          duration: 0.8,
          delay: index * 0.1 + 0.2,
          easing: "ease-out",
        }
      );
    }

    // Animate features list items
    if (features.length > 0) {
      motion.animate(
        features,
        {
          opacity: [0, 1],
          x: [-20, 0],
        },
        {
          duration: 0.5,
          delay: motion.stagger(0.1, { start: index * 0.1 + 0.3 }),
          easing: "ease-out",
        }
      );
    }
  });
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
    
    /* Motion animation classes */
    .char, .word {
        display: inline-block;
    }
`;
document.head.appendChild(style);
