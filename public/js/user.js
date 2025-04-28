document.addEventListener("DOMContentLoaded", function() {
  const modal = document.getElementById('userModal');
  const span = document.getElementsByClassName("close")[0];
  const userForm = document.getElementById('userForm');
  const modalTitle = document.getElementById('modalTitle');

  if (modal && span) {
    // Fermer le modal
    span.onclick = function() {
      modal.style.display = "none";
    };

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    };
  }

  if (userForm) {
    // Bouton "Ajouter"
    document.getElementById('adduser').addEventListener('click', function() {
      if (modalTitle) {
        modalTitle.textContent = 'Créer un nouvel utilisateur';
      }
      userForm.reset();
      document.getElementById('userId').value = '';
      document.getElementById('password').required = true;
      document.getElementById('passwordHelp').style.display = 'none';
      modal.setAttribute('data-mode', 'add');
      modal.style.display = "block";
    });

    // Boutons "Modifier"
    document.querySelectorAll('.edit-user').forEach(button => {
      button.addEventListener('click', function() {
        const userId = this.getAttribute('data-id');
        const row = this.closest('tr');

        if (modalTitle) {
          modalTitle.textContent = 'Modifier l\'utilisateur';
        }
        document.getElementById('userId').value = userId;
        document.getElementById('nom').value = row.cells[0].textContent.trim();
        document.getElementById('prenom').value = row.cells[1].textContent.trim();
        document.getElementById('email').value = row.cells[2].textContent.trim();
        document.getElementById('role').value = row.cells[3].textContent.trim(); // si le rôle est affiché dans le tableau

        document.getElementById('password').required = false;
        document.getElementById('passwordHelp').style.display = 'block';
        modal.setAttribute('data-mode', 'edit');
        modal.style.display = "block";
      });
    });

    // Soumission du formulaire
      userForm.addEventListener('submit', async function(e) {
        e.preventDefault();
    
        const selectedUes = [];
        document.querySelectorAll('input[name="ues[]"]:checked').forEach(checkbox => {
            selectedUes.push(checkbox.value);
        });
    
        const userId = document.getElementById('userId').value;
        const isEdit = userId !== '';
    
        const formData = new URLSearchParams();
        formData.append('nom', document.getElementById('nom').value);
        formData.append('prenom', document.getElementById('prenom').value);
        formData.append('email', document.getElementById('email').value);
        formData.append('role', document.getElementById('role').value);
        formData.append('password', document.getElementById('password').value);
        formData.append('ues', JSON.stringify(selectedUes));
    
        const url = isEdit ? `/admin/user/edit/${userId}` : `/admin/user/add`;
    
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: formData.toString()
            });
    
            if (response.ok) {
                // Réponse OK
                const result = await response.text(); // Tu peux ajuster ici si tu veux du JSON
                alert('Utilisateur enregistré avec succès !');
                modal.style.display = "none";
                location.reload();
            } else {
                const result = await response.text();
                throw new Error(result);
            }
        } catch (error) {
            alert('Erreur: ' + error.message);
        }
    });
  
  }
});
