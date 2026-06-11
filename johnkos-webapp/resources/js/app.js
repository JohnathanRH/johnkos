document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.getElementById('theme-toggle');

    if (themeToggle) {
        themeToggle.addEventListener('click', () => {
            const htmlElement = document.documentElement;
            const isDark = htmlElement.classList.contains('dark');
            const newTheme = isDark ? 'light' : 'dark';

            localStorage.setItem('color-theme', newTheme);

            if (newTheme === 'dark') {
                htmlElement.classList.add('dark');
            } else {
                htmlElement.classList.remove('dark');
            }
        });
    }

    // --- LOGIKA HALAMAN LOGIN (Hanya berjalan jika elemennya ada) ---
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        const ownerBtn = document.getElementById('ownerBtn');
        const tenantBtn = document.getElementById('tenantBtn');
        const selectedRoleInput = document.getElementById('selectedRole');
        const passwordField = document.getElementById('password');
        const toggleButton = document.getElementById('passwordToggle');

        const setActive = (button) => {
            ownerBtn.className = 'p-3 rounded-md border border-transparent bg-transparent text-muted dark:text-dark-muted font-semibold cursor-pointer transition-all duration-200 ease-in-out hover:text-primary dark:hover:text-dark-primary hover:bg-primary/10';
            tenantBtn.className = 'p-3 rounded-md border border-transparent bg-transparent text-muted dark:text-dark-muted font-semibold cursor-pointer transition-all duration-200 ease-in-out hover:text-primary dark:hover:text-dark-primary hover:bg-primary/10';
            button.className = 'p-3 rounded-md border border-transparent bg-surface dark:bg-dark-surface text-main dark:text-dark-main font-semibold cursor-pointer transition-all duration-200 ease-in-out shadow-clay dark:shadow-dark-clay';
        };

        ownerBtn.addEventListener('click', () => {
            setActive(ownerBtn);
            selectedRoleInput.value = 'owner';
            loginForm.action = ownerBtn.dataset.action;
        });

        tenantBtn.addEventListener('click', () => {
            setActive(tenantBtn);
            selectedRoleInput.value = 'tenant';
            loginForm.action = tenantBtn.dataset.action;
        });

        toggleButton.addEventListener('click', () => {
            const isPassword = passwordField.type === 'password';
            passwordField.type = isPassword ? 'text' : 'password';
            toggleButton.textContent = isPassword ? 'HIDE' : 'SHOW';
        });
    }

    // --- LOGIKA HALAMAN PROFIL (Hanya berjalan jika elemennya ada) ---
    const emailNotifToggle = document.getElementById('emailNotifToggle');
    if (emailNotifToggle) {
        emailNotifToggle.addEventListener('change', function () {
            if (this.checked) {
                console.log('Notifikasi Email AKTIF');
                // Di sini Anda bisa menambahkan logika fetch/axios untuk update ke backend
            } else {
                console.log('Notifikasi Email NONAKTIF');
                // Di sini Anda bisa menambahkan logika fetch/axios untuk update ke backend
            }
        });
    }

    // --- LOGIKA FILTER BUTTONS ---
    const initFilterButtons = (containerId) => {
        const container = document.getElementById(containerId);
        if (container) {
            const filterButtons = container.querySelectorAll('.filter-button');

            const activeClasses = ['bg-primary', 'dark:bg-dark-primary', 'text-white'];
            const inactiveClasses = [
                'bg-surface', 'dark:bg-dark-surface', 'text-muted', 'dark:text-dark-muted',
                'hover:text-primary', 'dark:hover:text-dark-primary', 'hover:shadow-clay-hover',
                'dark:hover:shadow-dark-clay-hover', 'hover:-translate-y-0.5', 'hover:border-card-border',
                'dark:hover:border-dark-card-border', 'active:shadow-clay-active', 'dark:active:shadow-dark-clay-active',
                'active:translate-y-0'
            ];

            // Set initial state
            filterButtons.forEach(button => {
                if (button.classList.contains('filter-active')) {
                    button.classList.add(...activeClasses);
                    button.classList.remove(...inactiveClasses);
                } else {
                    button.classList.add(...inactiveClasses);
                    button.classList.remove(...activeClasses);
                }
            });

            // Add click listener
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => {
                        btn.classList.remove('filter-active', ...activeClasses);
                        btn.classList.add(...inactiveClasses);
                    });
                    this.classList.add('filter-active', ...activeClasses);
                    this.classList.remove(...inactiveClasses);
                });
            });
        }
    };

    // Initialize filter buttons for Kamar page
    initFilterButtons('filterKamarContainer');

    // Initialize filter buttons for Notifikasi page
    initFilterButtons('filterNotifikasiContainer');
});
