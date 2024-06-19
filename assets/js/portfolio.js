document.addEventListener('DOMContentLoaded', function () {
    fetch('assets/data/portfolio.json')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('portfolio-container');
            data.forEach(item => {
                const portfolioItem = document.createElement('div');
                portfolioItem.className = `col-lg-4 col-md-6 portfolio-item ${item.category}`;
                portfolioItem.innerHTML = `
            <img src="${item.image}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>${item.title}</h4>
              <p>${item.description}</p>
              <a href="${item.image}" title="${item.title}" data-gallery="portfolio-gallery-${item.category}" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="${item.detailsLink}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
          `;
                container.appendChild(portfolioItem);
            });
            // Initialize GLightbox for dynamically added items
            const lightbox = GLightbox({ selector: '.glightbox' });
        })
        .catch(error => console.error('Error loading portfolio data:', error));
});
