function markNotificationsAsRead() {
    $.ajax({
        url: window.notificationRoutes.markNotificationsUrl,  // Accès à la variable globale
        type: 'POST',
        data: {
            _token: window.notificationRoutes.csrfToken,  // Accès à la variable globale
        },
        success: function(response) {
            var unreadNotificationsCount = response.unreadNotificationsCount;

            if (unreadNotificationsCount === 0) {
                $('#notificationBadge').hide();
            } else {
                $('#notificationBadge').show();
                $('#notificationBadge').text(unreadNotificationsCount > 99 ? '99+' : unreadNotificationsCount);
            }
        },
        error: function() {
            alert('Erreur lors de la mise à jour des notifications');
        }
    });
}
