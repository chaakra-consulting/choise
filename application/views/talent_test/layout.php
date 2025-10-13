<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

:root {
    --primary-color: #FBC02D;
    --primary-dark: #F9A825;
    --primary-light: #FFF8E1;
    --success-color: #28a745;
    --success-light: #e9f5e9;
    --danger-color: #dc3545;
    --text-dark: #212529;
    --text-secondary: #6c757d;
    --text-light: #ffffff;
    --bg-main: #f8f9fa;
    --bg-card: #ffffff;
    --border-color: #dee2e6;
    --shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    --border-radius: 8px;
    --transition: all 0.2s ease;
}

body {
    background-color: var(--bg-main);
    font-family: 'Poppins', sans-serif;
    color: var(--text-secondary);
}

.profile-usertitle-name {
    color: var(--text-dark);
    font-weight: 600;
}

.nav.menu li a {
    color: var(--text-secondary);
    transition: var(--transition);
    border-radius: 6px;
    margin: 2px 8px;
    padding-left: 12px;
}

.nav.menu li a:hover, .nav.menu li.active a {
    background-color: var(--primary-light);
    color: var(--primary-dark);
    text-decoration: none;
}

.nav.menu li a .fa {
    color: var(--primary-dark);
}
</style>