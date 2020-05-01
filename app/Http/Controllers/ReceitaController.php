<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReceitaRequest;
use App\Http\Requests\UpdateReceitaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Receita;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Flash;
use Response;

class ReceitaController extends AppBaseController
{
    /**
     * Display a listing of the Receita.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Receita $receitas */
        $receitas = Receita::all();

        return view('receitas.index')
            ->with('receitas', $receitas);
    }

    /**
     * Show the form for creating a new Receita.
     *
     * @return Response
     */
    public function create()
    {
        $categorias = Categoria::where('tipo', 'R');
        // dd($categorias);
        return view('receitas.create')->with('categorias', $categorias);
    }

    /**
     * Store a newly created Receita in storage.
     *
     * @param CreateReceitaRequest $request
     *
     * @return Response
     */
    public function store(CreateReceitaRequest $request)
    {
        $input = $request->all();
        /** @var Receita $receita */
        $receita = Receita::create($input);

        Flash::success('Receita salvo com sucesso.');

        return redirect(route('receitas.index'));
    }

    /**
     * Display the specified Receita.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Receita $receita */
        $receita = Receita::find($id);

        if (empty($receita)) {
            Flash::error('Receita não encontrado.');

            return redirect(route('receitas.index'));
        }

        return view('receitas.show')->with('receita', $receita);
    }

    /**
     * Show the form for editing the specified Receita.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Receita $receita */
        $receita = Receita::find($id);

        if (empty($receita)) {
            Flash::error('Receita não encontrado.');

            return redirect(route('receitas.index'));
        }

        return view('receitas.edit')->with('receita', $receita);
    }

    /**
     * Update the specified Receita in storage.
     *
     * @param int $id
     * @param UpdateReceitaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReceitaRequest $request)
    {
        /** @var Receita $receita */
        $receita = Receita::find($id);

        if (empty($receita)) {
            Flash::error('Receita não encontrado.');

            return redirect(route('receitas.index'));
        }

        $receita->fill($request->all());
        $receita->save();

        Flash::success('Receita atualizado com sucesso.');

        return redirect(route('receitas.index'));
    }

    /**
     * Remove the specified Receita from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Receita $receita */
        $receita = Receita::find($id);

        if (empty($receita)) {
            Flash::error('Receita não encontrado.');

            return redirect(route('receitas.index'));
        }

        $receita->delete();

        Flash::success('Receita excluído com sucesso.');

        return redirect(route('receitas.index'));
    }
}
