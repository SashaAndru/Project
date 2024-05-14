const staVka = document.querySelector("input[name='stavka']");
const youVigrash = document.querySelector("input[name='viigrash']");
const koeFitsient = document.querySelector("input[name='Koefi']");
const youKesh = document.querySelector("input[name='rahunok']");
const youLastKesh = document.querySelector("input[name='zalishok']");

staVka.addEventListener('input', () => {
    const stavkaValue = parseFloat(staVka.value);
    const koefitsientValue = parseFloat(koeFitsient.value);

    if (!isNaN(stavkaValue) && !isNaN(koefitsientValue)) {
        const vigrashValue = stavkaValue * koefitsientValue;
        youVigrash.value = vigrashValue.toFixed(2); // округлюємо результат до двох знаків після коми
    } else {
        youVigrash.value = '';
    }
});

staVka.addEventListener('input', () => {
    const rahunokValue = parseFloat(youKesh.value);
    const stavkaValue = parseFloat(staVka.value);

    if (!isNaN(rahunokValue) && !isNaN(stavkaValue)) {
        const zalishokValue = rahunokValue - stavkaValue;
        youLastKesh.value = zalishokValue.toFixed(2); // округлюємо результат до двох знаків після коми
    } else {
        youLastKesh.value = '';
    }
});
//--------------------------------------Валідація ставок----------------//

$('.btn-stavka').click(function(e){

    e.preventDefault();

    $(`input`).removeClass('error_');
    $(`.msg`).addClass('non');

    let NameKomand = $('input[name="NameKomand"]').val(),
    Koefi = $('input[name="Koefi"]').val(),
    stavka = $('input[name="stavka"]').val(),
    viigrash = $('input[name="viigrash"]').val(),
    zalishok = $('input[name="zalishok"]').val(),
    id_user = $('input[name="id_user"]').val(),
    id_match = $('input[name="id_match"]').val(),
    date = $('input[name="date"]').val();

     $.ajax({
        url: '../include/new-Stavka-back.php',
        type: 'POST',
        dataType: 'json',
        data:{
            NameKomand: NameKomand,
            Koefi: Koefi,
            stavka:stavka,
            viigrash: viigrash,
            zalishok:zalishok,
            id_user: id_user,
            id_match:id_match,
            date:date
        },
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