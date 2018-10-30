const recepten = document.getElementById('recepten');

if (recepten) {
    recepten.addEventListener('click', e => {
    if (e.target.className === 'btn btn-danger delete-recept') {
      if (confirm('Are you sure?')) {
        const id = e.target.getAttribute('data-id');

        fetch(`/recept/delete/${id}`, {
          method: 'DELETE'
        }).then(res => window.location.reload());
      }
    }
  });
}
