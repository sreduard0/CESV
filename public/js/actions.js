document.getElementById('vtrType').addEventListener('change', event => {
    $('#table').DataTable().column(3).search(event.target.value).draw();
});
