SELECT kode_harga_kayu,nama_supplier, kabupaten,kecamatan FROM man_harga_kayu GROUP BY kabupaten,kecamatan
SELECT panjang_kayu,kd_bawah,kd_atas FROM man_harga_kayu WHERE nama_supplier='kamim yusuf' AND kabupaten='Blitar' AND kecamatan='bakung' AND panjang_kayu=260
SELECT diameter,panjang_kayu,kd_bawah,kd_atas FROM ref_panjang_kayu WHERE kd_bawah=23 AND kd_atas=24 AND panjang_kayu=260
UNION 
SELECT diameter,panjang_kayu,kd_bawah,kd_atas FROM ref_panjang_kayu WHERE kd_bawah=25 AND kd_atas=29 AND panjang_kayu=260
SELECT diameter,panjang_kayu,kd_bawah,kd_atas FROM ref_panjang_kayu WHERE kd_bawah=15 AND kd_atas=19 AND panjang_kayu=130 UNION SELECT diameter,panjang_kayu,kd_bawah,kd_atas FROM ref_panjang_kayu WHERE kd_bawah=20 AND kd_atas=24 AND panjang_kayu=130 UNION SELECT diameter,panjang_kayu,kd_bawah,kd_atas FROM ref_panjang_kayu WHERE kd_bawah=25 AND kd_atas=29 AND panjang_kayu=130 ORDER BY diameter ASC
SELECT id_dukb_detail,diameter,panjang_kayu,batang,volume FROM tr_dukb_detail_temp