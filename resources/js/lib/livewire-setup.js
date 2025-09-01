// Livewire + Alpine.js + Motion One setup utilities
// This file would be imported in the main app.js

export function setupHeroAnimation() {
  const hero = document.querySelector('[data-hero]');
  if (hero && window.animate) {
    window.animate(hero, 
      { opacity: [0, 1], y: [-12, 0] }, 
      { duration: 0.6, easing: 'ease-out' }
    );
  }
}

export function setupChartJs() {
  const chartCanvas = document.getElementById('borrowingChart');
  if (chartCanvas && window.Chart) {
    const ctx = chartCanvas.getContext('2d');
    return new window.Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: 'Peminjaman',
          data: [12, 19, 3, 5, 2, 3],
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });
  }
}

export function setupFlatpickr() {
  if (window.flatpickr) {
    const flatpickrInputs = document.querySelectorAll('.flatpickr-input');
    flatpickrInputs.forEach(input => {
      window.flatpickr(input, {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today"
      });
    });
  }
}