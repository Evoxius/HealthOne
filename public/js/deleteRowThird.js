const patienten = document.getElementById('patienten');

if (patienten) {
    patienten.addEventListener('click', e => {
    if (e.target.className === 'btn btn-danger delete-patient') {
      if (confirm('Are you sure?')) {
        const id = e.target.getAttribute('data-id');

        fetch(`/patient/delete/${id}`, {
          method: 'DELETE'
        }).then(res => window.location.reload());
      }
    }
  });
}