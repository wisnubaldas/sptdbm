let custom = {
    fieldTable: [{
        "data": "kd_tps",
        "title": "KD TPS",
        "orderable": false,
        "searchable": true
    },
    {
        "data": "nm_angkut",
        "title": "NAMA PENGANGKUT",
        "orderable": false,
        "searchable": true
    },
    {
        "data": "no_voy_flight",
        "title": "NO VOY/FLIGHT",
        "orderable": false,
        "searchable": true
    }, {
        "data": "tg_tiba",
        "title": "TGL TIBA",
        "orderable": false,
        "searchable": true
    }, {
        "data": "kd_gudang",
        "title": "KD GUDANG",
        "orderable": false,
        "searchable": true
    }, {
        "data": "ref_num",
        "title": "REF NUMBER",
        "orderable": false,
        "searchable": true
    }, {
        "data": "no_bl_awb",
        "title": "NO BL/AWB",
        "orderable": true,
        "searchable": true
    }, {
        "data": "tgl_bl_awb",
        "title": "TGL BL/AWB",
        "orderable": true,
        "searchable": true
    }, {
        "data": "no_master_bl_awb",
        "title": "NO MASTER BL/AWB",
        "orderable": true,
        "searchable": true
    }, {
        "data": "tgl_master_bl_awb",
        "title": "TGL MASTER BL/AWB",
        "orderable": true,
        "searchable": true
    }, {
        "data": "id_consignee",
        "title": "ID CONSIGNEE",
        "orderable": false,
        "searchable": true
    }, {
        "data": "consignee",
        "title": "CONSIGNEE",
        "orderable": true,
        "searchable": true
    }, {
        "data": "bruto",
        "title": "BRUTO",
        "orderable": false,
        "searchable": true
    }, {
        "data": "kd_kem",
        "title": "KODE KEMASAN",
        "orderable": false,
        "searchable": true
    }, {
        "data": "jml_kem",
        "title": "JUMLAH KEMASAN",
        "orderable": false,
        "searchable": true
    }, {
        "data": "kd_dok_inout",
        "title": "KD DOK INOUT",
        "orderable": false,
        "searchable": true
    }, {
        "data": "no_dok_inout",
        "title": "NO DOK INOUT",
        "orderable": true,
        "searchable": true
    }, {
        "data": "tgl_dok_inout",
        "title": "TGL DOK INOUT",
        "orderable": true,
        "searchable": true
    }, {
        "data": "wk_inout",
        "title": "WAKTU INOUT",
        "orderable": true,
        "searchable": true
    }, {
        "data": "no_pol",
        "title": "NO POLISI",
        "orderable": false,
        "searchable": true
    }, {
        "data": "no_bc11",
        "title": "NO BC1.1",
        "orderable": false,
        "searchable": true
    }, {
        "data": "tgl_bc11",
        "title": "TGL BC1.1",
        "orderable": false,
        "searchable": true
    }, {
        "data": "no_pos_bc11",
        "title": "NO POS BC1.1",
        "orderable": false,
        "searchable": true
    }, {
        "data": "pel_muat",
        "title": "PEL MUAT",
        "orderable": false,
        "searchable": true
    }, {
        "data": "pel_transit",
        "title": "PEL TRANSIT",
        "orderable": false,
        "searchable": true
    }, {
        "data": "pel_bongkar",
        "title": "PEL BONGKAR",
        "orderable": false,
        "searchable": true
    }, {
        "data": "no_daftar_pabean",
        "title": "NO DAFTAR PABEAN",
        "orderable": true,
        "searchable": true
    }, {
        "data": "tgl_daftar_pabean",
        "title": "TGL DAFTAR PABEAN",
        "orderable": false,
        "searchable": true
    }, {
        "data": "no_segel_bc",
        "title": "NO SEGEL BC",
        "orderable": false,
        "searchable": true
    },{
        "data": "tg_segel_bc",
        "title": "TGL SEGEL BC",
        "orderable": false,
        "searchable": true
    },
    
    ],
    selectSearch: [
    {
        id:'',
        text:'Pilih Parameter Pencarian',
        selected:true
    },
    {
        id: 'no_bc11',
        text: 'Nomor BC 1.1'
    },
    {
        id: 'wk_inout',
        text: 'Waktu Gate In Out'
    },
    {
        id: 'no_daftar_pabean',
        text: 'No Pendaftaran'
    },
    {
        id: 'ref_num',
        text: 'Refrensi Number'
    },
    {
        id: 'tgl_bc11',
        text: 'Tanggal BC 1.1'
    },
    {
        id: 'no_master_bl_awb',
        text: 'MAWB'
    },
    {
        id: 'no_bl_awb',
        text: 'HAWB'
    },
    ],
    showModal:function(e){
        jQuery(function(){
           console.log(e)
        })
    }
}

jQuery(function () {
    
    // console.log(custom.selectSearch)
    let customApp = {
        
    }
})