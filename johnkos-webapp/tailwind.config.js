const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        // Pastikan ini mencakup semua file Blade Anda
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                'background': '#eef2f6',
                'surface': '#e0eaf5',
                'surface-hover': '#d8e3f2',
                'primary': {
                    DEFAULT: '#6a9ce4',
                    hover: '#5585d1',
                },
                'main': '#1C398E',
                'muted': '#5e7399',
                'success': '#81c784',
                'warning': '#ffb74d',
                'danger': '#e57373',
                'card-border': 'rgba(255, 255, 255, 0.5)',
                dark: {
                    'background': '#1e293b',
                    'surface': '#334155',
                    'surface-hover': '#475569',
                    'primary': {
                        DEFAULT: '#3b82f6',
                        hover: '#60a5fa',
                    },
                    'main': '#f1f5f9',
                    'muted': '#94a3b8',
                    'card-border': 'rgba(255, 255, 255, 0.05)',
                }
            },
            boxShadow: {
                'input': 'inset 4px 4px 8px rgba(163, 177, 198, 0.6), inset -4px -4px 8px rgba(255, 255, 255, 0.9)',
                'clay': '8px 8px 16px rgba(163, 177, 198, 0.6), -8px -8px 16px rgba(255, 255, 255, 0.9), inset 2px 2px 4px rgba(255, 255, 255, 0.5)',
                'clay-hover': '12px 12px 20px rgba(163, 177, 198, 0.6), -12px -12px 20px rgba(255, 255, 255, 0.9), inset 2px 2px 4px rgba(255, 255, 255, 0.5)',
                'clay-active': 'inset 6px 6px 10px rgba(163, 177, 198, 0.6), inset -6px -6px 10px rgba(255, 255, 255, 0.9)',
                'dark-input': 'inset 4px 4px 8px rgba(0, 0, 0, 0.5)',
                'dark-clay': '8px 8px 16px rgba(0, 0, 0, 0.5), inset 2px 2px 4px rgba(0, 0, 0, 0.3)',
                'dark-clay-hover': '12px 12px 20px rgba(0, 0, 0, 0.5), inset 2px 2px 4px rgba(0, 0, 0, 0.3)',
                'dark-clay-active': 'inset 6px 6px 10px rgba(0, 0, 0, 0.5), inset -6px -6px 10px rgba(0, 0, 0, 0.5)', // Adjusted for dark mode
            },
            borderRadius: {
                'sm': '12px',
                'md': '24px',
                'full': '999px',
            },
            spacing: {
                '2': '8px',
                '3': '12px',
                '4': '16px',
                '6': '24px',
                '8': '32px',
            },
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins', 'sans-serif'],
            },
            keyframes: {
                fadeIn: {
                    'from': { opacity: '0' },
                    'to': { opacity: '1' },
                },
            },
            animation: {
                'fade-in': 'fadeIn 0.4s ease-out forwards',
            },
        },
    },
    plugins: [],
};
