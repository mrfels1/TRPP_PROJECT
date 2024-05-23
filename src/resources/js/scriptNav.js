document.getElementById('create-post-link').addEventListener('click', function() {
    var img = document.querySelector('.create-post-btn');
    img.src = "/PressedCreateButton.svg";
});

function autoResize(textarea) {
    textarea.style.height = 'auto'; // Сбрасываем высоту, чтобы вычислить новую
    textarea.style.height = (textarea.scrollHeight) + 'px'; // Устанавливаем новую высоту
}