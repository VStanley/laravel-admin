<?php

namespace App\Http;

class Helpers
{
    /*
     *      megaMenu
     *      возвращаем дерево для постройки многоуровнего меню
     */
    public function generateTree($pages)
    {
        $parentsPages = [];

        foreach ($pages as $key=>$page){

            $parentsPages[$page['owner_id']][$page['id']] = $page;
        }

//        dd($parentsPages);

        /*
         *  $parentsPages[0] - массив с родителями
         *  $parentsPages - все записи
         */
        $treeItems = $parentsPages[0];
        $this->generateItemTree($treeItems, $parentsPages);

        return $treeItems;
    }

    /*
     *      рекурсия
     *      &$treeItems - родительский массив передаем по ссылке
     */
    public function generateItemTree(&$treeItems, $parentsPages)
    {
        foreach ($treeItems as $key => $item){

            if (!isset($item['children'])){

                $treeItems[$key]['children'] = [];
            }

            //  если ключи совпадают значит это дочерний элемент
            if (array_key_exists($key, $parentsPages)){

                $treeItems[$key]['children'] = $parentsPages[$key];

                //  дочений элемент также проверяем на наличие дочернего элемента
                $this->generateItemTree($treeItems[$key]['children'], $parentsPages);
            }
        }
    }
}