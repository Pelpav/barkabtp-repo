document.addEventListener('DOMContentLoaded', function () {
    const titleInp = document.getElementById('title');
    const imageInp = document.getElementById('image');
    const authorInp = document.getElementById('author');
    const createdAtInp = document.getElementById('createdAt');
    const updatedAtInp = document.getElementById('updatedAt');
    const descriptionInp = document.getElementById('description');
    const addBtn = document.getElementById('addBtn');
    const resetBtn = document.getElementById('resetBtn');
    const updateBtn = document.getElementById('updateBtn');
    updateBtn.style.display = "none";
    const alertTitle = document.getElementById('alertTitle');
    const alertAuthor = document.getElementById('alertAuthor');
    const myTable = document.getElementById('myTable');

    let blog = [];
    let currentIndex = null;

    // Fonction pour charger les articles de blog depuis le serveur
    function loadBlog() {
        fetch('http://localhost:3001/barkabtp-repo/blog')
            .then(response => response.json())
            .then(data => {
                blog = data;
                displayBlog();
            })
            .catch(error => console.error('Error loading blog:', error));
    }

    // Afficher les articles de blog dans le tableau
    function displayBlog() {
        let row = '';
        blog.forEach((article, index) => {
            row += `
            <tr>
                <td>${index + 1}</td>
                <td>${article.title}</td>
                <td>${article.author}</td>
                <td>${article.createdAt}</td>
                <td>${article.updatedAt}</td>
                <td>${article.description}</td>
                <td><button class="btn btn-warning" onclick="getArticleInfo(${index})">Update</button></td>
                <td><button class="btn btn-danger" onclick="deleteArticle(${index})">Delete</button></td>
            </tr>`;
        });
        myTable.innerHTML = row;
    }

    document.getElementById('addBtn').onclick = function () {
        const title = document.getElementById('title').value;
        const imageFile = document.getElementById('image').files[0];
        const author = document.getElementById('author').value;
        const description = document.getElementById('description').value;

        const formData = new FormData();
        formData.append('title', title);
        formData.append('image', imageFile);
        formData.append('author', author);
        formData.append('description', description);

        fetch('http://localhost:3001/barkabtp-repo/blog', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                console.log('Article ajouté:', data);
                loadBlog(); // Recharger la liste des articles après ajout
                resetForm(); // Réinitialiser le formulaire si nécessaire
            })
            .catch(error => console.error('Error adding article:', error));
    };
    // Ajouter un article de blog
    // addBtn.onclick = function (event) {
    //     event.preventDefault(); // Empêche le comportement par défaut du formulaire

    //     // // const formData = new FormData();
    //     // // formData.append('image', imageInp.files[0]);
    //     // // formData.append('author', authorInp.value);
    //     // // formData.append('createdAt', createdAtInp.value);
    //     // // formData.append('updatedAt', updatedAtInp.value);
    //     // // formData.append('description', descriptionInp.value);
    //     // // formData.append('title', titleInp.value);

    //     const newBlog = {
    //         image: imageInp.files[0],
    //         author: authorInp.value,
    //         createdAt: createdAtInp.value,
    //         updatedAt: updatedAtInp.value,
    //         description: descriptionInp.value,
    //         title: titleInp.value
    //     };


    //     fetch('http://localhost:3001/barkabtp-repo/blog', {
    //         method: 'POST',
    //         body: formData
    //     })
    //         .then(response => response.json())
    //         .then(data => {
    //             console.log('Article ajouté:', data);
    //             loadBlog(); // Recharger la liste des articles après ajout
    //             resetForm();
    //         })
    //         .catch(error => console.error('Error adding article:', error));
    // };

    addBlog = function () {
        const formData = new FormData();
        formData.append('image', imageInp.files[0]);
        formData.append('author', authorInp.value);
        formData.append('createdAt', createdAtInp.value);
        formData.append('updatedAt', updatedAtInp.value);
        formData.append('description', descriptionInp.value);
        formData.append('title', titleInp.value);

        fetch('http://localhost:3001/barkabtp-repo/blog', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                console.log('Article ajouté:', data);
                loadBlog(); // Recharger la liste des articles après ajout
                resetForm();
            })
            .catch(error => console.error('Error adding article:', error));
    };



    // Mettre à jour un article de blog
    updateBtn.onclick = function () {
        const updatedData = {
            title: titleInp.value,
            author: authorInp.value,
            createdAt: createdAtInp.value,
            updatedAt: updatedAtInp.value,
            description: descriptionInp.value
        };

        fetch(`http://localhost:3001/barkabtp-repo/blog/${currentIndex}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(updatedData),
        })
            .then(response => response.json())
            .then(data => {
                console.log('Article mis à jour:', data);
                loadBlog(); // Recharger la liste des articles après mise à jour
                resetForm();
                updateBtn.style.display = "none";
                addBtn.style.display = "block";
            })
            .catch(error => console.error('Error updating article:', error));
    };

    // Supprimer un article de blog
    function deleteArticle(index) {
        fetch(`http://localhost:3001/barkabtp-repo/blog/${blog[index].id}`, {
            method: 'DELETE',
        })
            .then(response => response.json())
            .then(data => {
                console.log('Article supprimé:', data);
                loadBlog(); // Recharger la liste des articles après suppression
            })
            .catch(error => console.error('Error deleting article:', error));
    }

    // Pré-remplir le formulaire avec les informations de l'article sélectionné pour mise à jour
    function getArticleInfo(index) {
        currentIndex = index;
        const currentArticle = blog[index];
        titleInp.value = currentArticle.title;
        authorInp.value = currentArticle.author;
        createdAtInp.value = currentArticle.createdAt;
        updatedAtInp.value = currentArticle.updatedAt;
        descriptionInp.value = currentArticle.description;
        updateBtn.style.display = "block";
        addBtn.style.display = "none";
    }

    // Réinitialiser le formulaire et masquer le bouton de mise à jour
    function resetForm() {
        titleInp.value = '';
        imageInp.value = '';
        authorInp.value = '';
        createdAtInp.value = '';
        updatedAtInp.value = '';
        descriptionInp.value = '';
        updateBtn.style.display = "none";
        addBtn.style.display = "block";
    }

    // Charger les articles de blog au chargement de la page
    loadBlog();

    // Écouteurs d'événements pour la réinitialisation
    resetBtn.onclick = function () {
        resetForm();
    };
});
