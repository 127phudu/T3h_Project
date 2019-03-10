<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ContentCategory;
use App\Model\Admin\ContentPage;
use App\Model\Admin\ContentPost;
use App\Model\Admin\ContentTag;
use App\Model\Admin\ShopCategory;
use App\Model\Admin\ShopProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\MenuItem;
use App\Model\Admin\Menu;

class MenuItemController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {

        $items = DB::table('menu_items')->paginate(10);

        $items = MenuItem::getLevelCategories();

        $data = array();
        $data['menuitems'] = $items;

        return view('admin.content.menuitem.index', $data);
    }

    public function create() {
        $data = array();
        $data['types'] = MenuItem::getTypeOfMenuItem();
        $data['menus'] = Menu::all();
        $data['menuitems'] = MenuItem::getLevelCategories();

        $data['shop_categories'] = ShopCategory::all();
        $data['shop_products'] = ShopProduct::all();
        $data['content_categories'] = ContentCategory::all();
        $data['content_tags'] = ContentTag::all();
        $data['content_posts'] = ContentPost::all();
        $data['content_pages'] = ContentPage::all();


        return view('admin.content.menuitem.submit', $data);
    }

    public function edit($id) {
        $item = MenuItem::find($id);
        $data = array();
        $data['id'] = $id;
        $data['menuitem'] = $item;

        $items = MenuItem::getLevelCategoriesExcept($id);
        $data['menuitems'] = $items;
        $data['types'] = MenuItem::getTypeOfMenuItem();
        $data['menus'] = Menu::all();

        $data['shop_categories'] = ShopCategory::all();
        $data['shop_products'] = ShopProduct::all();
        $data['content_categories'] = ContentCategory::all();
        $data['content_tags'] = ContentTag::all();
        $data['content_posts'] = ContentPost::all();
        $data['content_pages'] = ContentPage::all();

        return view('admin.content.menuitem.edit', $data);

    }

    public function delete($id) {
        $item = MenuItem::find($id);
        $data = array();
        $data['menuitem'] = $item;
        return view('admin.content.menuitem.delete', $data);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'required',
            'desc' => 'required',
            'menu_id' => 'required',
        ]);

        $input = $request->all();

        $items = new MenuItem();

        $types = MenuItem::getTypeOfMenuItem();

        $params = array();

        foreach ($types as $type_key => $type) {
            $params[$type_key] = isset($input['param_'.$type_key]) ? $input['param_'.$type_key] : '';
        }

        $param_json = json_encode($params);

        $items->name = $input['name'];
        $items->sort = $input['sort'];
        $items->type = (int) $input['type'];

        $final_link = '';

        switch ($items->type) {
            case 1:
                $final_link = '/shop/category/'.(int) $params[1];
                break;
            case 2:
                $final_link = '/shop/product/'.(int) $params[2];
                break;
            case 3:
                $final_link = '/content/category/'.(int) $params[3];
                break;
            case 4:
                $final_link = '/content/post/'.(int) $params[4];
                break;
            case 5:
                $final_link = '/page/'.(int) $params[5];
                break;
            case 6:
                $final_link = '/content/tag/'.(int) $params[6];
                break;
            case 7:
                $final_link = $params[7];
                break;
            default:
                $final_link = '';
                break;
        }

        $items->params = $param_json;
        $items->link = $final_link;
        $items->desc = $input['desc'];
        $items->icon = isset($input['icon']) ? $input['icon'] : '';
        $items->menu_id = isset($input['menu_id']) ? $input['menu_id'] : 0;
        $items->parent_id = isset($input['parent_id']) ? $input['parent_id'] : 0;

        $items->save();

        return redirect('/admin/menuitems');
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'required',
            'desc' => 'required',
            'menu_id' => 'required',
        ]);

        $input = $request->all();
        $items = MenuItem::find($id);

        $types = MenuItem::getTypeOfMenuItem();

        $params = array();

        foreach ($types as $type_key => $type) {
            $params[$type_key] = isset($input['param_'.$type_key]) ? $input['param_'.$type_key] : '';
        }

        $param_json = json_encode($params);

        $items->name = $input['name'];
        $items->sort = $input['sort'];
        $items->type = (int) $input['type'];

        $final_link = '';

        switch ($items->type) {
            case 1:
                $final_link = '/shop/category/'.(int) $params[1];
                break;
            case 2:
                $final_link = '/shop/product/'.(int) $params[2];
                break;
            case 3:
                $final_link = '/content/category/'.(int) $params[3];
                break;
            case 4:
                $final_link = '/content/post/'.(int) $params[4];
                break;
            case 5:
                $final_link = '/page/'.(int) $params[5];
                break;
            case 6:
                $final_link = '/content/tag/'.(int) $params[6];
                break;
            case 7:
                $final_link = $params[7];
                break;
            default:
                $final_link = '';
                break;
        }
        $items->params = $param_json;
        $items->link = $final_link;
        $items->desc = $input['desc'];
        $items->icon = isset($input['icon']) ? $input['icon'] : '';
        $items->menu_id = isset($input['menu_id']) ? $input['menu_id'] : 0;
        $items->parent_id = isset($input['parent_id']) ? $input['parent_id'] : 0;

        $items->save();

        return redirect('/admin/menuitems');
    }

    public function destroy($id) {
        $items = MenuItem::find($id);

        $items->delete();

        return redirect('/admin/menuitems');
    }
}
