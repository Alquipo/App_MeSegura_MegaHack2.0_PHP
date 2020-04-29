<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Flash;
use Response;

class CategoriaController extends AppBaseController
{
    /**
     * Display a listing of the Categoria.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Categoria $categorias */
        $categorias = Categoria::all();

        return view('categorias.index')
            ->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new Categoria.
     *
     * @return Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created Categoria in storage.
     *
     * @param CreateCategoriaRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoriaRequest $request)
    {
        $input = $request->all();

        /** @var Categoria $categoria */
        $categoria = Categoria::create($input);

        Flash::success('Categoria salvo com sucesso.');

        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified Categoria.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Categoria $categoria */
        $categoria = Categoria::find($id);

        if (empty($categoria)) {
            Flash::error('Categoria não encontrado.');

            return redirect(route('categorias.index'));
        }

        return view('categorias.show')->with('categoria', $categoria);
    }

    /**
     * Show the form for editing the specified Categoria.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Categoria $categoria */
        $categoria = Categoria::find($id);

        if (empty($categoria)) {
            Flash::error('Categoria não encontrado.');

            return redirect(route('categorias.index'));
        }

        return view('categorias.edit')->with('categoria', $categoria);
    }

    /**
     * Update the specified Categoria in storage.
     *
     * @param int $id
     * @param UpdateCategoriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoriaRequest $request)
    {
        /** @var Categoria $categoria */
        $categoria = Categoria::find($id);

        if (empty($categoria)) {
            Flash::error('Categoria não encontrado.');

            return redirect(route('categorias.index'));
        }

        $categoria->fill($request->all());
        $categoria->save();

        Flash::success('Categoria atualizado com sucesso.');

        return redirect(route('categorias.index'));
    }

    /**
     * Remove the specified Categoria from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Categoria $categoria */
        $categoria = Categoria::find($id);

        if (empty($categoria)) {
            Flash::error('Categoria não encontrado.');

            return redirect(route('categorias.index'));
        }

        $categoria->delete();

        Flash::success('Categoria excluído com sucesso.');

        return redirect(route('categorias.index'));
    }
}
