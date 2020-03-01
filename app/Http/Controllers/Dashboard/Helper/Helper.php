<?php

if(!function_exists('datatable_lang'))
{
    function datatable_lang()
    {
        return [
            "sProcessing"=> trans('admin.sProcessing'),
            "sLengthMenu"=> trans('admin.sLengthMenu'),
            "sZeroRecords"=> trans('admin.sZeroRecords'),
            "sEmptyTable"=> trans('admin.sEmptyTable'),
            "sInfo"=> trans('admin.sInfo'),
            "sInfoEmpty"=> trans('admin.sInfoEmpty'),
            "sInfoFiltered"=> trans('admin.sInfoFiltered'),
            "sInfoPostFix"=> "",
            "sSearch"=> trans('admin.sSearch'),
            "sUrl"=> "",
            "sInfoThousands"=> ",",
            "sLoadingRecords"=> trans('admin.sLoadingRecords'),
            "oPaginate"=> [
                "sFirst"=> trans('admin.sFirst'),
                "sLast"=> trans('admin.sLast'),
                "sNext"=> trans('admin.sNext'),
                "sPrevious"=> trans('admin.sPrevious')
            ],
            "oAria"=> [
                "sSortAscending"=>trans('admin.sSortAscending') ,
                "sSortDescending"=> trans('admin.sSortDescending')
            ]
        ];

    }
}

// upload function
if(!function_exists('up'))
{
    function up()
    {
        return new \App\Http\Controllers\Dashboard\Helper\UploadController;
    }
}

////////////////////// validate functions ////////////////////////////
if(!function_exists('validate_image'))
{
    function validate_image($ext=null)
    {
        if($ext === null)
        {
            return 'image|mimes:jpg,png,jpeg,gif';
        }else{
            return 'image|mimes:'.$ext;

        }
    }
}
////////////////////// validate functions ////////////////////////////
