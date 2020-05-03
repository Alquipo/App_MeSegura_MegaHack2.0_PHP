<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDespesasRequest;
use App\Http\Requests\UpdateDespesasRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Despesas;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Flash;
use Response;

class DespesasController extends AppBaseController
{
    /**
     * Display a listing of the Despesas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Despesas $despesas */
        $despesas = Despesas::all();

        return view('despesas.index')
            ->with('despesas', $despesas);
    }

    /**
     * Show the form for creating a new Despesas.
     *
     * @return Response
     */
    public function create()
    {
        $categorias = Categoria::where('tipo', 'D');

        return view('despesas.create')->with('categorias', $categorias);;
    }

    /**
     * Store a newly created Despesas in storage.
     *
     * @param CreateDespesasRequest $request
     *
     * @return Response
     */
    public function store(CreateDespesasRequest $request)
    {
        $input = $request->all();

        /** @var Despesas $despesas */
        // $input['valor'] = str_replace(',','.',$input['valor']);
                
        $despesas = Despesas::create($input);

        Flash::success('Despesa salva com sucesso.');

        return redirect(url('home'));
    }

    /**
     * Display the specified Despesas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Despesas $despesas */
        $despesas = Despesas::find($id);

        if (empty($despesas)) {
            Flash::error('Despesa não encontrada.');

            return redirect(route('despesas.index'));
        }

        return view('despesas.show')->with('despesas', $despesas);
    }

    /**
     * Show the form for editing the specified Despesas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Despesas $despesas */
        $despesas = Despesas::find($id);

        $categorias = Categoria::where('tipo', 'D');

        if (empty($despesas)) {
            Flash::error('Despesa não encontrada.');

            return redirect(route('despesas.index'));
        }

        return view('despesas.edit')->with('despesas', $despesas)->with('categorias', $categorias);
    }

    /**
     * Update the specified Despesas in storage.
     *
     * @param int $id
     * @param UpdateDespesasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDespesasRequest $request)
    {
        /** @var Despesas $despesas */
        $despesas = Despesas::find($id);

        if (empty($despesas)) {
            Flash::error('Despesa não encontrada.');

            return redirect(route('despesas.index'));
        }

        $despesas->fill($request->all());
        $despesas->save();

        Flash::success('Despesa atualizada com sucesso.');

        return redirect(route('despesas.index'));
    }

    /**
     * Remove the specified Despesas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Despesas $despesas */
        $despesas = Despesas::find($id);

        if (empty($despesas)) {
            Flash::error('Despesa não encontrada.');

            return redirect(route('despesas.index'));
        }

        $despesas->delete();

        Flash::success('Despesa excluída com sucesso.');

        return redirect(route('despesas.index'));
    }
}
