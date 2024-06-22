async function loadPortfolioData() {
    try {
        const response = await fetch('portfolio-data.json');
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error loading portfolio data:', error);
        return [];
    }
}

function renderPortfolioItems(data) {
    const portfolioContainer = document.getElementById('portfolio-items');
    data.forEach(item => {
        const portfolioItem = document.createElement('div');
        portfolioItem.classList.add('col-lg-4', 'col-md-6', 'portfolio-item', `filter-${item.category}`);
        portfolioItem.innerHTML = `
          <img src="${item.image}" class="img-fluid" alt="${item.title}">
          <div class="portfolio-info">
            <h4>${item.title}</h4>
            <p>${item.description}</p>
            <a href="${item.image}" title="${item.title}" data-gallery="portfolio-gallery-${item.category}" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="${item.detailsLink}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
          </div>
        `;
        portfolioContainer.appendChild(portfolioItem);
    });
    // Initialize Glightbox for dynamically added elements
    const glightbox = GLightbox({ selector: '.glightbox' });
}

document.addEventListener('DOMContentLoaded', async function () {
    const portfolioData = await loadPortfolioData();
    renderPortfolioItems(portfolioData);
});