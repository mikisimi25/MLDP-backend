<?php
namespace App\Helpers;
use App\Models\Lista;
use App\Models\User;

class AppHelper
{
    public function generateStarterPackLists( User $user) {
        $names = ['Favoritos','Vistos','Quiero ver','En progreso','','','','','',''];

        for($list = 1; $list <= 10; $list++) {
            $visible = ($names[$list-1] === '') ? 0 : 1;
            $public = ($list === 1) ? true : false;

            $lista = new Lista([
                "title" => $names[$list-1],
                "username" => $user->username,
                "user_list_count" => $list,
                "public" => $public
            ]);

            $lista->visible = $visible;

            $lista->save();
        }
    }

    public static function instance() {
        return new AppHelper();
    }
}
