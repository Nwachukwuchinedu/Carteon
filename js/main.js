// Custom Cursor
const cursorDot = document.querySelector(".cursor-dot");
const cursorOutline = document.querySelector(".cursor-outline");

// Theme Toggle
const themeToggle = document.getElementById("theme-toggle");
const body = document.body;

// Mobile Menu
const mobileMenuButton = document.getElementById("mobile-menu-button");
const mobileMenu = document.getElementById("mobile-menu");
const mobileMenuBackdrop = document.getElementById("mobile-menu-backdrop");

// FAQ Items
const faqItems = document.querySelectorAll(".faq-item");

// Header scroll effect
const header = document.getElementById("page-header");

// Hero Card Content Cycles
const heroCardContent = document.querySelector(".card-content");
let currentCardState = 0;

// Initialize
document.addEventListener("DOMContentLoaded", function () {
  // Set theme from localStorage or default to light
  const savedTheme = localStorage.getItem("theme") || "light";
  body.setAttribute("data-theme", savedTheme);

  // Update theme toggle button appearance
  updateThemeToggleIcon(savedTheme);

  // Initialize scroll animations
  initScrollAnimations();

  // Initialize custom cursor
  initCustomCursor();

  // Initialize hero card cycling
  initHeroCardCycle();
});

// Theme Toggle Functionality
function toggleTheme() {
  const currentTheme = body.getAttribute("data-theme");
  const newTheme = currentTheme === "light" ? "dark" : "light";

  body.setAttribute("data-theme", newTheme);
  localStorage.setItem("theme", newTheme);
  updateThemeToggleIcon(newTheme);
}

themeToggle.addEventListener("click", toggleTheme);

// Mobile theme toggle
const mobileThemeToggle = document.getElementById("theme-toggle-mobile");
if (mobileThemeToggle) {
  mobileThemeToggle.addEventListener("click", toggleTheme);
}

function updateThemeToggleIcon(theme) {
  // The CSS handles the visibility of sun/moon icons
  // This function is here for potential future enhancements
}

// Mobile Menu Functionality
mobileMenuButton.addEventListener("click", function () {
  mobileMenu.classList.toggle("active");
  mobileMenuButton.classList.toggle("active");
  mobileMenuBackdrop.classList.toggle("active");
  body.classList.toggle("no-scroll");
});

// Close mobile menu when clicking on backdrop
if (mobileMenuBackdrop) {
  mobileMenuBackdrop.addEventListener("click", function () {
    mobileMenu.classList.remove("active");
    mobileMenuButton.classList.remove("active");
    mobileMenuBackdrop.classList.remove("active");
    body.classList.remove("no-scroll");
  });
}

// Close mobile menu when clicking on a link
document.querySelectorAll(".mobile-menu a").forEach((link) => {
  link.addEventListener("click", () => {
    mobileMenu.classList.remove("active");
    mobileMenuButton.classList.remove("active");
    mobileMenuBackdrop.classList.remove("active");
    body.classList.remove("no-scroll");
  });
});

// Close mobile menu when clicking on close button
// Removed as we're using backdrop click to close

// FAQ Accordion Functionality
faqItems.forEach((item) => {
  const question = item.querySelector(".faq-question");

  // Click event
  question.addEventListener("click", () => {
    // Close all other FAQ items
    faqItems.forEach((otherItem) => {
      if (otherItem !== item && otherItem.classList.contains("active")) {
        otherItem.classList.remove("active");
      }
    });

    // Toggle current item
    item.classList.toggle("active");
  });

  // Hover event
  item.addEventListener("mouseenter", () => {
    // Close all other FAQ items
    faqItems.forEach((otherItem) => {
      if (otherItem !== item && otherItem.classList.contains("active")) {
        otherItem.classList.remove("active");
      }
    });

    // Activate current item
    item.classList.add("active");
  });

  // Mouse leave event - optional: keep open or close
  item.addEventListener("mouseleave", () => {
    // Uncomment the next line if you want to close the FAQ on mouse leave
    // item.classList.remove("active");
  });
});

// Header Scroll Effect
window.addEventListener("scroll", function () {
  if (window.scrollY > 50) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});

// Card Selection Functionality
const cardSelectButtons = document.querySelectorAll(".card-select-btn");
cardSelectButtons.forEach((button) => {
  button.addEventListener("click", function () {
    const cardId = this.closest(".card-item").dataset.cardId;
    window.location.href = `checkout.php?card=${cardId}`;
  });
});

