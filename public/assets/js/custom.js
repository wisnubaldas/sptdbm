let custom = {
    fieldTable: [{
        "data": "kd_tps",
        "title": "Kode TPS",
        "orderable": true,
        "searchable": true
    },
    {
        "data": "nm_angkut",
        "title": "Nama Angkut",
        "orderable": true,
        "searchable": true
    },
    {
        "data": "no_voy_flight",
        "title": "Flight No",
        "orderable": true,
        "searchable": true
    }, {
        "data": "tg_tiba",
        "title": "Tgl Tiba",
        "orderable": true,
        "searchable": true
    }, {
        "data": "kd_gudang",
        "title": "Kd Gudang",
        "orderable": true,
        "searchable": true
    }, {
        "data": "ref_num",
        "title": "Refnumber",
        "orderable": true,
        "searchable": true
    }, {
        "data": "no_bl_awb",
        "title": "AWB",
        "orderable": true,
        "searchable": true
    }, {
        "data": "tgl_bl_awb",
        "title": "TGL AWB",
        "orderable": true,
        "searchable": true
    }, {
        "data": "no_master_bl_awb",
        "title": "MAWB",
        "orderable": true,
        "searchable": true
    }, {
        "data": "tgl_master_bl_awb",
        "title": "Tgl MAWB",
        "orderable": true,
        "searchable": true
    }, {
        "data": "id_consignee",
        "title": "Id Consignee",
        "orderable": true,
        "searchable": true
    }, {
        "data": "consignee",
        "title": "Consignee",
        "orderable": true,
        "searchable": true
    }, {
        "data": "bruto",
        "title": "Bruto",
        "orderable": true,
        "searchable": true
    }, {
        "data": "kd_kem",
        "title": "Kd Kemasan",
        "orderable": true,
        "searchable": true
    }, {
        "data": "jml_kem",
        "title": "Jml Kemasan",
        "orderable": true,
        "searchable": true
    }, {
        "data": "kd_dok_inout",
        "title": "Kd Dok Inout",
        "orderable": true,
        "searchable": true
    }, {
        "data": "no_dok_inout",
        "title": "Dok Inout",
        "orderable": true,
        "searchable": true
    }, {
        "data": "tgl_dok_inout",
        "title": "Tgl Inout",
        "orderable": true,
        "searchable": true
    }, {
        "data": "wk_inout",
        "title": "Waktu Inout",
        "orderable": true,
        "searchable": true
    }, {
        "data": "no_pol",
        "title": "No Pol",
        "orderable": true,
        "searchable": true
    }, {
        "data": "no_bc11",
        "title": "No BC11",
        "orderable": true,
        "searchable": true
    }, {
        "data": "tgl_bc11",
        "title": "Tgl BC11",
        "orderable": true,
        "searchable": true
    }, {
        "data": "no_pos_bc11",
        "title": "No Pos BC11",
        "orderable": true,
        "searchable": true
    }, {
        "data": "pel_muat",
        "title": "Pelabuhan Muat",
        "orderable": true,
        "searchable": true
    }, {
        "data": "pel_transit",
        "title": "Pelabuhan Transit",
        "orderable": true,
        "searchable": true
    }, {
        "data": "pel_bongkar",
        "title": "Pelabuhan Bongkar",
        "orderable": true,
        "searchable": true
    }, {
        "data": "no_daftar_pabean",
        "title": "No Daftar Pabean",
        "orderable": true,
        "searchable": true
    }, {
        "data": "tgl_daftar_pabean",
        "title": "Tgl Daftar Pabean",
        "orderable": true,
        "searchable": true
    }, {
        "data": "no_segel_bc",
        "title": "No Segel",
        "orderable": true,
        "searchable": true
    },
    {
        "data": "no_bl_awb",
        "title": "Fitur Penegahaan",
        "orderable": false,
        "searchable": false,
        "render": function (data, type, row) {
            // console.log(row);
            $('#consignee').val(row.consignee)
            $('#hawb').val(row.no_bl_awb)
            $('#mawb').val(row.no_master_bl_awb)
            let x = `<a href="#modal-dialog" data-bs-toggle="modal" class="btn btn-purple ">
                            <i class="fas fa-lg fa-fw fa-hand-paper"></i> Tegah
                    </a>`
            return x;
        }
    },


    ]
}

jQuery(function () {
    
})