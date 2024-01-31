<?php

namespace App\UseCase;


/**
 * Class UseCase.
 *
 * @package namespace App\UseCase;
 */
class MasterDataUseCase implements MasterDataUseCaseInterface
{

    public function select_search()
    {
        return (object)[
            (object)[
                'id'=>'ref_num',
                'text'=>'Refrensi Number'
            ],
            (object)[
                'id'=> 'wk_inout',
                'text'=> 'Waktu Gate In Out'
            ],
            (object)[
                'id'=> 'no_daftar_pabean',
                'text'=> 'No Pendaftaran'
            ],
            (object)[
                'id'=> 'no_bc11',
                'text'=> 'BC 11'
            ],
            (object)[
                'id'=> 'tgl_bc11',
                'text'=> 'Tanggal BC 11'
            ],
            (object)[
                'id'=> 'no_master_bl_awb',
                'text'=> 'MAWB'
            ],
            (object)[
                'id'=> 'no_bl_awb',
                'text'=> 'HAWB'
            ],
            (object)[
                'id'=> 'consignee',
                'text'=> 'Consignee'
            ],
            (object)[
                'id'=> 'nm_angkut',
                'text'=> 'Sarana Angkut'
            ],
        ];
    }
}
