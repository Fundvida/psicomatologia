// Contenido de hoverDescription.js
function showDescription(title, description) {
    var descriptionBox = document.createElement('div');
    descriptionBox.className = 'description';
    descriptionBox.innerHTML = '<p><strong>' + title + '</strong></p><p>' + description + '</p>';
    document.body.appendChild(descriptionBox);
}
