<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'logout_modal' => [
      'header' => 'Завершити сесію?',
      'info' => 'Нажміть "Вийти" якщо бажаєте вийти з кабінету.',
      'logout_button' => 'Вийти',
      'cancel_button' => 'Назад'
    ],

    'datatable' => [
      //'localization_link' => '//cdn.datatables.net/plug-ins/1.10.22/i18n/Ukrainian.json'
      'localization_link' => [
        "processing" => "<div class=\"text-center\">Зачекайте...<span class='fa-stack fa-lg'>
        <i class='fa fa-spinner fa-spin fa-stack-2x fa-fw'></i>
        </span>&emsp;</div>",
        "lengthMenu" => "Показати _MENU_ записів",
        "loadingRecords" => "<div class=\"text-center\">Записи прогружуються...<span class='fa-stack fa-lg'>
        <i class='fa fa-spinner fa-spin fa-stack-2x fa-fw'></i>
        </span>&emsp;</div>",
        
        "zeroRecords" => "Записи відсутні.",
        "info" => "Записи з _START_ по _END_ із _TOTAL_ записів",
        "infoEmpty" => "Записи з 0 по 0 із 0 записів",
        "infoFiltered" => "(відфільтровано з _MAX_ записів)",
        "search" => "Пошук:",
        "paginate" => [
            "first" => "Перша",
            "previous" => "Попередня",
            "next" => "Наступна",
            "last" => "Остання"
        ],
        "aria" => [
            "sortAscending" => ": активувати для сортування стовпців за зростанням",
            "sortDescending" => ": активувати для сортування стовпців за спаданням"
        ]
      ] 
    ],

];
