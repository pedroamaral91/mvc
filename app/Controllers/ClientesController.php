<?php
namespace App\Controllers;

use Core\BaseController;
use Core\Container;
use Core\DataBase;
use Core\Redirect;
use Core\Session;

class ClientesController extends BaseController
{
    protected $conn;

    public function __construct()
    {
        parent::__construct();
        $this->conn = DataBase::getCon();
    }

    public function index()
    {
        if(Session::get('success')){
            $this->render->success = Session::get('success');
            Session::destroy('success');
        } else if(Session::get('error')) {
            $this->render->error = Session::get('error');
            Session::destroy('error');
        }

        $this->render->clientes = Container::model('Clientes', $this->conn)->findAll();
        $this->renderView('clientes/index', 'layout');
    }
    public function show()
    {
        $this->renderView('clientes/show', 'layout');
    }
    public function cadastro()
    {
        $this->renderView('clientes/cadastro', 'layout');
    }
    public function salvar($request)
    {        
        $data = ['nome' => $request->post->nome,
                'empresa' => $request->post->empresa,
                'descricao' => $request->post->descricao];        
        if(!Container::model('Clientes', $this->conn)->insert($data))
            return Redirect::url('/clientes', [
                'error' => 'Erro ao salvar cliente'
            ]);
        else
            return Redirect::url('/clientes', [
                'success' => 'Cliente salvo com sucesso'
            ]);
        
    }

    public function editar($id)
    {
        $this->render->cliente = Container::model("Clientes", $this->conn)->findByPk($id);
        $this->renderView('clientes/edit', 'layout');
    }
    public function update($id, $request)
    {
        $data = [
                'nome' => $request->post->nome,
                'descricao' => $request->post->descricao,
                'empresa' => $request->post->empresa];

        if(!Container::model('Clientes', $this->conn)->update($id, $data))
            return Redirect::url('/clientes', [
                'error' => 'Erro ao atualizar dados do cliente'
            ]);
        else
            return Redirect::url('/clientes', [
                'success' => 'Dados atualizado com sucesso!'
            ]);
    }

    public function delete($id)
    {
        if(!Container::model('Clientes', $this->conn)->delete($id))
            return Redirect::url('/clientes', [
                'error' => 'Erro ao deletar cliente!'
            ]);
        else
            return Redirect::url('/clientes', [
                'success' => 'Cliente deletado com sucesso!'
            ]);
    }

    public function search($request)
    {
        if(!$this->render->cliente = Container::model('Clientes', $this->conn)->find($request->post->nome))
            return Redirect::url('/clientes');
        else
            return Redirect::url("/clientes/{$this->render->cliente->id}/show");
        
    }
}