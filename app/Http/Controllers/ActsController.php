<?php

namespace App\Http\Controllers;

use App\Act;
use App\ActsShare;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ActsController extends Controller
{

    public function index()
    {
        $acts = Act::orderBy('id', 'desc')->get();
        return view('acts.index', ['acts' => $acts]);
    }

    public function showCreateForm()
    {
        return view('acts.create');
    }

    public function create(Request $request)
    {
        $act = Act::create([
            'user_id' => Auth()->user()->id,
            'data' => $request->only(['date', 'act-id', 'tether-name', 'course-name', 'from', 'to', 'description', 'sum', 'sumrus'])
        ]);

        ActsShare::create([
            'act_id' => $act->id,
            'hash' => str_random(32)
        ]);

        return redirect()->route('acts.view', ['id' => $act->id]);
    }

    public function view(Request $request, Act $id)
    {
        $hash = ActsShare::where('act_id', $id->id)->first();

        return view('acts.view', ['id' => $id->id, 'act' => $id->data, 'hash' => $hash->hash]);
    }

    public function print(Request $request, Act $id)
    {

        return view('acts.print', ['id' => $id->id, 'act' => $id->data]);
    }

    public function share(Request $request)
    {
        $hash = ActsShare::where('hash', $request->get('hash'))->first();

        if ($hash == null)
            throw new NotFoundHttpException();

        $act = Act::find($hash->act_id);

        return view('acts.share', ['act' => $act->data]);
    }
}
