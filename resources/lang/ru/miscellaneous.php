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
      'header' => 'Завершаете сессию?',
      'info' => 'Нажмите "Выйти" если хотите выйти из кабинета.',
      'logout_button' => 'Выйти',
      'cancel_button' => 'Назад'
    ],

    'datatable' => [
      //'localization_link' => '//cdn.datatables.net/plug-ins/1.10.22/i18n/Russian.json'
      'localization_link' => [
        "processing" => "<div class=\"text-center\">Подождите...<span class='fa-stack fa-lg'>
        <i class='fa fa-spinner fa-spin fa-stack-2x fa-fw'></i>
        </span>&emsp;</div>",
        "search" =>  "Поиск:",
        "lengthMenu" =>  "Показать _MENU_ записей",
        "info" =>  "Записи с _START_ до _END_ из _TOTAL_ записей",
        "infoEmpty" =>  "Записи с 0 до 0 из 0 записей",
        "infoFiltered" =>  "(отфильтровано из _MAX_ записей)",
        "loadingRecords" =>  "<div class=\"text-center\">Записи прогружаются...<span class='fa-stack fa-lg'>
        <i class='fa fa-spinner fa-spin fa-stack-2x fa-fw'></i>
        </span>&emsp;</div>",
        "zeroRecords" =>  "Записи отсутствуют.",
        "emptyTable" =>  "В таблице отсутствуют данные",
        "paginate" =>  [
            "first" =>  "Первая",
            "previous" =>  "Предыдущая",
            "next" =>  "Следующая",
            "last" =>  "Последняя"
        ],
        "aria" => [
            "sortAscending" =>  ": активировать для сортировки столбца по возрастанию",
            "sortDescending" =>  ": активировать для сортировки столбца по убыванию"
        ],
        "select" =>  [
            "rows" =>  [
                "_" =>  "Выбрано записей: %d",
                "0" =>  "Кликните по записи для выбора",
                "1" =>  "Выбрана одна запись"
            ],
            "1" =>  "%d ряд выбран",
            "_" =>  "%d ряда(-ов) выбрано",
            "cells" =>  [
                "1" =>  "1 ячейка выбрана",
                "_" =>  "Выбрано %d ячеек"
            ],
            "columns" =>  [
                "1" =>  "1 столбец выбран",
                "_" =>  "%d столбцов выбрано"
            ]
        ],
        "searchBuilder" =>  [
            "conditions" =>  [
                "string" =>  [
                    "notEmpty" =>  "Не пусто",
                    "startsWith" =>  "Начинается с",
                    "contains" =>  "Содержит",
                    "empty" => "Пусто",
                    "endsWith" =>  "Заканчивается на",
                    "equals" =>  "Равно",
                    "not" =>  "Не"
                ],
                "date" => [
                    "after" => "После",
                    "before" => "До",
                    "between" =>  "Между",
                    "empty" =>  "Пусто",
                    "equals" => "Равно",
                    "not" => "Не",
                    "notBetween" => "Не между",
                    "notEmpty" => "Не пусто"
                ],
                "number" => [
                    "between" => "В промежутке от",
                    "empty" => "Пусто",
                    "equals" => "Равно",
                    "gt" => "Больше чем",
                    "gte" => "Больше, чем равно",
                    "lt" => "Меньше чем",
                    "lte" => "Меньше, чем равно",
                    "not" => "Не",
                    "notBetween" => "Не в промежутке от",
                    "notEmpty" => "Не пусто"
                ]
            ],
            "data" => "Данные",
            "deleteTitle" => "Удалить условие фильтрации",
            "logicAnd" => "И",
            "logicOr" => "Или",
            "title" => [
                "0" => "Конструктор поиска",
                "_" => "Конструктор поиска (%d)"
            ],
            "value" => "Значение",
            "add" => "Добавить условие",
            "button" => [
                "0" => "Конструктор поиска",
                "_" => "Конструктор поиска (%d)"
            ],
            "clearAll" => "Очистить всё",
            "condition" => "Условие"
        ],
        "searchPanes" => [
            "clearMessage" => "Очистить всё",
            "collapse" => [
                "0" => "Панели поиска",
                "_" => "Панели поиска (%d)"
            ],
            "count" => "{total}",
            "countFiltered" => "{shown} ({total})",
            "emptyPanes" => "Нет панелей поиска",
            "loadMessage" => "Загрузка панелей поиска",
            "title" => "Фильтры активны - %d"
        ],
        "thousands" => ",",
        "buttons" => [
            "pageLength" => [
                "_" => "Показать 10 строк",
                "-1" => "Показать все ряды",
                "1" => "Показать 1 ряд"
            ],
            "pdf" => "PDF",
            "print" => "Печать",
            "collection" => "Коллекция <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
            "colvis" => "Видимость столбцов",
            "colvisRestore" => "Восстановить видимость",
            "copy" => "Копировать",
            "copyKeys" => "Нажмите ctrl or u2318 + C, чтобы скопировать данные таблицы в буфер обмена.  Для отмены, щелкните по сообщению или нажмите escape.",
            "copySuccess" => [
                "1" => "Скопирована 1 ряд в буфер обмена",
                "_" => "Скопировано %ds рядов в буфер обмена"
            ],
            "copyTitle" => "Скопировать в буфер обмена",
            "csv" => "CSV",
            "excel" => "Excel"
        ],
        "decimal" => ".",
        "infoThousands" => ",",
        "autoFill" => [
            "cancel" => "Отменить",
            "fill" => "Заполнить все ячейки <i>%d<i><\/i><\/i>",
            "fillHorizontal" => "Заполнить ячейки по горизонтали",
            "fillVertical" => "Заполнить ячейки по вертикали",
            "info" => "Пример автозаполнения"
        ]
    
    ]
]

  ];


