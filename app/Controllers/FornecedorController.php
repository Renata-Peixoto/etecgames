<?php

namespace App\Controllers;


class FornecedorController extends BaseController
{

    public function index()
    {
        echo view('header');
        echo view('cadFornecedor');
        echo view('footer');
    }
    public function inserirFornecedor()
    {
        $data["msg"] = '';
        $request = service('request');
        if ($request->getMethod() === 'post') {

            $FornecedorModelo = new \App\Models\FornecedorModel();
            
            $FornecedorModelo->set('nomeForn', $request->getPost('nomeForn'));
            $FornecedorModelo->set('emailForn', $request->getPost('emailForn'));
            $FornecedorModelo->set('foneForn', $request->getPost('foneForn'));
         

            if ($FornecedorModelo->insert()) {
                $data['msg'] = "Informações cadastrada com sucesso";
            } else {
                $data['msg'] = "Informações NÃO CADASTRADA";
            }
        }
        echo view('header');
        echo view('cadFornecedor', $data);
        echo view('footer');
    }
    public function todosFornecedor()
    {
        $FornecedorModel = new \App\Models\FornecedorModel();
        $registros = $FornecedorModel->find();
        $data['fornecedor'] = $registros;

        $request = service('request');
        $codfornecedor = $request->getPost('codForn');
        $codFornAlterar = $request->getPost('codFornAlterar');

        if ($codfornecedor) {
           $this->deletarFornecedor( $codfornecedor);
            return redirect()->to(base_url('FornecedorController/todosFornecedor/'));
        }

        if ($codFornAlterar) {
          return $this->alterarFornecedor();
        }

        echo view('header');
        echo view('listaFornecedor', $data);
        echo view('footer');
    }
    public function alterarFornecedor()
    {               
        $request = service('request');
        $codFornAlterar = $request->getPost('codFornAlterar');
        $nomeForn = $request->getPost('nomeForn');
        $emailForn = $request->getPost('emailForn');
        $foneForn = $request->getPost('foneForn');

        $FornecedorModel = new \App\Models\FornecedorModel();
        $registros = $FornecedorModel->find($codFornAlterar);          

        if ($nomeForn or $emailForn or $foneForn) {
            $registros->nomeforn = $nomeForn;
            $registros->emailforn = $emailForn;
            $registros->foneforn = $foneForn;

            $FornecedorModel->update($codFornAlterar,$registros);

            return redirect()->to(base_url('FornecedorController/todosFornecedor/'));
        }        
        
        $data['fornecedor'] = $registros;

        echo view('header');
        echo view('alterarFormFornecedor', $data);
        echo view('footer');
    }
    public function listaCodForn()
    {
        $request = service('request');
        $FornecedorModel = new \App\Models\FornecedorModel();
        $codfornecedor = $request->getPost('codForn');
        $registros = $FornecedorModel->find($codfornecedor);

        $data['fornecedor'] = $registros;

        $codFornAlterar = $request->getPost('codFornAlterar');
        $codFornDel = $request->getPost('codFornDel');


        if ($codFornDel) {
            $this->deletarFornecedor($codFornDel);
            return redirect()->to(base_url('FornecedorController/listaCodForn/'));
        }

        if ($codFornAlterar) {
            return $this->alterarFornecedorCod();
        }

        echo view('header');
        echo view('listaCodForn', $data);
        echo view('footer');
    }

    public function alterarFornecedorCod()
    {        
        $request = service('request');
        $codFornAlterar = $request->getPost('codFornAlterar');
        $nomeForn = $request->getPost('nomeForn');
        $emailForn = $request->getPost('emailForn');
        $foneForn = $request->getPost('foneForn');
        
        $FornecedorModel = new \App\Models\FornecedorModel();
        $registros = $FornecedorModel->find($codFornAlterar);  

        if ($nomeForn OR $emailForn OR $foneForn) {
            $registros->nomeforn = $nomeForn;
            $registros->emailforn = $emailForn;
            $registros->foneforn = $foneForn;

            $FornecedorModel->update($codFornAlterar,$registros);

            return redirect()->to(base_url('FornecedorController/listaCodForn/'));
        }   

        $data['fornecedor'] = $registros;

        echo view('header');
        echo view('alterarFormFornecedor', $data);
        echo view('footer');
    }

    public function deletarFornecedor($codfornecedor = null)
    {
        if (is_null($codfornecedor)) {
            return redirect()->to(base_url('FornecedorController/todosFornecedor/'));
        }

        $FornecedorModel = new \App\Models\FornecedorModel();
        if ($FornecedorModel->delete($codfornecedor)) {
            return redirect()->to(base_url('FornecedorController/todosFornecedor/'));
        } else {
            return redirect()->to(base_url('FornecedorController/todosFornecedor/'));
        }
        return redirect()->to(base_url('FornecedorController/todosFornecedor/'));
    }

    public function deletarFornecedorCod($codfornecedor = null)
    {
        if (is_null($codfornecedor)) {
            return redirect()->to(base_url('FornecedorController/listaFornecedor/'));
        }

        $FornecedorModel = new \App\Models\FornecedorModel();
        if ($FornecedorModel->delete($codfornecedor)) {
            return redirect()->to(base_url('FornecedorController/listaFornecedor/'));
        } else {
            return redirect()->to(base_url('FornecedorController/listaFornecedor/'));
        }
    }



}
