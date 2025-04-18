// Main JavaScript for CleanConnect frontend

document.addEventListener("DOMContentLoaded", function () {
  // Search form handling
  const searchForm = document.querySelector(".search-bar");
  if (searchForm) {
    searchForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const searchInput = document.querySelector(".search-input").value;
      if (searchInput.trim() !== "") {
        // In a real application, this would redirect to search results
        alert(
          `You searched for: ${searchInput}\nThis would normally redirect to search results.`
        );
        // searchRedirect(searchInput);
      } else {
        alert("Please enter a search term");
      }
    });
  }

  // Animation for elements on scroll
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  };

  const fadeInOnScroll = new IntersectionObserver(function (entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
        fadeInOnScroll.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Apply animations to service and category cards
  const animatedElements = document.querySelectorAll(
    ".service-card, .category-card"
  );
  animatedElements.forEach((el) => {
    el.classList.add("fade-in-element");
    fadeInOnScroll.observe(el);
  });

  // Mobile navigation toggle
  const mobileToggle = document.createElement("button");
  mobileToggle.classList.add("mobile-nav-toggle");
  mobileToggle.innerHTML = '<i class="fas fa-bars"></i>';

  const navbar = document.querySelector(".navbar");
  if (navbar && window.innerWidth < 768) {
    navbar.prepend(mobileToggle);

    mobileToggle.addEventListener("click", function () {
      const navLinks = document.querySelector(".nav-links");
      navLinks.classList.toggle("active");
      this.innerHTML = navLinks.classList.contains("active")
        ? '<i class="fas fa-times"></i>'
        : '<i class="fas fa-bars"></i>';
    });
  }

  // Add smooth scrolling to anchor links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      if (this.getAttribute("href") !== "#") {
        e.preventDefault();

        const targetId = this.getAttribute("href");
        const targetElement = document.querySelector(targetId);

        if (targetElement) {
          window.scrollTo({
            top: targetElement.offsetTop - 100,
            behavior: "smooth",
          });
        }
      }
    });
  });

  // Add CSS class for animations
  const style = document.createElement("style");
  style.textContent = `
        .fade-in-element {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        
        .fade-in-element.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .mobile-nav-toggle {
            display: none;
        }
        
        @media (max-width: 768px) {
            .mobile-nav-toggle {
                display: block;
                background: none;
                border: none;
                font-size: 1.5rem;
                color: var(--primary);
                cursor: pointer;
            }
            
            .nav-links {
                display: none;
                width: 100%;
                flex-direction: column;
                text-align: center;
                margin-top: 20px;
            }
            
            .nav-links.active {
                display: flex;
            }
            
            .nav-links li {
                margin: 10px 0;
            }
        }
    `;
  document.head.appendChild(style);
});

// Function to simulate a search redirect
function searchRedirect(query) {
  // This function would handle the search in a real application
  console.log(`Search query: ${query}`);
  // window.location.href = `/search?q=${encodeURIComponent(query)}`;
}

// Service data - could be loaded from an API in a real application
const servicesData = [
  {
    id: 1,
    name: "Regular Home Cleaning",
    price: 75,
    unit: "session",
    rating: 4.8,
    description:
      "Complete home cleaning including dusting, vacuuming, mopping, and sanitizing all surfaces.",
    image: "images/regular-home-cleaning.jpg",
  },
  {
    id: 2,
    name: "Deep Kitchen Cleaning",
    price: 120,
    unit: "session",
    rating: 5.0,
    description:
      "Intensive kitchen cleaning including appliances, cabinets, and hard-to-reach areas.",
    image: "images/kitchen-cleaning.jpg",
  },
  {
    id: 3,
    name: "Move-in/Move-out Cleaning",
    price: 200,
    unit: "service",
    rating: 4.7,
    description:
      "Thorough cleaning to prepare your new home or leave your old one spotless.",
    image: "images/moveout-cleaning.jpg",
  },
];

// This function could be used to dynamically load services from an API
function loadServices() {
  const servicesContainer = document.querySelector(".services");
  if (!servicesContainer) return;

  // Clear existing content
  servicesContainer.innerHTML = "";

  // Populate with services
  servicesData.forEach((service) => {
    const serviceCard = createServiceCard(service);
    servicesContainer.appendChild(serviceCard);
  });
}

// Helper function to create a service card
function createServiceCard(service) {
  const card = document.createElement("div");
  card.className = "service-card fade-in-element";

  // Create service card HTML structure
  card.innerHTML = `
        <img src="${service.image}" alt="${service.name}" class="service-img">
        <div class="service-content">
            <h3>${service.name}</h3>
            <div class="service-meta">
                <div class="service-price">$${service.price}<span>/${
    service.unit
  }</span></div>
                <div class="service-rating">
                    ${generateRatingStars(service.rating)}
                    <span>${service.rating.toFixed(1)}</span>
                </div>
            </div>
            <p class="service-desc">${service.description}</p>
            <a href="#" class="btn btn-primary" data-id="${
              service.id
            }">Book Now</a>
        </div>
    `;

  return card;
}

// Helper function to generate rating stars
function generateRatingStars(rating) {
  let starsHtml = "";
  const fullStars = Math.floor(rating);
  const hasHalfStar = rating % 1 >= 0.5;

  for (let i = 0; i < fullStars; i++) {
    starsHtml += '<i class="fas fa-star"></i>';
  }

  if (hasHalfStar) {
    starsHtml += '<i class="fas fa-star-half-alt"></i>';
  }

  const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);
  for (let i = 0; i < emptyStars; i++) {
    starsHtml += '<i class="far fa-star"></i>';
  }

  return starsHtml;
}
