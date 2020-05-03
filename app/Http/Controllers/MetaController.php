<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMetaRequest;
use App\Http\Requests\UpdateMetaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Meta;
use App\Models\Categoria;

use Illuminate\Http\Request;
use Flash;
use Response;

class MetaController extends AppBaseController
{
    /**
     * Display a listing of the Meta.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Meta $metas */
        $metas = Meta::all();

        return view('metas.index')
            ->with('metas', $metas);
    }

    /**
     * Show the form for creating a new Meta.
     *
     * @return Response
     */
    public function create()
    {
        $categorias = Categoria::where('tipo', 'D');

        return view('metas.create')->with('categorias', $categorias);
    }

    /**
     * Store a newly created Meta in storage.
     *
     * @param CreateMetaRequest $request
     *
     * @return Response
     */
    public function store(CreateMetaRequest $request)
    {
        $input = $request->all();

        /** @var Meta $meta */
        $meta = Meta::create($input);

        Flash::success('Meta salvo com sucesso.');

        return redirect(route('metas.index'));
    }

    /**
     * Display the specified Meta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Meta $meta */
        $meta = Meta::find($id);

        if (empty($meta)) {
            Flash::error('Meta não encontrado.');

            return redirect(route('metas.index'));
        }

        return view('metas.show')->with('meta', $meta);
    }

    /**
     * Show the form for editing the specified Meta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Meta $meta */
        $meta = Meta::find($id);

        $categorias = Categoria::where('tipo', 'D');


        if (empty($meta)) {
            Flash::error('Meta não encontrado.');

            return redirect(route('metas.index'));
        }

        return view('metas.edit')->with('meta', $meta)->with('categorias', $categorias);
    }

    /**
     * Update the specified Meta in storage.
     *
     * @param int $id
     * @param UpdateMetaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMetaRequest $request)
    {
        /** @var Meta $meta */
        $meta = Meta::find($id);

        if (empty($meta)) {
            Flash::error('Meta não encontrado.');

            return redirect(route('metas.index'));
        }

        $meta->fill($request->all());
        $meta->save();

        Flash::success('Meta atualizado com sucesso.');

        return redirect(route('metas.index'));
    }

    /**
     * Remove the specified Meta from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Meta $meta */
        $meta = Meta::find($id);

        if (empty($meta)) {
            Flash::error('Meta não encontrado.');

            return redirect(route('metas.index'));
        }

        $meta->delete();

        Flash::success('Meta excluído com sucesso.');

        return redirect(route('metas.index'));
    }
}
