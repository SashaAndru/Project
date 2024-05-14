let MatchFoto = false;
$('input[name="MatchFoto"]').change(function(e){
    MatchFoto=e.target.files[0];
});

$('.btn-new-Match').click(function(e){

    e.preventDefault();

    $(`input`).removeClass('error_');
    $(`.msg`).addClass('non');

    let id_game = $('select[name="id_game"]').val(),
    nameOne = $('input[name="nameOne"]').val(),
    nameTwo = $('input[name="nameTwo"]').val(),
    SmallOpis = $('textarea[name="SmallOpis"]').val(),
    KoefOne = $('input[name="KoefOne"]').val(),
    KoefTwo = $('input[name="KoefTwo"]').val(),
    dateStart = $('input[name="dateStart"]').val(),
    dateEnd = $('input[name="dateEnd"]').val();

    let formData = new FormData();
            formData.append('id_game', id_game);
            formData.append('nameOne', nameOne);
            formData.append('nameTwo', nameTwo);
            formData.append('SmallOpis', SmallOpis);
            formData.append('KoefOne', KoefOne);
            formData.append('KoefTwo', KoefTwo);
            formData.append('dateStart', dateStart);
            formData.append('dateEnd', dateEnd);
            formData.append('MatchFoto', MatchFoto);

     $.ajax({
        url: '../include/new-Match-back.php',
        type: 'POST',
        dataType: 'json',
        processData:false,
        contentType:false,
        cache:false,
        data:formData,
        success (data){
            if(data.status){
                document.location.href = '../index.php';
            }else{
                if(data.type === 1){
                    data.fields.forEach(function(field) {
                        $(`input[name="${field}"]`).addClass('error_');
                    });
                }
                $('.msg').removeClass('non').text(data.message);
            }
            
        }
     });

});