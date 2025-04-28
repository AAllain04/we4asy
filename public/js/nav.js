document.addEventListener("DOMContentLoaded", function () {
    // Gestion du compte utilisateur
    document.getElementById("saveAccount").addEventListener("click", async function() {
        const firstName = document.getElementById("userFirstName").value;
        const lastName = document.getElementById("userLastName").value;
        const password = document.getElementById("userPassword").value;

        const requestData = { firstName, lastName };
        if (password) requestData.password = password;

        console.log("Données envoyées :", requestData);

        const response = await fetch("../../src/update_account.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(requestData)
        });

        try {
            const result = await response.json();
            console.log("Réponse du serveur :", result);
        } catch (error) {
            console.error("Erreur lors de l'analyse de la réponse :", error);
        }
    });
});