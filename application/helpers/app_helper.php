<?php
if(!function_exists('nama_aplikasi')){
    function nama_aplikasi()
    {
        return 'Info Dokumen';
    }
}

if(!function_exists('tanggal_app')){
    function tanggal_app()
    {
        return date('Y') - 1 .' - '.date('Y');
    }
}