function loadItems(element, path, selectInputClass) {
    var selectedVal = $(element).val();

    // select all
    if (selectedVal == -1) {
        return;
    }

    $.ajax({
        type: 'GET',
        url: path + selectedVal,
        success: function(datas) {
            if (!datas || datas.length === 0) {
                return;
            }

            for (var i = 0; i < datas.length; i++) {
                $(selectInputClass).append($('<option>', {
                    value: datas[i].id,
                    text: datas[i].unit_kerja
                }));
            }
        },
        error: function(ex) {}
    });
}



function loadUnits(element) {
    $('.js-units').empty().append('<option value="-1">Silahkan Pilih Unit Kerja</option>');;
    loadItems(element, '/api/units/', '.js-units');
}

function loadUnits(element) {
    $('.js-units').empty().append('<option value="-1">Silahkan Pilih Unit Kerja</option>');;
    loadItems(element, '/api/units/', '.js-units');
}

function registerEvents() {
    $('.js-wilayah').change(function() {
        loadUnits(this);
    });

    $('.foto_karyawan').change(function() {
        loadImg(this);
    });

    $('.js-states').change(function() {
        loadCities(this);
    });
}

function init() {
    registerEvents();
}

init();