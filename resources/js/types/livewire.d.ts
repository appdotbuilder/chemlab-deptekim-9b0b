// Livewire Migration Types and Documentation
// This file documents the completed migration from Inertia/React to Livewire v3

declare global {
  interface Window {
    Alpine: unknown;
    flatpickr: unknown;
    Chart: unknown;
    animate: unknown;
  }
}

// Equipment types for the grid component
export interface Equipment {
  id: number;
  name: string;
  code: string;
  status: 'available' | 'borrowed' | 'maintenance';
  location: string;
  image: string;
}

// Loan form data structure
export interface LoanFormData {
  equipment_id: number;
  borrow_date: string;
  return_date: string;
  purpose: string;
  supervisor: string;
  jsa_file: File;
}

// Migration Status: COMPLETED
// - Landing page with hero animation
// - Equipment grid with filtering
// - Loan application form with Flatpickr
// - Dashboard with Chart.js integration
// - Auth views (login, register)
// - Dark mode toggle with Alpine.js
// - TailwindCSS setup
// - Responsive design
// - Test coverage

export {};