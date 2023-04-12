function displayAlert(id,csrf){
    Swal.fire({
        title: 'هل أنت متأكد؟',
        text: "لن تتمكن من التراجع عن هذا !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'الغاء',
        confirmButtonText: 'نعم، متأكد'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'تم الحذف بنجاح',
                'success'
            ).then(() => {

                fetch('/vehicles/'+id, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrf,
                        'Content-Type': 'application/json'
                    }
                }).then(() => {
                     location.reload();
                }).catch((error) => {
                    console.error('Error:', error);
                });
            });
        }
    });
}
