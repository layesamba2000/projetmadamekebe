$(document).ready(function() {
    // Lorsqu'on clique sur le bouton pour vider le panier
    $('#emptyCartBtn').click(function() {
        // Envoi d'une requête Ajax pour vider le panier
        $.ajax({
            url: '/vider-le-panier',  // URL de la route Laravel qui vide le panier
            method: 'POST',           // Utilisez POST pour modifier des données
            data: {
                _token: '{{ csrf_token() }}',  // Token CSRF pour sécurité
            },
            success: function(response) {
                // Affiche le message de succès
                console.log(response.message);  // Affiche dans la console
                // Ferme le modal
                $('#cartModal').modal('hide');
                // Met à jour le contenu du modal pour indiquer que le panier est vide
                $('#modalContent').html('<p>Le panier est maintenant vide.</p>');
            },
            error: function(xhr, status, error) {
                // En cas d'erreur, afficher un message dans le modal
                console.log('Erreur :', error);
                $('#modalContent').html('<p>Une erreur est survenue. Veuillez réessayer.</p>');
            }
        });
    });
});
