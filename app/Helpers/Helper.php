<?php

namespace App\Helpers;

use Illuminate\Support\Str;
class Helper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id== $parent_id) {
                $html .= '
                <tr>
                    <td>'. $menu->id .'</td>
                    <td>'. $char .      $menu->name .'</td>
                    <td>'. self::active($menu->active ).'</td>
                    <td>'. $menu->updated_at .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/menus/edit/'. $menu->id .'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                        onclick="removeRow('. $menu->id .',\'/admin/menus/destroy\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                ';

                unset($menus[$key]);

                $html .= self::menu($menus, $menu->id, $char.'--');
            }
        }
        return  $html;
    }

    public static function product($products)
    {
        $html = '';
        foreach ($products as $product) {
            $html .= '
            <tr>
                <td>' . $product->id . '</td>
                <td>' . $product->name . '</td>
                <td>' . $product->menu->name . '</td> <!-- Truy cập danh mục -->
                <td>' . number_format($product->price, 0, ',', '.') . ' VNĐ</td> <!-- Giá gốc -->
                <td>' . number_format($product->price_sale, 0, ',', '.') . ' VNĐ</td> <!-- Giá sale -->
                <td>' . self::active($product->active) . '</td>
                <td>' . $product->updated_at->format('d/m/Y H:i') . '</td> <!-- Thời gian cập nhật -->
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/products/edit/' . $product->id . '">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow(' . $product->id . ', \'/admin/products/destroy\')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            ';
        }
        return $html;
    }


    public static function active($active =0) : string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>': '<span class="btn btn-success btn-xs">YES</span>';
    }


    public static function menus($menus,$parent_id = 0)
    {
        $menus = $menus->sortBy('id');  //sap xep

        $html = '';
        foreach ($menus as $key=>$menu) {
            if($menu->parent_id == $parent_id){
                $html .= '
                <li>
                    <a href="/danh-muc/' . $menu->id . '-'.  Str::slug($menu ->name,'-') .'.html ">
                       ' . $menu->name . '
                    </a>';

                unset($menus[$key]);

                if(self::isChild($menus,$menu->id)){
                    $html .='<ul role="menu" class="sub-menu" >';
                    $html .='<li>';
                    $html .=self::menus($menus,$menu->id);
                    $html .='</li>';
                    $html .='</ul>';

                }


            $html .='    </li>

                ';
            }
        }

        return $html;
    }



    public static function isChild($menus,$id)
    {
        foreach ($menus as $menu) {
            if($menu->parent_id == $id){
                return true;
            }
        }
        return false;
    }

    public static function price($price = 0, $priceSale = 0)
    {
        if ($priceSale != 0) return number_format($priceSale);
        if ($price != 0)  return number_format($price);
        return '<a href="/lien-he.html">Liên Hệ</a>';
    }

}
