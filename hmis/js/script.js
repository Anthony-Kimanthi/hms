document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');

    // Toggle sidebar
    if (toggle && sidebar) {
        toggle.addEventListener('click', function (e) {
            e.stopPropagation();
            sidebar.classList.toggle('show');
        });
    }

    // Close sidebar when clicking outside (for small screens)
    document.addEventListener('click', function (e) {
        if (sidebar && sidebar.classList.contains('show') && !sidebar.contains(e.target) && e.target !== toggle) {
            sidebar.classList.remove('show');
        }
    });

    // Placeholder for future dashboard-wide scripts
    // Example: handle notifications, modals, dropdowns
    // initDashboardFeatures();
});
