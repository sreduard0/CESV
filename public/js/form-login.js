function loginSubmit() {
    const formData = new FormData(document.getElementById('form-login'))

    // Verificação
    if (formData.get('nrVtr') == '' || formData.get('nrVtr').length > 4) {
        $('#nrVtr').addClass('is-invalid');
        return false;
    } else {
        $('#nrVtr').removeClass('is-invalid');
    }
    if (formData.get('typeVtr') == '') {
        $('#typeVtr').addClass('is-invalid');
        return false;
    } else {
        $('#typeVtr').removeClass('is-invalid');
    }

    return true;
}
