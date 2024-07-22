function submitForm() {
    // Récupérer le jeton CSRF
    var formData = new FormData();
    formData.append('image', $('#image')[0].files[0]);
    formData.append('nom', $('#nom').val());
    formData.append('pays', $('#pays').val());
    formData.append('description', $('#description').val());
    formData.append('dateDepart', $('#dateDepart').val());
    formData.append('dateArriver', $('#dateArriver').val());
    formData.append('telephone', $('#telephone').val());

    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    

    //alert(formData.append('image', $('#image')[0].files[0]))

    var url = "{{ route('client.store') }}";
    var csrfToken = $('meta[name="csrf-token"]').attr('content');


    $('#staticBackdrop2').modal('show');
    $('#payer').on('click', function(e) {
        $('#staticBackdrop2').modal('hide');
        addSuccessListener(response => {
            $('#staticBackdrop2').modal('hide');
            //console.log(response);
            // Récupérer la transactionId à partir de la réponse
            const transactionId = response.transactionId;
            formData.transactionId =transactionId; // Mettez à jour la propriété transactionId avec la valeur récupérée

            //alert(229);

            $.ajax({
                url: "{{ route('client.store') }}",
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    //alert(14);
                    if (parseInt(response) == 200 || parseInt(response) ==500) {
                        if (parseInt(response) == 500) {
                            $("#msg5").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Attention !!!</strong> une erreur s'est produite, veuillez réessayer...
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`);
                        } else {
                            $('#msg5').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Félicitations, votre annonce a été déposée avec succès.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`);
                        }
                    }
                    $('#staticBackdrop2').modal('hide');

                    var url ="{{ route('hotel.profil') }}"; // Assurez-vous que la route client.store est correctement définie
                    if (response == 200) {
                        setTimeout(function() {
                            window.location = url;
                        }, 10000);
                    } else {
                        $("#msg5").html(response);
                    }
                }
            });


            addFailedListener(error => {
                alert("La transaction a échoué, veuillez réessayer.");
            });
        });

        $('#annuler').on('click', function(e) {
            e.preventDefault();
            $('#envoyer').hide();
        });

    });

};