// Profile Image Edit Functionality
const profileImageContainer = document.querySelector(
  ".profile-image-container"
);
if (profileImageContainer) {
  profileImageContainer.addEventListener("click", function () {
    // In a real application, this would trigger a file upload dialog
    alert("Profile image upload functionality would be implemented here.");
  });
}

// Custom Cursor Implementation
function initCustomCursor() {
  // Only initialize on desktop devices
  if (window.innerWidth <= 768) {
    cursorDot.style.display = "none";
    cursorOutline.style.display = "none";
    return;
  }

  document.addEventListener("mousemove", function (e) {
    const posX = e.clientX;
    const posY = e.clientY;

    cursorDot.style.left = `${posX}px`;
    cursorDot.style.top = `${posY}px`;

    // Delayed movement for outline for smooth effect
    setTimeout(() => {
      cursorOutline.style.left = `${posX}px`;
      cursorOutline.style.top = `${posY}px`;
    }, 50);
  });

  // Hover effects for interactive elements
  const hoverElements = document.querySelectorAll(
    "a, button, .faq-question, .step-card, .feature-card"
  );

  hoverElements.forEach((element) => {
    element.addEventListener("mouseenter", () => {
      cursorDot.classList.add("hover");
      cursorOutline.classList.add("hover");
    });

    element.addEventListener("mouseleave", () => {
      cursorDot.classList.remove("hover");
      cursorOutline.classList.remove("hover");
    });
  });
}

// Scroll Animations with IntersectionObserver
function initScrollAnimations() {
  const sections = document.querySelectorAll("section");

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // Add visible class when scrolling into view
          entry.target.classList.add("visible");
        } else {
          // Remove visible class when scrolling out of view to allow replay
          entry.target.classList.remove("visible");
        }
      });
    },
    {
      threshold: 0.1,
      rootMargin: "0px 0px -50px 0px",
    }
  );

  sections.forEach((section) => {
    observer.observe(section);
  });
}

// Hero Card Cycling
function initHeroCardCycle() {
  // Card states content
  const cardStates = [
    {
      title: "Sarah Chen",
      subtitle: "Product Manager",
      content: `
        <div class="profile-image">
          <div class="placeholder">
            <i class="fas fa-hand-point-up"></i>
          </div>
        </div>
        <h2>Sarah Chen</h2>
        <p class="title">Product Manager</p>
        <div class="contact-info">
          <p>Tap to Share</p>
          <p>Hold near NFC device</p>
        </div>
        <button class="btn add-contact">Tap to Share</button>
      `,
    },
    {
      title: "Sarah Chen",
      subtitle: "Product Manager",
      content: `
        <div class="profile-image">
          <div class="placeholder">
            <i class="fas fa-link"></i>
          </div>
        </div>
        <h2>Sarah Chen</h2>
        <p class="title">Product Manager</p>
        <div class="contact-info">
          <p>Connecting...</p>
          <p>Transferring data</p>
        </div>
        <button class="btn add-contact">Connecting</button>
      `,
    },
    {
      title: "Sarah Chen",
      subtitle: "Product Manager",
      content: `
        <div class="profile-image">
          <div class="placeholder">
            <i class="fas fa-save"></i>
          </div>
        </div>
        <h2>Sarah Chen</h2>
        <p class="title">Product Manager</p>
        <div class="contact-info">
          <p>Sarah Chen</p>
          <p>+234 801 234 5678</p>
          <p>sarah@example.com</p>
        </div>
        <button class="btn add-contact">Add to Contacts</button>
      `,
    },
  ];

  // Update card content
  function updateCardContent() {
    if (heroCardContent) {
      heroCardContent.innerHTML = cardStates[currentCardState].content;
    }
    currentCardState = (currentCardState + 1) % cardStates.length;
  }

  // Initial update
  updateCardContent();

  // Set interval to cycle every 3 seconds
  setInterval(updateCardContent, 3000);
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();

    const targetId = this.getAttribute("href");
    if (targetId === "#") return;

    const targetElement = document.querySelector(targetId);
    if (targetElement) {
      window.scrollTo({
        top: targetElement.offsetTop - 80,
        behavior: "smooth",
      });
    }
  });
});
