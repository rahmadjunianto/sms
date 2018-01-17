SELECT a.kode_supplier,tanggal,b.nama_supplier, REPLACE(SUM(ROUND(c.volume,4)),'.',',') AS volume, REPLACE(FORMAT(SUM(c.harga),0),',','.') AS harga
FROM tr_dukb a JOIN ref_supplier b ON a.kode_supplier=b.kode_supplier JOIN tr_dukb_detail c ON a.id_dukb=c.tr_dukb_id
WHERE a.kd_pengguna=7 AND tanggal='2018-01-11'
GROUP BY b.nama_supplier


SELECT a.id_dukb,tanggal,
SUM(CASE WHEN b.panjang_kayu = '100' THEN b.batang  ELSE 0 END) AS b100,
SUM(CASE WHEN b.panjang_kayu = '100' THEN ROUND(b.volume,4)  ELSE 0 END) AS v100,
SUM(CASE WHEN b.panjang_kayu = '100' THEN b.harga  ELSE 0 END) AS h100,

SUM(CASE WHEN b.panjang_kayu = '260' THEN b.batang  ELSE 0 END) AS b130,
SUM(CASE WHEN b.panjang_kayu = '260' THEN ROUND(b.volume,4)  ELSE 0 END) AS v130,
SUM(CASE WHEN b.panjang_kayu = '260' THEN b.harga  ELSE 0 END) AS h130,

 SUM(b.harga) AS harga
FROM tr_dukb a JOIN tr_dukb_detail b ON a.id_dukb=b.tr_dukb_id
WHERE (b.panjang_kayu=100 OR b.panjang_kayu=260) AND a.kode_supplier =1 AND tanggal='2018-01-12' AND a.status='Tervalidasi' AND jenis_kayu='mahoni' GROUP BY a.id_dukb