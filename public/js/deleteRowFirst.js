const medicijnen = document.getElementById('medicijnen');

if (medicijnen) {
  medicijnen.addEventListener('click', e => {
    if (e.target.className === 'btn btn-danger delete-medicijn') {
      if (confirm('Are you sure?')) {
        const id = e.target.getAttribute('data-id');

        fetch(`medicijn/delete/${id}`, {
          method: 'DELETE'
        }).then(res => window.location.reload());
      }
    }
  });
}

