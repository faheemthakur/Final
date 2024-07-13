document.getElementById('toggle-dash').addEventListener('click', function() {
    document.getElementById('admin-dashboard-popup').style.display = 'block';
});

document.querySelector('.admin-dashboard-close').addEventListener('click', function() {
    document.getElementById('admin-dashboard-popup').style.display = 'none';
});