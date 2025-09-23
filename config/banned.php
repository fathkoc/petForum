<?php

return [

    /*
     * SANSÜRLENECEK (kayda izin verilecek, ekranda maskelenecek) kelimeler.
     * Diakritikli + diakr. süzülmüş varyantlardan çekirdek olanlar listelendi.
     * UYGULAMA: TextCensor::apply() ile ekranda k***k gibi maskelenir.
     */
    'censor' => [
        // beden/argo
        'sik', 'siktir', 'sikeyim', 'hasiktir', 'siktir git',
        'amk', 'aq', 'a.q', 'a*m*k', // kısaltmalar
        'göt', 'götveren', 'yarrak', 'dalyarak',
        'orospu', 'kaltak', 'kavat', 'kevaşe', 'lavuk',
        'pezevenk', 'piç', 'puşt', 'ibne',

        // yaygın varyasyonlar (diakritiksiz ve uzatılmış yazımlar)
        'yarak', 'yarrak', 'yarraq',
        'got', 'gotveren',
        'orospo', 'orospunun',
        'pıc', 'pic',
        'pezevenk', 'pezevenkler',
        'kaltag', 'kaltaq',

        // hafif/argo hakaretler
        'gerizekalı', 'salak', 'embesil', 'aptal', 'ezik',
        'öküz', 'eşek', 'hayvan', 'it',
    ],

    /*
     * TAMAMEN ENGELLENECEK (kayda izin verilmeyecek) ifadeler.
     * Çok ağır/explicit ve/veya hakaret+seksüel birleşimler burada dursun.
     * UYGULAMA: saving/create sırasında ValidationException ile reddedin.
     */
    'block' => [
        // ağır birleşik ifadeler
        'amına koyayım', 'amına koyarım', 'aminakoyim', 'amına koyim',
        'anını sikeyim', 'ananı sikeyim', 'ananı sikerim', 'bacını sikeyim',
        'yarrağımı ye', 'yarrağı yedin',

        // explicit çıplak kelimeler
        'amcık', 'am', 'got deliği', 'g*t deliği',

        // kısaltmaların aşırı küfürlü eşdeğerleri (yaygın)
        'amq', 'amınakoyayım',

        // ırk/kimlik hedefli ağır hakaretler (politikalarınıza göre)
        // 'ibne', 'puşt'  // (İstersen censor’a alıp sadece maskeleyebilirsin)
    ],
];
