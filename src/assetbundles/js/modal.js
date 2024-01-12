document.querySelectorAll('.snippets-modal__container').forEach(function (element) {
    const dialog = new A11yDialog(element)
    element._dialog = dialog
});