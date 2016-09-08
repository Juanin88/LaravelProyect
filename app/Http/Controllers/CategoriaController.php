<?php

namespace LaravelProyect\Http\Controllers;

use Illuminate\Http\Request;

//use LaravelProyect\Http\Requests;
use LaravelProyect\Categoria;
use Illuminate\Support\Facades\Redirect;
use LaravelProyect\Http\Requests\CategoriaFormRequest;
//use Illuminate\Support\Facades\DB;
use DB;

class CategoriaController extends Controller
{
    public function __contruct(){
	}
    
	public function index(Request $request){
		if ($request) {
			$query = trim ($request->get('searchText'));
			$categorias = DB::table('categoria')
			->where('nombre','LIKE','%'.$query.'%')
			//->where('','','')
			->orderBy('idcategoria','desc')
			->paginate(7);
			return view('almacen.categoria.index',
					['categorias'=>$categorias,
					 'searchText'=>$query
			]);
		}
	}
	
	public function create(){
		return view('almacen.categoria.create');
	}
	
	public function store(CategoriaFormRequest $request){
		$categoria = new Categoria();
		$categoria->nombre = $request->get('nombre');
		$categoria->descipcion = $request->get('descripcion');
		$categoria->condicion='1';
		$categoria->save();
		return Redirect::to('almacen/categoria');
		
		
	}
	
	public function show(){
		return view('almacen.categoria.show',
				['categoria'=>Categoria::findOrFail($id)]);
		
	}
	
	public function edit(){
		return view('almacen.categoria.edit',
				['categoria'=>Categoria::findOrFail($id)]);
	}
	
	public function update(CategoriaFormRequest $request, $id){
	
		$categoria =Categoria::findOrFail($id);
		$categoria->nombre=$reques->get('nombre');
		$categoria->descripcion=$reques->get('descripcion');
		$categoria->update();
		return Redirect::to('almacen/categoria');
		
	}
	
	public function destroy($id){
		$categoria=Categoria::findOrFail($id);
		$categoria->condicion='0';
		$categoria->update();
		return Redirect::to('almacen/categoria');
		
		
	}
}
