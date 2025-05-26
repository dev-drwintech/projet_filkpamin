
    function toggleAnswer(answerId, closeIconId, openIconId) {
        const answer = document.getElementById(answerId);
        const closeIcon = document.getElementById(closeIconId);
        const openIcon = document.getElementById(openIconId);

        // Vérifie si la réponse est visible
        if (answer.style.display === "none" || answer.style.display === "") {
            // Affiche la réponse
            answer.style.display = "block";
            // Affiche l'icône "fermée" et masque l'icône "ouverte"
            closeIcon.style.display = "inline";
            openIcon.style.display = "none";
        } else {
            // Masque la réponse
            answer.style.display = "none";
            // Affiche l'icône "ouverte" et masque l'icône "fermée"
            closeIcon.style.display = "none";
            openIcon.style.display = "inline";
        }
    }

