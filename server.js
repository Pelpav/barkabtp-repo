const express = require('express');
const fs = require('fs');
const multer = require('multer'); // Middleware pour gérer les fichiers
const cors = require('cors');

const app = express();
const PORT = process.env.PORT || 3001;

app.use(express.json());
app.use(cors());
app.use(express.static('public'));

// Middleware pour charger les données depuis blog.json
function loadBlog() {
    try {
        const data = fs.readFileSync('blog.json', 'utf8');
        return JSON.parse(data);
    } catch (error) {
        console.error('Error loading blog:', error);
        return [];
    }
}

// Middleware pour sauvegarder les produits dans blog.json, incluant l'image
const upload = multer({ dest: 'uploads/' }); // Dossier où les fichiers seront temporairement stockés

app.post('/barkabtp-repo/blog', upload.single('image'), (req, res) => {
    // Récupérer les données du formulaire
    const image = req.file; // Fichier image
    const title = req.body.title; // Titre de l'article
    const author = req.body.author; // Auteur de l'article
    const description = req.body.description; // Description de l'article
    // Exemple de traitement: renvoyer la réponse avec les données ajoutées
    const newBlogPost = {
        id: 1, // ID généré ou récupéré de la base de données
        title: title,
        image: image.filename, // Nom du fichier image sauvegardé sur le serveur
        author: author,
        description: description,
        createdAt: new Date(), // Date de création (automatique côté serveur)
        updatedAt: new Date() // Date de mise à jour (automatique côté serveur)
    };

    const blog = loadBlog();

    blog.push(newBlogPost);
    saveBlog(blog);

    res.json({ message: 'Nouvel élément ajouté au blog', newItem: newBlogPost, blog: blog });
});


// Endpoint pour récupérer tous les éléments du blog
app.get('/barkabtp-repo/blog', (req, res) => {
    const blog = loadBlog();
    res.json(blog);
});

// Endpoint pour mettre à jour un élément du blog
app.put('/barkabtp-repo/blog/:id', (req, res) => {
    const blog = loadBlog();
    const { id } = req.params;
    const { category, title, description } = req.body;

    const index = blog.findIndex(item => item.id === id);

    if (index !== -1) {
        blog[index].category = category;
        blog[index].title = title;
        blog[index].description = description;

        saveBlog(blog);

        res.json({ message: `Blog item with id ${id} updated successfully`, updatedItem: blog[index], blog: blog });
    } else {
        res.status(404).json({ error: `Blog item with id ${id} not found` });
    }
});

// Endpoint pour supprimer un élément du blog
app.delete('/barkabtp-repo/blog/:id', (req, res) => {
    const { id } = req.params;

    const blog = loadBlog();
    const index = blog.findIndex(item => item.id === id);

    if (index !== -1) {
        const deletedItem = blog.splice(index, 1)[0];
        saveBlog(blog);

        res.json({ message: `Blog item with id ${id} deleted successfully`, deletedItem: deletedItem, blog: blog });
    } else {
        res.status(404).json({ error: `Blog item with id ${id} not found` });
    }
});

// Middleware pour sauvegarder les données dans blog.json
function saveBlog(blog) {
    try {
        fs.writeFileSync('blog.json', JSON.stringify(blog, null, 2), 'utf8');
    } catch (error) {
        console.error('Error saving blog:', error);
    }
}

// Autres routes et gestionnaires pour mettre à jour et supprimer des éléments du blog

app.listen(PORT, () => {
    console.log(`Serveur en écoute sur http://localhost:${PORT}`);
});
