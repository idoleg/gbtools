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
        return view('acts.edit', [
            'id' => false,
            'date' => (new \DateTime())->format('Y-m-d'),
            'actId' => '',
            'tetherName' => '',
            'courseName' => '',
            'from' => (new \DateTime())->format('Y-m-d'),
            'to' => (new \DateTime())->modify('+10 days')->format('Y-m-d'),
            'description' => '',
            'sum' => 10000
        ]);
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

    public function showEditForm(Request $request, Act $id)
    {
        return view('acts.edit', [
            'id' => $id->id,
            'date' => $id->data['date'],
            'actId' => $id->data['act-id'],
            'tetherName' => $id->data['tether-name'],
            'courseName' => $id->data['course-name'],
            'from' => $id->data['from'],
            'to' => $id->data['to'],
            'description' => $id->data['description'],
            'sum' => $id->data['sum'] / 1.15,
        ]);
    }

    public function edit(Request $request, Act $id)
    {
        $id->update([
            'data' => $request->only(['date', 'act-id', 'tether-name', 'course-name', 'from', 'to', 'description', 'sum', 'sumrus'])
            ]);

        return redirect()->route('acts.view', ['id' => $id->id]);
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
