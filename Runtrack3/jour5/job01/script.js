function logout() {
    document.cookie = "id_utilisateurs=";
    window.location.href = 'index.php';
}