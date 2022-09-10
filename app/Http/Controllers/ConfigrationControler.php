<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ConfigrationControler extends Controller
{
    public function confirm(){
        $id  = request('id');
        $id = decrypt($id);
        User::find($id)->update(['account_verfied' => 1]);
        return redirect()->to('/');
}
}
