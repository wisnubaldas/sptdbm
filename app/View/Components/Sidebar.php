<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Spatie\Menu\Laravel\Menu;
use Spatie\Menu\Laravel\Link;
use Spatie\Menu\Html;
use App\Models\Menu as MenuData;
class Sidebar extends Component
{
    public $menu;
    public $menu_data = [];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        if($this->menu_data())
        {
            $this->menu_data = $this->build_tree($this->menu_data());
        }
        $this->menu = $this->make_menu();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }

    protected  function make_menu() {
        $result = [];
        foreach ($this->menu_data as $key => $value) {
            if(isset($value['children'])){
                $menu = Menu::new()
                ->setWrapperTag('div')
                ->withoutParentTag()
                ->addClass('menu-item has-sub')
                ->submenu('<a href="'.$value['path'].'" class="menu-link">
                            <div class="menu-icon">
                                <i class="'.$value['icon'].'"></i>
                            </div>
                            <div class="menu-text">'.$value['nama'].'</div>
                            <div class="menu-caret"></div>
                        </a>',function(Menu $menu)use($value) {
                                        $menu
                                            ->setWrapperTag('div')->addClass('menu-submenu')
                                            ->setParentTag('div');

                                        foreach ($value['children'] as $v) {

                                            $menu->add(
                                                Link::to($v['path'], '<div class="menu-text">'.$v['nama'].'</div>')
                                                    ->addParentClass('menu-item')
                                                    ->addClass('menu-link')
                                                    ->setAttributes(['id'=>$v['id']])
                                            );
                                        }
                });

                array_push($result,$menu->render());
            }else{
                $menu = Menu::new()
                ->setWrapperTag('div')
                ->withoutParentTag()
                ->addClass('menu-item')
                ->add(
                    Link::to($value['path'], '<div class="menu-icon">
                                                    <i class="'.$value['icon'].'"></i>
                                                </div>
                                                <div class="menu-text">'.$value['nama'].'<span class="menu-label">NEW</span></div>')
                            ->setAttribute('data-id', $value['id'])
                            ->addParentClass('menu-item')
                            ->addClass('menu-link')
                );
                array_push($result,$menu->render());
            }
        }
        return join("",$result);
    }
    protected function menu_data(){

        $byPermission = auth()->user()->getPermissionsViaRoles()->pluck('name');
        return MenuData::whereIn('id',$byPermission)->get()->toArray();
    }
    protected function build_tree(array $flatList)
    {
        $grouped = [];
        foreach ($flatList as $node){
            $grouped[$node['parent_id']][] = $node;
        }

        $fnBuilder = function($siblings) use (&$fnBuilder, $grouped) {
            foreach ($siblings as $k => $sibling) {
                $id = $sibling['id'];
                if(isset($grouped[$id])) {
                    $sibling['children'] = $fnBuilder($grouped[$id]);
                }
                $siblings[$k] = $sibling;
            }
            return $siblings;
        };

        return $fnBuilder($grouped[0]);
    }
}
