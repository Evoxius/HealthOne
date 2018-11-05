const artsen = document.getElementById('artsen');

if (artsen) {
    artsen.addEventListener('click', e => {
    if (e.target.className === 'btn btn-danger delete-arts') {
      if (confirm('Are you sure?')) {
        const id = e.target.getAttribute('data-id');

        fetch(`/arts/delete/${id}`, {
          method: 'DELETE'
        }).then(res => window.location.reload());
      }
    }
  });
}
