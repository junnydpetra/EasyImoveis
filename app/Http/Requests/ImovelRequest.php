<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImovelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'bail|required|min:3|max:100',
            'cidade_id' => 'bail|required|integer',
            'tipo_id' => 'bail|required|integer',
            'finalidade_id' => 'bail|required|integer',
            'preco' => 'bail|required|numeric|min:0',
            'dormitorios' => 'bail|required|integer|min:0',
            'salas' => 'bail|required|integer|min:0',
            'terreno' => 'bail|required|integer|min:0',
            'banheiros' => 'bail|required|integer|min:0',
            'garagens' => 'bail|required|integer|min:0',
            'descricao' => 'bail|required|string',
            'rua' => 'bail|required|min:1|max:100',
            'numero' => 'bail|required|integer',
            'complemento' => 'bail|nullable|string',
            'bairro' => 'bail|required|min:3|max:50',
            'proximidades' => 'bail|nullable|array',
        ];
    }

    // public function attributes()
    // {
    //     return[
    //         'titulo' => 'título',
    //         'cidade_id' => 'cidade',
    //         'tipo_id' => 'tipo de imóvel',
    //         'finalidade_id' => 'finalidade',
    //         'preco' => 'preço',
    //         'dormitorios' => 'quantidade de dormitórios',
    //         'salas' => 'quantidade de salas',
    //         'banheiros' => 'quantidade de banheiros',
    //         'garagens' => 'vagas na garagem',
    //         'numero' => 'número',
    //         'descricao' => 'descrição',
    //         'proximidades' => 'pontos de interesse'
    //     ];
    // }

    public function messages()
    {
        return [
            'titulo' => 'preencha um título de 3 a 100 caracteres',
            'titulo.min' => 'preencha um título de 3 a 100 caracteres',
            'titulo.max' => 'preencha um título de 3 a 100 caracteres',
            'cidade_id.required' => 'informe a cidade',
            'tipo_id.required' => 'informe o tipo do imóvel',
            'finalidade_id.required' => 'é necessário selecionar uma opção',
            'preco.required' => 'informe o preço',
            'terreno.required' => 'informe a dimensão do terreno',
            'dormitorios.required' => 'informe a quantidade de dormitórios',
            'salas.required' => 'informe a quantidade de salas',
            'banheiros.required' => 'informe a quantidade de banheiros',
            'garagens.required' => 'informe o número de vagas na garagem',
            'numero.required' => 'informe o número do imóvel',
            'descricao.required' => 'precisa haver uma descrição',
            'proximidades.required' => 'selecione pontos de interesse'
        ];
    }
}
